@extends('frontend.layout')

@section('content')

	<div class="shop-page-wrapper shop-page-padding ptb-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3">
					<!-- sidebar -->
                    <div class="shop-sidebar mr-50">
                    <div class="filter-container">
                        <form method="GET" action="{{ url('products')}}">
                            <div class="sidebar-widget mb-50">
                                <h3 class="sidebar-title">Filter</h3>
                                <div class="price_filter">
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <label>price : </label>
                                            <input type="text" id="amount" name="price"  placeholder="Masukan Nominal" style="width:170px" />
                                            <input type="hidden" id="productMinPrice" value="{{ $minPrice }}"/>
                                            <input type="hidden" id="productMaxPrice" value="{{ $maxPrice }}"/>
                                        </div>
                                        <button type="submit">Filter</button> 
                                    </div>
                                </div>
                            </div>
                        </form>

                        @if ($categories)
                            <div class="sidebar-widget mb-45">
                                <h3 class="sidebar-title">Kategori</h3>
                                <div class="sidebar-categories">
                                    <ul>
                                        @foreach ($categories as $category)
                                                <li><a href="{{ url('products?category='. $category->slug) }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        
                        <!-- @if ($colors)
                            <div class="sidebar-widget sidebar-overflow mb-45">
                                <h3 class="sidebar-title">color</h3>
                                <div class="sidebar-categories">
                                    <ul>
                                        @foreach ($colors as $color)
                                            <li><a href="{{ url('products?option='. $color->id) }}">{{ $color->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        @if ($sizes)
                            <div class="sidebar-widget mb-40">
                                <h3 class="sidebar-title">size</h3>
                                <div class="product-size">
                                    <ul>
                                        @foreach ($sizes as $size)
                                            <li><a href="{{ url('products?option='. $size->id) }}">{{ $size->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif -->
                    </div>
                    </div>
                    <!-- end -->
				</div>
				<div class="col-lg-9">
					<div class="shop-product-wrapper res-xl">
						<div class="shop-bar-area">
							<div class="shop-bar pb-60">
								<div class="shop-found-selector">
									<div class="shop-found">
										<!-- <p><span>{{ count($products) }}</span> hasil dari <span>{{ $products->total() }}</span></p> -->
                                        <p><span>{{ count($products) }}</span> result </p>
									</div>
									<div class="shop-selector">
										<label>Berdasarkan : </label>
                                        <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value)" name="sort" id="">
                                            @foreach($sorts as $url => $sort)
                                                <option {{ $selectedSort == $url ? 'selected' : null }} value="{{ $url }}">{{ $sort }}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
								<!-- <div class="shop-filter-tab">
									<div class="shop-tab nav" role=tablist>
										<a class="active" href="#grid-sidebar3" data-toggle="tab" role="tab" aria-selected="false">
											<i class="ti-layout-grid4-alt"></i>
										</a>
										<a href="#grid-sidebar4" data-toggle="tab" role="tab" aria-selected="true">
											<i class="ti-menu"></i>
										</a>
									</div>
								</div> -->
							</div>
							<div class="shop-product-content tab-content">
								<div id="grid-sidebar3" class="tab-pane fade active show">
                                <!-- grid view -->
                                    <div class="row2">
                                        @forelse ($products as $product)
                                            <!-- grid box -->
                                            <div class="col-md-6 col-xl-4">
                                            <div class="product-card2">
                            <div class="product-img2">
                                <a href="{{ url('product/'. $product->slug) }}">
                                    @if ($product->productImages->first())
                                        <img src="{{ Storage::url($product->productImages->first()->path) }}" alt="{{ $product->name }}">
                                    @else
                                        <img src="{{ asset('themes/ezone/assets/img/product/fashion-colorful/1.jpg') }}" alt="{{ $product->name }}">
                                    @endif
                                </a>
                                <div class="product-action">
                                    <button class="quick-view-btn" title="Lihat" product-slug="{{ $product->slug }}">
                                        <i class="pe-7s-look"></i> QUICK VIEW
                                    </button>
                                </div>
                            </div>
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
                                <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>0

                                </div>

                                <button class="add-to-cart-btn">
                                <i class="fas fa-cart-plus"></i> Tambahkan Keranjang
                                </button>
                            </div>
                        </div>
                                        </div>
                                        @empty
Tidak ada Produk Ditemukan                                        @endforelse
                                    </div>
                                    <!-- end -->
								</div>
							</div>
						</div>
					</div>
					<div class="mt-50 text-center">
						{{ $products->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection