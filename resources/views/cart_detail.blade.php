@extends('layout')
@section('title', 'Giỏ hàng chi tiết')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-sm-6">
            <h5 class="fw-bold">THANH TOÁN VÀ GIAO HÀNG</h5>
            <hr />
            <form class="row" action="{{ route('payment') }}" method="POST">
                @csrf
                @if(Auth::user())
                <div class="row g-2">
                    <label for="customer_name" class="fw-bold">Họ và tên: <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Họ và tên" name="customer_name" class="form-control" value="{{ Auth::user()->name }}" required />
                </div>

                <div class="row g-2">
                    <label for="customer_address" class="fw-bold">Địa chỉ: <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Địa chỉ" name="customer_address" class="form-control" value="{{ Auth::user()->address }}" required />
                </div>

                <div class="row g-2">
                    <label for="customer_phone" class="fw-bold">Số điện thoại: <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Số điện thoại" name="customer_phone" class="form-control" value="{{ Auth::user()->phone }}" required />
                </div>

                <div class="row g-2">
                    <label for="customer_email" class="fw-bold">Địa chỉ email: <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Email" class="form-control" name="customer_email" value="{{ Auth::user()->email }}" required />
                </div>

                <div class="row g-2">
                    <h5 class="fw-bold">THÔNG TIN BỔ SUNG ( ghi chú đơn hàng )</h5>
                    <textarea class="form-control" placeholder="Ghi chú" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="accordion row g-2" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Thông tin người nhận khác
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row g-2">
                                    <label for="receiver_name" class="fw-bold">Họ và tên người nhận: <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Họ và tên" name="receiver_name" class="form-control" />
                                </div>

                                <div class="row g-2">
                                    <label for="receiver_address" class="fw-bold">Địa chỉ người nhận: <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Địa chỉ" name="receiver_address" class="form-control" />
                                </div>

                                <div class="row g-2">
                                    <label for="receiver_phone" class="fw-bold">Số điện thoại người nhận: <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Số điện thoại" name="receiver_phone" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row g-2">
                    <label for="receiver_name" class="fw-bold">Họ và tên: <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Họ và tên" name="receiver_name" class="form-control" required />
                </div>

                <div class="row g-2">
                    <label for="receiver_address" class="fw-bold">Địa chỉ: <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Địa chỉ" name="receiver_address" class="form-control" required />
                </div>

                <div class="row g-2">
                    <label for="receiver_phone" class="fw-bold">Số điện thoại: <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Số điện thoại" name="receiver_phone" class="form-control" required />
                </div>

                <div class="row g-2">
                    <h5 class="fw-bold">THÔNG TIN BỔ SUNG ( ghi chú đơn hàng )</h5>
                    <textarea class="form-control" placeholder="Ghi chú" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>


                @endif
                <input type="hidden" name="payment_method" id="payment_method" value="cod">
        </div>
        <div class="col-sm-6">
            <h5 class="fw-bold text-center">ĐƠN HÀNG CỦA BẠN</h5>
            <div class="card">
                <div class="card-body">
                    @foreach($cart as $index => $showcart)
                    <div class="row">
                        <img class="col-sm-2" src="{{ $showcart['img'] }}" alt="" width="25px" />
                        <div class="col-sm-5 d-flex justify-content-between">
                            <p class="mb-0">{{ $showcart['name'] }}</p>
                            <p class="mb-0">x{{ $showcart['quantity'] }}</p>
                        </div>
                        <div class="col-sm-5 text-end">
                            <p class="mb-0">{{ number_format($showcart['price'], 0, ',', '.') }} đ</p>
                        </div>
                    </div>
                    <br>
                    @endforeach
                    <div class="row">
                        <h6 class="col-sm-4 fw-bold">Tạm tính:</h6>
                        <p class="col-sm-8 text-end">{{ number_format($totalAmount, 0, ',', '.') }} đ</p>
                    </div>
                    <div class="row">
                        <h6 class="col-sm-4 fw-bold">Giao hàng:</h6>
                        <p class="col-sm-8 text-end">Tiêu chuẩn (3-4 ngày): <span class="fw-bold">35,000₫</span></p>
                    </div>
                    <div class="row">
                        <h6 class="col-sm-4 fw-bold">Giảm:</h6>
                        <p class="col-sm-8 text-end">0đ</p>
                    </div>
                    <hr />
                    <div class="row">
                        <h6 class="col-sm-6 fw-bold">Thành tiền:</h6>
                        <p class="col-sm-6 text-end">{{ number_format($totalAmount + 35000, 0, ',', '.') }} đ</p>
                    </div>
                    <div class="row px-5">
                        <div class="col-sm-3">
                            <div class="payment-option" data-payment-method="vnpay">
                                <img src="images/cart/VNpay.png" alt="Vnpay" width="40px" height="40px" />
                                <i class="fa fa-check checkmark" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="payment-option" data-payment-method="momo">
                                <img src="images/cart/momo.png" alt="MoMo" width="40px" height="40px" />
                                <i class="fa fa-check checkmark" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="payment-option" data-payment-method="zalopay">
                                <img src="images/cart/zalopay.png" alt="ZaloPay" width="40px" height="40px" />
                                <i class="fa fa-check checkmark" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="payment-option" data-payment-method="cod">
                                <img src="images/cart/cod.jpg" alt="COD" width="40px" height="40px" />
                                <i class="fa fa-check checkmark" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 pb-4">
                    <button type="submit" class="w-100 fw-bold text-bg-dark" style="height: 40px">THANH TOÁN</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const paymentOptions = document.querySelectorAll('.payment-option');
        paymentOptions.forEach(option => {
            option.addEventListener('click', function() {
                paymentOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                const selectedPaymentMethod = this.getAttribute('data-payment-method');
                document.getElementById('payment_method').value = selectedPaymentMethod;






                console.log('Selected payment method:', selectedPaymentMethod);
            });
        });



        // Thêm sự kiện click cho nút Thanh toán
        const paymentButton = document.getElementById('payment_button');
        paymentButton.addEventListener('click', function() {
            const selectedPaymentMethod = document.getElementById('payment_method').value;
            if (selectedPaymentMethod === 'momo') {
                // Gọi phương thức Momo() khi chọn MoMo và nhấn nút Thanh toán
                Momo();
            }
        });
    });
</script>