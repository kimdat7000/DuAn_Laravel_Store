@extends('layout')
@section('title', 'Sản phẩm yêu thích')

@section('content')
<div class="container py-5">
    <h3 class="fw-bold">SẢN PHẨM YÊU THÍCH</h3>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="d-flex align-items-center border p-3">
                <img src="images/shoes/2-2.jpg" alt="Adidas EQT Cushion ADV" style="width: 100px; height: auto;" class="me-3" />
                <div class="flex-grow-1">
                    <h5 class="card-title mb-1">Adidas EQT Cushion ADV</h5>
                    <p class="card-text mb-0">3,000,000đ</p>
                </div>
                <form method="POST" class="ms-3">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="d-flex align-items-center border p-3">
                <img src="images/shoes/1-1.jpg" alt="Adidas Nmd R1" style="width: 100px; height: auto;" class="me-3" />
                <div class="flex-grow-1">
                    <h5 class="card-title mb-1">Adidas Nmd R1</h5>
                    <p class="card-text mb-0">1,900,000đ</p>
                </div>
                <form method="POST" class="ms-3">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>

        <p class="text-center">Bạn chưa có sản phẩm yêu thích nào.</p>
    </div>
    <div class="col-sm-2 pb-4">
        <a href="#" class="btn btn-outline-dark w-100 fw-bold" style="height: 40px">
            <i class="fa-solid fa-arrow-left"></i> TIẾP TỤC MUA HÀNG
        </a>
    </div>
</div>






@endsection