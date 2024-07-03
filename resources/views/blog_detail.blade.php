@extends('layout')
@section('title', 'Tin tức')
@section('banner')
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
                            <img src="Public/images/show/new-1.jpg" alt="" width="100%" />
                        </div>
                        <div class="col-sm-8">
                            <p>Adidas Falcon nổi bật mùa Hè với phối màu color block</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <img src="Public/images/show/new-2.jpg" alt="" width="100%" />
                        </div>
                        <div class="col-sm-8">
                            <p>
                                Saucony hồi sinh mẫu giày chạy bộ cổ điển của mình – Aya Runner
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <img src="Public/images/show/new-3.jpg" alt="" width="100%" />
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
                    <div class="col-sm-12">
                        <img src="Public/images/show/new-1.jpg" class="pb-2" alt="" width="100%" />
                        <h4 class="fw-bold">
                            Adidas Falcon nổi bật mùa Hè với phối màu color block
                        </h4>
                        <p class="fw-bold">Người viết: Kun 14.03.2024</p>
                        <p>
                            Cuối tháng 5, adidas Falcon đã cho ra mắt nhiều phối màu đón chào
                            mùa Hè khiến giới trẻ yêu thích không thôi. Tưởng chừng thương
                            hiệu sẽ tiếp tục theo đuổi phong cách ombre cho hàng loạt mối màu
                            nối tiếp, nhưng không, lần này thiết kế Falcon còn rực rỡ hơn
                            trước.
                        </p>
                        <p>
                            Từ lúc ra mắt đến nay, đôi Falcon luôn gắng với những sắc màu nhạt
                            mang phong cách retro. Nhưng gần đây, nhà “3 sọc” rất siêng năng
                            trình làng nhiều phối màu sử dụng tông sắc nổi bật hơn. Đôi
                            sneakers đang ngày càng nhận được nhiều sự quan tâm nhờ diện mạo
                            chunky đậm chất retro. Để đón chào mùa Hè, thương hiệu cho ra mắt
                            hai phối màu áp dụng phong cách color block vô cùng bắt mắt.
                        </p>
                        <p>
                            Mỗi thiết kế đều sử dụng chất liệu da trơn, da lộn và lưới mesh
                            quen thuộc. Mỗi lớp layers được tạo nên từ nhiều sắc màu nóng, nổi
                            bật hơn. Đây cũng là lần đầu tiên, adidas Falcon được xuất hiện
                            với vẻ ngoài độc đáo như vậy. Đặc biệt hơn là phần đế hai màu chưa
                            từng có trước đây. Hai thiết kế dự sẽ được ra mắt vào đầu tháng 6
                            tại website và một số nhà bán lẻ.
                        </p>
                        <img src="Public/images/show/gallery_item_1.jpg" class="pb-2" alt="" width="100%" />
                        <h4 class="fw-bold">Đôi nét về dòng giày Falcon</h4>
                        <p>
                            Bắt nguồn từ những đôi Yeezy Boost 700 và 500 của Kanye West,
                            adidas liên tiếp giới thiệu các phiên bản làm sóng gió suốt một
                            năm vừa qua như: Yung 1, Yung 96… Và đặc biệt nhất đó chính là
                            phiên bản chunky sneakers dành riêng cho nữ: Falcon W. Dù lấy cảm
                            hứng từ đôi Falcon Dorf ra mắt năm 1997, nhưng FALCON W đã được
                            biến tấu và thay đổi ít nhiều về ngoại hình và màu sắc cho hợp với
                            xu hướng hiện đại hơn.
                        </p>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection