@extends('layout.homelayout')
@section('content')
    <main id="main" class="main mt-20">
        {{-- <div class="alert alert-success alert-dismissible fade show">
            <strong>Success!</strong> {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div> --}}
        <section class="checkout-wrapper pt-50">
            <div class="container">
                <div class="row mb-50">
                    <div class="col-lg-12">
                        <h3>CHI TIẾT ĐƠN HÀNG</h3>
                        <br>
                        <div class="checkout-style-1 ">
                            <div class="checkout-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($order_details))
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($order_details as $order)
                                                @php
                                                    $subtotal = $order->product_price * $order->product_sales_quantity;
                                                    $total += $subtotal;
                                                @endphp
                                                <tr>
                                                    <td><img src="{{ asset('upload/productImage/' . $order->product_image) }}" alt=""
                                                            width="100" height="100"></td>
                                                    <td>{{ $order->product_name }}</td>
                                                    <td>{{ $order->product_sales_quantity }}</td>
                                                    <td>{{ number_format($order->product_price) }}</td>


                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
