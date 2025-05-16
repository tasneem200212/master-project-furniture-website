@extends('layouts.app_Login')

@section('title','Ecommerce Furniture')
 
@section('content')
<main>
   <style>

.furniture-testimonial__item {
    min-height: 240px;
    min-width:400px ;
}
   </style>

    <!-- Banner area start -->
    
    @if(session('welcome_message'))
    <div class="welcome-message-container">
        <div class="welcome-message animate__animated animate__fadeInDown">
            <div class="welcome-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="welcome-icon">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <span class="welcome-text">{{ session('welcome_message') }}</span>
            </div>
            <button class="welcome-close" onclick="this.parentElement.remove()">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    
    <style>
        .welcome-message-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            max-width: 400px;
            width: 90%;
        }
        
        .welcome-message {
            background: linear-gradient(135deg, #9b7a52 0%, #b18b5e 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation-duration: 0.5s;
        }
        
        .welcome-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .welcome-icon {
            flex-shrink: 0;
            color: #fff;
        }
        
        .welcome-text {
            font-size: 16px;
            font-weight: 500;
            line-height: 1.4;
        }
        
        .welcome-close {
            background: transparent;
            border: none;
            color: white;
            cursor: pointer;
            padding: 5px;
            margin-left: 15px;
            opacity: 0.7;
            transition: opacity 0.3s;
        }
        
        .welcome-close:hover {
            opacity: 1;
        }
        
        @media (max-width: 576px) {
            .welcome-message-container {
                left: 50%;
                transform: translateX(-50%);
                width: 95%;
            }
        }
    </style>
    
    <!-- Add Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <script>
        // Auto-close after 5 seconds
        setTimeout(() => {
            const welcomeMsg = document.querySelector('.welcome-message-container');
            if (welcomeMsg) {
                welcomeMsg.classList.add('animate__fadeOutUp');
                setTimeout(() => welcomeMsg.remove(), 500);
            }
        }, 5000);
    </script>
    @endif

    <section class="banner-4 p-relative furniture-banner-area fix bg-image pb-100"
    data-background="assets/imgs/furniture/banner/bg.png" data-bg-color="#F5F1E6">
    <div class="swiper banner-active">
       <div class="swiper-wrapper">


          @foreach($products as $product)
          @if($loop->index < 3)
          <div class="swiper-slide">
             <div class="banner-item-4 d-flex align-items-end">
                <div class="container">
                   <div class="row g-5 align-self-end">
                      <div class="col-xxl-6 col-lg-6">
                         <div class="banner-content-4 furniture__content">
                            <span>New Arrival...</span>
                            <h2 class="banner-title-4">Elevate <br> Your Home Aesthetics</h2>
                            <p>A furniture e-commerce company operates in the digital space, offering a wide range
                               of furniture products for sale
                               through an online platform.</p>
                            <div class="banner-btn-wrapper furniture__btn-group">
                               <a class="border__btn-banner" href="{{ route('product.show') }}">
                                  View More <span><i class="fas fa-angle-right"></i></span>
                               </a>
                            </div>
                         </div>
                      </div>
                      <div class="col-xxl-6 col-lg-6">
                         <div class="banner-thumb-wrapper-4 p-relative">
                            <div class="banner-thumb-4 p-relative z-index-1">
                               <img src="assets/imgs/furniture/banner/chair{{ $loop->index + 1 }}.png" alt="image">
                            </div>
                            <div class="furniture-circle d-none d-lg-block">
                               <img src="assets/imgs/furniture/banner/circle.png" alt="">
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          @endif
          @endforeach
       </div>
       <!-- If we need pagination -->
       <div class="banner-dot-inner">
          <div class="banner-dot"></div>
       </div>
    </div>
 </section>
 
 
    <!-- Banner area end -->

    <!-- Service area start -->
    {{-- <div class="text-center my-4"> 
      <h3 class="section-title">Shipping Methods</h3>
  </div>
  <section class="furniture-service pt-100 pb-100">
   <div class="container">
       <div class="row g-4">
           @php
               $shippings = \App\Models\ShippingMethod::all();
               $icons = [
                   'Express Shipping' => 'fa fa-bolt',
                   'Standard Shipping' => 'fa fa-truck',
                   'Free Shipping' => 'fa fa-gift',
                   'Fast Shipping' => 'fa fa-rocket',
                   'Overnight Shipping' => 'fa fa-moon', 
               ];
           @endphp
           @foreach($shippings as $shipping)
           <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
               <div class="furniture-service__item text-start">
                   <div class="fsr-icon mb-3">
                       <i class="{{ $icons[$shipping->name] ?? 'fa fa-question-circle' }} fs-1" style="color: #b18b5e;"></i>
                   </div>
                   <div class="frs-content">
                       <h6 class="fw-bold">{{ $shipping->name }}</h6>
                       <p class="text-muted">{{ $shipping->description }}</p>
                   </div>
               </div>
           </div>
           @endforeach
       </div>
   </div>
</section> --}}
<div class="text-center my-5">
    <h4 class="section-title">Why Choose Our Store?</h4>
    <p class="text-muted">We offer you a unique and exceptional shopping experience</p>
</div>

<section class="features-section py-5 mb-50">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="feature-card text-center p-4 h-100">
                    <div class="icon mb-3">
                        <i class="fas fa-shield-alt fa-3x" style="color: #b18b5e;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Guaranteed Quality</h5>
                    <p class="text-muted">Our products undergo the highest quality standards and inspections</p>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="feature-card text-center p-4 h-100">
                    <div class="icon mb-3">
                        <i class="fas fa-headset fa-3x" style="color: #b18b5e;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">24/7 Support</h5>
                    <p class="text-muted">Our support team is available around the clock to assist you</p>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="feature-card text-center p-4 h-100">
                    <div class="icon mb-3">
                        <i class="fas fa-tools fa-3x" style="color: #b18b5e;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Free Assembly</h5>
                    <p class="text-muted">Professional installation included</p>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="feature-card text-center p-4 h-100">
                    <div class="icon mb-3">
                        <i class="fas fa-gem fa-3x" style="color: #b18b5e;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Exclusive Offers</h5>
                    <p class="text-muted">Special discounts and offers for our valued members</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .feature-card {
        background: white;
        border-radius: 10px;
        transition: all 0.3s ease;
        border: 1px solid #eee;
    }
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .section-title {
        position: relative;
        display: inline-block;
        margin-bottom: 20px;
    }
    .section-title:after {
        content: '';
        position: absolute;
        width: 50px;
        height: 2px;
        background: #b18b5e;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
    }
</style>

    <!-- Service area end -->

    <!-- Off area start -->
    <section class="furniture-off pb-100">
      <div class="container">
         <div class="row g-4">
            @php
            $backgrounds = [
                'assets/imgs/furniture/product/off-01.png',
                'assets/imgs/furniture/product/off-02.png',
            ];
        
            $slogans = [
                'Style Your Space!',
                'Upgrade Your Comfort.',
                'Limited-Time Offer!',
                'Chic. Modern. Yours.',
                'Luxury Meets Affordability',
            ];

            $discountMessages = [
        'Big Savings Await!',
        'Incredible Discounts Inside!',
        'Exclusive Offers for You!',
        'Best Deals, Shop Now!',
        'Save Big, Limited Time!',
        'Unlock Amazing Savings!',
        'Shop & Save More!',
        'Unbeatable Prices!',
        'Top Deals Here!',
        'Hurry, Shop & Save!',
         ];
        @endphp
        
            @foreach ($discountedProducts as $product)
                <div class="col-lg-6">
                    <div class="furniture-off__item bg-image d-block"
                         data-background="{{ asset($backgrounds[$loop->index % count($backgrounds)]) }}">
    
                         <span class="fo-discount">
                           {{$discountMessages[array_rand($discountMessages)]}}
                       </span>
    
                        <h3 class="text-capitalize">
                           {{ $slogans[array_rand($slogans)] }}
                       </h3>
                                           
    
                        <div class=" mt-60">
                        </div>
    
                    </div>
                </div>
            @endforeach
         </div>
      </div>
    </section>
           
              
   
    <!-- Off area end -->

  
    <!-- Top sale area start -->
    <section class="discount-area p-relative section-space pt-0">
       <div class="container">
          <div class="section-title-wrapper-4 mb-40 text-center">
            <span class="section-subtitle-4 mb-10">Best Discounts</span>
            <h2 class="section-title-4">Hot Deals</h2>
            </div>
          <div class="discount-main p-relative">
             <div class="discount-slider-navigation furniture__navigation">
                <button type="button" class="discount-slider-button-prev"><i class="fas fa-angle-left"></i>
                </button>
                <button type="button" class="discount-slider-button-next"><i
                      class="fas fa-angle-right"></i></button>
             </div>
             <div class="row align-items-center">
                <div class="col-xxl-12">
                   <div class="swiper furuniture-active">
                     <div class="swiper-wrapper">
                        @foreach ($products->filter(fn($product) => $product->discount && $product->discount->discount_percentage > 0)->take(4) as $product)
                        <div class="swiper-slide">
                                <div class="product-item furniture__product">
                                    <div class="product-badge">
                                        @if ($product->discount && $product->discount->discount_percentage > 0)
                                            <span class="product-trending">{{round($product->discount->discount_percentage) }}% off</span>
                                        @endif
                                    </div>
                                    <div class="product-thumb theme-bg-2">
                                        <a href="{{ route('product-details', $product->id) }}">
                                            @if ($product->productImages->isNotEmpty())
                                                <img src="{{ asset('storage/' . $product->productImages->first()->image_path) }}" alt="{{ $product->name }}">
                                            @else
                                                <img src="{{ asset('storage/default-image.jpg') }}" alt="Default Image">
                                            @endif
                                        </a>
                    
                                        <div class="product-thumbnail-images">
                                            @foreach ($product->productImages->skip(1) as $image)
                                                <a href="{{ asset('storage/' . $image->image_path) }}" class="thumbnail-image">
                                                </a>
                                            @endforeach
                                        </div>
                    
                                        <div class="product-action-item">
                                            <form action="{{ route('cart.store') }}" method="POST" style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="product-action-btn">
                                                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.0768 10.1416C13.0768 11.9228 11.648 13.3666 9.88542 13.3666C8.1228 13.3666 6.69401 11.9228 6.69401 10.1416M1.375 5.84163H18.3958M1.375 5.84163V12.2916C1.375 19.1359 2.57494 20.3541 9.88542 20.3541C17.1959 20.3541 18.3958 19.1359 18.3958 12.2916V5.84163M1.375 5.84163L2.91454 2.73011C3.27495 2.00173 4.01165 1.54163 4.81754 1.54163H14.9533C15.7592 1.54163 16.4959 2.00173 16.8563 2.73011L18.3958 5.84163" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <span class="product-tooltip">Add to Cart</span>
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('wishlist.store') }}" method="POST" style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">                                      
                                                <button type="submit" class="product-action-btn">
                                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z" fill="white" /> 
                                                    </svg>
                                                    <span class="product-tooltip">Wishlist</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                    
                                    <div class="product-content">
                                       <h5 class="product-title">
                                           <a href="{{ route('product-details', $product->id) }}">{{ $product->name }}</a>
                                       </h5>
                                   
                                       <div class="product-price">
                                           @if ($product->discount && $product->discount->discount_percentage > 0)
                                               @php
                                                   $oldPrice = $product->price / (1 - $product->discount->discount_percentage / 100);
                                               @endphp
                                               <span class="old-price" style="color: #999;">
                                                   <del>{{ number_format($oldPrice, 2) }} JD</del>
                                               </span>
                                               <span class="current-price" style="color: #d62828; font-weight: bold;">
                                                   {{ number_format($product->price, 2) }} JD
                                               </span>
                                           @else
                                               <span class="current-price" style="color: #333; font-weight: bold;">
                                                   {{ number_format($product->price, 2) }} JD
                                               </span>
                                           @endif
                                       </div>
                                   </div>
                                   
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- Top sale area end -->
 
 <style>
   .modal-lg {
     max-width: 800px;
   }
   .object-fit-contain {
     object-fit: contain;
   }
   .z-3 {
     z-index: 3;
   }
   .btn-close {
     opacity: 1;
     background-size: 0.8rem;
   }
   .ratio-1x1 {
     aspect-ratio: 1/1;
   }
 </style>
    

    <!-- Ratting area start -->
    <section class="furniture-rating overflow-hidden theme-bg-2">
      <div class="row g-0 align-items-center">
          <div class="col-xl-6">
              <div class="furniture-rating__left-item">
                  <div class="furniture-ad__item frl-item bg-furniture">
                      <div class="fad-content">
                          <h6 class="text-white mb-20 text-uppercase">HOT DEAL furniture</h6>
                          <h2 class="text-capitalize text-white">Live Furniture <br>Your Love</h2>
                          <a class="border__btn-f mt-35 bg-white text-black" href="{{ route('product.show') }}">
                              View All Products<span><i class="fas fa-angle-right"></i></span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>

            <div class="col-xl-6">
            <div class="furniture-rating__right-item position-relative">
                <img class="w-100" src="assets/imgs/furniture/rating/bg-image.png" alt="furniture background">
            </div>
        </div>
      </div>
  </section>
  
  <style>
      .rating-dot {
          cursor: pointer;
          transition: transform 0.3s ease;
      }
      .rating-dot:hover {
          transform: scale(1.1);
      }
      .product-rating {
          color: #E8C54A;
          font-size: 14px;
      }
  </style>
    <!-- Ratting area end -->

    <!-- Trendy collection area start -->
    <section class="fruniture-trendy section-space">
       <div class="container">
          <div class="furniture-trendy__header">
             <div class="section-title-wrapper-4 mb-40">
                <span class="section-subtitle-4 mb-10">THIS MONTH</span>
                <h2 class="section-title-4">Trendy Collection</h2>
             </div>
          </div>
          <div class="product__filter-tab">
             <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="collection" role="tabpanel"
                   aria-labelledby="collection-tab">
                   <div class="row g-4">
                     @foreach($products->take(8) as $product)
                        <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                           <div class="product-item furniture__product">
                              <div class="product-badge">
                                 @if($product->discount && $product->discount->discount_percentage > 0) 
                                    <span class="product-trending">{{round($product->discount->discount_percentage) }}% off</span>
                                 @endif
                              </div>
                              <div class="product-thumb theme-bg-2">
                                 <a href="{{route('product-details', $product->id)}}">
                                    @if ($product->productImages->isNotEmpty())
                                       <img src="{{ asset('storage/' . $product->productImages->first()->image_path) }}" alt="{{ $product->name }}">
                                    @else
                                       <img src="{{ asset('storage/default-image.jpg') }}" alt="Default Image">
                                    @endif
                                 </a>
                                 <div class="product-action-item">
                                    <form action="{{ route('cart.store') }}" method="POST" style="display: inline;">
                                       @csrf
                                       <input type="hidden" name="product_id" value="{{ $product->id }}">
                                       <input type="hidden" name="quantity" value="1">
                                       <button type="submit" class="product-action-btn">
                                          <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M13.0768 10.1416C13.0768 11.9228 11.648 13.3666 9.88542 13.3666C8.1228 13.3666 6.69401 11.9228 6.69401 10.1416M1.375 5.84163H18.3958M1.375 5.84163V12.2916C1.375 19.1359 2.57494 20.3541 9.88542 20.3541C17.1959 20.3541 18.3958 19.1359 18.3958 12.2916V5.84163M1.375 5.84163L2.91454 2.73011C3.27495 2.00173 4.01165 1.54163 4.81754 1.54163H14.9533C15.7592 1.54163 16.4959 2.00173 16.8563 2.73011L18.3958 5.84163" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                         </svg>
                                          <span class="product-tooltip">Add to Cart</span>
                                       </button>
                                    </form>
                                    <form action="{{ route('wishlist.store') }}" method="POST" style="display: inline;">
                                       @csrf
                                       <input type="hidden" name="product_id" value="{{ $product->id }}">                                      
                                       <button type="submit" class="product-action-btn">
                                          <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z" fill="white" /> 
                                         </svg>
                                          <span class="product-tooltip">Wishlist</span>
                                       </button>
                                    </form>
