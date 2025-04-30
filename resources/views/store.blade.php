@extends('layouts.app')

@section('title','Ecommerce Furniture')

@section('content')

   <!-- Body main wrapper start -->
   <main>

      <!-- Breadcrumb area start  -->
      <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
         <div class="breadcrumb__thumb" data-background="assets/imgs/bg/breadcrumb-bg-furniture.jpg"></div>
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-xxl-12">
                  <div class="breadcrumb__wrapper text-center">
                     <h2 class="breadcrumb__title">Find a Store</h2>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <li><span><a href="{{route('index')}}">Home</a></span></li>
                              <li><span>Find a Store</span></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Breadcrumb area start  -->

      <!-- Find store area start -->
      <section class="find-store-area mt-120 pb-120">
         <div class="container">
            <div class="row g-50 mb-50">
               <div class="col-xl-6">
                  <div class="find-store__item">
                     <div class="fnd-head">
                        <h4>California</h4>
                        <span>01</span>
                     </div>
                     <div class="fnd-content">
                        <div>
                           <span>
                              Address
                           </span>
                           <p>4517 Washington Ave. <br> Manchester, Kentucky 39495</p>
                        </div>
                        <div class="fnd-text">
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tellus turpis.
                        </div>
                     </div>
                  </div>
                  <div class="mt-50">
                     <img class="w-100" src="assets/imgs/furniture/store/store-image2.jpg" alt="image">
                  </div>
               </div>
               <div class="col-xl-6">
                  <img class="w-100" src="assets/imgs/furniture/store/store-image1.jpg" alt="image">
               </div>
            </div>
            <div class="row g-50">
               <div class="col-xl-6">
                  <img class="w-100" src="assets/imgs/furniture/store/store-image3.jpg" alt="image">
               </div>
               <div class="col-xl-6">
                  <div class="find-store__item">
                     <div class="fnd-head">
                        <h4>New York</h4>
                        <span>02</span>
                     </div>
                     <div class="fnd-content">
                        <div>
                           <span>
                              Address
                           </span>
                           <p>4517 New York Ave. <br> Manchester, Kentucky 39495</p>
                        </div>
                        <div class="fnd-text">
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tellus turpis.
                        </div>
                     </div>
                  </div>
                  <div class="mt-50">
                     <img class="w-100" src="assets/imgs/furniture/store/store-image4.jpg" alt="image">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Find store area end -->

   </main>
   <!-- Body main wrapper end -->

@endsection
