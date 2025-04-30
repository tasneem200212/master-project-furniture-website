{{-- <!-- Product Quick View Section (Not Modal) -->
<div class="product-quick-view-section py-5">
   <div class="container">
      <div class="product-modal-wrapper p-relative">
         <div class="modal__inner">
            <div class="bd__shop-details-inner">
               <div class="row">
                  @foreach($products as $product)
                  <div class="col-xxl-6 col-lg-6 mb-5">
                     <div class="product__details-thumb-wrapper d-sm-flex align-items-start">
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

                  <div class="col-xxl-6 col-lg-6 mb-5">
                     <div class="product__details-content pr-80">
                        <div class="product__details-top d-sm-flex align-items-center mb-15">
                           <div class="product__details-tag mr-10">
                              <a href="#">{{ $product->category->name }}</a>
                           </div>
                           <div class="product__details-rating mr-10">
                              @for ($i = 1; $i <= 5; $i++)
                              <i class="{{ $i <= $product->averageRating ? 'fas fa-star' : 'far fa-star' }}"></i>
                              @endfor
                           </div>
                           <div class="product__details-review-count">
                              <a href="#">{{ $product->reviewCount }} Reviews</a>
                           </div>
                        </div>
                        <h3 class="product__details-title text-capitalize">{{ $product->name }}</h3>
                        <div class="product__details-price">
                           <span class="old-price">${{ number_format($product->old_price, 2) }}</span>
                           <span class="new-price">${{ number_format($product->price, 2) }}</span>
                        </div>
                        <p>{{ $product->description }}</p>

                        <div class="product__details-action mb-35">
                           <div class="product__quantity">
                              <div class="product-quantity-wrapper">
                                 <form action="#">
                                    <button class="cart-minus"><i class="fa-light fa-minus"></i></button>
                                    <input class="cart-input" type="text" value="1">
                                    <button class="cart-plus"><i class="fa-light fa-plus"></i></button>
                                 </form>
                              </div>
                           </div>
                           <div class="product__add-cart">
                              <form action="{{ route('cart.store') }}" method="POST" style="display: inline;">
                                 @csrf
                                 <input type="hidden" name="product_id" value="{{ $product->id }}">
                                 <input type="hidden" name="quantity" value="1">
                                 <button type="submit" class="fill-btn cart-btn">
                                    <span class="fill-btn-inner">
                                       <span class="fill-btn-normal">Add To Cart <i class="fa-solid fa-basket-shopping"></i></span>
                                       <span class="fill-btn-hover">Add To Cart <i class="fa-solid fa-basket-shopping"></i></span>
                                    </span>
                                 </button>
                              </form>
                           </div>
                           <div class="product__add-wish">
                              <a href="#" class="product__add-wish-btn"><i class="fa-solid fa-heart"></i></a>
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
<!-- End of Product Quick View Section --> --}}
