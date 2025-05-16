@extends('layouts.app')

@section('title','Ecommerce Furniture')

@section('content')

<!-- Body main wrapper start -->
<main>

   <!-- Breadcrumb area start  -->
   <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
      <div class="breadcrumb__thumb" data-background="assets/imgs/bg/breadcrumb-bg.jpg"></div>
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-xxl-12">
               <div class="breadcrumb__wrapper text-center">
                  <h2 class="breadcrumb__title">Wishlist</h2>
                  <div class="breadcrumb__menu">
                     <nav>
                        <ul>
                           <li><span><a href="{{ route('Pro.index') }}">Home</a></span></li>
                           <li><span>Wishlist</span></li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Breadcrumb area end -->

   <!-- Wishlist area start -->
   <div class="cart-area section-space">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="table-content table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th class="product-thumbnail">Images</th>
                           <th class="cart-product-name">Product</th>
                           <th class="product-price">Unit Price</th>
                           <th class="product-quantity">Quantity</th>
                           <th class="product-subtotal">Total</th>
                           <th class="product-addcart">Add to Cart</th>
                           <th class="product-remove">Remove</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($wishlistItems as $item)
                           @if($item->product)
                              <tr>
                                 <td class="product-thumbnail">
                                    <div class="thumbnail-wrapper">
                                       <a href="{{ route('product-details', $item->product->id) }}">
                                          @if($item->product->productImages->first())
                                             <img src="{{ asset('storage/' . $item->product->productImages->first()->image_path) }}" alt="{{ $item->product->name }}">
                                          @else
                                             <img src="{{ asset('default.jpg') }}" alt="No Image">
                                          @endif
                                       </a>
                                    </div>
                                 </td>
                                 <td class="product-name">
                                    <a href="{{ route('product-details', $item->product->id) }}">{{ $item->product->name }}</a>
                                 </td>
                                 <td class="product-price"><span class="amount">JD{{ $item->product->price }}</span></td>
                                 <td class="product-quantity text-center">
                                    <div class="product-quantity mt-10 mb-10">
                                       <div class="product-quantity-form">
                                          <form action="#">
                                             <button class="cart-minus"><i class="fa-solid fa-minus"></i></button>
                                             <input class="cart-input" type="text" value="1">
                                             <button class="cart-plus"><i class="far fa-plus"></i></button>
                                          </form>
                                       </div>
                                    </div>
                                 </td>
                                 <td class="product-subtotal"><span class="amount">JD{{ $item->product->price }}</span></td>
                                 <td>
                                    <div class="add-to-cart-wrapper">
                                       <form action="{{ route('wishlist.addtoCart') }}" method="POST">
                                          @csrf
                                          <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                          <input type="hidden" name="quantity" value="{{ old('quantity', 1) }}">
                                          <button type="submit" class="product-action-btn">
                                              <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                  <path d="M13.0768 10.1416C13.0768 11.9228 11.648 13.3666 9.88542 13.3666C8.1228 13.3666 6.69401 11.9228 6.69401 10.1416M1.375 5.84163H18.3958M1.375 5.84163V12.2916C1.375 19.1359 2.57494 20.3541 9.88542 20.3541C17.1959 20.3541 18.3958 19.1359 18.3958 12.2916V5.84163M1.375 5.84163L2.91454 2.73011C3.27495 2.00173 4.01165 1.54163 4.81754 1.54163H14.9533C15.7592 1.54163 16.4959 2.00173 16.8563 2.73011L18.3958 5.84163" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                              </svg>
                                              <span class="product-tooltip">Add to Cart</span>
                                          </button>
                                       </form>
                                    </div>
                                 </td>
                                 <td class="product-remove">
                                    <a href="{{ route('wishlist.destroy', $item->id) }}"><i class="fa fa-times"></i></a>
                                 </td>
                              </tr>
                           @endif
                        @empty
                           <tr>
                              <td colspan="7" class="text-center">Your wishlist is empty.</td>
                           </tr>
                        @endforelse
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Wishlist area end -->

</main>
<!-- Body main wrapper end -->

@endsection
