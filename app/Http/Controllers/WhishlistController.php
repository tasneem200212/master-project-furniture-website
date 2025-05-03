<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;


class WhishlistController extends Controller
{
    public function show()
    {
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
}
