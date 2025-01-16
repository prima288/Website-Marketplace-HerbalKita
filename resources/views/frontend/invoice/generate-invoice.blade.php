<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - Pesanan #{{ $order->code }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container-fluid {
            width: 100%;
            padding: 0 15px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .col-lg-9 {
            flex: 0 0 75%;
            max-width: 75%;
            padding: 20px;
        }
        h2 {
            color: #333;
            font-weight: 600;
        }
        .pt-5 {
            padding-top: 3rem;
        }
        .mb-2 {
            margin-bottom: 10px;
        }
        .text-dark {
            color: #333;
        }
        address {
            font-style: normal;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .item-attributes {
            list-style-type: none;
            padding: 0;
        }
        .item-attributes li {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <div class="shop-page-wrapper shop-page-padding ptb-100">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-9">
                    <h2 class="text-dark font-weight-medium">ID Pesanan #{{ $order->code }}</h2>
                    
                    <div class="row pt-5">
                        <div class="col-xl-4 col-lg-4">
                            <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Billing Address</p>
                            <address>
                                {{ $order->customer_first_name }} {{ $order->customer_last_name }}
                                <br> {{ $order->customer_address1 }}
                                <br> {{ $order->customer_address2 }}
                                <br> Email: {{ $order->customer_email }}
                                <br> Nomor Telpon: {{ $order->customer_phone }}
                                <br> Kode Pos: {{ $order->customer_postcode }}
                            </address>
                        </div>
                        @if ($order->shipment)
                        <div class="col-xl-4 col-lg-4">
                            <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Shipment Address</p>
                            <address>
                                {{ $order->shipment->first_name }} {{ $order->shipment->last_name }}
                                <br> {{ $order->shipment->address1 }}
                                <br> {{ $order->shipment->address2 }}
                                <br> Email: {{ $order->shipment->email }}
                                <br> Nomor Telepon: {{ $order->shipment->phone }}
                                <br> Kode Pos: {{ $order->shipment->postcode }}
                            </address>
                        </div>
                        @endif
                        <div class="col-xl-4 col-lg-4">
                            <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
                            <address>
                                ID: <span class="text-dark">#{{ $order->code }}</span>
                                <br> {{ date('d M Y', strtotime($order->order_date)) }}
                                <br> Status: {{ $order->status }} {{ $order->isCancelled() ? '('. date('d M Y', strtotime($order->cancelled_at)) .')' : null}}
                                @if ($order->isCancelled())
                                <br> Cancellation Note : {{ $order->cancellation_note}}
                                @endif
                                <br> Status Pembayaran: {{ $order->payment_status }}
                                <br> Dikirim Oleh: {{ $order->shipping_service_name }}
                            </address>
                        </div>
                    </div>

                    <!-- Order Items Table -->
                    <div class="table-content table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah</th>
                                    <th>Harga per-item</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                    function showAttributes($jsonAttributes)
                                    {
                                        $jsonAttr = (string) $jsonAttributes;
                                        $attributes = json_decode($jsonAttr, true);
                                        $showAttributes = '';
                                        if ($attributes) {
                                            $showAttributes .= '<ul class="item-attributes">';
                                            foreach ($attributes as $key => $attribute) {
                                                if(count($attribute) != 0){
                                                    foreach($attribute as $value => $attr){
                                                        $showAttributes .= '<li>'.$value . ': <span>' . $attr . '</span><li>';
                                                    }
                                                }else {
                                                    $showAttributes .= '<li><span> - </span></li>';
                                                }
                                            }
                                            $showAttributes .= '</ul>';
                                        }
                                        return $showAttributes;
                                    }
                                @endphp
                                @forelse ($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->sku }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{!! showAttributes($item->attributes) !!}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ number_format($item->base_price, 0, ",", ".") }}</td>
                                    <td>{{ number_format($item->sub_total, 0, ",", ".") }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">Pesanan tidak Ada!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
