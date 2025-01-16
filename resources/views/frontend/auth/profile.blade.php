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
                            </div><!-- /.container-fluid -->
                        </div>
                    @endif


					<div class="login"  style="margin-left: 250px">
					<div class="row">
                            <div class="col-md-7">
                                <h4 class="font-weight-bold mb-4">INFORMASI AKUN</h4> <!-- Menambahkan teks di samping form -->
                            </div>
                            <div class="col-md-10">
						<div class="login-form-container";>
							<div class="login-form">
                                    <form action="{{ url('profile') }}" method="post">
									@csrf
                                    @method('put')

									<div class="form-group row">
										<div class="col-md-10">
                                            <div class="checkout-form-list">
                                                <label>NAMA DEPAN <span class="required">*</span></label>										
                                                <input type="text" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}">
                                            </div>
											@error('first_name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-10">
                                            <div class="checkout-form-list">
                                                <label>NAMA BELAKANG <span class="required">*</span></label>										
                                                <input type="text" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}">
                                            </div>
                                            @error('last_name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-10">
                                            <div class="checkout-form-list">
                                                <label>ALAMAT <span class="required">*</span></label>
                                                <input type="text" name="address1" value="{{ old('address1') }}">
                                            </div>
                                            @error('address1')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-10">
                                            <div class="checkout-form-list">
                                                <input type="text" name="address2" value="{{ old('address2', auth()->user()->address2) }}">
                                            </div>
                                            @error('address2')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-10">
                                            <label>PROVINSI<span class="required">*</span></label>
                                            <select name="province_id" id="shipping-province">
                                                @foreach($provinces as $id => $province)
                                                    <option value="{{ $id }}">{{ $province }}</option>
                                                @endforeach
                                            </select>
                                            @error('province_id')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-10">
                                            <label>KOTA<span class="required">*</span></label>
                                            <select name="city_id" id="city_id">
                                                @foreach($cities as $id => $city)
                                                    <option value="{{ $id }}">{{ $city }}</option>
                                                @endforeach
                                            </select>
                                            @error('city_id')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-10">
                                            <div class="checkout-form-list">
                                                <label>KODE POS<span class="required">*</span></label>										
                                                <input type="text" name="postcode" value="{{ old('postcode', auth()->user()->postcode) }}">
                                            </div>
                                            @error('postcode')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-10">
                                            <div class="checkout-form-list">
                                                <label>NOMOR WHATSAPP  <span class="required">*</span></label>										
                                                <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
                                            </div>
											@error('phone')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-10">
                                            <input type="email" value="{{ old('email', auth()->user()->email) }}" class="form-control" placeholder="Email">
											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="button-box">
										<button type="submit" class="default-btn floatright">SIMPAN</button>
									</div>
								</form>
							</div>
						</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- register-area end -->
@endsection