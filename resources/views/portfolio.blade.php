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
                     <h2 class="breadcrumb__title">Portfolio</h2>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <li><span><a href="{{route('Pro.index')}}">Home</a></span></li>
                              <li><span>Portfolio</span></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Breadcrumb area start  -->

      <!-- Project area start -->
      <section class="project-area theme-bg-4 section-space p-relative fix">
         <div class="container">
            <div class="row g-5">
               <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                  <div class="project-item">
                     <div class="project-thumb w-img">
                        <img src="assets/imgs/project/project-01.jpg" alt="">
                     </div>
                     <div class="project-content-inner">
                        <div class="project-content">
                           <span>Decoration</span>
                           <h4><a href="{{route('portfolio-details')}}">Mestre Beardom </a></h4>
                        </div>
                        <a class="round-link-40" href="{{route('portfolio-details')}}"><i
                              class="fa-regular fa-angle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                  <div class="project-item">
                     <div class="project-thumb w-img">
                        <img src="assets/imgs/project/project-02.jpg" alt="">
                     </div>
                     <div class="project-content-inner">
                        <div class="project-content">
                           <span>Decoration</span>
                           <h4><a href="{{route('portfolio-details')}}">Mestre Beardom </a></h4>
                        </div>
                        <a class="round-link-40" href="{{route('portfolio-details')}}"><i
                              class="fa-regular fa-angle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                  <div class="project-item">
                     <div class="project-thumb w-img">
                        <img src="assets/imgs/project/project-03.jpg" alt="">
                     </div>
                     <div class="project-content-inner">
                        <div class="project-content">
                           <span>Decoration</span>
                           <h4><a href="{{route('portfolio-details')}}">Mestre Beardom </a></h4>
                        </div>
                        <a class="round-link-40" href="{{route('portfolio-details')}}"><i
                              class="fa-regular fa-angle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                  <div class="project-item">
                     <div class="project-thumb w-img">
                        <img src="assets/imgs/project/project-04.jpg" alt="">
                     </div>
                     <div class="project-content-inner">
                        <div class="project-content">
                           <span>Decoration</span>
                           <h4><a href="{{route('portfolio-details')}}">Mestre Beardom </a></h4>
                        </div>
                        <a class="round-link-40" href="{{route('portfolio-details')}}"><i
                              class="fa-regular fa-angle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                  <div class="project-item">
                     <div class="project-thumb w-img">
                        <img src="assets/imgs/project/project-05.jpg" alt="">
                     </div>
                     <div class="project-content-inner">
                        <div class="project-content">
                           <span>Decoration</span>
                           <h4><a href="{{route('portfolio-details')}}">Mestre Beardom </a></h4>
                        </div>
                        <a class="round-link-40" href="{{route('portfolio-details')}}"><i
                              class="fa-regular fa-angle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                  <div class="project-item">
                     <div class="project-thumb w-img">
                        <img src="assets/imgs/project/project-06.jpg" alt="">
                     </div>
                     <div class="project-content-inner">
                        <div class="project-content">
                           <span>Decoration</span>
                           <h4><a href="{{route('portfolio-details')}}">Mestre Beardom </a></h4>
                        </div>
                        <a class="round-link-40" href="{{route('portfolio-details')}}"><i
                              class="fa-regular fa-angle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                  <div class="project-item">
                     <div class="project-thumb w-img">
                        <img src="assets/imgs/project/project-07.jpg" alt="">
                     </div>
                     <div class="project-content-inner">
                        <div class="project-content">
                           <span>Decoration</span>
                           <h4><a href="{{route('portfolio-details')}}">Mestre Beardom </a></h4>
                        </div>
                        <a class="round-link-40" href="{{route('portfolio-details')}}"><i
                              class="fa-regular fa-angle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                  <div class="project-item">
                     <div class="project-thumb w-img">
                        <img src="assets/imgs/project/project-08.jpg" alt="">
                     </div>
                     <div class="project-content-inner">
                        <div class="project-content">
                           <span>Decoration</span>
                           <h4><a href="{{route('portfolio-details')}}">Mestre Beardom </a></h4>
                        </div>
                        <a class="round-link-40" href="{{route('portfolio-details')}}"><i
                              class="fa-regular fa-angle-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                  <div class="project-item">
                     <div class="project-thumb w-img">
                        <img src="assets/imgs/project/project-09.jpg" alt="">
                     </div>
                     <div class="project-content-inner">
                        <div class="project-content">
                           <span>Decoration</span>
                           <h4><a href="{{route('portfolio-details')}}">Mestre Beardom </a></h4>
                        </div>
                        <a class="round-link-40" href="{{route('portfolio-details')}}"><i
                              class="fa-regular fa-angle-right"></i></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xxl-12">
                  <div class="pagination__wrapper mt-50">
                     <div class="bd-basic__pagination d-flex align-items-center justify-content-center">
                        <nav>
                           <ul>
                              <li>
                                 <a href="#">1</a>
                              </li>
                              <li>
                                 <a href="#">2</a>
                              </li>
                              <li>
                                 <span class="current">3</span>
                              </li>
                              <li>
                                 <a href="#"><i class="fa-regular fa-angle-right"></i></a>
                              </li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Project area end -->

   </main>
   <!-- Body main wrapper end -->

@endsection

