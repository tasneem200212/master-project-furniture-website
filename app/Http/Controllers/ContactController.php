<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to send a message.');
        }
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'date' => 'nullable|date',
            'message' => 'required|string',
        ]);
        
        Contact::create($validated);
        
        return back()->with('success', 'Your message has been sent successfully!');
    }
    
    
}
