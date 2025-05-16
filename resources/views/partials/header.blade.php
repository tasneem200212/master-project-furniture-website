<header>
   <div class="header">
      <div class="header-top-area grocery__top-header">
         <div class="header-layout-4">
            <div class="header-to-main d-none d-sm-flex">
               <div class="link-text">
                  <span><img src="assets/imgs/icons/call.png" alt=""></span>
                  <a href="tel:+962790001234">+962779855947</a>
               </div>
         
               @php
               $coupon = \App\Models\Coupon::find(1);
               @endphp
         
               <div class="header-top-notice d-none d-lg-block">
                  <p>ENJOY <span class="text-white">{{ round($coupon->discount_percentage) }}%</span> ON SELECTED FURNITURE – USE CODE "<span class="text-white">{{ $coupon->code }}</span>"</p>
               </div>
         
               <div class="tp-header-top-menu d-flex align-items-center justify-content-end">
                  <div class="dropdown user-dropdown">
                     @auth
                     <button class="btn btn-link dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img 
                            src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('storage/images/default-user.jpg') }}" 
                            alt="User Avatar" 
                            class="user-avatar rounded-circle" 
                            width="45" height="45"
                        >
                    </button>
                     <div class="dropdown-menu" aria-labelledby="userDropdown">
                         <div class="px-4 py-2 border-bottom">
                             <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                             <small class="text-muted">{{ Auth::user()->email }}</small>
                         </div>
                         <ul class="list-unstyled p-2">
                             <li class="mb-2">
                                 <form action="{{ route('user.profile') }}" method="GET" class="w-100">
                                     <button type="submit" class="btn btn-light w-100 text-start py-2 px-3 rounded-pill">
                                         <i class="fas fa-user me-2 text-brown"></i>
                                         My Profile
                                     </button>
                                 </form>
                             </li>
                             <li>
                                 <form method="POST" action="{{ route('logout') }}" class="w-100">
                                     @csrf
                                     <button type="submit" class="btn btn-light w-100 text-start py-2 px-3 rounded-pill">
                                         <i class="fas fa-sign-out-alt me-2 text-danger"></i>
                                         Logout
                                     </button>
                                 </form>
                             </li>
                         </ul>
                     </div>
                     @endauth
                 
                     @guest
                     <button class="btn fw-bold" onclick="window.location.href='{{ route('login') }}'" style="color:white; font-size: 24px; font-weight: bold;">
                         Login
                     </button>                    
                     @endguest
                 </div>
                 
                 <style>
                     .text-brown {
                         color: #b18b5e;
                     }
                     
                     .dropdown-toggle::after {
                         display: none;
                     }
                 
                     .dropdown-menu {
                         background-color: #f8f9fa;
                         border-radius: 8px;
                         box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                     }
                 
                     .dropdown-item {
                         padding: 12px 20px;
                         border-radius: 8px;
                         font-size: 1.2rem;
                         transition: background-color 0.3s ease;
                     }
                     button {
                        font-size: 1.2rem !important;
                     }
                 
                     .dropdown-item:hover {
                         background-color: #f0f0f0;
                     }
                 
                     .dropdown-item:focus {
                         background-color: #e0e0e0;
                     }
                 
                     .btn-light {
                         color: #333;
                         border: 1px solid #ddd;
                         background-color: #fff;
                         transition: background-color 0.3s, color 0.3s;
                     }
                 
                     .btn-light:hover {
                         background-color: #f8f9fa;
                         color:#b18b5e;
                     }
                 
                     .dropdown-menu .px-4 {
                         padding-left: 1.5rem;
                         padding-right: 1.5rem;
                     }
                 
                     .user-avatar {
                         border: 3px solid #9b7a52;
                         border-radius: 50%;
                         padding: 2px;
                     }
                 </style>
               </div>
            </div>
         </div>
         
      </div>
      <div class="header-layout-4 header-bottom">
         <div id="header-sticky" class="header-4">
            <div class="mega-menu-wrapper">
               <div class="header-main-4">
                  <div class="header-left">
                    <div class="header-logo">
                       <a href="{{ route('Pro.index') }}">
                          <img src="{{ asset('assets/imgs/furniture/logo/logo.svg') }}" alt="logo not found">
                       </a>
                    </div>
                     <div class="mean__menu-wrapper furniture__menu d-none d-lg-block">
                        <div class="main-menu">
                           <nav id="mobile-menu">
                               <ul>
                                   <li class="has-dropdown {{ request()->routeIs('Pro.index') ? 'active' : '' }}">
                                       <a href="{{ route('Pro.index') }}">Home</a>
                                   </li>
                                   <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                       <a href="{{ route('about') }}">About</a>
                                   </li>
                                   <li class="has-dropdown {{ request()->routeIs('product.show') ? 'active' : '' }}">
                                       <a href="{{ route('product.show') }}">Shop</a>
                                   </li>
                                   <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                       <a href="{{ route('contact') }}">Contact</a>
                                   </li>
                               </ul>
                           </nav>
                       </div>
                     </div>
                  </div>
                  <div class="header-right d-inline-flex align-items-center justify-content-end">
                     <div class="header-action d-flex align-items-center ml-30">
                        <div class="header-action-item">
                           <a href="{{route('wishlist')}}" class="header-action-btn">
                              <svg width="23" height="21" viewBox="0 0 23 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="M21.2743 2.33413C20.6448 1.60193 19.8543 1.01306 18.9596 0.609951C18.0649 0.206838 17.0883 -0.0004864 16.1002 0.00291444C14.4096 -0.0462975 12.7637 0.529279 11.5011 1.61122C10.2385 0.529279 8.59252 -0.0462975 6.90191 0.00291444C5.91383 -0.0004864 4.93727 0.206838 4.04257 0.609951C3.14788 1.01306 2.35732 1.60193 1.72785 2.33413C0.632101 3.61193 -0.514239 5.92547 0.245772 9.69587C1.4588 15.7168 10.5548 20.6578 10.9388 20.8601C11.11 20.9518 11.3028 21 11.4988 21C11.6948 21 11.8875 20.9518 12.0587 20.8601C12.445 20.6534 21.541 15.7124 22.7518 9.69587C23.5164 5.92547 22.37 3.61193 21.2743 2.33413ZM20.4993 9.27583C19.6416 13.5326 13.4074 17.492 11.5011 18.6173C8.81516 17.0587 3.28927 13.1457 2.50856 9.27583C1.91872 6.35103 2.72587 4.65208 3.50773 3.74126C3.9212 3.26166 4.43995 2.87596 5.02678 2.61185C5.6136 2.34774 6.25396 2.21175 6.90191 2.21365C7.59396 2.16375 8.28765 2.2871 8.91534 2.57168C9.54304 2.85626 10.0833 3.29235 10.4835 3.83743C10.5822 4.012 10.7278 4.15794 10.9051 4.26003C11.0824 4.36212 11.2849 4.41662 11.4916 4.41787C11.6983 4.41911 11.9015 4.36704 12.0801 4.26709C12.2587 4.16714 12.4062 4.02296 12.5071 3.84959C12.9065 3.30026 13.448 2.86048 14.0781 2.57361C14.7081 2.28674 15.4051 2.16267 16.1002 2.21365C16.7495 2.21061 17.3915 2.34604 17.9798 2.6102C18.5681 2.87435 19.0881 3.26065 19.5025 3.74126C20.282 4.65208 21.0892 6.35103 20.4993 9.27583Z"
                                    fill="black" />
                              </svg>
                              <span class="header-action-badge bg-furniture">  
                                {{ auth()->user() ? auth()->user()->wishlist()->count() : 0 }}
                               </span>
                             </a>
                        </div>
                        <div class="header-action-item">
                           <a href="{{route('cart.index')}}" class="header-action-btn cartmini-open-btn">
                              <svg width="21" height="23" viewBox="0 0 21 23" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="M14.0625 10.6C14.0625 12.5883 12.4676 14.2 10.5 14.2C8.53243 14.2 6.9375 12.5883 6.9375 10.6M1 5.8H20M1 5.8V13C1 20.6402 2.33946 22 10.5 22C18.6605 22 20 20.6402 20 13V5.8M1 5.8L2.71856 2.32668C3.12087 1.5136 3.94324 1 4.84283 1H16.1571C17.0568 1 17.8791 1.5136 18.2814 2.32668L20 5.8"
                                    stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                              <span class="header-action-badge bg-furniture">
                                {{ auth()->user() ? auth()->user()->carts()->count() : 0 }}
                             </span>
                                                         </a>
                        </div>
                     </div>
                     <div class="header-humbager ml-30">
                        <a class="sidebar__toggle" href="javascript:void(0)">
                           <div class="bar-icon-2">
                              <span></span>
                              <span></span>
                              <span></span>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>

<style>
   .main-menu ul li {
       position: relative;
       transition: all 0.3s ease;
   }
   
   .main-menu ul li.active a {
       color: #b18b5e !important;
   }
   
   .main-menu ul li.active::after {
       content: '';
       position: absolute;
       bottom: -5px;
       left: 50%;
       transform: translateX(-50%);
       width: 30px;
       height: 2px;
       background-color: #b18b5e;
       transition: all 0.3s ease;
   }
   
   .main-menu ul li:hover::after {
       width: 50px;
   }
   </style>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
