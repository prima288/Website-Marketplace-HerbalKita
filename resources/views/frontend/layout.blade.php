<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ config('app.name', 'Herbal.Kita') }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('themes/ezone/assets/img/logo/Herbal.Kita Toko.png') }}">
		
		<!-- all css here -->
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/pe-icon-7-stroke.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/icofont.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/meanmenu.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/easyzoom.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/bundle.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/responsive.css') }}">
        <!-- Menggunakan Font Awesome dari CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <script src="{{ asset('themes/ezone/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

        <!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- header -->

        <header>
    <!-- Navbar Atas (Logo, Search Bar, User Icons) -->
    <div class="header-top" style="background-color: #f57f17; padding: 10px 0; flex-wrap: wrap; width: 100%;">
        <div class="container-fluid">
            <div class="header-top-wrapper d-flex align-items-center justify-content-between">
                
                <!-- Logo -->
                <div class="logo">
                    <a href="/">
                    <img src="{{ asset('themes/ezone/assets/img/logo/LOGO3.png') }}" alt="Logo" style="height: 50px; width: auto;">
                    </a>
                </div>

                <!-- Search Bar -->
<div class="search-bar" style="flex: 1; max-width: 300px; margin: 10 20px;">
    <form action="{{ url('products') }}" method="GET" style="display: flex; width: 70%; align-items: center; position: relative;">
        <input 
            placeholder="Cari disini . . ." 
            type="text" 
            name="q" 
            value="{{ request('q') }}" 
            style="width: 100%; padding: 12px 15px; border: 2px solid #ccc; border-radius: 25px; font-size: 14px; outline: none; transition: border-color 0.3s ease;">
        <button 
            type="submit"
            style="position: absolute; right: 10px; background-color: transparant; border: none; padding: 0; cursor: pointer;">
            <img src="{{ asset('themes/ezone/assets/img/icon-img/search.png') }}" alt="search" style="width: 20px; height: 20px;">
        </button>
    </form>
</div>

<!-- Optional CSS for hover effect -->
<style>
    .search-bar input:focus {
        border-color: #0072cc;
    }
</style>


<div class="header-icons d-flex align-items-center justify-content-between" style="flex: 1; max-width: 300px;">
    <!-- Authentication Links -->
    <a href="javascript:void(0);" id="user-icon" style="color: #fff; font-size: 20px; margin-right: 10px;">
    <i class="fas fa-user" style="color: white; font-size: 18px;"></i>
    </a>
</div>

<!-- Sidebar -->
<div id="sidebar" style="display: none; position: fixed; top: 0; right: 0; height: 100%; width: 500px; background-color: #fff; color: white; padding: 20px; z-index: 9999; box-shadow: -4px 0 15px rgba(0, 0, 0, 0.2); flex-direction: column; align-items: center; justify-content: center;">
<button id="close-sidebar" style="position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 24px; font-weight: bold; color: #333; cursor: pointer;">
        &times;
    </button>
    
    <!-- Links for Guests (not logged in) -->
    @guest
    <h3 style="color: #333; margin-bottom: 30px;">Masuk atau Daftar</h3>
        <a href="{{ url('login') }}" style="display: inline-block; margin: 10px 0; padding: 10px 15px; font-size: 14px; background-color: #f57f17; color: #fff; border-radius: 25px; text-decoration: none; width: 100px; text-align: center;">
            Masuk
        </a>
        
        <a href="{{ url('register') }}" style="display: inline-block; margin: 10px 0; padding: 10px 5px; font-size: 14px; background-color: #fff; color: #f57f17; border: 2px solid #f57f17; border-radius: 25px; text-decoration: none; width: 100px; text-align: center;">
            Daftar
        </a>
    @else

        <!-- Links for Authenticated Users -->
        <a href="{{ url('profile') }}" style="color: #f57f17; display: block; margin: 15px 0; font-size: 18px; text-decoration: none;">Profil</a>
        <a href="{{ url('orders') }}" style="color: #f57f17; display: block; margin: 15px 0; font-size: 18px; text-decoration: none;">Pesanan</a>
        <a href="{{ url('wishlist') }}" style="color: #f57f17; display: block; margin: 15px 0; font-size: 18px; text-decoration: none;">Wishlist</a>
        <!-- Logout -->
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:  #f57f17; display: block; margin: 15px 0; font-size: 18px; text-decoration: none;">Logout</a>
        
        <!-- Logout Form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endguest

</div>

<!-- Optional JavaScript to toggle sidebar visibility -->
<script>
    document.getElementById("user-icon").onclick = function() {
        document.getElementById("sidebar").style.display = "block";
    };

    document.getElementById("close-sidebar").onclick = function() {
        document.getElementById("sidebar").style.display = "none";
    };
