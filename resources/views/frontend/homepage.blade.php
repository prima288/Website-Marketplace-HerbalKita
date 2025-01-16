@extends('frontend.layout')

@section('content')
    <!-- slider -->
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            @foreach($slides as $slide)
                <div class="single-slider-4 slider-height-6 bg-img" style="background-image: url({{ Storage::url($slide->path) }})">
                    <div class="container">
                        <div class="row">
                            <div class="ml-auto col-lg-6">
                                <div class="furniture-content fadeinup-animated">
                                    <h2 class="animated">{{ $slide->title }}</h2>
                                    <p class="animated">{{ $slide->body }}</p>
                                    <!-- <a class="furniture-slider-btn btn-hover animated" href="{{ $slide->url }}">Go</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- end -->

    <!-- Kategori Produk -->
 <div class="product-categories-area pt-50 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Kategori 1: Produk Trending -->
                <div class="col-lg-1-5 col-md-3 col-sm-6 mb-30">
                    <div class="single-category text-center">
                        <a href="{{ url('products?category=produk-trend') }}">
                            <img src="{{ asset('themes/ezone/assets/img/icon-img/ptrend.webp') }}" alt="Produk Trending" class="category-icon">
                            <h6>Produk Trending</h6>
                        </a>
                    </div>
                </div>
                <!-- Kategori lainnya dengan struktur yang sama -->
                <div class="col-lg-1-5 col-md-3 col-sm-6 mb-30">
                    <div class="single-category text-center">
                        <a href="{{ url('products?category=get2') }}">
                            <img src="{{ asset('themes/ezone/assets/img/icon-img/ptrend.webp') }}" alt="+Rp1000 Get 2" class="category-icon">
                            <h6>Skincare Pilihan</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-3 col-sm-6 mb-30">
                    <div class="single-category text-center">
                        <a href="{{ url('products?category=produk-baru') }}">
                            <img src="{{ asset('themes/ezone/assets/img/logo/pbaru.webp') }}" alt="Produk Terbaru" class="category-icon">
                            <h6>Produk Terbaru</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-3 col-sm-6 mb-30">
                    <div class="single-category text-center">
                        <a href="{{ url('products?category=produk-bestsell') }}">
                            <img src="{{ asset('themes/ezone/assets/img/icon-img/bestseller.webp ') }}" alt="Best Seller" class="category-icon">
                            <h6>Best Seller</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-3 col-sm-6 mb-30">
                    <div class="single-category text-center">
                        <a href="{{ url('products?category=eksklusif') }}">
                            <img src="{{ asset('themes/ezone/assets/img/icon-img/pbe.webp') }}" alt="Eksklusif di Guardian" class="category-icon">
                            <h6>Eksklusif di Herbal.Kita</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-3 col-sm-6 mb-30">
                    <div class="single-category text-center">
                        <a href="{{ url('products?category=produk-harga') }}">
                            <img src="{{ asset('themes/ezone/assets/img/icon-img/harga.webp') }}" alt="Harga Spesial" class="category-icon">
                            <h6>Harga Spesial</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-3 col-sm-6 mb-30">
                    <div class="single-category text-center">
                        <a href="{{ url('products?category=produk-limited') }}">
                            <img src="{{ asset('themes/ezone/assets/img/logo/limit.webp') }}" alt="Limited Edition" class="category-icon">
                            <h6>Limited Edition</h6>
                        </a>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-3 col-sm-6 mb-30">
                    <div class="single-category text-center">
                        <a href="{{ url('products?category=pbe') }}">
                            <img src="{{ asset('themes/ezone/assets/img/icon-img/pbe.webp') }}" alt="Produk Baru Eksklusif" class="category-icon">
                            <h6>Produk Baru Eksklusif</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
    <div class="image-scroll-container">
    <div class="image-wrapper">
        <img src="{{ asset('themes/ezone/assets/img/banner/b4.jpg') }}" alt="Image 1">
        <img src="{{ asset('themes/ezone/assets/img/banner/b6.jpg') }}" alt="Image 2">
        <img src="{{ asset('themes/ezone/assets/img/banner/b5.jpg') }}" alt="Image 3">
        <img src="{{ asset('themes/ezone/assets/img/banner/b3.jpg') }}" alt="Image 4">

    </div>
</div>

    <!-- products -->
    @if ($products)
<div class="custom-product-section">
    <div class="container">
        <div class="section-title-6 text-center mb-0">
            <h2>Produk Kami</h2>
            <a href="{{ url('products') }}" class="lihat-semua">Lihat Semua</a>
        </div>
            <div class="row">
            <div class="product-style">
                @foreach ($products as $product)
                    @php
                        $product = $product->parent ?: $product;    
                    @endphp
                    <div class="col-lg-2 col-md-4 col-sm-6 product-wrapper">
                        <div class="product-card">
                            <div class="product-img">
                                <a href="{{ url('product/'. $product->slug) }}">
                                    @if ($product->productImages->first())
                                        <img src="{{ Storage::url($product->productImages->first()->path) }}" alt="{{ $product->name }}">
                                    @else
                                        <img src="{{ asset('themes/ezone/assets/img/product/fashion-colorful/1.jpg') }}" alt="{{ $product->name }}">
                                    @endif
                                </a>
                                <div class="product-action">
                                    <!-- <a class="quick-view-btn" title="Lihat" product-slug="{{ $product->slug }}">
                                        <i class="pe-7s-look"></i> QUICK VIEW
                                    </a> -->
                                </div>
                            </div>
                            <div class="furniture-product-content text-center">
                                <h4><a href="{{ url('product/'. $product->slug) }}">{{ $product->name }}</a></h4>
                                <div class="price">
                                @if(!empty($product->final_price) && $product->final_price < $product->price)
                                <span class="discount-price">IDR {{ number_format($product->final_price, 0, ",", ".") }}
                                </span>
                                @else
                                <span class="discount-price">
                                 IDR {{ number_format($product->price, 0, ",", ".") }}
                                 </span>                 
                                 @endif
                                 <span class="original-price" style="text-decoration: line-through; color: #a9a9a9;">
                                    IDR {{ number_format($product->price, 0, ",", ".") }}
                                </span>
                                </div> 
                                <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>0

                                </div>

                                <button class="add-to-cart-btn add-to-card" title="Tambahkan Keranjag" href="" product-id="{{ $product->id }}" product-type="{{ $product->type }}" product-slug="{{ $product->slug }}">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

