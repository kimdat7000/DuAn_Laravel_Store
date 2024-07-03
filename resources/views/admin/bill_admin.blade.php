@extends('admin.admin')
@section('title', 'Bills')

@section('content')
<article class="col-sm-10 bg-body-secondary" style="border-radius: 10px; padding: 10px">
    <div class="row">
        <div class="col-6">
            <h3 class="fw-bold py-3">Đơn hàng</h3>
        </div>

        <div class="col-6 py-3 text-end">
            <a href="#" class="btn btn-primary">
                <i class="fa-solid fa-download"></i>
                <span class="text">Download PDF</span>
            </a>
        </div>
    </div>

    <div class="col-sm-12">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">STT <i class="fa-solid fa-sort"></i></th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Tổng đơn hàng</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Phương thức</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $order->customer_email }}</td>
                    <td>{{ $order->customer_phone }}</td>
                    <td>{{ number_format($order->total_amount, 0, ',', '.') }}đ</td>
                    <td>
                        <form method="POST" action="{{ route('update_status', $order->id) }}">
                            @csrf
                            @method('PUT')
                            <select name="status" id="status" class="form-select" onchange="this.form.submit()">
                                <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Đang chờ thanh toán
                                </option>
                                <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Đang chuẩn bị hàng
                                </option>
                                <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Đang giao hàng</option>
                                <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Thành công</option>
                                <option value="4" {{ $order->status == 4 ? 'selected' : '' }}>Hủy đơn hàng</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        @if($order->payment_method == 'vnpay')
                        <img src="images/cart/VNpay.png" alt="VNPay" width="40px" height="40px">
                        @elseif($order->payment_method == 'momo')
                        <img src="images/cart/momo.png" alt="MoMo" width="40px" height="40px">
                        @elseif($order->payment_method == 'zalopay')
                        <img src="images/cart/zalopay.png" alt="ZaloPay" width="40px" height="40px">
                        @elseif($order->payment_method == 'cod')
                        <img src="images/cart/cod.jpg" alt="COD" width="40px" height="40px">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('bill_detail', $order->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center py-5">
            <!-- Pagination or additional content -->
        </div>

    </div>
</article>


@endsection