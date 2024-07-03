@extends('layout')
@section('title', 'Sản phẩm chi tiết')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-sm-2">
            <fieldset>
                <img class="img-thumbnail w-50 mb-2" src="{{asset ($Product->img) }}" alt="{{ $Product->name }}" />
                <img class="img-thumbnail w-50 mb-2" src="{{asset ($Product->img) }}" alt="{{ $Product->name }}" />
                <img class="img-thumbnail w-50 mb-2" src="{{asset ($Product->img) }}" alt="{{ $Product->name }}" />
                <img class="img-thumbnail w-50 mb-2" src="{{asset ($Product->img) }}" alt="{{ $Product->name }}" />
            </fieldset>
        </div>
        <div class="col-sm-10">
            <div class="row">
                <img class="col-sm-5" src="{{asset ($Product->img) }}" alt="{{ $Product->name }}" />
                <div class="col-sm-7">
                    <form action="{{ route('addToCart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_product" value="{{ $Product->id }}">

                        <h4 class="fw-bold pb-2">{{ $Product->name }}</h4>
                        <h6 class="fw-bold pb-2">{{ number_format($Product->price, 0, ',', '.') }}đ</h6>

                        <div class="row col-12 pb-5">
                            <h6 class="col-sm-auto fw-bold my-auto">Số lượng:</h6>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary square-btn" id="minus-btn">
                                        -
                                    </button>
                                    <input type="text" class="form-control text-center square-btn" name="quantity" aria-label="Số lượng" value="1" />
                                    <button type="button" class="btn btn-outline-secondary square-btn" id="plus-btn">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-evenly pb-3">
                            <div class="col-6">
                                <button type="submit" class="w-100 fw-bold text-bg-dark" style="height: 40px">
                                    THÊM VÀO GIỎ HÀNG
                                </button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="w-100 fw-bold text-bg-danger" style="height: 40px">
                                    MUA NGAY
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="accordion pb-2" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Mô tả sản phẩm
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {!! $Product->description !!}
                    </div>
                </div>
            </div>
        </div>
        <h5 class="py-2 fw-bold">ĐÁNH GIÁ SẢN PHẨM</h5>
        <div class="card">
            <div class="row py-4 card-header">
                <div class="col-sm-2">
                    <div class="text-danger">
                        <h5 class="card-title"><span class="fs-2">5.0</span> trên 5</h5>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <div class="col-sm-10">
                    <button type="button" class="btn btn-light text-dark border-danger">
                        Tất cả
                    </button>
                    <button type="button" class="btn btn-light text-dark">
                        5 Sao
                    </button>
                    <button type="button" class="btn btn-light text-dark">
                        4 Sao
                    </button>
                    <button type="button" class="btn btn-light text-dark">
                        3 Sao
                    </button>
                    <button type="button" class="btn btn-light text-dark">
                        2 Sao
                    </button>
                    <button type="button" class="btn btn-light text-dark">
                        1 Sao
                    </button>
                    <button type="button" class="btn btn-light text-dark">
                        Có bình luận
                    </button>
                    <button type="button" class="btn btn-light text-dark">
                        Có hình ảnh / Video
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row pt-4">
                    <div class="col-2">
                        <div class="text-center">
                            <img src="images/user.png" alt="" />
                            <h6>Nguyễn Kim Đạt</h6>
                            <div class="text-danger">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span class="fs-6">2024-03-17 15:00</span>
                        </div>
                    </div>
                    <div class="col-8 text-start">
                        <p>
                            Sản phẩm tốt, ổn áp trong tầm giá như vậy, mình đã mua ở rất
                            nhiều nơi rồi mà không nơi nào làm mình hài lòng như nơi này
                            cả
                        </p>
                    </div>
                </div>
                <hr />
                <div class="row pt-4">
                    <div class="col-2">
                        <div class="text-center">
                            <img src="images/user.png" alt="" />
                            <h6>Người dùng</h6>
                            <div class="text-danger">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span class="fs-6">2024-03-17 15:00</span>
                        </div>
                    </div>
                    <div class="col-8 text-start">
                        <p>
                            Hàng chất lượng đảm bảo, giá cả phải chăng hợp với túi tiền.
                            ship hàng nhanh chóng. Em rất hài lòng về sp của shop sẽ tiếp
                            tục ủng hộ dài dài. Chúc shop bán hàng may mắn 🤗🤗
                        </p>
                    </div>
                </div>

                <div class="d-flex justify-content-center py-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <h6 class="text-center fw-bold pt-5">SẢN PHẨM LIÊN QUAN</h6>
    <div class="col-12 d-flex justify-content-center pb-5">
        <div class="row w-75">
            @foreach($newProducts as $product)
            <div class="col-sm-3 poly-prod text-pro mb-4">
                <div class="card border-0 h-100">
                    <a href="{{ route('product_detail', ['id' => $product->id]) }}"><img src="{{ $product->img }}" class="card-img-top" alt="{{ $product->name }}" /></a>
                    <div class="card-body border-top-0 text-center bg-light p-2">
                        <h6 class="card-title text-start">{{ $product->name }}</h6>
                        <div class="card-text text-end">{{ number_format($product->price, 0, ',', '.') }} đ</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
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
            let quantity = parseInt(quantityInput.value);
            quantityInput.value = quantity + 1;
        });



    });
</script>
@endsection