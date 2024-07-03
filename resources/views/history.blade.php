@extends('layout')
@section('title', 'Lịch sử mua hàng')

@section('content')
<div class="container py-5">
    <h3 class="fw-bold">LỊCH SỬ MUA HÀNG</h3>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $index => $order)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at}}</td>
                        <td>{{ number_format($order->total_amount, 0, ',', '.') }}đ</td>
                        <td>
                            @if($order->status == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="fas fa-box"></i> Đang chờ thanh toán
                            </span>
                            @elseif($order->status == 1)
                            <span class="badge bg-info text-dark">
                                <i class="fas fa-truck-loading"></i> Đang chuẩn bị hàng
                            </span>
                            @elseif($order->status == 2)
                            <span class="badge bg-primary text-light">
                                <i class="fas fa-shipping-fast"></i> Đang giao hàng
                            </span>
                            @elseif($order->status == 3)
                            <span class="badge bg-success text-light">
                                <i class="fas fa-check"></i> Thành công
                            </span>
                            @elseif($order->status == 4)
                            <span class="badge bg-danger text-light">
                                <i class="fas fa-times"></i> Hủy đơn hàng
                            </span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-outline-secondary">
                                <a href="{{ route('history_detail',  $order->id)}}" class="text-decoration-none text-dark">Xem</a>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-2 pb-4">
        <a class="btn btn-outline-dark w-100 fw-bold" style="height: 40px">
            <i class="fa-solid fa-arrow-left"></i> TIẾP TỤC MUA HÀNG
        </a>
    </div>
</div>

@endsection