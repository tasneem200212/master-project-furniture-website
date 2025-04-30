<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\Cart;
use App\Models\Post;
use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $query = Product::with(['category', 'productImages', 'reviews']);
    
    
        $products = $query->get();
    
        $product = Product::latest()
            ->with(['reviews', 'productImages', 'category'])
            ->first();
    
        $reviews = Review::with('user')->get();
    
        $bestSellers = Product::with(['productImages', 'reviews'])
            ->orderBy('sales_count', 'desc')
            ->take(6)
            ->get();
    
        $posts = Post::orderBy('published_at', 'desc')->take(2)->get();
    
        $discountedProducts = Product::with(['discount', 'productImages'])
            ->whereNotNull('discount_id')
            ->take(2)
            ->get();
            
    
        return view('index', compact('product', 'products', 'reviews', 'bestSellers', 'posts', 'discountedProducts'));
    }
    
    
    



    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');

            $product = new Product();
            $product->image_path = $imagePath;
            $product->save();
        }

        return back()->with('success', 'Image uploaded successfully.');
    }

    public function showProducts(Request $request)
    {
        $products = Product::query()->with(['category', 'productImages', 'discount']);
    
        if ($request->filled('category_id')) {
            $products->where('category_id', $request->category_id);
        }
    
        if ($request->filled('price')) {
            switch ($request->price) {
                case 'under50':
                    $products->where('price', '<', 50);
                    break;
                case '50to100':
                    $products->whereBetween('price', [50, 100]);
                    break;
                case '100to200':
                    $products->whereBetween('price', [100, 200]);
                    break;
                case 'above200':
                    $products->where('price', '>', 200);
                    break;
            }
        }
    
        $products = $products->paginate(8)->appends($request->query());
        $categories = \App\Models\Category::all();
    
        return view('product', compact('products', 'categories'));
    }
    

    public function viewProduct($id)
    {
        $product = Product::with('productImages', 'category', 'reviews')->findOrFail($id);
        $averageRating = $product->reviews()->avg('rating');
        $reviewCount = $product->reviews()->count();

        $user = auth()->user();

        $hasPurchased = Order::where('user_id', $user->id)
        ->whereHas('orderDetails', function ($query) use ($id) {
            $query->where('product_id', $id);
        })
        ->where('status', 'completed')
        ->exists();

        $canReview = $hasPurchased;


        return view('product-details', compact('product', 'averageRating', 'reviewCount', 'canReview'));
    }

    public function quickViewAjax($id)
    {
        $product = Product::with(['category', 'productImages', 'reviews'])->find($id);
    
        if (!$product) {
            return response('<div class="p-4 text-danger">Product not found.</div>', 404);
        }
    
        return view('partials.quick-view-content', compact('product'));
    }
    
    public function getCounts()
    {
        $userId = Auth::id();

        $cartCount = Cart::where('user_id', $userId)->sum('quantity');
        $wishlistCount = Wishlist::where('user_id', $userId)->count();

        return response()->json([
            'cart' => $cartCount,
            'wishlist' => $wishlistCount
        ]);
    }

    public function search(Request $request)
    {
        $query = Product::query();

        $search = $request->input('query', '');

        if (!empty($search)) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [
                $request->min_price,
                $request->max_price
            ]);
        }

        $products = $query->get();

        return view('index', [
            'products' => $products,
            'query' => $search,
        ]);
    }
}
