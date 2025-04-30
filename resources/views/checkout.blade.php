@extends('layouts.app')

@section('title', 'Ecommerce Furniture')

@section('content')

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<main>
    <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
        <div class="breadcrumb__thumb" data-background="assets/imgs/bg/breadcrumb-bg.jpg"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-12">
                    <div class="breadcrumb__wrapper text-center">
                        <h2 class="breadcrumb__title">Checkout</h2>
                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('Pro.index') }}">Home</a></span></li>
                                    <li><span>Checkout</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="checkout-area section-space d-flex justify-content-center align-items-center">
      <div class="container">
          <form action="{{ route('checkout.store') }}" method="POST">
              @csrf
              <div class="row">
                  <div class="col-lg-6">
                      <div class="checkbox-form">
                          <h3 class="mb-15">Billing Details</h3>
                          <div class="row g-5">
                              <div class="col-md-6">
                                  <div class="checkout-form-list">
                                      <label>First Name <span class="required">*</span></label>
                                      <input type="text" name="first_name" value="{{ $user->name }}" placeholder="">
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="checkout-form-list">
                                      <label>Last Name <span class="required">*</span></label>
                                      <input type="text" name="last_name" value="{{ $user->name }}" placeholder="">
                                  </div>
                              </div>

                              <div class="col-md-12">
                                  <div class="checkout-form-list">
                                      <label>Address <span class="required">*</span></label>
                                      <input type="text" name="address" value="{{ $user->address }}" placeholder="Street address">
                                  </div>
                              </div>

                              <div class="col-md-12">
                                  <div class="checkout-form-list">
                                      <input type="text" name="address_line_2" placeholder="Apartment, suite, unit etc. (optional)">
                                  </div>
                              </div>

                              <div class="col-md-12">
                                  <div class="checkout-form-list">
                                      <label>Town / City <span class="required">*</span></label>
                                      <input type="text" name="city" value="{{ $user->city }}" placeholder="Town / City">
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="checkout-form-list">
                                      <label>State / County <span class="required">*</span></label>
                                      <input type="text" name="state" value="{{ $user->state }}" placeholder="">
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="checkout-form-list">
                                      <label>Postcode / Zip <span class="required">*</span></label>
                                      <input type="text" name="postcode" value="{{ $user->postcode }}" placeholder="Postcode / Zip">
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="checkout-form-list">
                                      <label>Email Address <span class="required">*</span></label>
                                      <input type="email" name="email" value="{{ $user->email }}" placeholder="">
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="checkout-form-list">
                                      <label>Phone <span class="required">*</span></label>
                                      <input type="text" name="phone" value="{{ $user->phone }}" placeholder="Phone">
                                  </div>
                              </div>

                              <div class="col-md-12">
                                 <div class="checkout-form-list">
                                    <label for="payment_method_id">Payment Method</label>
                                    <select name="payment_method_id" id="payment_method_id" required>
                                       <option value="1" {{ old('payment_method_id') == 1 ? 'selected' : '' }}>PayPal</option>
                                       <option value="2" {{ old('payment_method_id') == 2 ? 'selected' : '' }}>Bank Transfer</option>
                                   </select>
                                </div>
                              </div>

                              <!-- Hidden fields -->
                              <input type="hidden" name="shipping_address_id" value="{{ $user->shipping_address_id ?? 1 }}">
                              
                              <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="your-order">
                          <h3>Your order</h3>
                          <div class="your-order-table table-responsive">
                              <table>
                                  <thead>
                                      <tr>
                                          <th class="product-name">Product</th>
                                          <th class="product-total">Total</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($orderDetails as $orderDetail)
                                      <tr class="cart_item">
                                          <td class="product-name">
                                              {{ $orderDetail->product->name }} <strong class="product-quantity"> × {{ $orderDetail->quantity }}</strong>
                                          </td>
                                          <td class="product-total">
                                              <span class="amount">${{ number_format($orderDetail->price * $orderDetail->quantity, 2) }}</span>
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                                  <tfoot>
                                      <tr class="cart-subtotal">
                                          <th>Cart Subtotal</th>
                                          <td><span class="amount">${{ number_format($totalAmount, 2) }}</span></td>
                                      </tr>

                                      @if(session('coupon'))
                                          <tr class="cart-discount">
                                              <th>Discount ({{ session('coupon')->code }})</th>
                                              <td><span class="amount">- JD{{ number_format($discountAmount, 2) }}</span></td>
                                          </tr>
                                          <tr class="order-total">
                                              <th>Total after Discount</th>
                                              <td><strong><span class="amount">${{ number_format($totalAmount - $discountAmount, 2) }}</span></strong></td>
                                          </tr>
                                      @endif

                                      <tr class="shipping">
                                          <th>Shipping</th>
                                          <td>
                                              <ul>
                                                  <li>
                                                      <input type="radio">
                                                      <label>
                                                          Flat Rate: <span class="amount">$7.00</span>
                                                      </label>
                                                  </li>
                                                  <li>
                                                      <input type="radio">
                                                      <label>Free Shipping:</label>
                                                  </li>
                                              </ul>
                                          </td>
                                      </tr>
                                      <tr class="order-total">
                                          <th>Order Total</th>
                                          <td><strong><span class="amount">${{ number_format($totalAmount - $discountAmount + 7, 2) }}</span></strong></td>
                                      </tr>
                                  </tfoot>
                              </table>
                          </div>
  
                          <div class="order-button-payment mt-20">
                              <button class="fill-btn" type="submit">
                                  <span class="fill-btn-inner">
                                      <span class="fill-btn-normal">Place order</span>
                                      <span class="fill-btn-hover">Place order</span>
                                  </span>
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  </section>
</main>

@endsection