@if ($products)
<div class="custom-product-section2">
    <div class="container">
        <div class="section-title-6 text-center mb-0">
            <h2>Produk Kami</h2>
            <a href="{{ url('products') }}" class="lihat-semua">Lihat Semua</a>
        </div>
            <div class="row">
            <div class="product-style">
                @foreach ($products as $product)
                    @php
                        $product = $product->parent ?: $product;    
                    @endphp
                    <div class="col-lg-2 col-md-4 col-sm-6 product-wrapper">
                        <div class="product-card">
                            <div class="product-img">
                                <a href="{{ url('product/'. $product->slug) }}">
                                    @if ($product->productImages->first())
                                        <img src="{{ Storage::url($product->productImages->first()->path) }}" alt="{{ $product->name }}">
                                    @else
                                        <img src="{{ asset('themes/ezone/assets/img/product/fashion-colorful/1.jpg') }}" alt="{{ $product->name }}">
                                    @endif
                                </a>
                                <div class="product-action">
                                    <!-- <button class="quick-view-btn" title="Lihat" product-slug="{{ $product->slug }}">
                                        <i class="pe-7s-look"></i> QUICK VIEW
                                    </button> -->
                                </div>
                            </div>
                            <div class="furniture-product-content text-center">
                                <h4><a href="{{ url('product/'. $product->slug) }}">{{ $product->name }}</a></h4>
                                <div class="price">
                                @if(!empty($product->final_price) && $product->final_price < $product->price)
                                <span class="discount-price">IDR {{ number_format($product->final_price, 0, ",", ".") }}
                                </span>
                                @else
                                <span class="discount-price">
                                 IDR {{ number_format($product->price, 0, ",", ".") }}
                                 </span>                 
                                 @endif
                                 <span class="original-price" style="text-decoration: line-through; color: #a9a9a9;">
                                    IDR {{ number_format($product->price, 0, ",", ".") }}
                                </span>
                                </div>
                                 <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>0

                                </div>

                                <button class="add-to-cart-btn add-to-card" title="Tambahkan Keranjag" href="" product-id="{{ $product->id }}" product-type="{{ $product->type }}" product-slug="{{ $product->slug }}">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

@if ($products)
<div class="custom-product-section2">
    <div class="container">
        <div class="section-title-6 text-center mb-0">
            <h2>Suplemen dan Nutrisi</h2>
            <a href="{{ url('products') }}" class="lihat-semua">Lihat Semua</a>
        </div>
            <div class="row">
            <div class="product-style">
                @foreach ($products as $product)
                    @php
                        $product = $product->parent ?: $product;    
                    @endphp
                    <div class="col-lg-2 col-md-4 col-sm-6 product-wrapper">
                        <div class="product-card">
                            <div class="product-img">
                                <a href="{{ url('product/'. $product->slug) }}">
                                    @if ($product->productImages->first())
                                        <img src="{{ Storage::url($product->productImages->first()->path) }}" alt="{{ $product->name }}">
                                    @else
                                        <img src="{{ asset('themes/ezone/assets/img/product/fashion-colorful/1.jpg') }}" alt="{{ $product->name }}">
                                    @endif
                                </a>
                                <div class="product-action">
                                    <!-- <button class="quick-view-btn" title="Lihat" product-slug="{{ $product->slug }}">
                                        <i class="pe-7s-look"></i> QUICK VIEW
                                    </button> -->
                                </div>
                            </div>
                            <div class="furniture-product-content text-center">
                                <h4><a href="{{ url('product/'. $product->slug) }}">{{ $product->name }}</a></h4>
                                <div class="price">
                                @if(!empty($product->final_price) && $product->final_price < $product->price)
                                <span class="discount-price">IDR {{ number_format($product->final_price, 0, ",", ".") }}
                                </span>
                                @else
                                <span class="discount-price">
                                 IDR {{ number_format($product->price, 0, ",", ".") }}
                                 </span>                 
                                 @endif
                                 <span class="original-price" style="text-decoration: line-through; color: #a9a9a9;">
                                    IDR {{ number_format($product->price, 0, ",", ".") }}
                                </span>
                                </div>
                                <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>0

                                </div>

                                <button class="add-to-cart-btn add-to-card" title="Tambahkan Keranjag" href="" product-id="{{ $product->id }}" product-type="{{ $product->type }}" product-slug="{{ $product->slug }}">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

<div class="banner-container">
    <img src="{{ asset('themes/ezone/assets/img/banner/7.png') }}" alt="Banner" class="banner-img">
</div>

    <!-- end -->
@endsection