<script>
   // Add this script where you have your "Add to Wishlist" button
$('.add-to-wishlist').on('click', function(e) {
    e.preventDefault();
    let productId = $(this).data('product-id');
    
    $.ajax({
        url: '{{ route("wishlist.store") }}',
        method: 'POST',
        data: {
            product_id: productId,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.login_required) {
                window.location.href = '{{ route("login") }}';
                return;
            }
            
            // Show toast notification
            Toastify({
                text: response.message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: response.success ? "#4CAF50" : "#f44336",
            }).showToast();
            
            // Update wishlist counter if needed
            if (response.success && response.wishlist_count) {
                $('.wishlist-count').text(response.wishlist_count);
            }
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
});
</script>
                                    
                                 </div>
                              </div>
                              <div class="product-content">
                                 <h5 class="product-title">
                                     <a href="{{ route('product-details', $product->id) }}">{{ $product->name }}</a>
                                 </h5>
                             
                                 <div class="product-price">
                                     @if ($product->discount && $product->discount->discount_percentage > 0)
                                         @php
                                             $oldPrice = $product->price / (1 - $product->discount->discount_percentage / 100);
                                         @endphp
                                         <span class="old-price" style="color: #999;">
                                             <del>{{ number_format($oldPrice, 2) }} JD</del>
                                         </span>
                                         <span class="current-price" style="color: #d62828; font-weight: bold;">
                                             {{ number_format($product->price, 2) }} JD
                                         </span>
                                     @else
                                         <span class="current-price" style="color: #333; font-weight: bold;">
                                             {{ number_format($product->price, 2) }} JD
                                         </span>
                                     @endif
                                 </div>
                             </div>
                             
                           </div>
                        </div>
                     @endforeach
                  </div>
                  
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- Trendy collection end end -->

    <!-- Ad banner area start -->
    <section class="furniture-ad pb-100">
      <div class="container">
          <div class="row g-4">
              @foreach($discountBannerProducts as $key => $product)
              <div class="{{ $loop->first ? 'col-xxl-7 col-xl-6' : 'col-xxl-5 col-xl-6' }}">
                  <div class="furniture-ad__item h-100 bg-image"
                     style="background-image: url('{{ $loop->first ? 'assets/imgs/furniture/ad/ad-discount.png' : 'assets/imgs/furniture/ad/ad-timer.png' }}')">
                     <div class="fad-content {{ $loop->last ? 'fad-timer text-center' : '' }}">
                        <h6 class="text-white mb-20 text-uppercase">HOT DEAL furniture</h6>
                        
                        @if($loop->first)
                        <h2 class="text-capitalize text-white">
                            Highest Discount: {{floatval($product->discount->discount_percentage) }}%<br>
                            on {{ $product->name }}
                        </h2>
                        @else
                        <h2 class="text-capitalize text-white mb-30">Weekly Offer</h2>
                        <div class="countdown-wrapper">
                           <ul>
                              <li><span id="days">7</span>Days</li>
                              <li><span id="hours">0</span>Hours</li>
                              <li><span id="minutes">0</span>Minutes</li>
                              <li><span id="seconds">0</span>Seconds</li>
                           </ul>
                        </div>
                        @endif
  
                        <div class="price-wrapper mt-3">
                            <span class="text-decoration-line-through text-white-50 me-2">
                                JD {{ number_format($product->price, 2) }}
                            </span>
                            <span class="text-white fw-bold fs-4">
                                JD {{ number_format($product->price * (1 - $product->discount->discount_percentage/100), 2) }}
                            </span>
                        </div>
  
                        <a class="border__btn-f mt-35" href="{{ route('product-details', $product->id) }}">
                            Shop Now <span><i class="fas fa-angle-right"></i></span>
                        </a>
                     </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </section>
    <!-- Ad banner area end -->

    <!-- Testiminial area start -->
    <style>
      .furniture-testimonial__item {
          height: 100%;
          display: flex;
          flex-direction: column;
      }
      .ft-head {
          flex: 0 0 auto;
      }
      .furniture-testimonial__item p {
          flex: 1 1 auto;
          overflow: hidden;
          display: -webkit-box;
          -webkit-line-clamp: 3;
          -webkit-box-orient: vertical;
      }
      .swiper-slide {
          height: auto;
      }
  </style>
  
  <section class="furniture-testimonial section-space bg-image" data-background="assets/imgs/furniture/testimonial/bg.jpg">
      <div class="container">
          <div class="section-title-wrapper-4 is-white mb-40 text-center">
              <span class="section-subtitle-4 mb-10">Testimonials</span>
              <h2 class="section-title-4">Client Feedback</h2>
          </div>
  
          <div class="swiper testimonial-active-3">
              <div class="swiper-wrapper">
                  @foreach ($reviews as $review)
                  <div class="swiper-slide">
                      <div class="furniture-testimonial__item h-100">
                          <div class="ft-head">
                              <div class="ft-info">
                                  <div class="fs-rating">
                                      <span class="rating-value">
                                          @for ($i = 1; $i <= 5; $i++)
                                              <i class="fa{{ $review->rating >= $i ? ' fas' : ' far' }} fa-star"></i>
                                          @endfor
                                      </span>
                                  </div>
                                  <h5>{{ optional($review->user)->name ?? 'Unknown User' }}</h5>
                                  <span>{{ optional($review->user)->job_title ?? 'User' }}</span>
                              </div>
                              <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_276_28)">
                                 <path
                                    d="M23.9729 40C23.9729 37.384 23.9729 34.7679 23.9729 32.0675C27.1379 32.1519 29.7642 30.8861 31.717 27.7637C32.7945 26.076 33.5352 23.7131 33.5352 21.8565C29.8989 21.8565 26.1952 21.8565 22.4915 21.8565C22.4915 14.5148 22.4915 7.25738 22.4915 0C28.2827 0 34.0739 0 39.9325 0C39.9325 0.253165 39.9325 0.421941 39.9325 0.675106C39.9325 7.34177 39.9325 14.0084 39.9325 20.5907C39.9325 29.9578 35.084 37.5527 27.8113 39.5781C26.5992 40 25.3197 40.0844 23.9729 40ZM35.084 20C35.084 20.0844 35.1514 20.1688 35.1514 20.1688C35.4207 26.6667 31.7844 32.4895 26.6665 33.7553C26.2625 33.8397 25.7238 33.8397 25.5218 34.0928C25.3197 34.4304 25.4544 35.1055 25.4544 35.6118C25.4544 36.4557 25.4544 37.2996 25.4544 38.2278C26.3972 37.9747 27.2726 37.8903 28.148 37.6371C34.276 35.6118 38.451 28.8608 38.451 20.8439C38.451 14.6835 38.451 8.6076 38.451 2.44726C38.451 2.27848 38.451 2.1097 38.451 1.94093C33.6026 1.94093 28.8214 1.94093 24.0403 1.94093C24.0403 8.01688 24.0403 14.0084 24.0403 20C27.744 20 31.3803 20 35.084 20Z"
                                    fill="#B18B5E" />
                                 <path
                                    d="M1.4141 40C1.4141 37.384 1.4141 34.7679 1.4141 32.0675C4.4444 32.1519 7.00332 30.9705 8.95619 28.0169C10.1683 26.2447 10.909 23.8819 10.9764 21.7721C7.34002 21.7721 3.63632 21.7721 -0.0673828 21.7721C-4.2744e-05 14.5148 -4.2744e-05 7.25738 -4.2744e-05 0C5.7912 0 11.5824 0 17.3737 0C17.3737 0.168776 17.3737 0.337553 17.3737 0.506329C17.3737 7.25738 17.3737 14.0928 17.3737 20.8439C17.3064 29.7046 12.6599 37.2152 5.7912 39.4093C4.37706 39.9156 2.96292 40.0844 1.4141 40ZM15.9596 1.85654C11.1111 1.85654 6.32992 1.85654 1.54878 1.85654C1.54878 7.93249 1.54878 13.924 1.54878 20C5.25248 20 8.95619 20 12.5926 20C12.9293 27.0042 8.75417 33.4177 2.96292 34.0084C2.96292 35.3586 2.96292 36.7932 2.96292 38.2278C3.83834 37.9747 4.71376 37.8903 5.58918 37.5527C11.7171 35.6118 15.8922 28.7764 15.9596 20.7595C15.9596 14.5992 15.9596 8.52321 15.9596 2.36287C15.9596 2.27848 15.9596 2.1097 15.9596 1.85654Z"
                                    fill="#B18B5E" />
                              </g>
                              <defs>
                                 <clipPath>
                                    <rect width="40" height="40" fill="white" />
                                 </clipPath>
                              </defs>
                           </svg>
                          </div>
                          <p class="mb-3">{{ $review->comment }}</p>
                          @if($review->product)
                          <div class="view-product-link text-end mt-auto">
                              <a href="{{ route('product-details', ['id' => $review->product->id]) }}" class="text-gold">
                                  View Product <i class="fas fa-arrow-right ms-2"></i>
                              </a>
                          </div>
                          @endif
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
          <div class="navigation__wrapprer text-center">
              <div class="common-slider-navigation">
                  <button class="testimonial-button-prev"><i class="fas fa-arrow-left"></i></button>
                  <button class="testimonial-button-next"><i class="fas fa-arrow-right"></i></button>
              </div>
          </div>
      </div>
  </section>
    <!-- Testiminial area end -->

    <!-- Best sell area start -->
    <section class="furniture-seller section-space">
      <div class="container">
          <div class="section-title-wrapper-4 mb-40">
              <span class="section-subtitle-4 mb-10">THIS Week</span>
              <h2 class="section-title-4">Best Sellers</h2>
          </div>
          <div class="row g-4">
              @foreach ($bestSellers as $product)
                  <div class="col-xl-4 col-lg-6 col-md-6">
                      <div class="furniture-seller__item">
                          <div class="fs-image">
                           <img src="{{ asset('storage/' . ($product->productImages->isNotEmpty() ? $product->productImages->first()->image_path : 'default-image.jpg')) }}" alt="{{ $product->name }}">
                        </div>
                          <div class="fs-content">
                              <h5><a href="{{ route('product-details', $product->id) }}" class="text-capitalize">
                                  {{ $product->name }}
                              </a></h5>
                              <span>JD {{ number_format($product->price, 2) }}</span>
                              <div class="fs-rating">
                                 @php
                                 $averageRating = $product->reviews->avg('rating');
                             @endphp
                             
                             @for ($i = 1; $i <= 5; $i++)
                                 <i class="{{ $i <= $averageRating ? 'fas fa-star' : 'far fa-star' }}"></i>
                             @endfor
                              </div>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  </section>
    <!-- Best sell area end -->

    <!-- Brand area start -->
    <div class="brand-area pt-100 pb-100">
       <div class="container">
          <div class="brand-grid border-0">
             <div class="brand-item border-0 p-0">
                <div class="brand-thumb">
                   <img src="assets/imgs/furniture/brand/brand-01.png" alt="">
                </div>
             </div>
             <div class="brand-item border-0 p-0">
                <div class="brand-thumb">
                   <img src="assets/imgs/furniture/brand/brand-02.png" alt="">
                </div>
             </div>
             <div class="brand-item border-0 p-0">
                <div class="brand-thumb">
                   <img src="assets/imgs/furniture/brand/brand-03.png" alt="">
                </div>
             </div>
             <div class="brand-item border-0 p-0">
                <div class="brand-thumb">
                   <img src="assets/imgs/furniture/brand/brand-04.png" alt="">
                </div>
             </div>
             <div class="brand-item border-0 p-0">
                <div class="brand-thumb">
                   <img src="assets/imgs/furniture/brand/brand-05.png" alt="">
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- Brand area end -->
 </main>



 <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




@endsection