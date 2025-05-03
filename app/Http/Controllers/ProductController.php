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
        $backgroundProducts = Product::with(['category', 'productImages', 'discount', 'reviews'])
        ->whereIn('id', [5, 12, 18])
        ->orderByRaw("FIELD(id, 5, 12, 18)")
        ->get();
    
        $positions = [
            5 => ['x' => 30, 'y' => 40],
            12 => ['x' => 60, 'y' => 20],
            18 => ['x' => 45, 'y' => 70]
        ];
    
        $highestDiscountProducts = Product::select('products.*')
        ->with(['discount', 'productImages'])
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->orderByRaw('(products.price * discounts.discount_percentage / 100) DESC')
        ->take(2)
        ->get();
    
        $featuredProducts = Product::query()
            ->with(['category', 'productImages', 'discount'])
            ->whereHas('discount')
            ->orWhereHas('reviews', function($q) {
                $q->where('rating', 5);
            })
            ->inRandomOrder()
            ->take(3)
            ->get();
    
        $productsQuery = Product::query()
            ->with(['category', 'productImages', 'reviews', 'discount']);
        $this->applyFilters($productsQuery, $request);
    
        $data = [
            'backgroundProducts' => $backgroundProducts,
            'positions' => $positions,
            'discountBannerProducts' => $highestDiscountProducts,
            'featuredProducts' => $featuredProducts,
            'products' => $productsQuery->get(),
            'product' => Product::latest()->first(),
            'reviews' => Review::with('user')->get(),
            'bestSellers' => $this->getBestSellers(),
            'posts' => Post::latest('published_at')->take(2)->get(),
            'discountedProducts' => $this->getDiscountedProducts(),
        ];
    
        return view('index', $data);
    }
    
    protected function applyFilters($query, $request)
    {
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
    
        if ($request->filled('price')) {
            $this->applyPriceFilter($query, $request->price);
        }
    
        if ($request->filled('category') && $request->category == 'new') {
            $query->where('created_at', '>=', now()->subDays(7));
        }
    
        if ($request->filled('category') && $request->category == 'top') {
            $query->orderByDesc('averageRating');
        }
    }
    
    protected function applyPriceFilter($query, $priceRange)
    {
        switch ($priceRange) {
            case 'under50':
                return $query->where('price', '<', 50);
            case '50to100':
                return $query->whereBetween('price', [50, 100]);
            case '100to200':
                return $query->whereBetween('price', [100, 200]);
            case 'above200':
                return $query->where('price', '>', 200);
        }
    }
    
    protected function getBestSellers()
    {
        return Product::query()
            ->with(['productImages', 'reviews'])
            ->orderByDesc('sales_count')
            ->take(6)
            ->get();
    }
    
    protected function getDiscountedProducts()
    {
        return Product::query()
            ->with(['discount', 'productImages'])
            ->whereNotNull('discount_id')
            ->take(2)
            ->get();
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
        $products = Product::with(['category', 'productImages', 'discount']);

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

        // فلاتر حسب التاريخ باستخدام Carbon (منتجات جديدة)
        if ($request->filled('category') && $request->category == 'new') {
            $today = Carbon::today();
            $products->where('created_at', '>=', $today->subDays(7)); // المنتجات التي تم إضافتها في آخر 7 أيام
        }

        // فلاتر حسب التقييم (منتجات الأعلى تقييمًا)
        if ($request->filled('category') && $request->category == 'top') {
            $products->orderBy('averageRating', 'desc'); // المنتجات الأعلى تقييمًا
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
