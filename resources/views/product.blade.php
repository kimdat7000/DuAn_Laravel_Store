@extends('layout')
@section('title', 'Sản phẩm')

@section('content')
<div class="container py-4">
    <div class="row">
        <aside class="col-sm-3 pt-5">
            <div class="card border-0">
                <h6 class="card-header bg-light fw-bold border-0">DANH MỤC</h6>
                <div class="row">
                    <div class="card-body">
                        <ul style="list-style-type: none;">
                            @foreach($Allcategory as $category)
                            <li style="margin-bottom: 10px;">
                                <div style="border: 1px solid #ccc; padding: 5px; border-radius: 5px; background-color: #f9f9f9;">
                                    <a href="{{ route('product_by_category', ['category_id' => $category->id]) }}" style="text-decoration: none; color: black;">{{ $category->name }}</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <article class="row col-sm-9">
            <div class="d-flex justify-content-end">
                <div class="dropdown p-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sắp xếp
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <button class="dropdown-item" href="#">
                                Giá tăng
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item" href="#">
                                Giá giảm
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item" href="#">
                                Từ A - Z
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item" href="#">
                                Từ Z - A
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                @foreach($Allproduct as $product)
                <div class="col-sm-3 poly-prod text-pro mb-4">
                    <div class="card border-0 h-100">
                        <a href="{{ route('product_detail', ['id' => $product->id]) }}"><img src="{{ $product->img }}" class="card-img-top" alt="{{ $product->name }}" width="211.5px" height="158.68px" /></a>
                        <div class="card-body border-top-0 text-center bg-light p-2">
                            <h6 class="card-title">{{ $product->name }}</h6>
                            <div class="text card-text text-end">{{ number_format($product->price, 0, ',', '.') }} đ
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center py-5">
                <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                        @if ($Allproduct->previousPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $Allproduct->previousPageUrl() }}" rel="prev">
                                <i class="fa-solid fa-circle-left"></i>
                            </a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link"><i class="fa-solid fa-circle-left"></i></span>
                        </li>
                        @endif

                        @foreach ($Allproduct->getUrlRange(1, $Allproduct->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $Allproduct->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endforeach

                        @if ($Allproduct->nextPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $Allproduct->nextPageUrl() }}" rel="next">
                                <i class="fa-solid fa-circle-right"></i>
                            </a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link"><i class="fa-solid fa-circle-right"></i></span>
                        </li>
                        @endif
                    </ul>
                </nav>
                <!-- {{ $Allproduct->links() }} -->
            </div>
        </article>
    </div>


















</div>

@endsection