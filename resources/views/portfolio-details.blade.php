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
                     <h2 class="breadcrumb__title">Portfolio Details</h2>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <li><span><a href="{{route('index')}}">Home</a></span></li>
                              <li><span>Portfolio Details</span></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Breadcrumb area start  -->

      <!-- Portfolio area start -->
      <section class="pt-120 pb-120">
         <div class="container">
            <h3 class="mb-30">Portfolio Details</h3>
            <p>Nulla faucibus malesuada. In placerat feugiat eros ac tempor. Integer euismod massa sapien, et consequat
               enim laoreet
               et. Nulla sit amet nisi dapibus, gravida turpis sit amet, accumsan nisl. Fusce vel semper risus. Morbi
               congue eros
               sagittis, sodales turpis venenatis, iaculis dui. Proin ac purus sed nibh dapibus neque. scelerisque sed
               quis ante eros
               suspendisse potenti. Mauris vitae sagittis diam. Vivamus imperdiet nulla ut nisi fermentum, vitae euismod
               mi egestas. In
               quis auctor magna. Maecenas sodales nunc tellus, non iaculis est iaculis placerat. Morbi suscipit,</p>
            <ul class="portfolio__info mt-30 mb-40">
               <li><span>Date:</span> 10, February 2024</li>
               <li><span>Category:</span> Felix Art</li>
               <li><span>Client:</span> Robert Fox</li>
               <li><span>Location:</span> fot kde, USA</li>
            </ul>
            <img class="w-100" src="assets/imgs/project/project-details.jpg" alt="image">
            <p class="mt-30">Pellentesque egestas rutrum nibh facilisis ultrices. Phasellus in magna ut orci malesuada
               sollicitudin. Aenean faucibus
               scelerisque convallis. Quisque interdum mauris id nunc molestie, ac tincidunt erat gravida. Nullam dui
               libero, mollis ac
               quam et, venenatis tincidunt quam. Proin nec volutpat ligula, id porttitor augue. Proin id volutpat
               massa. Vivamus
               tincidunt nunc justo, ac aliquam ex molestie id.</p>
         </div>
      </section>
      <!-- Portfolio area end -->

   </main>
   <!-- Body main wrapper end -->

@endsection


 