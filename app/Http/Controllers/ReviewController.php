<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use App\Models\Order;


class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('user')->get();
        return view('reviews.index', compact('reviews'));
    }

public function store(Request $request, $productId)
{
    $user = auth()->user();

    $hasPurchased = Order::where('user_id', $user->id)
        ->where('status', 'completed')
        ->whereHas('products', function ($query) use ($productId) {
            $query->where('product_id', $productId);
        })
        ->exists();

    if (!$hasPurchased) {
        return redirect()->back()->with('error', 'You can only review products you have purchased.');
    }

    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'review' => 'required|string|max:1000',
    ]);

    Review::create([
        'user_id' => $user->id,
        'product_id' => $productId,
        'rating' => $request->rating,
        'comment' => $request->review,
        ]);

    return redirect()->back()->with('success', 'Thank you for your review!');
}



}