</script>


                    <!-- Wishlist Icon -->
                    <a href="{{ url('wishlists') }}" style="color: #fff; font-size: 20px; margin-right: 15px;">
                    <i class="fas fa-heart" style="color: white; font-size: 18px;"></i>
                    </a>

                    <!-- Cart Icon -->
                    <a href="{{ url('carts') }}" style="position: relative; text-decoration: none;">
    <div style="display: flex; align-items: center; background-color: white; color: white; padding: 10px 15px; border-radius: 30px;">
        <i class="fas fa-shopping-cart" style="font-size: 18px; margin-right: 8px; color: #f57f17;"></i>
        <span style="color: #f57f17; font-size: 16px;">{{ Cart::count() }} items</span>
    </div>
</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Bawah (Kategori) -->
    <div class="header-bottom" style="background-color: #e5e9ed; padding: 15px 0; border-bottom: 1px solid #ddd; width: 100%;">
        <div class="container-fluid">
            <nav class="menu-style">
                <ul style="display: flex; gap: 30px; list-style: none; padding: 0; margin: 0;">
                    <li><a href="{{ url('products') }}" style="color: #333; font-size: 14px; text-decoration: none;">Produk Kami</a></li>
                    <li><a href="{{ url('products?category=obat') }}" style="color: #333; font-size: 14px; text-decoration: none;">Obat Herbal</a></li>
                    <li><a href="{{ url('products?category=skincare') }}" style="color: #333; font-size: 14px; text-decoration: none;">Skincare Herbal</a></li>
                    <li><a href="{{ url('products?category=rambut') }}" style="color: #333; font-size: 14px; text-decoration: none;">Perawatan Rambut</a></li>
                    <li><a href="{{ url('products?category=tubuh') }}" style="color: #333; font-size: 14px; text-decoration: none;">Perawatan Tubuh</a></li>
                    <li><a href="{{ url('products?category=ibu-anak') }}" style="color: #333; font-size: 14px; text-decoration: none;">Ibu & Anak</a></li>
                    <li><a href="{{ url('products?category=teh-herbal') }}" style="color: #333; font-size: 14px; text-decoration: none;">Minuman & Teh Herbal</a></li>
                    <li><a href="{{ url('products?category=aromaterapi') }}" style="color: #333; font-size: 14px; text-decoration: none;">Aromaterapi</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

        <!-- end -->
        
        @yield('content')
       
<!-- footer -->
<footer class="footer-area footer-custom">
    <div class="footer-top-area pt-70 pb-35 wrapper-padding-5">
        <div class="container-fluid">
            <div class="widget-wrapper">
                <div class="footer-widget mb-30">
                    <a href="#"><img src="{{ asset('themes/ezone/assets/img/logo/lOGO3.png') }}" alt="Logo" style="height: 70px; width: auto;"></a>
                    <div class="footer-about-2">
                        <p>There are many variations of passages of Lorem Ipsum <br>the majority have suffered alteration in some form, by <br> injected humour</p>
                    </div>
                </div>
                <div class="footer-widget mb-30">
                    <h3 class="footer-widget-title-5">Info Kontak</h3>
                    <div class="footer-info-wrapper-3">
                        <div class="footer-address-furniture">
                            <div class="footer-info-icon3">
                                <span>Alamat: </span>
                            </div>
                            <div class="footer-info-content3">
                                <p>Madiun <br>Jawa Timur</p>
                            </div>
                        </div>
                        <div class="footer-address-furniture">
                            <div class="footer-info-icon3">
                                <span>Nomor Telepon: </span>
                            </div>
                            <div class="footer-info-content3">
                                <p>+882-3202-6978 </p>
                            </div>
                        </div>
                        <div class="footer-address-furniture">
                            <div class="footer-info-icon3">
                                <span>E-mail: </span>
                            </div>
                            <div class="footer-info-content3">
                                <p><a href="#"> herbalaxita@domain.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-widget mb-30">
                    <h3 class="footer-widget-title-5">Kritik dan Saran</h3>
                    <div class="footer-newsletter-2">
                        <div id="mc_embed_signup" class="subscribe-form-5">
                            <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                    <input type="email" value="" name="EMAIL" class="email" placeholder="kirim">
                                    <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom ptb-20 gray-bg-8">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="copyright-furniture">
                        <p>Copyright © <a>Herbal.Kita</a> 2024 . All Right Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end -->

       
		<!-- all js here -->
        <script src="{{ asset('themes/ezone/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/popper.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/ajax-mail.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/main.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(".delete").on("click", function () {
                return confirm("Do you want to remove this?");
            });
        </script>
        @stack('script-alt')
    </body>
</html>