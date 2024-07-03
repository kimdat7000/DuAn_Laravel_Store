@extends('admin.admin')
@section('title', 'Bill Detail')

@section('content')
<article class="col-sm-10 bg-body-secondary" style="border-radius: 10px; padding: 10px">
    <div class="row">
        <div class="col-6">
            <h3 class="fw-bold py-3">Chi tiết đơn hàng</h3>
        </div>

        <div class="col-6 py-3 text-end">
            <a href="#" class="btn btn-primary">
                <i class="fa-solid fa-download"></i>
                <span class="text">Download PDF</span>
            </a>
        </div>
    </div>

    @if($order)
    <div class="row mb-3">
        <div class="col-md-6">
            <h5>Mã đơn hàng: {{ $order->id }}</h5>
            <p>Ngày đặt hàng: {{ $order->created_at }}</p>
            <p>Tên người đặt hàng: {{ $order->customer_name }}</p>
            <p>Địa chỉ: {{ $order->customer_address }}</p>
            <p>Số điện thoại: {{ $order->customer_phone }}</p>
            <p>Email: {{ $order->customer_email }}</p>
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
    @endif

    <div class="col-sm-12">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->id }}</td>
                    <td>
                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" style="max-width: 100px;" />
                    </td>
                    <td>{{ $item->name }}</td>

                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 0, ',', '.') }}đ</td>
                    <td>{{ number_format($item->quantity * $item->price, 0, ',', '.') }}đ</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</article>
@endsection