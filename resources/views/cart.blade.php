@extends('layout')
@section('title', 'Giỏ hàng')

@section('content')
<div class="container py-5">
    <h3 class="fw-bold">GIỎ HÀNG</h3>
    <div class="row">
        <div class="col-sm-8 text-center d-flex justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Hình</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $index => $showcart)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <img src="{{ $showcart['img'] }}" alt="" style="width: 100px" />
                        </td>
                        <td>{{ $showcart['name'] }}</td>
                        <td>{{ number_format($showcart['price'], 0, ',', '.') }}đ</td>
                        <td>
                            <div class="input-group w-50 mx-auto">
                                <button type="button" class="btn btn-outline-secondary square-btn" id="minus-btn">
                                    -
                                </button>
                                <input type="text" class="form-control text-center square-btn" aria-label="Số lượng" value="{{ $showcart['quantity'] }}" />
                                <button type="button" class="btn btn-outline-secondary square-btn" id="plus-btn">
                                    +
                                </button>
                            </div>
                        </td>
                        <td>
                            <form action="{{ route('removeFromCart', ['id' => $showcart['id_product']]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link"><i class="fa-regular fa-circle-xmark"></i></button>
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header fw-bold">CỘNG GIỎ HÀNG</div>
                <div class="card-body">
                    <div class="row">
                        <h6 class="col-sm-4 fw-bold">Tạm tính:</h6>
                        <p class="col-sm-8 text-end">{{ number_format($totalAmount), 0, ',', '.'}} đ</p>
                    </div>
                    <div class="row">
                        <h6 class="col-sm-4 fw-bold">Giao hàng:</h6>
                        <p class="col-sm-8 text-end">
                            Tiêu chuẩn (3-4 ngày): 35,000₫ Tùy chọn giao hàng sẽ được cập
                            nhật trong quá trình thanh toán.
                        </p>
                    </div>
                    <!-- <div class="col-sm-12 input-group mb-3">
                        <input type="text" class="form-control" placeholder="Mã giảm giá" aria-label="Mã giảm giá" aria-describedby="button-addon2" />
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                            Áp dụng
                        </button>
                    </div> -->

                    <div class="row">
                        <h6 class="col-sm-4 fw-bold">Giảm:</h6>
                        <p class="col-sm-8 text-end">0đ</p>
                    </div>
                    <hr />
                    <div class="row">
                        <h6 class="col-sm-6 fw-bold">Thành tiền:</h6>
                        <p class="col-sm-6 text-end">{{ number_format($totalAmount + 35000), 0, ',', '.' }} đ</p>
                    </div>
                    <div class="col-sm-12 pb-4">
                        <button class="w-100 fw-bold text-bg-dark" style="height: 40px">
                            <a href="/cart_detail" class="text-decoration-none text-white">
                                TIẾN HÀNH THANH TOÁN</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2 pb-4">
        <a href="/" class="btn btn-outline-dark w-100 fw-bold" style="height: 40px">
            <i class="fa-solid fa-arrow-left"></i> TIẾP TỤC MUA HÀNG
        </a>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const minusBtn = document.getElementById('minus-btn');
        const plusBtn = document.getElementById('plus-btn');
        const quantityInput = document.querySelector('input[name="quantity"]');

        minusBtn.addEventListener('click', function() {
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = quantity - 1;
            }
        });
        plusBtn.addEventListener('click', function() {
            let
                quantity = parseInt(quantityInput.value);
            qua
            nti
            tyI
            npu
            t.value = quantity + 1;
        });

    });
</script>
@endsection