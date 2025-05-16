@extends('layouts.app_admin')

@section('content')

<body>
    <div id="right-panel" class="right-panel">

        @if(session('welcome_message'))
        <div class="welcome-message-container">
            <div class="welcome-message animate__animated animate__fadeInDown">
                <div class="welcome-content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="welcome-icon">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <span class="welcome-text">{{ session('welcome_message') }}</span>
                </div>
                <button class="welcome-close" onclick="this.parentElement.remove()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
        
        <style>
            .welcome-message-container {
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 9999;
                max-width: 400px;
                width: 90%;
            }
            
            .welcome-message {
                background: linear-gradient(135deg, #9b7a52 0%, #b18b5e 100%);
                color: white;
                padding: 15px 20px;
                border-radius: 10px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                display: flex;
                justify-content: space-between;
                align-items: center;
                animation-duration: 0.5s;
            }
            
            .welcome-content {
                display: flex;
                align-items: center;
                gap: 12px;
            }
            
            .welcome-icon {
                flex-shrink: 0;
                color: #fff;
            }
            
            .welcome-text {
                font-size: 16px;
                font-weight: 500;
                line-height: 1.4;
            }
            
            .welcome-close {
                background: transparent;
                border: none;
                color: white;
                cursor: pointer;
                padding: 5px;
                margin-left: 15px;
                opacity: 0.7;
                transition: opacity 0.3s;
            }
            
            .welcome-close:hover {
                opacity: 1;
            }
            
            @media (max-width: 576px) {
                .welcome-message-container {
                    left: 50%;
                    transform: translateX(-50%);
                    width: 95%;
                }
            }
        </style>
        
        <!-- Add Animate.css for animations -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        
        <script>
            // Auto-close after 5 seconds
            setTimeout(() => {
                const welcomeMsg = document.querySelector('.welcome-message-container');
                if (welcomeMsg) {
                    welcomeMsg.classList.add('animate__fadeOutUp');
                    setTimeout(() => welcomeMsg.remove(), 500);
                }
            }, 5000);
        </script>
        @endif
        <div class="content">
            <div class="animated fadeIn">
                <!-- Widgets -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">JD<span class="count">{{ number_format($totalRevenue, 2) }}</span></div>
                                            <div class="stat-heading">Revenue</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional widgets for products, orders, customers -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{ $ordersCount }}</span></div>
                                            <div class="stat-heading">Sales/orders</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{ $productsCount }}</span></div>
                                            <div class="stat-heading">Products</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{ $customersCount }}</span></div>
                                            <div class="stat-heading">Customers</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->

                <!-- Monthly Revenue Chart -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Monthly Revenue</h4>
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Traffic -->
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
    <script>
        var ctx = document.getElementById("revenueChart").getContext('2d');
        var revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels), // الأشهر
                datasets: [{
                    label: 'Revenue (JD)',
                    data: @json($revenues), // الإيرادات
                    borderColor: '#b18b5e',
                    backgroundColor: 'rgba(177, 139, 94, 0.2)',
                    fill: true,
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        ticks: {
                            beginAtZero: true
                        }
                    }
                }
            }
        });
    </script>
@endsection
