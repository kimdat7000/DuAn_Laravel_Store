@extends('layout')
@section('title', 'Giới thiệu')
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
                    <h6 class="card-subtitle mb-2 text-body-secondary pt-3"></h6>
                    <p class="card-text">
                        <img src="images/show/introduce.jpg" alt="" width="100%" />
                    </p>
                </div>
            </div>
        </article>

        <aside class="row col-sm-9 bg-light">
            <div class="row blog">
                <h3 class="fw-bold">GIỚI THIỆU</h3>
                <div class="row pb-5">
                    <p>
                        Adidas là một trong những thương hiệu hàng đầu thế giới về thể
                        thao và thời trang. Được thành lập vào năm 1949 bởi Adolf "Adi"
                        Dassler ở Herzogenaurach, Đức, Adidas nhanh chóng trở thành một
                        biểu tượng trong ngành công nghiệp giày dép và quần áo thể thao.
                    </p>
                    <p>
                        Sự đổi mới và thiết kế tiên tiến đã giúp Adidas đạt được sự phát
                        triển mạnh mẽ. Từ việc tạo ra những đôi giày chạy bộ phục vụ cho
                        các vận động viên đến việc thúc đẩy phong cách thời trang đường
                        phố, Adidas luôn đứng đầu trong việc định hình xu hướng thế giới
                        thể thao và thời trang.
                    </p>
                    <p>
                        Ngoài ra, Adidas cũng nổi tiếng với các đối tác và những hợp tác
                        đặc biệt trong ngành công nghiệp. Họ là nhà tài trợ cho nhiều
                        đội thể thao hàng đầu thế giới, từ bóng đá đến bóng rổ và
                        tennis. Các biểu tượng của thế giới thể thao như Lionel Messi,
                        James Harden, và Naomi Osaka đều là đại sứ thương hiệu của
                        Adidas.
                    </p>
                    <p>
                        Không chỉ là một thương hiệu, Adidas còn chú trọng vào việc bảo
                        vệ môi trường và cộng đồng. Họ đã thúc đẩy các sáng kiến bền
                        vững và cung cấp các sản phẩm và dịch vụ xã hội để giúp cải
                        thiện cuộc sống của người tiêu dùng và cộng đồng nơi họ hoạt
                        động.
                    </p>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection