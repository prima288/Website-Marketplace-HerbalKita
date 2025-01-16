@extends('frontend.layout')

@section('content')
	<!-- header end -->

	<!-- shopping-cart-area start -->
	<div class="cart-main-area pt-95 pb-100">
		<div class="container">
			@if(session()->has('message'))
				<div class="content-header mb-0 pb-0">
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
			<div class="row mt-3">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="cart-heading">Keranjang</h1>
					<form action="">
						<div class="table-content table-responsive">
							<table>
								<thead>
									<tr>
										<th>PRODUCT</th>
										<th></th>
										<th>PRICE</th>
										<th>QTY</th>
										<th>SUBTOTAL</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@forelse ($items as $item)
										@php
											$product = isset($item->model->parent) ? $item->model->parent : $item->model;
											$image = !empty($product->productImages->first()) ? asset('storage/'.$product->productImages->first()->path) : asset('themes/ezone/assets/img/cart/3.jpg');
										@endphp
										<tr>
											
											<td class="product-thumbnail">
												<a href="{{ url('product/'. $product->slug) }}"><img src="{{ $image }}" alt="{{ $product->name }}" style="width:100px"></a>
											</td>
											<td class="product-name"><a href="{{ url('product/'. $product->slug) }}">{{ $item->name }}</a></td>
											@php
											$finalPrice = $product->final_price ?? $product->price;
											@endphp

											<td class="product-price-cart">
												<span class="amount">IDR {{ number_format($finalPrice, 0, ",", ".") }},00</span>
											</td>
											<td class="product-quantity">
											<div class="quantity d-flex align-items-center">
												<button class="btn-qty decrease" data-productid="{{ $item->rowId }}">-</button>
												<input
													type="text"
													class="form-control text-center qty-input"
													value="{{ $item->qty }}"
													data-productid="{{ $item->rowId }}"
													readonly
													style="width: 50px;"
												/>
												<button class="btn-qty increase" data-productid="{{ $item->rowId }}">+</button>
											</div>
										</td>

										<td class="product-subtotal">IDR {{ number_format($finalPrice * $item->qty, 0, ",", ".") }},00</td>

											<td class="product-remove">
												<a href="{{ url('carts/remove/'. $item->rowId)}}" class="delete"><i class="pe-7s-trash"></i></a>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="6">Keranjang Kosong!</td>
										</tr>
									@endforelse
								</tbody>
							</table>
						</div>
						<!-- <div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="coupon-all">
									<div class="coupon2">
										<input class="button" name="update_cart" value="Update cart" type="submit">
									</div>
								</div>
							</div>
						</div> -->
						<div class="row">
							<div class="col-md-5 ml-auto">
								<div class="cart-page-total">
									<h2>Total Keranjang</h2>
									@php
									$total = 0;
									foreach ($items as $item) {
										$product = isset($item->model->parent) ? $item->model->parent : $item->model;
										$finalPrice = $product->final_price ?? $product->price;
										$total += $finalPrice * $item->qty;
									}
									@endphp
									<ul>
										<li>Total<span>IDR {{ number_format($total, 0, ",", ".") }}</span></li>
									</ul>


									<a href="{{ url('orders/checkout') }}">Checkout</a>
								</div>
							</div>
						</div>
                        </form>
				</div>
			</div>
		</div>
	</div>
	<!-- shopping-cart-area end -->
@endsection

@push('script-alt')
<script>
	$(document).on("change", function (e) {
		var qty = e.target.value;
		var productId = e.target.attributes['data-productid'].value;

        $.ajax({
            type: "POST",
            url: "/carts/update",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                productId,
                qty
            },
            success: function (response) {
				location.reload(true);
				Swal.fire({
                        title: "Jumlah Produk",
                        text: "Berhasil di ganti !",
                        icon: "success",
                        confirmButtonText: "Close",
                    });
            },
        });
    });
</script>
@endpush