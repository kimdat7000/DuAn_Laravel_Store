@extends('layout')
@section('title', 'Liên hệ')
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
<div class="row p-5 m-0">
    <div class="col-sm-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.487570315718!2d106.62309487480607!3d10.850471989302848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b5e7e759eb7%3A0x7f137d9e06223d79!2zMjI3Ni8yLzEwIFFMMUEsIEtodSBwaOG7kSAyLCBRdeG6rW4gMTIsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1710350126358!5m2!1svi!2s" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="col-sm-6">
        <h3 class="fw-bold">LIÊN HỆ VỚI CHÚNG TÔI</h3>
        <div class="row">
            <div class="col-sm-6 poly-prod">
                <div class="card border-0">
                    <div class="card-body">
                        <h6 class="card-title">
                            <i class="fa-solid fa-store"></i> Hotline: 0347343925
                        </h6>
                        <div class="card-text">
                            <li>Hồ Chí Minh, Việt Nam</li>
                            <li>Email: datkim2k4@gmail.com</li>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên</label>
            <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="" />
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" />
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <bu tton type="submit" class="btn btn-secondary">GỬI</button>
    </div>
</div>
@endsection