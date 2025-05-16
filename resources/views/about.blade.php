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
                     <h2 class="breadcrumb__title">About us</h2>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <li><span><a href="{{route('Pro.index')}}">Home</a></span></li>
                              <li><span>About Us</span></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Breadcrumb area start  -->

      <!-- About area start -->
      <section class="about-area pt-120 pb-120">
         <div class="container">
            <div class="row g-4">
               <div class="col-xxl-6 col-xl-6 col-lg-6">
                  <div class="wow fadeInRight animated" data-wow-delay="0.3s">
                     <div class="mb-20">
                         <span class="mb-15" style="color: #B18B5E;">We offer high-quality furniture</span>
                         <h3>Our Main Products</h3>
                     </div>
                     <p>We offer a wide range of innovative furniture for all tastes, combining beauty and comfort to meet your needs, whether modern or traditional.</p>
                     <div class="bd-features-section mt-40 mb-60">
                        <div class="bd-feature-item fix">
                            <div class="bd-feature-icon">
                                <i class="flaticon-sofa"></i>
                            </div>
                            <div class="bd-feature-content">
                                <h5>Modern Furniture</h5>
                                <p>Sleek designs with functionality and comfort for modern living spaces</p>
                            </div>
                        </div>
                        <div class="bd-feature-item fix">
                            <div class="bd-feature-icon">
                                <i class="flaticon-wooden-chair"></i>
                            </div>
                            <div class="bd-feature-content">
                                <h5>Traditional Furniture</h5>
                                <p>Timeless pieces that reflect cultural heritage and craftsmanship</p>
                            </div>
                        </div>
                        <div class="bd-feature-item fix">
                            <div class="bd-feature-icon">
                                <i class="flaticon-carpentry"></i>
                            </div>
                            <div class="bd-feature-content">
                              <h5>Office Furniture</h5>
                              <p>Ergonomic designs for productive workspaces</p>
                          </div>
                        </div>
                    </div>
                     <img class="w-100" src="assets/imgs/furniture/about/about-image2.jpg" alt="Furniture Image">
                 </div>
                 
               </div>
               <div class="col-xxl-6 col-xl-6 col-lg-6">
                  <img class="w-100 pl-50" src="assets/imgs/furniture/about/about-image1.jpg" alt="">
               </div>
            </div>
         </div>
      </section>
      <!-- About area end -->

      <!-- About video area start -->
      <div class="postbox__thumb postbox__video w-img p-relative mb-60">
         <a href="#">
            <img src="assets/imgs/furniture/about/about-video-image.jpg" alt="image">
         </a>
         <a href="https://www.youtube.com/watch?v=YkfPITD2C8Y" class="play-btn pulse-btn popup-video"><i
               class="fas fa-play"></i></a>
      </div>
      <!-- About video area end -->

   </main>
   <!-- Body main wrapper end -->
   @endsection
   
   <style>
   .postbox__thumb{
      margin-bottom: 4rem;
   }   
   .postbox__thumb {
    /* margin-bottom: 4rem; */
    position: relative;
    width: 88%;
    margin: 0 auto;
}
   </style>