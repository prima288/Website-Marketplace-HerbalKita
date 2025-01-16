@extends('frontend.layout')

@section('content')

<style>
    .shop-page-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 90vh; /* Pastikan halaman penuh layar */
        overflow: hidden; /* Hilangkan scroll */
    }

    .table-content {
        width: 130%; /* Pastikan tabel menyesuaikan lebar */
        max-width: 950px; /* Atur batas maksimal lebar tabel */
        margin: 50px 0 0 200px; /* Atur margin atas untuk naik, margin kiri untuk geser kanan */
        text-align: center; /* Konten tabel rata tengah */
		border-top: none; /* Menghilangkan border atas tabel */

    }

    .table {
        margin: 0 auto; /* Pusatkan tabel */
        width: 100%; /* Tabel menyesuaikan lebar kontainer */
        border-spacing: 50px 10px;
    }

    thead th {
        text-align: center; /* Rata tengah untuk heading tabel */
    }

    tbody td {
        text-align: center; /* Rata tengah untuk isi tabel */
    }
	.table-title {
        font-weight: bold;
        font-size: 22px;
        margin-bottom: 10px; /* Jarak antara judul dan tabel */
        text-align: left; /* Posisi judul di kiri */
        margin-left: 20px; /* Memberikan sedikit jarak ke kiri */
    }
</style>
<div class="shop-page-wrapper shop-page-padding ptb-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3">
					@include('frontend.partials.user_menu')
				</div>
<div class="shop-page-wrapper">
    <div class="table-content table-responsive">
        <table class="table">
		<div class="col-md-20">
       <h4 class="table-title">PESANAN SAYA</h4> <!-- Menambahkan teks di samping form -->
                            </div>
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Total</th>
                    <th>Nomor Resi</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>    
                        <td>
                            {{ $order->code }}<br>
                            <span style="font-size: 12px; font-weight: normal"> {{ date('d M Y', strtotime($order->order_date)) }}</span>
                        </td>
                        <td>Rp{{ number_format($order->grand_total, 0, ",", ".") }}</td>
                        <td>{{ $order->shipment->track_number }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>
                            <a href="{{ url('orders/'. $order->id) }}" class="btn btn-info btn-sm">Detail</a>

							</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Tidak ada Riwayat</td>
                    </tr>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection