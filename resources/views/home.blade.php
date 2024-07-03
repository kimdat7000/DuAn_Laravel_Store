@extends('layout')
@section('title', 'Store | Giày Sneaker')

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
<div class="container pt-5" style="padding-bottom: 50px" ng-app="myApp" ng-controller="HomeController">
    <h2 class="text-center py-5 fw-bolder">SẢN PHẨM BÁN CHẠY</h2>
    <div class="row">
        <div class="col-sm-3 poly-prod" ng-repeat="product in bestSellerProducts">
            <div class="card border-0">
                <a>
                    <img ng-src="@{{ product.img }}" class="card-img-top" alt="@{{ product.name }}" width="306px" height="229.5px" />
                </a>
                <div class="card-body border-top-0 text-center bg-light p-2">
                    <h6 class="card-title text-start">@{{ product.name }}</h6>
                    <div class="card-text text-end">@{{ product.formattedPrice }} đ</div>
                </div>
            </div>
        </div>
    </div>


    <div class="row p-5">
        <img src="images/banner-bsneakers-shopee-262-144-px.webp" alt="" />
    </div>
    <!-- SẢN PHẨM MỚI -->
    <h2 class="text-center py-5 fw-bolder">SẢN PHẨM MỚI</h2>
    <div class="row">

        <div class="col-sm-3 poly-prod" ng-repeat="product in newProducts">
            <div class="card border-0">
                <a>
                    <img ng-src="@{{ product.img }}" class="card-img-top" alt="@{{ product.name }}" width="306px" height="229.5px" />
                </a>
                <div class="card-body border-top-0 text-center bg-light p-2">
                    <h6 class="card-title text-start">@{{ product.name }}</h6>
                    <div class="card-text text-end">@{{ product.formattedPrice }} đ</div>
                </div>
            </div>
        </div>
    </div>

    <!-- TIN MỚI NHẤT -->


    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <h2 class="text-center py-5 fw-bolder">TIN TỨC MỚI</h2>
                <div class="col-sm-4">
                    <div class="card">
                        <img src="images/show/new-1.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title pb-3">
                                Adidas Falcon nổi bật mùa Hè với phối màu color ...
                            </h5>
                            <p class="card-text">
                                Cuối tháng 5, adidas Falcon đã cho ra mắt nhiều phối màu đón
                                chào mùa Hè khiến giới trẻ yêu thích không thôi. Tưởng chừng
                                thương hiệu sẽ tiếp tục...
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card">
                        <img src="images/show/new-2.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title pb-3">
                                Saucony hồi sinh mẫu giày chạy bộ cổ điển của ....
                            </h5>
                            <p class="card-text">
                                Là một trong những đôi giày chạy bộ tốt nhất vào những năm
                                1994, 1995, Saucony Aya Runner vừa có màn trở lại vô cùng ấn
                                tượng có vẻ như 2019...
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card">
                        <img src="images/show/new-3.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title pb-3">
                                Nike Vapormax Plus trở lại với sắc tím mộng mơ ...
                            </h5>
                            <p class="card-text">
                                Là một trong những mẫu giày retro có nhiều phối màu gradient
                                đẹp nhất từ trước đến này, Nike Vapormax Plus vừa có màn trở
                                lại bá đạo dành cho...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  FORM Đăng ký nhận tin -->
    <div class="row py-5 my-5 bg-secondary-subtle rounded-2">
        <div class="col-sm-6">
            <h5 class="fw-bold">Đăng ký nhận tin</h5>
            <p>
                Nhận thông tin sản phẩm mới nhất, tin khuyến mãi và nhiều hơn nhữ
            </p>
        </div>
        <div class="col-sm-6">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Email của bạn" aria-label="Email của bạn" aria-describedby="button-addon2" />
                <button class="btn btn-dark" type="button" id="button-addon2">
                    Đăng ký
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
<div class="home-model">
    <div class="modal" id="exampleModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end pt-4" data-bs-dismiss="modal" aria-label="Close"></button>
                    <img src="images/runner-popup_ebbbb7ad7346475e9caa836a64f07194.webp" alt="" />
                    <h5>Nhận các ưu đãi cùng Runner</h5>
                    <p>Đăng ký tại đây!</p>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Email của bạn" aria-label="Email của bạn" aria-describedby="button-addon2" />
                        <button class="btn btn-dark" type="button" id="button-addon2">
                            Đăng ký
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var app = angular.module('myApp', ['ngSanitize']);
    app.service('ProductService', function($http) {
        this.getNewProducts = function() {
            return $http.get('http://127.0.0.1:8000/api/new-products');
        };
        this.getBestSellers = function() {
            return $http.get('http://127.0.0.1:8000/api/best-sellers');
        };
    });

    app.controller('HomeController', function($scope, ProductService) {
        console.log('HomeController initialized');

        ProductService.getNewProducts().then(function(response) {
            console.log('New products fetched:', response.data);
            $scope.newProducts = formatProducts(response.data);
        }, function(error) {
            console.error('Error fetching new products:', error);
        });

        ProductService.getBestSellers().then(function(response) {
            console.log('Best seller products fetched:', response.data);
            $scope.bestSellerProducts = formatProducts(response.data);
        }, function(error) {
            console.error('Error fetching best seller products:', error);
        });

        function formatProducts(products) {
            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                product.formattedPrice = product.price.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });
            }
            return products;
        }

    });
</script>
@endsection