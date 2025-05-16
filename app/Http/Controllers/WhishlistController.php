<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\Product;


class WhishlistController extends Controller
{
    public function show()
    {

        // Check if the user is logged in
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to view your wishlist.');
        }
        $wishlistItems = Wishlist::with('product.productImages', 'product.reviews')->where('user_id', Auth::id())->get();
        return view('wishlist', compact('wishlistItems'));
    }

    public function destroy($id)
    {
        $item = Wishlist::where('id', $id)->where('user_id', Auth::id())->first();

        if ($item) {
            $item->delete();
        }

        return redirect()->route('wishlist')->with('success', 'Item removed from wishlist');
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $existingItem = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->first();

            if (!$existingItem) {
                $wishlistItem = new Wishlist();
                $wishlistItem->user_id = Auth::id();
                $wishlistItem->product_id = $request->product_id;
                $wishlistItem->save();

                return back()->with('success', 'Item added to wishlist!');
            } else {
                return back()->with('info', 'This item is already in your wishlist.');
            }
        }

        return redirect()->route('login')->with('error', 'Please login to add items to your wishlist.');
    }

    public function addtoCart(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to add products to your cart.');
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'size'       => 'nullable',
            'color'      => 'nullable'
        ]);

        $product = Product::findOrFail($request->product_id);
        $user = auth()->user();

        $cart = Cart::where('user_id', $user->id)->where('product_id', $product->id)->first();

        if ($cart) {
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            Cart::create([
                'user_id'   => $user->id,
                'product_id' => $product->id,
                'quantity'   => $request->quantity,
            ]);
        }

        return back()->with('success', 'Product added to cart.');
    }
}
