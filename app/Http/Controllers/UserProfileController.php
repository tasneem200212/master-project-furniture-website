<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $orders = $user->orders()->orderBy('created_at', 'desc')->paginate(5);
        return view('user.profile', compact('user', 'orders'));
    }

    public function showOrder($orderId)
    {
        $user = auth()->user();
        $order = Order::findOrFail($orderId);

        if ($order->user_id != $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('orders.show', compact('user', 'order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }

            $path = $request->file('profile_image')->store('profile_pictures', 'public');
            $user->profile_image = $path;
        }

        $user->save();
        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }

    public function cancelOrder($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status === 'pending') {
            $order->status = 'canceled';
            $order->save();
            return redirect()->route('user.profile')->with('success', 'Order cancelled successfully.');
        }

        return redirect()->route('user.profile')->with('error', 'Unable to cancel order.');
    }
}
