@extends('admin.admin')
@section('title', 'ADMIN')

@section('content')
<article class="col-sm-10 bg-body-secondary" style="border-radius: 10px">
    <h3 class="fw-bold py-3 text-center">BẢNG ĐIỀU KHIỂN</h3>
    <div class="dashboard row text-center">
        <div class="col-sm-3 bg-warning-subtle p-3">
            <i class="fa-solid fa-user-plus"></i>
            <div class="row p-2">
                <div class="col-6 text-start">
                    <h6>Người dùng mới</h6>
                </div>
                <div class="col-6 text-end">
                    <h6 class="fw-bold">1304</h6>
                </div>
            </div>
        </div>

        <div class="col-sm-3 bg-danger-subtle p-3">
            <i class="fa-solid fa-cart-plus"></i>
            <div class="row p-2">
                <div class="col-6 text-start">
                    <h6>Đơn hàng</h6>
                </div>
                <div class="col-6 text-end">
                    <h6 class="fw-bold">189</h6>
                </div>
            </div>
        </div>

        <div class="col-sm-3 bg-success-subtle p-3">
            <i class="fa-solid fa-comments"></i>
            <div class="row p-2">
                <div class="col-6 text-start">
                    <h6>Bình luận</h6>
                </div>
                <div class="col-6 text-end">
                    <h6 class="fw-bold">423</h6>
                </div>
            </div>
        </div>

        <div class="col-sm-3 bg-info-subtle p-3">
            <i class="fa-solid fa-hand-holding-dollar"></i>
            <div class="row p-2">
                <div class="col-6 text-start">
                    <h6>Doanh thu</h6>
                </div>
                <div class="col-6 text-end">
                    <h6 class="fw-bold">132,000,000đ</h6>
                </div>
            </div>
        </div>
    </div>
    <h5 class="text-center pt-5 fw-bold">BIỂU ĐỒ THỐNG KÊ</h5>
    <div class="row py-5">
        <div class="col-4">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        <div class="col-4">
            <canvas id="myPieChart" width="400" height="400"></canvas>
        </div>
        <div class="col-4">
            <canvas id="userChart" width="400" height="400"></canvas>
        </div>
    </div>
</article>
@endsection