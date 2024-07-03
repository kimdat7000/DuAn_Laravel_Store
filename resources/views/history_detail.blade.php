@extends('layout')
@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="container py-5">
    <h3 class="fw-bold">CHI TIẾT ĐƠN HÀNG</h3>

    @if($cartItems->isNotEmpty())
    <div class="row mb-4">
        <div class="col-md-6">
            <h5>Mã đơn hàng: {{$order->id}}</h5>
            <p>Ngày đặt hàng: {{ date('d/m/Y', strtotime($order->created_at)) }}</p>
            <p>Tên người đặt hàng: {{$order->customer_name}}</p>
            <p>Địa chỉ: {{$order->customer_address}}</p>
            <p>Số điện thoại: {{$order->customer_phone}}</p>
            <p>Email: {{$order->customer_email}}</p>

            <td>
                <p>Trạng thái:
                    @switch($order->status)
                    @case(0)
                    Đang chờ thanh toán
                    @break
                    @case(1)
                    Đang chuẩn bị hàng
                    @break
                    @case(2)
                    Đang giao hàng
                    @break
                    @case(3)
                    Thành công
                    @break
                    @case(4)
                    Hủy đơn hàng
                    @break
                    @default
                    Unknown status
                    @endswitch
                </p>
            </td>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $index => $cartItem)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $cartItem->name }}</td>
                <td>
                    <img src="{{ asset($cartItem->image) }}" alt="{{ $cartItem->name }}" style="width: 100px; height: auto;">
                </td>
                <td>{{ number_format($cartItem->price, 0, ',', '.') }}đ</td>
                <td>{{ $cartItem->quantity }}</td>
                <td>{{ number_format($cartItem->quantity * $cartItem->price, 0, ',', '.') }}đ</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="col-sm-2 pb-4">
        <a href="/history" class="btn btn-outline-dark w-100 fw-bold" style="height: 40px">
            <i class="fa-solid fa-arrow-left"></i> QUAY LẠI
        </a>
    </div>
    @endif
</div>





@endsection