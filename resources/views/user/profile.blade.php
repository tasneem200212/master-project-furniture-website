@extends('layouts.app')

@section('title', 'Update Profile')

@section('content')
<div id="right-panel" class="right-panel">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Profile Header -->
                <div class="text-center mb-5">
                    <h2 class="fw-light text-muted">Your Profile</h2>
                    <div class="divider mx-auto" style="width: 80px; height: 2px; background-color: #e0d6c8;"></div>
                </div>

                <!-- Profile Card -->
                <div class="card border-0 shadow-sm mb-5">
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('user.profile.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Profile Image -->
                            <div class="profile-image-section text-center mb-4">
                                <div class="avatar-wrapper position-relative d-inline-block">
                                    @if($user->profile_image)
                                        <img src="{{ asset('storage/' . $user->profile_image) }}" 
                                             class="profile-picture" 
                                             id="profileImagePreview"
                                             alt="Profile Image">
                                    @else
                                        <div class="default-avatar">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    @endif
                                    
                                    <label for="profile_image" class="upload-button">
                                        <i class="fas fa-camera"></i>
                                        <input type="file" name="profile_image" id="profile_image" 
                                               class="d-none" accept="image/*" onchange="previewImage(this)">
                                    </label>
                                </div>
                            </div>
                            
                            <style>                           
                                .avatar-wrapper {
                                    transition: all 0.3s ease;
                                }
                                
                                .profile-picture {
                                    width: 120px;
                                    height: 120px;
                                    object-fit: cover;
                                    border-radius: 50%;
                                    border: 3px solid white;
                                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                                    transition: all 0.3s ease;
                                }
                                
                                .default-avatar {
                                    width: 120px;
                                    height: 120px;
                                    border-radius: 50%;
                                    background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    border: 3px solid white;
                                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                                }
                                
                                .default-avatar i {
                                    font-size: 2.5rem;
                                    color: #9aa5b1;
                                }
                                
                                .upload-button {
                                    position: absolute;
                                    bottom: 8px;
                                    right: 8px;
                                    width: 36px;
                                    height: 36px;
                                    background-color: var(--primary-color);
                                    color: white;
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    cursor: pointer;
                                    transition: all 0.3s ease;
                                    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
                                    border: 2px solid white;
                                }
                                
                                .upload-button:hover {
                                    background-color: var(--hover-color);
                                    transform: scale(1.1);
                                }
                                
                                .upload-button i {
                                    font-size: 1rem;
                                }
                                
                                .avatar-wrapper:hover .profile-picture,
                                .avatar-wrapper:hover .default-avatar {
                                    transform: scale(1.05);
                                    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
                                }
                            </style>
                            
                            <script>
                                function previewImage(input) {
                                    const preview = document.getElementById('profileImagePreview');
                                    const defaultAvatar = document.querySelector('.default-avatar');
                                    const file = input.files[0];
                                    const reader = new FileReader();
                                    
                                    reader.onload = function(e) {
                                        if (preview) {
                                            preview.src = e.target.result;
                                        } else if (defaultAvatar) {
                                            defaultAvatar.innerHTML = `<img src="${e.target.result}" class="profile-picture" id="profileImagePreview" alt="Profile Image">`;
                                        }
                                    }
                                    
                                    if (file) {
                                        reader.readAsDataURL(file);
                                    }
                                }
                            </script>

                            <!-- Form Fields -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label text-muted small">FULL NAME</label>
                                    <input id="name" type="text" class="form-control border-0 border-bottom rounded-0 py-2 px-0" 
                                           name="name" value="{{ old('name', $user->name) }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label text-muted small">EMAIL</label>
                                    <input id="email" type="email" class="form-control border-0 border-bottom rounded-0 py-2 px-0" 
                                           name="email" value="{{ old('email', $user->email) }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label text-muted small">PHONE</label>
                                    <input id="phone" type="tel" class="form-control border-0 border-bottom rounded-0 py-2 px-0" 
                                           name="phone" value="{{ old('phone', $user->phone) }}">
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label text-muted small">ADDRESS</label>
                                    <textarea id="address" class="form-control border-0 border-bottom rounded-0 py-2 px-0" 
                                              name="address" rows="2" style="resize: none; font-size: 1.5rem;">{{ old('address', $user->address) }}</textarea>
                                </div>

                                <!-- Password Accordion -->
                                <div class="col-12 mt-3">
                                    <div class="accordion border-0" id="passwordAccordion">
                                        <div class="accordion-item border-0">
                                            <button class="accordion-button collapsed shadow-none bg-transparent text-muted p-0" 
                                                    type="button" data-bs-toggle="collapse" 
                                                    data-bs-target="#collapsePassword" 
                                                    aria-expanded="false" 
                                                    aria-controls="collapsePassword">
                                                Change Password
                                            </button>
                                            <div id="collapsePassword" class="accordion-collapse collapse" 
                                                 aria-labelledby="headingPassword" 
                                                 data-bs-parent="#passwordAccordion">
                                                <div class="pt-3">
                                                    <div class="mb-3">
                                                        <label for="current_password" class="form-label text-muted small">CURRENT PASSWORD</label>
                                                        <input id="current_password" type="password" 
                                                               class="form-control border-0 border-bottom rounded-0 py-2 px-0" 
                                                               name="current_password">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="new_password" class="form-label text-muted small">NEW PASSWORD</label>
                                                        <input id="new_password" type="password" 
                                                               class="form-control border-0 border-bottom rounded-0 py-2 px-0" 
                                                               name="new_password">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="new_password_confirmation" class="form-label text-muted small">CONFIRM PASSWORD</label>
                                                        <input id="new_password_confirmation" type="password" 
                                                               class="form-control border-0 border-bottom rounded-0 py-2 px-0" 
                                                               name="new_password_confirmation">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mt-4">
                                <button type="submit" id="save" class="btn rounded-pill py-2">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Orders Section -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h6 class="mb-0" style="color: #5a4a3a; font-weight: 500;">ORDER HISTORY</h6>
                            <span class="badge rounded-pill" style="background-color: #f0e6d6; color: #9b7a52;">
                                {{ $orders->total() }} orders
                            </span>
                        </div>
                        
                        @if($orders->isEmpty())
                            <div class="text-center py-5">
                                <div class="mb-4" style="font-size: 3rem; color: #e0d6c8;">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <h5 class="mb-3" style="color: #9b7a52;">No Orders Yet</h5>
                                <p class="text-muted mb-4">You haven't placed any orders yet</p>
                            </div>
                        @else
                        <div class="list-group list-group-flush mb-4">
                            @foreach($orders as $order)
                            <div class="list-group-item list-group-item-action border-0 px-0 py-3 {{ $order->status != 'completed' ? 'pointer-events-none' : '' }}">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="me-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <h6 class="mb-0 me-2" style="color: #5a4a3a;">Order #{{ $order->id }}</h6>
                                            <span class="badge rounded-pill py-1 px-2 
                                                @if($order->status == 'completed') bg-success
                                                @elseif($order->status == 'processing') bg-primary
                                                @elseif($order->status == 'cancelled') bg-danger
                                                @else bg-secondary @endif">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </div>
                                        <div class="d-flex">
                                            <small class="text-muted me-3">
                                                <i class="far fa-calendar me-1"></i> {{ $order->created_at->format('M d, Y') }}
                                            </small>
                                            <small class="text-muted">
                                                <i class="far fa-clock me-1"></i> {{ $order->created_at->format('h:i A') }}
                                            </small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <div class="mb-2">
                                            <strong style="color: #5a4a3a;">JD {{ number_format($order->total_price, 2) }}</strong>
                                        </div>
                                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary" 
                                           style="color: #9b7a52; border-color: #9b7a52; padding: 6px 12px; font-size: 0.875rem; border-radius: 30px; transition: all 0.3s ease; background-color: transparent;">
                                            Details <i class="fas fa-chevron-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    
                            <!-- Pagination -->
                            <div class="pagination-wrapper mt-4" style="font-size: 1.1rem;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="pagination-info" style="font-size: 1.3rem;color: #5a4a3a;">
                                        Showing {{ $orders->firstItem() }}-{{ $orders->lastItem() }} of {{ $orders->total() }}
                                    </div>
                                    
                                    <ul class="pagination mb-0">
                                        {{-- Previous Page --}}
                                        <li class="page-item {{ $orders->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link rounded" 
                                               href="{{ $orders->previousPageUrl() }}" 
                                               style="color: #5a4a3a; border: 1px solid #d4c5b2; margin: 0 3px;"
                                               aria-label="Previous">
                                                ‹
                                            </a>
                                        </li>
                                
                                        {{-- Page Numbers --}}
                                        @foreach(range(1, $orders->lastPage()) as $i)
                                            <li class="page-item {{ $i == $orders->currentPage() ? 'active' : '' }}">
                                                <a class="page-link rounded" 
                                                   href="{{ $orders->url($i) }}" 
                                                   style="{{ $i == $orders->currentPage() ? 'background-color: #9b7a52; border-color: #9b7a52; color: white;' : 'color: #5a4a3a; border: 1px solid #d4c5b2;' }} margin: 0 3px;">
                                                    {{ $i }}
                                                </a>
                                            </li>
                                        @endforeach
                                
                                        {{-- Next Page --}}
                                        <li class="page-item {{ !$orders->hasMorePages() ? 'disabled' : '' }}">
                                            <a class="page-link rounded" 
                                               href="{{ $orders->nextPageUrl() }}" 
                                               style="color: #5a4a3a; border: 1px solid #d4c5b2; margin: 0 3px;"
                                               aria-label="Next">
                                                ›
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                        @endif
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('profileImagePreview');
                if (preview) {
                    preview.src = e.target.result;
                } else {
                    const placeholder = document.querySelector('.profile-image-placeholder');
                    if (placeholder) {
                        placeholder.innerHTML = `<img src="${e.target.result}" class="rounded-circle" id="profileImagePreview" style="width: 100px; height: 100px; object-fit: cover;">`;
                    }
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection

<style>
    body {
        background-color: #f8f9fa;
    }
    
    .card {
        border-radius: 12px;
    }
    
    .form-control {
        background-color: transparent;
    }
    
    .form-control:focus {
        box-shadow: none;
        border-color: #212529;
    }
    
    #save {
        background-color:#b18b5e;
        transition: all 0.3s ease;
        color: white;
        font-size: 1.5rem !important;
    }
    
    .btn-dark:hover {
        background-color: #343a40;
        transform: translateY(-2px);
    }
    
    .btn-outline-dark {
        transition: all 0.3s ease;
    }
    
    .btn-outline-dark:hover {
        transform: translateY(-2px);
    }
    
    .list-group-item:hover {
        background-color: #f8f9fa;
    }
    
    .accordion-button:not(.collapsed) {
        color: inherit;
        background-color: transparent;
    }
    
    .accordion-button:focus {
        box-shadow: none;
    }
    
    .divider {
        opacity: 0.5;
    }
    .pagination-wrapper {
        font-size: 0.9rem;
    }
    
    .page-item {
        margin: 0 2px;
    }
    
    .page-link {
        color: #5a4a3a;
        border: 1px solid #e0d6c8;
        border-radius: 4px;
        padding: 0.35rem 0.7rem;
    }
    
    .page-link:hover {
        background-color: #f9f5f0;
        border-color: #d4c5b2;
    }
    
    .page-item.active .page-link {
        background-color: #9b7a52;
        border-color: #9b7a52;
        color: white;
    }
    
    .page-item.disabled .page-link {
        color: #d4c5b2;
        background-color: #f0e6d6;
        border-color: #f0e6d6;
    }
    
    .pagination-info {
        padding: 0.25rem 0;
    }
</style>