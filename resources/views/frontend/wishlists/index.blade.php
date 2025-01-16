@extends('frontend.layout')

@section('content')
<div class="shop-page-wrapper shop-page-padding ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.partials.user_menu')
            </div>
            <div class="col-lg-9">
                @if(session()->has('message'))
                    <div class="content-header mb-3 pb-0">
                        <div class="container-fluid">
                            <div class="mb-0 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="wishlist-wrapper">
                    <div class="row">
                        @forelse ($wishlists as $wishlist)
                            @php
                                $product = $wishlist->product;
                                $product = isset($product->parent) ?: $product;
                                $image = !empty($product->productImages->first()) ? asset('storage/'.$product->productImages->first()->path) : asset('themes/ezone/assets/img/cart/3.jpg');
                            @endphp

                            <div class="col-md-3 mb-4">
                                <div class="product-card2">
                                    <img src="{{ $image }}" class="card-img-top" alt="{{ $product->name }}">
                                    <div class="card-body">
									<div class="furniture-product-content2 text-center">
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
                                        <form action="{{ route('wishlists.destroy', $wishlist->id) }}" method="post" class="delete d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
							</div>
                        @empty
                            <div class="col-12">
                                <p class="text-center">Kamu tidak memiliki wishlist produk</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
