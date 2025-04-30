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
                           <th class="product-remove">Remove</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($wishlistItems as $item)
                           @if($item->product)
                              <tr>
                                 <td class="product-thumbnail">
                                    <a href="{{ route('product-details', $item->product->id) }}">
                                       @if($item->product->productImages->first())
                                          <img src="{{ asset('storage/' . $item->product->productImages->first()->image_path) }}" alt="{{ $item->product->name }}">
                                       @else
                                          <img src="{{ asset('default.jpg') }}" alt="No Image">
                                       @endif
                                    </a>
                                 </td>
                                 <td class="product-name">
                                    <a href="{{ route('product-details', $item->product->id) }}">{{ $item->product->name }}</a>
                                 </td>
                                 <td class="product-price"><span class="amount">${{ $item->product->price }}</span></td>
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
                                 <td class="product-subtotal"><span class="amount">${{ $item->product->price }}</span></td>
                                 <td class="product-remove">
                                    <a href="{{ route('wishlist.destroy', $item->id) }}"><i class="fa fa-times"></i></a>
                                 </td>
                              </tr>
                           @endif
                        @empty
                           <tr>
                              <td colspan="6" class="text-center">Your wishlist is empty.</td>
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
