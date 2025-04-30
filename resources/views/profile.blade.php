@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="profile-container py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="profile-card shadow-lg rounded-4 overflow-hidden">
                    <div class="profile-header text-white p-4" style="background-color: #9b7a52;">
                        <div class="d-flex align-items-center">
                            @if ($user->profile_image)
                            <div class="profile-avatar me-4">
                                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile image" class="rounded-circle shadow" width="80" height="80" style="border-color: rgba(255,255,255,0.3) !important;">
                            </div>
                            @endif
                            <div>
                                <h2 class="mb-1 text-light">{{ $user->name }}</h2>
                                <p class="mb-0 text-light">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="profile-body p-4 p-lg-5">
                        <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold" style="color: #9b7a52;">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control form-control-lg border-2 rounded-pill px-4" 
                                       name="name" value="{{ old('name', $user->name) }}" required autofocus
                                       style="border-color: #d4c5b2;">
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-bold" style="color: #9b7a52;">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control form-control-lg border-2 rounded-pill px-4" 
                                       name="email" value="{{ old('email', $user->email) }}" required
                                       style="border-color: #d4c5b2;">
                            </div>

                            <div class="form-group mt-3">
                                <label for="profile_image">Profile Image</label>
                             
                                @if($user->profile_image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Current Profile Image" class="img-thumbnail" style="max-width: 150px;">
                                    </div>
                                @endif
                             
                                <input type="file" name="profile_image" id="profile_image" class="form-control">
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-lg rounded-pill px-5 py-3 shadow-sm" style="background-color: #9b7a52; border-color: #8a6d49; color: white;">
                                    <i class="fas fa-save me-2"></i> {{ __('Update Profile') }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="orders-section mt-5">
                        <h3 class="mb-3" style="color: #7a6241">Your Orders</h3>

                        @if($orders->isEmpty())
                            <p>You have no orders yet.</p>
                        @else
                            <ul class="list-group">
                                @foreach($orders as $order)
                                    <li class="list-group-item">
                                        <strong>Order #{{ $order->id }}</strong>
                                        <p>Status: {{ $order->status }}</p>
                                        <p>Ordered on: {{ $order->created_at->format('d-m-Y') }}</p>
                                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-link">View Order</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    .profile-container {
        background-color: #f5f1eb;
        min-height: 100vh;
    }
    
    .profile-card {
        background-color: white;
        border: none;
    }
    
    .profile-header {
        background-color: #9b7a52;
    }
    
    .profile-avatar img {
        object-fit: cover;
        border: 3px solid rgba(255,255,255,0.3);
    }
    
    .form-control-lg {
        height: 50px;
        transition: all 0.3s;
    }
    
    .form-control-lg:focus {
        border-color: #9b7a52 !important;
        box-shadow: 0 0 0 0.25rem rgba(155, 122, 82, 0.25);
    }
    
    .btn-primary {
        background-color: #9b7a52;
        border-color: #8a6d49;
    }
    
    .btn-primary:hover {
        background-color: #8a6d49;
        border-color: #7a6241;
    }
    
    .rounded-4 {
        border-radius: 1rem;
    }
    
    a {
        color: #9b7a52;
    }
    
    a:hover {
        color: #7a6241;
    }
</style>
