@extends('frontend.layout')

@section('content')
	@if(session()->has('message'))
		<div class="content-header mb-0 pb-0 mt-3">
			<div class="container-fluid">
				<div class="mb-0 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
					<strong>{{ session()->get('message') }}</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div> 
			</div><!-- /.container-fluid -->
		</div>
	@endif
	<div class="product-details ptb-100 pb-90">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-7 col-12">
					<div class="product-details-img-content">
						<div class="product-details-tab mr-70">
							<div class="product-details-large tab-content">
								@php
									$i = 1
								@endphp
								@forelse ($product->productImages as $image)
									<div class="tab-pane fade {{ ($i == 1) ? 'active show' : '' }}" id="pro-details{{ $i}}" role="tabpanel">
										<div class="easyzoom easyzoom--overlay">
											@if ($image->path)
												<a href="{{ asset('storage/'.$image->path) }}">
													<img src="{{ asset('storage/'.$image->path) }}" alt="{{ $product->name }}">
												</a>
											@else
												<a href="{{ asset('themes/ezone/assets/img/product-details/bl1.jpg') }}">
													<img src="{{ asset('themes/ezone/assets/img/product-details/l1.jpg') }}" alt="{{ $product->name }}">
												</a>
											@endif
                                        </div>
									</div>
									@php
										$i++
									@endphp
								@empty
									Tidak Ada Gambar Ditemukan
								@endforelse
							</div>
							<div class="product-details-small nav mt-12" role=tablist>
								@php
									$i = 1
								@endphp
								@forelse ($product->productImages as $image)
									<a style="width: 100px;" class="{{ ($i == 1) ? 'active' : '' }} mr-12" href="#pro-details{{ $i }}" data-toggle="tab" role="tab" aria-selected="true">
										@if ($image->path)
											<img src="{{ asset('storage/'.$image->path) }}" alt="{{ $product->name }}">
										@else
											<img src="{{ asset('themes/ezone/assets/img/product-details/s1.jpg') }}" alt="{{ $product->name }}">
										@endif
									</a>
									@php
										$i++
									@endphp
								@empty
								Tidak Ada Gambar Ditemukan
								@endforelse
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-5 col-12">
					<div class="product-details-content">
						<h3>{{ $product->name }}</h3>
						<div class="details-price">
                            @if(!empty($product->final_price) && $product->final_price < $product->price)
                                <span>
                                    IDR {{ number_format($product->final_price, 0, ",", ".") }}
                                </span>
                                <span class="original-price" style="text-decoration: line-through; color: #a9a9a9;">
                                    IDR {{ number_format($product->price, 0, ",", ".") }}
                                </span>
                            @else
                                <span>
                                    IDR {{ number_format($product->price, 0, ",", ".") }}
                                </span>
                            @endif
                        </div>
						<div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>0    0 Reviews
						</div>

						<!-- <p>{{ $product->short_description }}</p> -->
						 
                        <form action="{{ route('carts.store') }}" method="post">
							@csrf 
							<input type="hidden" name="product_id" value="{{ $product->id }}">
							@if ($product->type == 'configurable')
								<div class="quick-view-select">
									<div class="select-option-part">
										<label>Size*</label>
                                        <select name="size" class="select" id="">
                                            @foreach($sizes as $size)
                                                <option value="{{ $size }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
									</div>
									<div class="select-option-part">
										<label>Color*</label>
										<select name="color" class="select" id="">
                                            @foreach($colors as $color)
                                                <option value="{{ $color }}">{{ $color }}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
							@endif

							<div class="quickview-plus-minus">
								<div class="cart-plus-minus">
									<input type="number" name="qty" value="1" class="cart-plus-minus-box" min="1">
								</div>
								<div class="quickview-btn-cart">
									<button type="submit" class="submit contact-btn btn-hover">Tambahkan Ke Keranjang</button>
								</div>
								<!-- <div class="quickview-btn-wishlist add-to-fav">
									<a class="btn-hover" title="Wishlist"  product-slug="{{ $product->slug }}" href=""><i class="pe-7s-like"></i></a>
								</div> -->
							</div>
                        </form>
						<div class="product-details-cati-tag mt-35">
							<ul>
								<li class="categories-title">Kategori :</li>
								@foreach ($product->categories as $category)
									<li><a href="{{ url('products/category/'. $category->slug ) }}">{{ $category->name }}</a></li>
								@endforeach
							</ul>
							<ul>
								<li class="categories-title">Simpan ke Wishlist :</li>
								<li class="product-list-wishlist">
                                                            <a class="btn-hover list-btn-wishlist add-to-fav" title="Wishlist"  product-slug="{{ $product->slug }}" href="">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
															</li>
							</ul>
						</div>
						
						<div class="product-share">
							<ul>
								<li class="categories-title">Bagikan :</li>
								<li>
									<a href="#">
										<i class="icofont icofont-social-facebook"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icofont icofont-social-twitter"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icofont icofont-social-pinterest"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icofont icofont-social-flikr"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="product-description-review-area pb-90">
		<div class="container">
			<div class="product-description-review text-center">
				<div class="description-review-title nav" role=tablist>
					<a class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
						Deskripsi Produk
					</a>
					<a href="#pro-sho-dec" data-toggle="tab" role="tab" aria-selected="false">
						Indikasi Penggunaan
					</a>
					<!-- <a href="#pro-review" data-toggle="tab" role="tab" aria-selected="false">
						Reviews (0)
					</a> -->
				</div>
				<div class="description-review-text tab-content">
					<div class="tab-pane active show fade" id="pro-dec" role="tabpanel">
						<p>{{ $product->description }} </p>
					</div>
					<div class="tab-pane active show fade" id="pro-sho-dec" role="tabpanel">
						<p>{{ $product->short_description }} </p>
					</div>
					<!-- <div class="tab-pane fade" id="pro-review" role="tabpanel">
						<a href="#">Be the first to write your review!</a>
					</div> -->
				</div>
			</div>
		</div>
	</div>
@endsection