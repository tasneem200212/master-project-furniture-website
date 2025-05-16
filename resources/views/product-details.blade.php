@extends('layouts.app')

@section('title','Ecommerce Furniture')

@section('content')

<!-- Body main wrapper start -->
<main>

   <!-- Breadcrumb area start  -->
   <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
      <div class="breadcrumb__thumb" data-background="/storage/images/breadcrumb-bg-furniture.jpg"></div>
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-xxl-12">
               <div class="breadcrumb__wrapper text-center">
                  <h2 class="breadcrumb__title">Product Details</h2>
                  <div class="breadcrumb__menu">
                     <nav>
                        <ul>
                           <li><span><a href="{{route('Pro.index')}}">Home</a></span></li>
                           <li><span>Product Details</span></li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Breadcrumb area end  -->

   <!-- Product details area start -->
   <div class="product__details-area section-space-medium">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-xxl-6 col-lg-6">
               <div class="product__details-thumb-wrapper d-sm-flex align-items-start mr-50">
                  <div class="product__details-thumb-tab mr-20">
                     <nav>
                        <div class="nav nav-tabs flex-nowrap flex-sm-column" id="nav-tab" role="tablist">
                           @foreach($product->productImages as $image)
                              <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="img-{{ $loop->index }}-tab" data-bs-toggle="tab" data-bs-target="#img-{{ $loop->index }}" type="button" role="tab" aria-controls="img-{{ $loop->index }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                 <img src="{{ asset('storage/' . $image->image_path) }}" alt="product-sm-thumb">
                              </button>
                           @endforeach
                        </div>
                     </nav>
                  </div>
                  <div class="product__details-thumb-tab-content">
                     <div class="tab-content" id="productthumbcontent">
                        @foreach($product->productImages as $image)
                           <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="img-{{ $loop->index }}" role="tabpanel" aria-labelledby="img-{{ $loop->index }}-tab">
                              <div class="product__details-thumb-big w-img" style="max-width: 100%; height: 500px;">
                                 <img src="{{ asset('storage/' . $image->image_path) }}" alt="product image">
                              </div>
                           </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xxl-6 col-lg-6">
               <div class="product__details-content pr-80">
                  <div class="product__details-top d-sm-flex align-items-center mb-15">
                     <div class="product__details-tag mr-10">
                        <a href="#">{{ $product->category->name }}</a>
                     </div>
                     <div class="product__details-rating mr-10">
                        @for ($i = 1; $i <= 5; $i++)
                        <i class="{{ $i <= round($averageRating) ? 'fas fa-star' : 'far fa-star' }}"></i>
                        @endfor
                     </div>
                     <div class="product__details-review-count">
                        <a href="#">{{ $reviewCount }} Reviews</a>
                     </div>
                  </div>
                  <h3 class="product__details-title text-capitalize">{{ $product->name }}</h3>

                  <div class="product__details-price">
                     @if ($product->discount && $product->discount->discount_percentage > 0)
                         @php
                             $discountPercentage = $product->discount->discount_percentage;
                             $price = $product->price;
                             $oldPrice = $price / (1 - $discountPercentage / 100);
                         @endphp
                     <span class="old-price">
                         <del>JD{{ number_format($oldPrice, 2) }}</del>
                     </span>
                     <span class="new-price fw-bold" style="color:  #eb753b">
                         JD{{ number_format($price, 2) }}
                     </span>
                     @else
                         <span class="new-price fw-bold">
                             JD{{ number_format($product->price, 2) }}
                         </span>
                     @endif
                  </div>
                  
                  <p>{{ $product->description }}</p>
                  
                  <div class="product__details-action mb-35">
                     <div class="product__quantity">
                        <div class="product-quantity-wrapper">
                           <form action="#">
                              <button class="cart-minus"><i class="fa-light fa-minus"></i></button>
                              <input class="cart-input" type="number" id="quantity" value="1" min="1">
                              <button class="cart-plus"><i class="fa-light fa-plus"></i></button>
                           </form>
                        </div>
                     </div>
                     <div class="product__add-cart">
                        <a href="javascript:void(0)" class="fill-btn cart-btn">
                           <form action="{{ route('cart.store') }}" method="POST" style="display: inline;">
                              @csrf
                              <input type="hidden" name="product_id" value="{{ $product->id }}">
                              <input type="hidden" name="quantity" id="cart-quantity" value="1">
                              
                              <button type="submit" class="fill-btn-inner">
                                 <span class="fill-btn-normal">Add To Cart <i class="fa-solid fa-basket-shopping"></i></span>
                                 <span class="fill-btn-hover">Add To Cart <i class="fa-solid fa-basket-shopping"></i></span>
                              </button>
                           </form>
                        </a>
                     </div>
                     <div class="product__add-wish">
                        <a href="#" class="product__add-wish-btn"><i class="fa-solid fa-heart"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         <div class="product__details-additional-info section-space-medium-top">
            <div class="row">
               <div class="col-xxl-3 col-xl-4 col-lg-4">
                  <div class="product__details-more-tab mr-15">
                     <nav>
                        <div class="nav nav-tabs flex-column " id="productmoretab" role="tablist">
                           <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab"
                              data-bs-target="#nav-description" type="button" role="tab"
                              aria-controls="nav-description" aria-selected="true">Description</button>
                           <button class="nav-link" id="nav-additional-tab" data-bs-toggle="tab"
                              data-bs-target="#nav-additional" type="button" role="tab"
                              aria-controls="nav-additional" aria-selected="false">Additional Information</button>
                           <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab"
                              data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review"
                              aria-selected="false">Reviews ({{ $reviewCount }})</button>
                        </div>
                     </nav>
                  </div>
               </div>
               <div class="col-xxl-9 col-xl-8 col-lg-8">
                  <div class="product__details-more-tab-content">
                     <div class="tab-content" id="productmorecontent">
                        <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                           aria-labelledby="nav-description-tab">
                           <div class="product__details-des">
                              <p>{{ $product->description }}</p>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="nav-additional" role="tabpanel" aria-labelledby="nav-additional-tab">
                           <div class="product__details-info">
                              <ul>
                                 <li>
                                    <h4>Weight</h4>
                                    <span>{{ $product->weight }}</span>
                                 </li>
                                 <li>
                                    <h4>Dimensions</h4>
                                    <span>{{ $product->dimensions }}</span>
                                 </li>
                                 <li>
                                    <h4>Color</h4>
                                    <span>{{ $product->color }}</span>
                                 </li>
                                 <li>
                                    <h4>Size</h4>
                                    <span>{{ $product->size }}</span>
                                 </li>
                                 <li>
                                    <h4>Model</h4>
                                    <span>{{ $product->model }}</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        
                        <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                           <div class="product__details-review">
                              <h3 class="comments-title">03 reviews for “Wide Cotton Tunic extreme hammer”</h3>
                              <div class="latest-comments mb-50">
                                 <ul>
                                    @if($product->reviews->isEmpty())
                                    <p>No reviews yet.</p>
                                    @else
                                       @foreach($product->reviews as $review)
                                       <li>
                                          <div class="comments-box d-flex">
                                             <div class="comments-avatar mr-10">
                                                <img src="{{ asset('assets/imgs/user/user-01.png') }}" alt="">
                                             </div>
                                             <div class="comments-text">
                                                <div class="comments-top d-sm-flex align-items-start justify-content-between mb-5">
                                                   <div class="avatar-name">
                                                      <h5>{{ $review->user->name }}</h5>
                                                      <div class="comments-date">
                                                         <span>{{ $review->created_at->format('F d, Y h:i a') }}</span>
                                                      </div>
                                                   </div>
                                                   <div class="user-rating">
                                                      <ul>
                                                         @for ($i = 1; $i <= 5; $i++)
                                                            <li>
                                                               <a href="#">
                                                                  <i class="{{ $i <= $review->rating ? 'fas fa-star' : 'fal fa-star' }}"></i>
                                                               </a>
                                                            </li>
                                                         @endfor
                                                      </ul>
                                                   </div>
                                                </div>
                                                <p>{{ $review->comment }}</p>
                                             </div>
                                          </div>
                                       </li>
                                       @endforeach
                                    @endif
                                 </ul>
                              </div>
                              
                              <!-- Review form -->
                              <div class="product__details-comment section-space-medium-bottom">
                                 <div class="comment-title mb-20">
                                    <h3>Add a review</h3>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                 </div>
                                 <div class="comment-input-box">
                                    <form action="{{ route('reviews.store', $product->id) }}" method="POST">
                                       @csrf
                                       <div class="rating-stars mb-3">
                                          <div class="star-rating">
                                             @for ($i = 5; $i >= 1; $i--)
                                                <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" required>
                                                <label for="star{{ $i }}">★</label>
                                             @endfor
                                          </div>
                                       </div>

                                       <div class="col-xxl-12 mt-3">
                                          <div class="comment-input">
                                             <textarea name="review" placeholder="Your review" required></textarea>
                                          </div>
                                       </div>

                                       <div class="col-xxl-12 mt-3">
                                          <div class="comment-submit">
                                             <button type="submit" class="fill-btn">
                                                <span class="fill-btn-inner">
                                                   <span class="fill-btn-normal">Submit Review</span>
                                                   <span class="fill-btn-hover">Submit Review</span>
                                                </span>
                                             </button>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Product details area end -->

   </main>
   <!-- Body main wrapper end -->

@endsection
