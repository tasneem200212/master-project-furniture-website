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
                                <!-- Payment Method Selection -->
                                <div class="payment-method-selector mb-5">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-wallet me-3 fs-2" style="color:#b18b5e"></i>
                                        <h4 class="m-0">Payment Method <span class="">*</span></h4>
                                    </div>
                                    
                                    <div class="payment-options">
                                        <select name="payment_method_id" id="payment_method" 
                                                class="form-select form-select-lg payment-select" required>
                                            <option value="" disabled selected>Choose your payment method</option>
                                            @foreach($paymentMethods as $method)
                                            <option value="{{ $method->id }}" 
                                                    {{ old('payment_method_id') == $method->id ? 'selected' : '' }}
                                                    data-method-type="{{ strtolower(str_replace(' ', '-', $method->method_name)) }}">
                                                {{ $method->method_name }}
                                                @if($method->method_name == 'Credit Card')
                                                <i class="fab fa-cc-visa ms-2"></i>
                                                <i class="fab fa-cc-mastercard ms-1"></i>
                                                @endif
                                            </option>
                                            @endforeach
                                        </select>
                                        
                                        @error('payment_method_id')
                                        <div class="error-message mt-2">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            
                                <!-- Credit Card Form (Hidden by default) -->
                                <div id="credit-card-form" class="credit-card-section mt-4" style="display: none;">
                                    <div class="card-form-header d-flex align-items-center mb-4">
                                        <i class="far fa-credit-card me-3 fs-2" style="color:#b18b5e"></i>
                                        <h5 class="m-0">Secure Credit Card Payment</h5>
                                    </div>
                                    
                                    <div class="card-form-body p-4 rounded-3 shadow-sm">
                                        <!-- Card Number -->
                                        <div class="mb-4">
                                            <label for="card_number" class="form-label fw-bold">Card Number</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0">
                                                    <i class="fas fa-credit-card text-muted"></i>
                                                </span>
                                                <input type="text" name="card_number" id="card_number" 
                                                       class="form-control card-number-input" 
                                                       placeholder="•••• •••• •••• ••••"
                                                       maxlength="19"
                                                       oninput="formatCardNumber(this)">
                                                <span class="input-group-text bg-white border-start-0 card-type-icon">
                                                    <i class="fab fa-cc-visa" style="color:#b18b5e"></i>
                                                </span>
                                            </div>
                                            <small class="text-muted mt-1">Enter 16-digit card number</small>
                                        </div>
                                        
                                        <div class="row g-3">
                                            <!-- Expiry Date -->
                                            <div class="col-md-6">
                                                <label for="expiry_date" class="form-label fw-bold">Expiration Date</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-end-0">
                                                        <i class="far fa-calendar-alt text-muted"></i>
                                                    </span>
                                                    <input type="month" name="expiry_date" id="expiry_date" 
                                                           class="form-control" 
                                                           min="{{ date('Y-m') }}"
                                                           placeholder="MM/YYYY">
                                                </div>
                                            </div>
                                            
                                            <!-- CVV -->
                                            <div class="col-md-6">
                                                <label for="cvv" class="form-label fw-bold">Security Code</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-end-0">
                                                        <i class="fas fa-lock text-muted"></i>
                                                    </span>
                                                    <input type="password" name="cvv" id="cvv" 
                                                           class="form-control" 
                                                           placeholder="•••"
                                                           maxlength="3"
                                                           oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                    <span class="input-group-text bg-white border-start-0" 
                                                          data-bs-toggle="tooltip" 
                                                          title="3-digit code on back of your card">
                                                        <i class="fas fa-question-circle text-secondary"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <style>
                                /* Payment Method Selector */
                                .payment-method-selector {
                                    background-color: #f8f9fa;
                                    padding: 1.5rem;
                                    border-radius: 0.5rem;
                                    border: 1px solid #e0e0e0;
                                }
                                
                                .payment-select {
                                    border: 2px solid #dee2e6;
                                    transition: all 0.3s ease;
                                    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
                                    background-repeat: no-repeat;
                                    background-position: right 1rem center;
                                    background-size: 16px 12px;
                                }
                                
                                .payment-select:focus {
                                    border-color:#b18b5e;
                                    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
                                }
                                
                                /* Credit Card Form */
                                .credit-card-section {
                                    transition: all 0.3s ease;
                                }
                                
                                .card-form-body {
                                    background-color: #ffffff;
                                    border: 1px solid #e0e0e0;
                                }
                                
                                .card-number-input {
                                    letter-spacing: 1px;
                                    font-family: 'Courier New', monospace;
                                }
                                
                                .card-type-icon {
                                    transition: all 0.3s ease;
                                }
                                
                                .card-preview {
                                    transition: all 0.3s ease;
                                    border: 1px solid rgba(255, 255, 255, 0.1);
                                }
                                
                                .error-message {
                                    color: #dc3545;
                                    font-size: 0.9rem;
                                    display: flex;
                                    align-items: center;
                                }
                            </style>
                            
                            <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Toggle Credit Card Form
                                const paymentSelect = document.getElementById('payment_method');
                                const creditCardForm = document.getElementById('credit-card-form');
                                
                                paymentSelect.addEventListener('change', function() {
                                    const selectedOption = this.options[this.selectedIndex];
                                    const methodType = selectedOption.getAttribute('data-method-type');
                                    
                                    if (methodType === 'credit-card') {
                                        creditCardForm.style.display = 'block';
                                        // Make credit card fields required
                                        document.querySelectorAll('#credit-card-form input').forEach(input => {
                                            input.required = true;
                                        });
                                    } else {
                                        creditCardForm.style.display = 'none';
                                        // Remove required attribute
                                        document.querySelectorAll('#credit-card-form input').forEach(input => {
                                            input.required = false;
                                        });
                                    }
                                });
                                
                                // Trigger change event on page load
                                paymentSelect.dispatchEvent(new Event('change'));
                                
                                // Card Number Formatting
                                function formatCardNumber(input) {
                                    let value = input.value.replace(/\s+/g, '').replace(/[^0-9]/g, '');
                                    let formatted = '';
                                    
                                    for (let i = 0; i < value.length; i++) {
                                        if (i > 0 && i % 4 == 0) formatted += ' ';
                                        formatted += value[i];
                                    }
                                    
                                    input.value = formatted;
                                    
                                    // Update card preview
                                    document.getElementById('card-preview-number').textContent = 
                                        formatted.length > 0 ? formatted : '•••• •••• •••• ••••';
                                    
                                    // Detect card type and update icon
                                    const cardType = detectCardType(value);
                                    document.getElementById('card-type-text').textContent = cardType;
                                    
                                    // Update card type icon
                                    const cardTypeIcon = document.querySelector('.card-type-icon i');
                                    cardTypeIcon.className = `fab fa-cc-${cardType.toLowerCase()}`;
                                }
                                
                                function detectCardType(number) {
                                    if (/^4/.test(number)) return 'VISA';
                                    if (/^5[1-5]/.test(number)) return 'MASTERCARD';
                                    if (/^3[47]/.test(number)) return 'AMEX';
                                    if (/^6(?:011|5)/.test(number)) return 'DISCOVER';
                                    return 'CARD';
                                }
                                
                                // Initialize tooltips
                                const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                                tooltipTriggerList.map(function (tooltipTriggerEl) {
                                    return new bootstrap.Tooltip(tooltipTriggerEl);
                                });
                            });
                            </script>

                              <!-- Hidden fields -->
                              <input type="hidden" name="shipping_address_id" value="{{ $user->shipping_address_id ?? 1 }}">
                              
                              <input type="hidden" name="total_amount" id="total_amount_input" value="{{ number_format($totalAmountAfterDiscount + 7, 2) }}">
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
                                            {{ $orderDetail->product->name }} 
                                            <strong class="product-quantity"> × {{ $orderDetail->quantity }}</strong>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">JD{{ number_format($orderDetail->product->price * $orderDetail->quantity, 2) }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount">JD{{ number_format($totalAmount, 2) }}</span></td>
                                    </tr>
                
                                    @if(session('coupon') && $discountAmount > 0)
                                        <tr class="cart-discount">
                                            <th>Discount ({{ session('coupon')->code }})</th>
                                            <td><span class="amount">- JD{{ number_format($discountAmount, 2) }}</span></td>
                                        </tr>
                                    @endif
                
                                    <tr class="shipping">
                                        <th>Shipping Method</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="hidden" name="shipping_method" value="7">
                                                <div class="shipping-option d-flex align-items-center p-3 bg-light rounded">
                                                    <i class="fas fa-truck me-3 fs-4" style="color: #b18b5e;"></i>
                                                    <div>
                                                        <span class="fw-bold d-block">Flat Rate: JD 7.00</span>
                                                        <small class="text-muted">Standard delivery within 3-5 business days</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <!-- Correct Order Total calculation -->
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td>
                                            <strong>
                                                Total after Discount:
                                                <span class="amount" id="order-total-amount">
                                                    {{ number_format($totalAmountAfterDiscount + 7, 2) }}
                                                </span>
                                            </strong>
                                        </td>
                                    </tr>                                
                                </tfoot>
                            </table>
                        </div>
                
                        <div class="order-button-payment mt-20">
                            <button class="fill-btn" type="submit" id="place-order-button" onclick="this.disabled=true; this.form.submit();">
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

