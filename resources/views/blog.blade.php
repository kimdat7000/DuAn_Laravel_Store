@extends('layout')
@section('title', 'Tin tức')
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
<div class="container py-4">
    <div class="row">
        <article class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center fw-bold">Bài viết mới nhất</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary pt-3"></h6>
                    <p class="card-text"></p>
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="blog_detail.html"><img src="images/show/new-1.jpg" alt="" width="100%" /></a>
                        </div>
                        <div class="col-sm-8">
                            <p>Adidas Falcon nổi bật mùa Hè với phối màu color block</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <img src="images/show/new-2.jpg" alt="" width="100%" />
                        </div>
                        <div class="col-sm-8">
                            <p>
                                Saucony hồi sinh mẫu giày chạy bộ cổ điển của mình – Aya
                                Runner
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <img src="images/show/new-3.jpg" alt="" width="100%" />
                        </div>
                        <div class="col-sm-8">
                            <p>
                                ANike Vapormax Plus trở lại với sắc tím mộng mơ và thiết kế
                                chuyển màu đẹp mắt
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <aside class="row col-sm-9 bg-light">
            <div class="row blog">
                <h3 class="fw-bold">TIN TỨC</h3>
                <div class="row pb-5">
                    <div class="col-sm-4">
                        <a href="blog_detail.html"><img src="images/show/new-1.jpg" alt="" width="100%" /></a>
                    </div>
                    <div class="col-sm-8">
                        <p>Adidas Falcon nổi bật mùa Hè với phối màu color block</p>
                        <p>Người viết: Kun 14.03.2024</p>
                        <p>
                            Cuối tháng 5, adidas Falcon đã cho ra mắt nhiều phối màu đón
                            chào mùa Hè khiến giới trẻ yêu thích không thôi. Tưởng
                            chừng...
                        </p>
                    </div>
                </div>

                <div class="row pb-5">
                    <div class="col-sm-4">
                        <img src="images/show/new-2.jpg" alt="" width="100%" />
                    </div>
                    <div class="col-sm-8">
                        <p>
                            Saucony hồi sinh mẫu giày chạy bộ cổ điển của mình - Aya
                            Runner
                        </p>
                        <p>Người viết: Kun 14.03.2024</p>
                        <p>
                            Là một trong những đôi giày chạy bộ tốt nhất vào những năm
                            1994, 1995, Saucony Aya Runner vừa có màn trở lại vô cùng
                            ấn...
                        </p>
                    </div>
                </div>

                <div class="row pb-5">
                    <div class="col-sm-4">
                        <img src="images/show/new-3.jpg" alt="" width="100%" />
                    </div>
                    <div class="col-sm-8">
                        <p>
                            Nike Vapormax Plus trở lại với sắc tím mộng mơ và thiết kế
                            chuyển màu đẹp mắt
                        </p>
                        <p>Người viết: Kun 14.03.2024</p>
                        <p>
                            Là một trong những mẫu giày retro có nhiều phối màu gradient
                            đẹp nhất từ trước đến này, Nike Vapormax Plus vừa có màn trở
                            lại...
                        </p>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection