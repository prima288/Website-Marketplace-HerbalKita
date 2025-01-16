<style>
/* Styling Umum */
body, html {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    font-family: Arial, sans-serif;
}

.user-dashboard {
    display: flex;
    flex-direction: column;
    width: 100vw;
    height: 100%;
    box-sizing: border-box;
}

/* Header Styling */
.dashboard-header {
    background-color: #FF8300;
    color: white;
    text-align: center;
    padding: 20px;
    width: 100%;
    box-sizing: border-box;
}

.dashboard-header h2 {
    margin: 0;
    font-size: 24px;
    font-weight: bold;
}

.dashboard-header p {
    margin: 5px 0;
    font-size: 14px;
}

.user-point {
    background-color: #FDE4CF;
    padding: 10px;
    display: inline-block;
    border-radius: 5px;
    color: #FF8300;
    margin-top: 10px;
}

/* Navigation Tabs */
.dashboard-tabs {
    margin: 0 auto;
    width: 90%;
    background-color: white;
    position: relative;
    padding-bottom: 10px; /* Ruang untuk garis bawah oranye */
}

.dashboard-tabs ul {
    display: flex;
    justify-content: center;
    list-style: none;
    margin: 0;
    padding: 0;
    border-bottom: 1px solid #ccc; /* Garis abu-abu untuk semua tab */
}

.dashboard-tabs .nav-item {
    margin: 0 10px;
}

/* Styling untuk garis bawah pada tab aktif */
.dashboard-tabs .nav-link {
    position: relative;
    color: #000;
    text-decoration: none;
    padding: 10px 15px;
    font-size: 16px;
    border: none; /* Hilangkan semua border */
    outline: none; /* Hilangkan efek outline */
    background-color: transparent; /* Hilangkan latar belakang */
    transition: color 0.3s ease, border-bottom 0.3s ease;
}

.dashboard-tabs .nav-link i {
    margin-right: 5px;
    transition: color 0.3s ease;
}

.dashboard-tabs .nav-link.active {
    font-weight: bold;
    color: #FF8300;
}

/* Ikon berubah menjadi oranye saat aktif */
.dashboard-tabs .nav-link.active i {
    color: #FF8300;
}

/* Garis bawah hanya untuk tab selain Wish List */
.dashboard-tabs .nav-link.active:not(.nav-link-wishlist)::after {
    content: '';
    position: absolute;
    bottom: -1px; /* Posisi tepat di atas garis abu-abu */
    left: 0;
    width: 100%;
    height: 3px;
    background-color: #FF8300; /* Garis bawah oranye */
    z-index: 2; /* Pastikan garis ini di atas garis abu-abu */
    transition: all 0.3s ease;
}

/* Hover Effect */
.dashboard-tabs .nav-link:hover {
    color: #FF8300;
}

.dashboard-tabs .nav-link:hover i {
    color: #FF8300; /* Ikon berubah menjadi oranye saat hover */
}

/* Bootstrap Override */
.nav-tabs .nav-link {
    border: none !important; /* Hilangkan border bawaan Bootstrap */
    background-color: transparent !important; /* Hilangkan warna latar belakang saat aktif */
    padding-bottom: 10px; /* Tambahkan ruang untuk garis bawah */
}
</style>




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>

<div class="user-dashboard">
    <!-- Header Section -->
    <div class="dashboard-header" style="background-color: #FF8300;  margin-left: -90px; margin-top: -100px; width: 100%; padding: 20px; color: white; text-align: center;">
	<h2 class="user-name" style="margin: 0;">
        {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
    </h2>
	<p class="user-email" style="margin: 5px 0;">
        {{ auth()->user()->email }}
    </p>
        <div class="user-point" style="background-color: #FDE4CF; padding: 10px; display: inline-block; border-radius: 5px; color: #FF8300;">
            <strong>Poin Saya</strong>
            <p style="margin: 0;">IDR 0.00</p>
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="dashboard-tabs" style="background-color: white;   width: 70%; padding: 10px 0; ">
        <ul class="nav nav-tabs justify-content-center" style="border-bottom: none; margin: 0; padding: 0;">
            <li class="nav-item" style="margin-right: 20px;">
                <a class="nav-link {{ request()->is('orders') ? 'active' : '' }}" href="{{ url('orders') }}" >
                    <i class="fas fa-shopping-bag"></i> Pesanan Saya
                </a>
            </li>
            <li class="nav-item" style="margin-right: 20px;">
                <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="{{ url('profile') }}">
                    <i class="fas fa-user"></i> Informasi Akun
                </a>
            </li>
            <li class="nav-item" style="margin-right: 20px;">
                <a class="nav-link {{ request()->is('wishlist') ? 'active' : '' }}" href="{{ url('wishlists') }}">
                    <i class="fas fa-heart"></i> Wish List
                </a>
            </li>
        </ul>
    </div>
</div>
