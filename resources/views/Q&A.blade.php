@extends('layout')
@section('title', 'Góp ý')
@section('banner')
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="2000">
            <img src="images/collection_banner.jpg" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="images/bong-ro.webp" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="images/slider_1_image.webp" class="d-block w-100" alt="..." />
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection
@section('content')
<div class="container py-4 w-50">
    <h5 class="text-center fw-bold">GÓP Ý</h5>
    <div class="fw-bold text-center">
        Mỗi góp ý từ khách hàng sẽ được xem xét kĩ càng và có thể trở thành
        những thay đổi tại RUNNER
    </div>
    <form class="row">
        <div class="row g-2">
            <label for="" class="fw-bold">Địa chỉ email: <span class="text-danger">*</span></label>
            <input type="text" placeholder="Email" class="form-control" required />
        </div>
        <div class="row g-2">
            <label for="" class="fw-bold">Đánh giá của bạn: <span class="text-danger">*</span></label>
            <div class="row">
                <div class="col-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                        <label class="form-check-label" for="flexRadioDefault1">
                            Rất tệ
                        </label>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked />
                        <label class="form-check-label" for="flexRadioDefault2">
                            Tệ
                        </label>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked />
                        <label class="form-check-label" for="flexRadioDefault3">
                            Bình thường
                        </label>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" checked />
                        <label class="form-check-label" for="flexRadioDefault4">
                            Tốt
                        </label>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5" checked />
                        <label class="form-check-label" for="flexRadioDefault5">
                            Rất tốt
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-2">
            <label for="" class="fw-bold">Nội dung đánh giá: <span class="text-danger">*</span></label>
            <textarea class="form-control" placeholder="Ghi chú" id="exampleFormControlTextarea1" rows="3" required></textarea>
        </div>

        <div class="row g-2 pb-2">
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
        </div>

        <div class="row g-2 pb-2">
            <button type="submit" class="btn btn-outline-dark">




                GỬI PHẢN HỒI
            </button>
        </div>
    </form>
</div>

@endsection