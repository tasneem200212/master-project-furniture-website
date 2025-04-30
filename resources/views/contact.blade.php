@extends('layouts.app_Login')

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
                  <h2 class="breadcrumb__title">Contact</h2>
                  <div class="breadcrumb__menu">
                     <nav>
                        <ul>
                           <li><span><a href="{{ route('Pro.index') }}">Home</a></span></li>
                           <li><span>Contact</span></li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Breadcrumb area end -->

   <!-- Contact area start -->
   <div class="contact-area section-space">
      <div class="container">
         <div class="row g-5">
            <div class="col-xxl-4 col-xl-4 col-lg-6">
               <div class="contact-info-item text-center">
                  <div class="contact-info-icon">
                     <span><i class="fa-solid fa-location-dot"></i></span>
                  </div>
                  <div class="contact-info-content">
                     <h4>My Location</h4>
                     <p><a href="https://www.google.com/maps?q=Al+Salt,+Jordan" target="_blank">Jordan – Al-Salt</a></p>

                  </div>
               </div>
            </div>
            
            <div class="col-xxl-4 col-xl-4 col-lg-6">
               <div class="contact-info-item text-center">
                  <div class="contact-info-icon">
                     <span><i class="fa-solid fa-envelope"></i></span>
                  </div>
                  <div class="contact-info-content">
                     <h4>Email Address</h4>
                     <span><a href="mailto:tasneemalshiyyab@gmail.com">tasneemalshiyyab@gmail.com</a></span>
                  </div>
               </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-6">
               <div class="contact-info-item text-center">
                  <div class="contact-info-icon">
                     <span><i class="fa-solid fa-phone"></i></span>
                  </div>
                  <div class="contact-info-content">
                     <h4>Phone</h4>
                     <span><a href="tel:+962799998888">+962 7 7985 5947</a></span>
                  </div>
               </div>
            </div>
         </div>

         <div class="contact-wrapper pt-80">
            <div class="row gy-50">
               <div class="col-xxl-6 col-xl-6">
                  <div class="contact-map">
                     <iframe
                     src="https://www.google.com/maps?q=Al+Salt,+Jordan&output=embed"
                     width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                  </iframe>
                  
                  </div>
               </div>
               <div class="col-xxl-6 col-xl-6">
                  @if ($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif
<div class="alert alert-success alert-dismissible fade show" role="alert">
   {{ session('success') }}
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 

                  <div class="contact-from">
                     <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="contact__from-input">
                                 <input type="text" name="name" placeholder="Full Name*" required>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="contact__from-input">
                                 <input type="email" name="email" placeholder="Email Address*" required>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="contact__from-input">
                                 <input type="tel" name="phone" placeholder="Phone Number">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="contact__from-input">
                                 <input type="date" name="date" id="date" placeholder="Select a preferred date for us to contact you">
                                 <label for="date">Preferred Contact Date</label>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="contact__from-input">
                                 <textarea name="message" placeholder="Your Message*" required></textarea>
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="appointment__btn">
                                 <button class="fill-btn" type="submit">
                                    <span class="fill-btn-inner">
                                       <span class="fill-btn-normal">Send Now <i class="fa-solid fa-angle-right"></i></span>
                                       <span class="fill-btn-hover">Send Now <i class="fa-solid fa-angle-right"></i></span>
                                    </span>
                                 </button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
   <!-- Contact area end -->

   <script>
      document.addEventListener("DOMContentLoaded", function () {
         const form = document.querySelector('form');
         form.addEventListener('submit', function (e) {
            let valid = true;
            let name = form.querySelector('input[name="name"]').value.trim();
            let email = form.querySelector('input[name="email"]').value.trim();
            let message = form.querySelector('textarea[name="message"]').value.trim();
      
            if (name.length < 2) {
               alert("Please enter a valid name.");
               valid = false;
            }
      
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!email.match(emailPattern)) {
               alert("Please enter a valid email address.");
               valid = false;
            }
      
            if (message.length < 10) {
               alert("Your message must be at least 10 characters long.");
               valid = false;
            }
      
            if (!valid) e.preventDefault();
         });
      });
      </script>
      

</main>
<!-- Body main wrapper end -->

@endsection