@section('scripts')
<script>
    // Validate Payment Method Selection
    document.querySelector('form').addEventListener('submit', function(e) {
        // 1. Check payment method is selected
        const paymentMethod = document.getElementById('payment_method').value;
        if (!paymentMethod) {
            e.preventDefault();
            alert('Please select a payment method');
            return false;
        }

        // 2. If credit card is selected, validate card details
        if (paymentMethod === 'credit-card-id-here') { // Replace with your actual credit card method ID
            const cardNumber = document.getElementById('card_number').value.replace(/\s+/g, '');
            const expiryDate = document.getElementById('expiry_date').value;
            const cvv = document.getElementById('cvv').value;

            // Validate card number (Luhn check)
            if (!validateCardNumber(cardNumber)) {
                e.preventDefault();
                alert('Invalid credit card number');
                return false;
            }

            // Validate expiry date
            if (!validateExpiryDate(expiryDate)) {
                e.preventDefault();
                return false;
            }

            // Validate CVV
            if (!/^\d{3,4}$/.test(cvv)) {
                e.preventDefault();
                alert('Invalid CVV (must be 3-4 digits)');
                return false;
            }
        }

        // 3. Check all required fields
        const requiredFields = this.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.style.borderColor = '#dc3545';
                isValid = false;
            } else {
                field.style.borderColor = '';
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            alert('Please fill all required fields!');
            return false;
        }

        // 4. If everything is valid, show loading state
        const submitBtn = document.getElementById('place-order-button');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
        submitBtn.disabled = true;
    });

    // Luhn Algorithm for card validation
    function validateCardNumber(cardNumber) {
        let sum = 0;
        for (let i = 0; i < cardNumber.length; i++) {
            let digit = parseInt(cardNumber[i]);
            if ((cardNumber.length - i) % 2 === 0) {
                digit *= 2;
                if (digit > 9) digit -= 9;
            }
            sum += digit;
        }
        return sum % 10 === 0;
    }

    // Expiry date validation
    function validateExpiryDate(expiryDate) {
        if (!expiryDate) {
            alert('Please select expiry date');
            return false;
        }

        const [year, month] = expiryDate.split('-');
        const expiry = new Date(year, month - 1);
        const currentDate = new Date();
        
        if (expiry < currentDate) {
            alert('Your card has expired!');
            return false;
        }
        
        return true;
    }

    // Real-time card number formatting
    document.getElementById('card_number').addEventListener('input', function(e) {
        // Format with spaces every 4 digits
        let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/g, '');
        let formatted = '';
        
        for (let i = 0; i < value.length && i < 16; i++) {
            if (i > 0 && i % 4 === 0) formatted += ' ';
            formatted += value[i];
        }
        
        e.target.value = formatted;
    });

    // CVV input restriction (numbers only)
    document.getElementById('cvv').addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
@endsection

@endsection
