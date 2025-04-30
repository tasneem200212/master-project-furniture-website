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
    <div class="alert alert-success">
        {{ session('welcome_message') }}
    </div>
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
                                  View Details <span><i class="fas fa-angle-right"></i></span>
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
    <div class="text-center my-4"> 
      <h3 class="section-title">Shipping Methods</h3>
  </div>
    <section class="furniture-service pt-100 pb-100">
       <div class="container">
          <div class="row g-4">
            @php
            $shippings=\App\Models\ShippingMethod::all();
            @endphp
            @foreach($shippings as $shipping)
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="furniture-service__item">
                   <div class="fsr-icon">
                      <svg width="80" height="63" viewBox="0 0 80 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <g clip-path="url(#clip0_210_55)">
                            <path
                               d="M21.6673 48.2343H15.0007C14.5586 48.2343 14.1347 48.0615 13.8221 47.7538C13.5096 47.4461 13.334 47.0288 13.334 46.5937C13.334 46.1586 13.5096 45.7413 13.8221 45.4336C14.1347 45.1259 14.5586 44.9531 15.0007 44.9531H21.6673C22.1093 44.9531 22.5333 45.1259 22.8458 45.4336C23.1584 45.7413 23.334 46.1586 23.334 46.5937C23.334 47.0288 23.1584 47.4461 22.8458 47.7538C22.5333 48.0615 22.1093 48.2343 21.6673 48.2343ZM75.834 48.2343H71.6673C71.2253 48.2343 70.8014 48.0615 70.4888 47.7538C70.1762 47.4461 70.0007 47.0288 70.0007 46.5937C70.0007 46.1586 70.1762 45.7413 70.4888 45.4336C70.8014 45.1259 71.2253 44.9531 71.6673 44.9531H74.4506L76.6973 33.1669C76.6673 27.1359 71.434 21.9844 65.0007 21.9844H54.0573L48.754 44.9531H58.334C58.776 44.9531 59.1999 45.1259 59.5125 45.4336C59.8251 45.7413 60.0007 46.1586 60.0007 46.5937C60.0007 47.0288 59.8251 47.4461 59.5125 47.7538C59.1999 48.0615 58.776 48.2343 58.334 48.2343H46.6673C46.4172 48.2345 46.1703 48.1792 45.9449 48.0726C45.7194 47.966 45.5213 47.8108 45.365 47.6186C45.2088 47.4264 45.0985 47.202 45.0424 46.9621C44.9862 46.7222 44.9856 46.4729 45.0407 46.2328L51.1007 19.9828C51.1839 19.6194 51.3903 19.2947 51.686 19.0621C51.9816 18.8295 52.3489 18.7029 52.7273 18.7031H65.0007C73.2707 18.7031 80.0007 25.328 80.0007 33.4687L77.4706 46.8956C77.3998 47.2718 77.1972 47.6117 76.8983 47.8563C76.5993 48.1009 76.2227 48.2346 75.834 48.2343Z"
                               fill="#B18B5E" />
                            <path
                               d="M65 54.7968C60.4067 54.7968 56.6667 51.1185 56.6667 46.5937C56.6667 42.0689 60.4067 38.3906 65 38.3906C69.5933 38.3906 73.3333 42.0689 73.3333 46.5937C73.3333 51.1185 69.5933 54.7968 65 54.7968ZM65 41.6718C62.2433 41.6718 60 43.8801 60 46.5937C60 49.3073 62.2433 51.5156 65 51.5156C67.7567 51.5156 70 49.3073 70 46.5937C70 43.8801 67.7567 41.6718 65 41.6718ZM28.3333 54.7968C23.74 54.7968 20 51.1185 20 46.5937C20 42.0689 23.74 38.3906 28.3333 38.3906C32.9267 38.3906 36.6667 42.0689 36.6667 46.5937C36.6667 51.1185 32.9267 54.7968 28.3333 54.7968ZM28.3333 41.6718C25.5767 41.6718 23.3333 43.8801 23.3333 46.5937C23.3333 49.3073 25.5767 51.5156 28.3333 51.5156C31.09 51.5156 33.3333 49.3073 33.3333 46.5937C33.3333 43.8801 31.09 41.6718 28.3333 41.6718ZM21.6667 18.7031H8.33333C7.89131 18.7031 7.46738 18.5303 7.15482 18.2226C6.84226 17.9149 6.66667 17.4976 6.66667 17.0625C6.66667 16.6274 6.84226 16.2101 7.15482 15.9024C7.46738 15.5947 7.89131 15.4219 8.33333 15.4219H21.6667C22.1087 15.4219 22.5326 15.5947 22.8452 15.9024C23.1577 16.2101 23.3333 16.6274 23.3333 17.0625C23.3333 17.4976 23.1577 17.9149 22.8452 18.2226C22.5326 18.5303 22.1087 18.7031 21.6667 18.7031ZM21.6667 28.5469H5C4.55797 28.5469 4.13405 28.374 3.82149 28.0663C3.50893 27.7587 3.33333 27.3414 3.33333 26.9062C3.33333 26.4711 3.50893 26.0538 3.82149 25.7461C4.13405 25.4385 4.55797 25.2656 5 25.2656H21.6667C22.1087 25.2656 22.5326 25.4385 22.8452 25.7461C23.1577 26.0538 23.3333 26.4711 23.3333 26.9062C23.3333 27.3414 23.1577 27.7587 22.8452 28.0663C22.5326 28.374 22.1087 28.5469 21.6667 28.5469ZM21.6667 38.3906H1.66667C1.22464 38.3906 0.800716 38.2177 0.488155 37.9101C0.175595 37.6024 0 37.1851 0 36.75C0 36.3148 0.175595 35.8976 0.488155 35.5899C0.800716 35.2822 1.22464 35.1093 1.66667 35.1093H21.6667C22.1087 35.1093 22.5326 35.2822 22.8452 35.5899C23.1577 35.8976 23.3333 36.3148 23.3333 36.75C23.3333 37.1851 23.1577 37.6024 22.8452 37.9101C22.5326 38.2177 22.1087 38.3906 21.6667 38.3906Z"
                               fill="#B18B5E" />
                            <path
                               d="M46.6673 48.2343H35.0007C34.5586 48.2343 34.1347 48.0615 33.8221 47.7538C33.5096 47.4461 33.334 47.0288 33.334 46.5937C33.334 46.1586 33.5096 45.7413 33.8221 45.4336C34.1347 45.1259 34.5586 44.9531 35.0007 44.9531H45.3373L52.9107 12.1406H15.0007C14.5586 12.1406 14.1347 11.9678 13.8221 11.6601C13.5096 11.3524 13.334 10.9351 13.334 10.5C13.334 10.0649 13.5096 9.64758 13.8221 9.3399C14.1347 9.03223 14.5586 8.85938 15.0007 8.85938H55.0007C55.2507 8.85925 55.4977 8.91453 55.7231 9.02112C55.9485 9.12771 56.1467 9.28287 56.3029 9.47511C56.4592 9.66735 56.5694 9.89173 56.6256 10.1316C56.6818 10.3715 56.6823 10.6208 56.6273 10.8609L48.294 46.9546C48.2107 47.318 48.0043 47.6427 47.7087 47.8753C47.413 48.1079 47.0458 48.2345 46.6673 48.2343Z"
                               fill="#B18B5E" />
                         </g>
                         <defs>
                            <clipPath id="clip0_210_55">
                               <rect width="80" height="62.9999" fill="white" />
                            </clipPath>
                         </defs>
                      </svg>
                   </div>
                   <div class="frs-content">
                      <h6>{{$shipping->name}}</h6>
                      <p>{{$shipping->description}}</p>
                   </div>
                </div>
             </div>
             @endforeach
          </div>
       </div>
    </section>
    <!-- Service area end -->

    <!-- Off area start -->
    <section class="furniture-off pb-100">
      <div class="container">
         <div class="row g-4">
            <section class="furniture-off pb-100">
               <div class="container">
                  <div class="row g-4">
                     @php
                        $backgrounds = [
                           'assets/imgs/furniture/product/off-01.png',
                           'assets/imgs/furniture/product/off-02.png',
                        ];
                     @endphp
            
                     @foreach ($discountedProducts as $product)
                        <div class="col-lg-6">
                           <a href="{{ route('product-details', ['id' => $product->id]) }}" 
                              class="furniture-off__item bg-image d-block"
                              data-background="{{ asset($backgrounds[$loop->index % count($backgrounds)]) }}">
                              
                              <span class="fo-discount">GET {{ round($product->discount->discount_percentage ?? 0) }}% OFF</span>
                              
                              <h3 class="text-capitalize">
                                 {!! nl2br(e(Str::limit($product->name, 25))) !!}
                              </h3>
                              
                              <div class="solid-btn mt-30">
                                 Buy Now
                                 <span><i class="fas fa-angle-right"></i></span>
                              </div>
                           </a>
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
             <span class="section-subtitle-4 mb-10">top sale</span>
             <h2 class="section-title-4">Featured Product</h2>
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
                        @foreach ($products->take(4) as $product)
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
                    
                                            <button type="button" class="product-action-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal" data-product-id="{{ $product->id }}" >
                                       <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M13.092 4.55026C10.5878 4.55026 8.55683 6.58125 8.55683 9.08541C8.55683 11.5896 10.5878 13.6206 13.092 13.6206C15.5961 13.6206 17.6271 11.5903 17.6271 9.08541C17.6271 6.5805 15.5969 4.55026 13.092 4.55026ZM13.092 12.1089C11.4246 12.1089 10.0338 10.7196 10.0338 9.05216C10.0338 7.38473 11.3898 6.02872 13.0572 6.02872C14.7246 6.02872 16.0807 7.38473 16.0807 9.05216C16.0807 10.7196 14.7594 12.1089 13.092 12.1089ZM25.0965 8.8768C25.0875 8.839 25.092 8.79819 25.0807 8.76115C25.0761 8.74528 25.0655 8.73621 25.0603 8.7226C25.0519 8.70144 25.0542 8.67574 25.0429 8.65533C22.8441 3.62131 18.1064 0.724854 13.0572 0.724854C8.00807 0.724854 3.17511 3.61677 0.975559 8.65079C0.966488 8.67196 0.968 8.69388 0.959686 8.71806C0.954395 8.73318 0.943812 8.74074 0.938521 8.7551C0.927184 8.7929 0.931719 8.83296 0.92416 8.8715C0.910555 8.93953 0.897705 9.00605 0.897705 9.07483C0.897705 9.14361 0.910555 9.20862 0.92416 9.2774C0.931719 9.31519 0.926428 9.35677 0.938521 9.39229C0.943057 9.40968 0.954395 9.41648 0.959686 9.4316C0.967244 9.45201 0.965732 9.4777 0.975559 9.49887C3.17511 14.5314 7.96121 17.381 13.0104 17.381C18.0595 17.381 22.8448 14.5374 25.0436 9.5034C25.055 9.48148 25.0527 9.45956 25.061 9.43538C25.0663 9.42253 25.0761 9.4127 25.0807 9.39758C25.092 9.36055 25.089 9.32049 25.0965 9.28118C25.1101 9.21315 25.1222 9.14739 25.1222 9.0771C25.1222 9.01058 25.1094 8.94482 25.0958 8.87604L25.0965 8.8768ZM13.0104 15.8692C8.72841 15.8692 4.51298 13.6123 2.44193 9.07407C4.49333 4.55177 8.76469 2.23582 13.0572 2.23582C17.349 2.23582 21.5251 4.55404 23.5773 9.07861C21.5266 13.6002 17.3036 15.8692 13.0104 15.8692Z" fill="white" />
                                       </svg>
                                       <span class="product-tooltip">Quick View</span>
                                    </button>
                                            
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

<!-- Quick View Modal -->
<div class="modal fade" id="producQuickViewModal" tabindex="-1" aria-labelledby="quickViewLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered">
     <div class="modal-content border-0 overflow-hidden">
       <!-- Modal Header with Close Button -->
       <div class="modal-header border-0 position-absolute end-0 top-0 z-3 pe-1 pt-1">
         <button type="button" class="btn-close bg-light rounded-circle p-2 m-1" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       
       <div class="modal-body p-0 d-flex">
         <!-- Product Image (Fixed aspect ratio) -->
         <div class="col-md-6 p-0 bg-light">
           <div class="ratio ratio-1x1 h-100">
             <img src="{{ asset('storage/' . $product->productImages[0]->image_path) }}" 
                  alt="{{ $product->name }}" 
                  class="object-fit-contain p-3 w-100 h-100">
           </div>
         </div>
         
         <!-- Product Info -->
         <div class="col-md-6 p-4 d-flex flex-column">
           <!-- Category -->
           <small class="text-uppercase text-muted mb-1">{{ $product->category->name }}</small>
           
           <!-- Product Name -->
           <h3 class="mb-2 fw-bold">{{ $product->name }}</h3>
           
           <!-- Rating -->
           <div class="d-flex align-items-center mb-2">
             <div class="product__details-rating">
               @for ($i = 1; $i <= 5; $i++)
                 <i class="{{ $i <= $product->averageRating ? 'fas fa-star text-warning' : 'far fa-star text-muted' }} fs-6"></i>
               @endfor
             </div>
             <small class="ms-2 text-muted">({{ $product->reviewCount }} reviews)</small>
           </div>
           
           <!-- Price -->
           <div class="d-flex align-items-center mb-3">
             <h4 class="fw-bold text-dark mb-0 me-2">${{ number_format($product->price, 2) }}</h4>
             @if($product->compare_price)
               <del class="text-muted small">${{ number_format($product->compare_price, 2) }}</del>
             @endif
           </div>
           
           <!-- Description -->
           <p class="text-secondary mb-4">{{ $product->description }}</p>
           
           <!-- Add to Cart -->
           <form action="{{ route('cart.store') }}" method="POST" class="mt-auto">
             @csrf
             <input type="hidden" name="product_id" value="{{ $product->id }}">
             <input type="hidden" name="quantity" value="1">
             <button type="submit" class="btn btn-dark btn-lg w-100 py-2 fw-bold">
               <i class="fas fa-shopping-cart me-2"></i> Add to Cart
             </button>
           </form>
           
           <!-- Additional Info -->
           <div class="d-flex justify-content-between mt-3 pt-3 border-top small">
             <div class="text-center px-1">
               <i class="fas fa-truck d-block text-muted mb-1"></i>
               <span>Free Shipping</span>
             </div>
             <div class="text-center px-1">
               <i class="fas fa-exchange-alt d-block text-muted mb-1"></i>
               <span>Easy Returns</span>
             </div>
             <div class="text-center px-1">
               <i class="fas fa-lock d-block text-muted mb-1"></i>
               <span>Secure Payment</span>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 
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
                      <h2 class="text-capitalize text-white">Live Furniture <br>
                         Your Love</h2>
                      <a class="border__btn-f mt-35 bg-white text-black" href="{{ route('product-details', ['id' => $product->id]) }}">Buy Now<span>
                         <i class="fas fa-angle-right"></i></span></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xl-6">
             <div class="furniture-rating__right-item">
                <img class="w-100" src="assets/imgs/furniture/rating/bg-image.png" alt="image">
                <div class="rating-dot">
                   <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <circle opacity="0.6" cx="32" cy="32" r="32" transform="rotate(-180 32 32)" fill="white" />
                      <circle cx="33" cy="31" r="7" transform="rotate(-180 33 31)" fill="#B18B5E" />
                   </svg>
                   <ul>
                      <li>
                         <h6>Chair Pillow</h6>
                      </li>
                      <li class="py-1"><svg width="116" height="16" viewBox="0 0 116 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_247_27)">
                               <path
                                  d="M15.7004 5.93425C15.5829 5.5845 15.2802 5.3295 14.9157 5.27375L10.6734 4.6255L8.76794 0.56625C8.60544 0.22025 8.25819 0 7.87669 0C7.49494 0 7.14794 0.22025 6.98544 0.56625L5.07969 4.62575L0.837444 5.274C0.472944 5.32975 0.170194 5.5845 0.0529438 5.9345C-0.0643062 6.2845 0.0241938 6.67 0.281944 6.9345L3.37994 10.1112L2.64619 14.6055C2.58569 14.9775 2.74344 15.3515 3.05119 15.569C3.35869 15.7865 3.76469 15.8085 4.09544 15.626L7.87694 13.5347L11.6584 15.626C11.8077 15.7085 11.9719 15.749 12.1354 15.749C12.3344 15.749 12.5334 15.6885 12.7027 15.569C13.0104 15.3517 13.1679 14.9777 13.1074 14.6055L12.3737 10.1112L15.4719 6.9345C15.7292 6.67 15.8177 6.2845 15.7004 5.93425Z"
                                  fill="#E8C54A" />
                            </g>
                            <g clip-path="url(#clip1_247_27)">
                               <path
                                  d="M40.7004 5.93425C40.5829 5.5845 40.2802 5.3295 39.9157 5.27375L35.6734 4.6255L33.7679 0.56625C33.6054 0.22025 33.2582 0 32.8767 0C32.4949 0 32.1479 0.22025 31.9854 0.56625L30.0797 4.62575L25.8374 5.274C25.4729 5.32975 25.1702 5.5845 25.0529 5.9345C24.9357 6.2845 25.0242 6.67 25.2819 6.9345L28.3799 10.1112L27.6462 14.6055C27.5857 14.9775 27.7434 15.3515 28.0512 15.569C28.3587 15.7865 28.7647 15.8085 29.0954 15.626L32.8769 13.5347L36.6584 15.626C36.8077 15.7085 36.9719 15.749 37.1354 15.749C37.3344 15.749 37.5334 15.6885 37.7027 15.569C38.0104 15.3517 38.1679 14.9777 38.1074 14.6055L37.3737 10.1112L40.4719 6.9345C40.7292 6.67 40.8177 6.2845 40.7004 5.93425Z"
                                  fill="#E8C54A" />
                            </g>
                            <g clip-path="url(#clip2_247_27)">
                               <path
                                  d="M65.7004 5.93425C65.5829 5.5845 65.2802 5.3295 64.9157 5.27375L60.6734 4.6255L58.7679 0.56625C58.6054 0.22025 58.2582 0 57.8767 0C57.4949 0 57.1479 0.22025 56.9854 0.56625L55.0797 4.62575L50.8374 5.274C50.4729 5.32975 50.1702 5.5845 50.0529 5.9345C49.9357 6.2845 50.0242 6.67 50.2819 6.9345L53.3799 10.1112L52.6462 14.6055C52.5857 14.9775 52.7434 15.3515 53.0512 15.569C53.3587 15.7865 53.7647 15.8085 54.0954 15.626L57.8769 13.5347L61.6584 15.626C61.8077 15.7085 61.9719 15.749 62.1354 15.749C62.3344 15.749 62.5334 15.6885 62.7027 15.569C63.0104 15.3517 63.1679 14.9777 63.1074 14.6055L62.3737 10.1112L65.4719 6.9345C65.7292 6.67 65.8177 6.2845 65.7004 5.93425Z"
                                  fill="#E8C54A" />
                            </g>
                            <g clip-path="url(#clip3_247_27)">
                               <path
                                  d="M84.7682 5.05043L84.9949 5.53343L85.5224 5.61403L89.7351 6.25776L86.6578 9.41304L86.3054 9.77432L86.3868 10.2724L87.1155 14.736L83.3609 12.6597L82.8769 12.392L82.393 12.6597L78.6381 14.7362L79.3669 10.2724L79.4482 9.77435L79.0959 9.41307L76.0189 6.25788L80.2307 5.61427L80.7582 5.53368L80.9849 5.05071L82.8767 1.02095L84.7682 5.05043Z"
                                  stroke="#E8C54A" stroke-width="2" />
                            </g>
                            <g clip-path="url(#clip4_247_27)">
                               <path
                                  d="M109.768 5.05043L109.995 5.53343L110.522 5.61403L114.735 6.25776L111.658 9.41304L111.305 9.77432L111.387 10.2724L112.116 14.736L108.361 12.6597L107.877 12.392L107.393 12.6597L103.638 14.7362L104.367 10.2724L104.448 9.77435L104.096 9.41307L101.019 6.25788L105.231 5.61427L105.758 5.53368L105.985 5.05071L107.877 1.02095L109.768 5.05043Z"
                                  stroke="#E8C54A" stroke-width="2" />
                            </g>
                            <defs>
                               <clipPath>
                                  <rect width="16" height="16" fill="white" />
                               </clipPath>
                               <clipPath id="clip1_247_27">
                                  <rect width="16" height="16" fill="white" transform="translate(25)" />
                               </clipPath>
                               <clipPath id="clip2_247_27">
                                  <rect width="16" height="16" fill="white" transform="translate(50)" />
                               </clipPath>
                               <clipPath id="clip3_247_27">
                                  <rect width="16" height="16" fill="white" transform="translate(75)" />
                               </clipPath>
                               <clipPath id="clip4_247_27">
                                  <rect width="16" height="16" fill="white" transform="translate(100)" />
                               </clipPath>
                            </defs>
                         </svg>
                      </li>
                      <li>
                         <span>JD 190.00</span>
                      </li>
                   </ul>
                </div>
                <div class="rating-dot dot-two">
                   <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <circle opacity="0.6" cx="32" cy="32" r="32" transform="rotate(-180 32 32)" fill="white" />
                      <circle cx="33" cy="31" r="7" transform="rotate(-180 33 31)" fill="#B18B5E" />
                   </svg>
                   <ul>
                      <li>
                         <h6>Dining Table</h6>
                      </li>
                      <li class="py-1"><svg width="116" height="16" viewBox="0 0 116 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_247_27)">
                               <path
                                  d="M15.7004 5.93425C15.5829 5.5845 15.2802 5.3295 14.9157 5.27375L10.6734 4.6255L8.76794 0.56625C8.60544 0.22025 8.25819 0 7.87669 0C7.49494 0 7.14794 0.22025 6.98544 0.56625L5.07969 4.62575L0.837444 5.274C0.472944 5.32975 0.170194 5.5845 0.0529438 5.9345C-0.0643062 6.2845 0.0241938 6.67 0.281944 6.9345L3.37994 10.1112L2.64619 14.6055C2.58569 14.9775 2.74344 15.3515 3.05119 15.569C3.35869 15.7865 3.76469 15.8085 4.09544 15.626L7.87694 13.5347L11.6584 15.626C11.8077 15.7085 11.9719 15.749 12.1354 15.749C12.3344 15.749 12.5334 15.6885 12.7027 15.569C13.0104 15.3517 13.1679 14.9777 13.1074 14.6055L12.3737 10.1112L15.4719 6.9345C15.7292 6.67 15.8177 6.2845 15.7004 5.93425Z"
                                  fill="#E8C54A" />
                            </g>
                            <g clip-path="url(#clip1_247_27)">
                               <path
                                  d="M40.7004 5.93425C40.5829 5.5845 40.2802 5.3295 39.9157 5.27375L35.6734 4.6255L33.7679 0.56625C33.6054 0.22025 33.2582 0 32.8767 0C32.4949 0 32.1479 0.22025 31.9854 0.56625L30.0797 4.62575L25.8374 5.274C25.4729 5.32975 25.1702 5.5845 25.0529 5.9345C24.9357 6.2845 25.0242 6.67 25.2819 6.9345L28.3799 10.1112L27.6462 14.6055C27.5857 14.9775 27.7434 15.3515 28.0512 15.569C28.3587 15.7865 28.7647 15.8085 29.0954 15.626L32.8769 13.5347L36.6584 15.626C36.8077 15.7085 36.9719 15.749 37.1354 15.749C37.3344 15.749 37.5334 15.6885 37.7027 15.569C38.0104 15.3517 38.1679 14.9777 38.1074 14.6055L37.3737 10.1112L40.4719 6.9345C40.7292 6.67 40.8177 6.2845 40.7004 5.93425Z"
                                  fill="#E8C54A" />
                            </g>
                            <g clip-path="url(#clip2_247_27)">
                               <path
                                  d="M65.7004 5.93425C65.5829 5.5845 65.2802 5.3295 64.9157 5.27375L60.6734 4.6255L58.7679 0.56625C58.6054 0.22025 58.2582 0 57.8767 0C57.4949 0 57.1479 0.22025 56.9854 0.56625L55.0797 4.62575L50.8374 5.274C50.4729 5.32975 50.1702 5.5845 50.0529 5.9345C49.9357 6.2845 50.0242 6.67 50.2819 6.9345L53.3799 10.1112L52.6462 14.6055C52.5857 14.9775 52.7434 15.3515 53.0512 15.569C53.3587 15.7865 53.7647 15.8085 54.0954 15.626L57.8769 13.5347L61.6584 15.626C61.8077 15.7085 61.9719 15.749 62.1354 15.749C62.3344 15.749 62.5334 15.6885 62.7027 15.569C63.0104 15.3517 63.1679 14.9777 63.1074 14.6055L62.3737 10.1112L65.4719 6.9345C65.7292 6.67 65.8177 6.2845 65.7004 5.93425Z"
                                  fill="#E8C54A" />
                            </g>
                            <g clip-path="url(#clip3_247_27)">
                               <path
                                  d="M84.7682 5.05043L84.9949 5.53343L85.5224 5.61403L89.7351 6.25776L86.6578 9.41304L86.3054 9.77432L86.3868 10.2724L87.1155 14.736L83.3609 12.6597L82.8769 12.392L82.393 12.6597L78.6381 14.7362L79.3669 10.2724L79.4482 9.77435L79.0959 9.41307L76.0189 6.25788L80.2307 5.61427L80.7582 5.53368L80.9849 5.05071L82.8767 1.02095L84.7682 5.05043Z"
                                  stroke="#E8C54A" stroke-width="2" />
                            </g>
                            <g clip-path="url(#clip4_247_27)">
                               <path
                                  d="M109.768 5.05043L109.995 5.53343L110.522 5.61403L114.735 6.25776L111.658 9.41304L111.305 9.77432L111.387 10.2724L112.116 14.736L108.361 12.6597L107.877 12.392L107.393 12.6597L103.638 14.7362L104.367 10.2724L104.448 9.77435L104.096 9.41307L101.019 6.25788L105.231 5.61427L105.758 5.53368L105.985 5.05071L107.877 1.02095L109.768 5.05043Z"
                                  stroke="#E8C54A" stroke-width="2" />
                            </g>
                            <defs>
                               <clipPath>
                                  <rect width="16" height="16" fill="white" />
                               </clipPath>
                               <clipPath>
                                  <rect width="16" height="16" fill="white" transform="translate(25)" />
                               </clipPath>
                               <clipPath>
                                  <rect width="16" height="16" fill="white" transform="translate(50)" />
                               </clipPath>
                               <clipPath>
                                  <rect width="16" height="16" fill="white" transform="translate(75)" />
                               </clipPath>
                               <clipPath>
                                  <rect width="16" height="16" fill="white" transform="translate(100)" />
                               </clipPath>
                            </defs>
                         </svg>
                      </li>
                      <li>
                         <span>JD 190.00</span>
                      </li>
                   </ul>
                </div>
                <div class="rating-dot dot-three">
                   <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <circle opacity="0.6" cx="32" cy="32" r="32" transform="rotate(-180 32 32)" fill="white" />
                      <circle cx="33" cy="31" r="7" transform="rotate(-180 33 31)" fill="#B18B5E" />
                   </svg>
                   <ul>
                      <li>
                         <h6>Arm
                            Sofa</h6>
                      </li>
                      <li class="py-1"><svg width="116" height="16" viewBox="0 0 116 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_247_27)">
                               <path
                                  d="M15.7004 5.93425C15.5829 5.5845 15.2802 5.3295 14.9157 5.27375L10.6734 4.6255L8.76794 0.56625C8.60544 0.22025 8.25819 0 7.87669 0C7.49494 0 7.14794 0.22025 6.98544 0.56625L5.07969 4.62575L0.837444 5.274C0.472944 5.32975 0.170194 5.5845 0.0529438 5.9345C-0.0643062 6.2845 0.0241938 6.67 0.281944 6.9345L3.37994 10.1112L2.64619 14.6055C2.58569 14.9775 2.74344 15.3515 3.05119 15.569C3.35869 15.7865 3.76469 15.8085 4.09544 15.626L7.87694 13.5347L11.6584 15.626C11.8077 15.7085 11.9719 15.749 12.1354 15.749C12.3344 15.749 12.5334 15.6885 12.7027 15.569C13.0104 15.3517 13.1679 14.9777 13.1074 14.6055L12.3737 10.1112L15.4719 6.9345C15.7292 6.67 15.8177 6.2845 15.7004 5.93425Z"
                                  fill="#E8C54A" />
                            </g>
                            <g clip-path="url(#clip1_247_27)">
                               <path
                                  d="M40.7004 5.93425C40.5829 5.5845 40.2802 5.3295 39.9157 5.27375L35.6734 4.6255L33.7679 0.56625C33.6054 0.22025 33.2582 0 32.8767 0C32.4949 0 32.1479 0.22025 31.9854 0.56625L30.0797 4.62575L25.8374 5.274C25.4729 5.32975 25.1702 5.5845 25.0529 5.9345C24.9357 6.2845 25.0242 6.67 25.2819 6.9345L28.3799 10.1112L27.6462 14.6055C27.5857 14.9775 27.7434 15.3515 28.0512 15.569C28.3587 15.7865 28.7647 15.8085 29.0954 15.626L32.8769 13.5347L36.6584 15.626C36.8077 15.7085 36.9719 15.749 37.1354 15.749C37.3344 15.749 37.5334 15.6885 37.7027 15.569C38.0104 15.3517 38.1679 14.9777 38.1074 14.6055L37.3737 10.1112L40.4719 6.9345C40.7292 6.67 40.8177 6.2845 40.7004 5.93425Z"
                                  fill="#E8C54A" />
                            </g>
                            <g clip-path="url(#clip2_247_27)">
                               <path
                                  d="M65.7004 5.93425C65.5829 5.5845 65.2802 5.3295 64.9157 5.27375L60.6734 4.6255L58.7679 0.56625C58.6054 0.22025 58.2582 0 57.8767 0C57.4949 0 57.1479 0.22025 56.9854 0.56625L55.0797 4.62575L50.8374 5.274C50.4729 5.32975 50.1702 5.5845 50.0529 5.9345C49.9357 6.2845 50.0242 6.67 50.2819 6.9345L53.3799 10.1112L52.6462 14.6055C52.5857 14.9775 52.7434 15.3515 53.0512 15.569C53.3587 15.7865 53.7647 15.8085 54.0954 15.626L57.8769 13.5347L61.6584 15.626C61.8077 15.7085 61.9719 15.749 62.1354 15.749C62.3344 15.749 62.5334 15.6885 62.7027 15.569C63.0104 15.3517 63.1679 14.9777 63.1074 14.6055L62.3737 10.1112L65.4719 6.9345C65.7292 6.67 65.8177 6.2845 65.7004 5.93425Z"
                                  fill="#E8C54A" />
                            </g>
                            <g clip-path="url(#clip3_247_27)">
                               <path
                                  d="M84.7682 5.05043L84.9949 5.53343L85.5224 5.61403L89.7351 6.25776L86.6578 9.41304L86.3054 9.77432L86.3868 10.2724L87.1155 14.736L83.3609 12.6597L82.8769 12.392L82.393 12.6597L78.6381 14.7362L79.3669 10.2724L79.4482 9.77435L79.0959 9.41307L76.0189 6.25788L80.2307 5.61427L80.7582 5.53368L80.9849 5.05071L82.8767 1.02095L84.7682 5.05043Z"
                                  stroke="#E8C54A" stroke-width="2" />
                            </g>
                            <g clip-path="url(#clip4_247_27)">
                               <path
                                  d="M109.768 5.05043L109.995 5.53343L110.522 5.61403L114.735 6.25776L111.658 9.41304L111.305 9.77432L111.387 10.2724L112.116 14.736L108.361 12.6597L107.877 12.392L107.393 12.6597L103.638 14.7362L104.367 10.2724L104.448 9.77435L104.096 9.41307L101.019 6.25788L105.231 5.61427L105.758 5.53368L105.985 5.05071L107.877 1.02095L109.768 5.05043Z"
                                  stroke="#E8C54A" stroke-width="2" />
                            </g>
                            <defs>
                               <clipPath>
                                  <rect width="16" height="16" fill="white" />
                               </clipPath>
                               <clipPath>
                                  <rect width="16" height="16" fill="white" transform="translate(25)" />
                               </clipPath>
                               <clipPath>
                                  <rect width="16" height="16" fill="white" transform="translate(50)" />
                               </clipPath>
                               <clipPath>
                                  <rect width="16" height="16" fill="white" transform="translate(75)" />
                               </clipPath>
                               <clipPath>
                                  <rect width="16" height="16" fill="white" transform="translate(100)" />
                               </clipPath>
                            </defs>
                         </svg>
                      </li>
                      <li>
                         <span>JD 190.00</span>
                      </li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- Ratting area end -->

    <!-- Trendy collection area start -->
    <section class="fruniture-trendy section-space">
       <div class="container">
          <div class="furniture-trendy__header">
             <div class="section-title-wrapper-4 mb-40">
                <span class="section-subtitle-4 mb-10">THIS MONTH</span>
                <h2 class="section-title-4">Trendy Collection</h2>
             </div>
             <div class="bd-product__filter-style furniture-trendy__tab nav nav-tabs" role="tablist">
                <button class="nav-link active" id="collection-tab" data-bs-toggle="tab" data-bs-target="#collection"
                   type="button" role="tab" aria-selected="false">All Collection</button>
                <button class="nav-link" id="new-tab" data-bs-toggle="tab" data-bs-target="#new" type="button"
                   role="tab" aria-selected="true">New In</button>
                <button class="nav-link" id="top-tab" data-bs-toggle="tab" data-bs-target="#top" type="button"
                   role="tab" aria-selected="true">Top Rated</button>
                <button class="nav-link" id="tensing-tab" data-bs-toggle="tab" data-bs-target="#tensing" type="button"
                   role="tab" aria-selected="true">Tensing Items</button>
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
                                    <button type="button" class="product-action-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                       <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M13.092 4.55026C10.5878 4.55026 8.55683 6.58125 8.55683 9.08541C8.55683 11.5896 10.5878 13.6206 13.092 13.6206C15.5961 13.6206 17.6271 11.5903 17.6271 9.08541C17.6271 6.5805 15.5969 4.55026 13.092 4.55026ZM13.092 12.1089C11.4246 12.1089 10.0338 10.7196 10.0338 9.05216C10.0338 7.38473 11.3898 6.02872 13.0572 6.02872C14.7246 6.02872 16.0807 7.38473 16.0807 9.05216C16.0807 10.7196 14.7594 12.1089 13.092 12.1089ZM25.0965 8.8768C25.0875 8.839 25.092 8.79819 25.0807 8.76115C25.0761 8.74528 25.0655 8.73621 25.0603 8.7226C25.0519 8.70144 25.0542 8.67574 25.0429 8.65533C22.8441 3.62131 18.1064 0.724854 13.0572 0.724854C8.00807 0.724854 3.17511 3.61677 0.975559 8.65079C0.966488 8.67196 0.968 8.69388 0.959686 8.71806C0.954395 8.73318 0.943812 8.74074 0.938521 8.7551C0.927184 8.7929 0.931719 8.83296 0.92416 8.8715C0.910555 8.93953 0.897705 9.00605 0.897705 9.07483C0.897705 9.14361 0.910555 9.20862 0.92416 9.2774C0.931719 9.31519 0.926428 9.35677 0.938521 9.39229C0.943057 9.40968 0.954395 9.41648 0.959686 9.4316C0.967244 9.45201 0.965732 9.4777 0.975559 9.49887C3.17511 14.5314 7.96121 17.381 13.0104 17.381C18.0595 17.381 22.8448 14.5374 25.0436 9.5034C25.055 9.48148 25.0527 9.45956 25.061 9.43538C25.0663 9.42253 25.0761 9.4127 25.0807 9.39758C25.092 9.36055 25.089 9.32049 25.0965 9.28118C25.1101 9.21315 25.1222 9.14739 25.1222 9.0771C25.1222 9.01058 25.1094 8.94482 25.0958 8.87604L25.0965 8.8768ZM13.0104 15.8692C8.72841 15.8692 4.51298 13.6123 2.44193 9.07407C4.49333 4.55177 8.76469 2.23582 13.0572 2.23582C17.349 2.23582 21.5251 4.55404 23.5773 9.07861C21.5266 13.6002 17.3036 15.8692 13.0104 15.8692Z" fill="white" />
                                       </svg>
                                       <span class="product-tooltip">Quick View</span>
                                    </button>
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
                <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="new-tab">
                   <div class="row g-4">
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-badge">
                               <span class="product-trending">15% off</span>
                            </div>
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product3.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            @foreach ($products as $product)
                            <div class="product-content">
                               <h4 class="product-title">{{ $product->name }}</h4>
                               <div class="user-rating mb-1">
                                  <div class="product__details-rating mr-10">
                                     <span class="rating-value">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fa{{ $i <= round($product->averageRating) ? ' fas' : ' far' }} fa-star"></i>
                                        @endfor
                                     </span>
                                  </div>
                                  <div class="product__details-review-count">
                                     <a href="#">{{ $product->reviewCount }} Reviews</a>
                                  </div>
                               </div>
                            </div>
                            @endforeach
                            
                         </div>
                      </div>
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product4.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">wooden chair</a></h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 129.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product6.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">stylish grey chair</a></h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 150.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-badge">
                               <span class="product-trending">NEW</span>
                            </div>
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product7.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">chair nobody armchair</a>
                               </h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 80.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product8.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">realistic sofa</a></h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 49.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="tab-pane fade" id="top" role="tabpanel" aria-labelledby="top-tab">
                   <div class="row g-4">
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product4.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">wooden chair</a></h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 129.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product6.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">stylish grey chair</a></h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 150.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-badge">
                               <span class="product-trending">NEW</span>
                            </div>
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product7.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">chair nobody armchair</a>
                               </h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 80.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product8.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">realistic sofa</a></h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 49.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product6.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">stylish grey chair</a></h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 150.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-badge">
                               <span class="product-trending">NEW</span>
                            </div>
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product7.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">chair nobody armchair</a>
                               </h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 80.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product8.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">realistic sofa</a></h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 49.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="tab-pane fade" id="tensing" role="tabpanel" aria-labelledby="tensing-tab">
                   <div class="row g-4">
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-badge">
                               <span class="product-trending">15% off</span>
                            </div>
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product3.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">seater gray sofa</a></h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 300.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product4.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">wooden chair</a></h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 129.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product6.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">stylish grey chair</a></h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 150.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-badge">
                               <span class="product-trending">NEW</span>
                            </div>
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product7.png"
                                     alt=""></a>
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
                                <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                 <i class="fal fa-eye"></i>
                                 <span class="product-tooltip">Quick View</span>
                             </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">chair nobody armchair</a>
                               </h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 80.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                         <div class="product-item furniture__product">
                            <div class="product-thumb theme-bg-2">
                               <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="assets/imgs/furniture/product/product8.png"
                                     alt=""></a>
                               <div class="product-action-item">
                                  <button type="button" class="product-action-btn">
                                     <svg width="20" height="22" viewBox="0 0 20 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M13.0768 10.1416C13.0768 11.9228 11.648 13.3666 9.88542 13.3666C8.1228 13.3666 6.69401 11.9228 6.69401 10.1416M1.375 5.84163H18.3958M1.375 5.84163V12.2916C1.375 19.1359 2.57494 20.3541 9.88542 20.3541C17.1959 20.3541 18.3958 19.1359 18.3958 12.2916V5.84163M1.375 5.84163L2.91454 2.73011C3.27495 2.00173 4.01165 1.54163 4.81754 1.54163H14.9533C15.7592 1.54163 16.4959 2.00173 16.8563 2.73011L18.3958 5.84163"
                                           stroke="white" stroke-width="2" stroke-linecap="round"
                                           stroke-linejoin="round" />
                                     </svg>
                                     <span class="product-tooltip">Add to Cart</span>
                                  </button>
                                  <a href="#" class="quick-view-btn" data-id="{{ $product->id }}">
                                    <i class="fal fa-eye"></i>
                                    <span class="product-tooltip">Quick View</span>
                                </a>
                                  <button type="button" class="product-action-btn">

                                     <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                           d="M19.2041 2.63262C18.6402 1.97669 17.932 1.44916 17.1305 1.08804C16.329 0.726918 15.4541 0.54119 14.569 0.544237C13.0545 0.500151 11.58 1.01577 10.4489 1.98501C9.31782 1.01577 7.84334 0.500151 6.32883 0.544237C5.44368 0.54119 4.56885 0.726918 3.76735 1.08804C2.96585 1.44916 2.25764 1.97669 1.69374 2.63262C0.712132 3.77732 -0.314799 5.84986 0.366045 9.22751C1.45272 14.6213 9.60121 19.0476 9.94523 19.2288C10.0986 19.311 10.2713 19.3541 10.4469 19.3541C10.6224 19.3541 10.7951 19.311 10.9485 19.2288C11.2946 19.0436 19.4431 14.6173 20.5277 9.22751C21.2126 5.84986 20.1857 3.77732 19.2041 2.63262ZM18.5099 8.85122C17.7415 12.6646 12.1567 16.2116 10.4489 17.2196C8.04279 15.8234 3.09251 12.318 2.39312 8.85122C1.86472 6.23109 2.5878 4.70912 3.28821 3.89317C3.65861 3.46353 4.12333 3.11801 4.64903 2.88141C5.17473 2.64481 5.74838 2.52299 6.32883 2.52468C6.94879 2.47998 7.57022 2.59049 8.13253 2.84542C8.69484 3.10036 9.17884 3.49102 9.53734 3.97932C9.62575 4.13571 9.75616 4.26645 9.915 4.3579C10.0738 4.44936 10.2553 4.49819 10.4404 4.4993C10.6256 4.50041 10.8076 4.45377 10.9676 4.36423C11.1276 4.27469 11.2598 4.14553 11.3502 3.99022C11.708 3.49811 12.193 3.10414 12.7575 2.84715C13.3219 2.59016 13.9463 2.47902 14.569 2.52468C15.1507 2.52196 15.7257 2.64329 16.2527 2.87993C16.7798 3.11656 17.2456 3.46262 17.6168 3.89317C18.3152 4.70912 19.0383 6.23109 18.5099 8.85122Z"
                                           fill="white" />
                                     </svg>
                                     <span class="product-tooltip">Add To Wishlist</span>
                                  </button>
                               </div>
                            </div>
                            <div class="product-content">
                               <h4 class="product-title"><a href="{{ route('product-details', ['id' => $product->id]) }}">realistic sofa</a></h4>
                               <div class="user-rating mb-1">
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                                  <i class="far fa-star"></i>
                               </div>
                               <div class="product-price">
                                  <span class="product-new-price">JD 49.00</span>
                               </div>
                            </div>
                         </div>
                      </div>
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
             <div class="col-xxl-7 col-xl-6">
                <div class="furniture-ad__item h-100 bg-image"
                   data-background="assets/imgs/furniture/ad/ad-discount.png">
                   <div class="fad-content">
                      <h6 class="text-white mb-20 text-uppercase">HOT DEAL furniture</h6>
                      <h2 class="text-capitalize text-white">Furniture limit offer <br> 30% Off</h2>
                      <a class="border__btn-f mt-35" href="{{ route('product-details', ['id' => $product->id]) }}">Buy Now<span><i class="fas fa-angle-right"></i></span></a>
                   </div>
                </div>
             </div>
             <div class="col-xxl-5 col-xl-6">
                <div class="furniture-ad__item  h-100 bg-image"
                   data-background="assets/imgs/furniture/ad/ad-timer.png">
                   <div class="fad-content fad-timer text-center">
                      <h6 class="text-white mb-20 text-uppercase">HOT DEAL furniture</h6>
                      <h2 class="text-capitalize text-white mb-30">Deals OF the Week</h2>
                      <div class="countdown-wrapper">
                         <ul>
                            <li><span id="days">24</span>days</li>
                            <li><span id="hours">1</span>hrs</li>
                            <li><span id="minutes">7</span>mins</li>
                            <li><span id="seconds">43</span>secs</li>
                         </ul>
                      </div>
                      <a class="border__btn-f mt-40" href="{{ route('product-details', ['id' => $product->id]) }}">Buy Now<span>
                         <i class="fas fa-angle-right"></i></span></a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- Ad banner area end -->

    <!-- Testiminial area start -->
    <section class="furniture-testimonial section-space bg-image"
       data-background="assets/imgs/furniture/testimonial/bg.jpg">
       <div class="container">
          <div class="section-title-wrapper-4 is-white mb-40 text-center">
             <span class="section-subtitle-4 mb-10">Testimonials</span>
             <h2 class="section-title-4">Client Feedback</h2>
          </div>


          <div class="swiper testimonial-active-3">
             <div class="swiper-wrapper">
               @foreach ($reviews as $review)
                <div class="swiper-slide">
                   <div class="furniture-testimonial__item">
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
                      <p>{{ $review->comment }}</p>
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

    <!-- Blog area start -->
    {{-- <section class="blog-area theme-bg-2 section-space">
       <div class="container">
          <div class="row justify-content-center">
             <div class="col-xxl-4 col-xl-4 col-lg-4">
                <div class="section-title-wrapper-4 text-center section-title-space">
                   <span class="section-subtitle-4 mb-10">Read blog</span>
                   <h2 class="section-title-4">Recent Blog</h2>
                </div>
             </div>
          </div>
          <div class="row gy-5">
            @foreach ($posts as $post)
             <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="blog-item-4 furniture__blog-item">
                   <div class="blog-content-4">
                      <div class="blog-tag-wrapper mb-15">
                        <a class="blog-tag" href="#">{{ $post->category }}</a>
                     </div>
                      <div class="postbox__meta mb-15">
                         <span><a href="#">By {{ $post->author }}</a></span>
                         <span>{{ \Carbon\Carbon::parse($post->published_at)->format('d M, Y') }}</span>
                        </div>
                      <h4 class="blog-title">
                        <a href="{{ route('blog-details', $post->id) }}" class="text-capitalize">{{ $post->title }}</a>
                     </h4>
                     <a class="round-link" href="{{ route('blog-details', $post->id) }}"><i class="fas fa-angle-right"></i></a>
                  </div>
                   <div class="blog-item-thumb w-img">
                     <a href="{{ route('blog-details', $post->id) }}">
                        <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}">
                     </a>
                   </div>
                </div>
             </div>
             @endforeach
          </div>
       </div>
    </section> --}}
    <!-- Blog area end -->

    <!-- Support area start -->
    {{-- <section class="support-area section-space pb-0">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
               <div class="support-item is-light-yellow">
                  <div class="support-content text-center">
                     <h3>Get the Best Furniture Deals</h3>
                     <p>Enjoy seasonal discounts and exclusive styles curated just for you.</p>
                     <a class="join-btn furniture-btn" href="{{ route('product.show') }}">
                        Shop Now <span><i class="fas fa-angle-right"></i></span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section> --}}
   
    <!-- Support area end -->

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

<!-- Bootstrap JS (لو تحتاجه للـ modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Quick View Script -->
<script>
   $(document).on('click', '.quick-view-btn', function(e) {
       e.preventDefault();
       let productId = $(this).data('id');
       console.log("Product ID:", productId);

       $.ajax({
           url: `/Quick_View_Modal/${productId}`,
           type: 'GET',
           success: function(data) {
               $('#producQuickViewModal .modal-content').html(data);
               $('#producQuickViewModal').modal('show');
           },
           error: function(xhr) {
               alert('Failed to load product details.');
               console.error(xhr.responseText);
           }
       });
   });
</script>



@endsection