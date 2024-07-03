@extends('admin.admin')
@section('title', 'Products')

@section('content')
<article class="col-sm-10 bg-body-secondary" style="border-radius: 10px; padding: 10px">
    <div class="row">
        <div class="col-6">
            <h3 class="fw-bold py-3">Sản phẩm</h3>
        </div>

        <div class="col-3 py-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="col-3 py-3 text-end">
            <a href="{{ route('download.products.pdf') }}" class="btn btn-primary">
                <i class="fa-solid fa-download"></i>
                <span class="text">Download PDF</span>
            </a>
        </div>
    </div>

    <div class="col-sm-12">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">STT <i class="fa-solid fa-sort"></i></th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price) }} đ</td>
                    <td>
                        <img src="{{ $product->img }}" alt="{{ $product->name }}" width="50px" />
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">

                            <button type="button" class="btn btn-primary me-2 edit-product-btn" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">
                                <i class="fas fa-pen-to-square"></i>
                            </button>


                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Bạn có muốn xóa sản phẩm này?')">
                                    <i class="fas fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


        <div class="d-flex justify-content-center py-5">
            <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    @if ($products->previousPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">
                            <i class="fa-solid fa-circle-left"></i>
                        </a>
                    </li>
                    @else
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fa-solid fa-circle-left"></i></span>
                    </li>
                    @endif

                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endforeach

                    @if ($products->nextPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">
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
        </div>
</article>

<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                    Thêm sản phẩm
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">
                            Tên sản phẩm:
                        </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm" />
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">
                            Mô tả:
                        </label>
                        <textarea class="form-control" id="description" name="description" placeholder="Nhập mô tả"></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold">
                            Giá:
                        </label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Nhập tên sản phẩm" />
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label fw-bold">
                            Hình ảnh:
                        </label>
                        <input type="file" class="form-control" id="img" name="img" />
                        <!-- <div class="text-center p-3">
                            <img id="preview-img" alt="" width="50px" />
                        </div> -->
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label fw-bold">
                            Danh mục:
                        </label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="" selected>Chọn danh mục</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary justify-content-end">
                        Thêm sản phẩm
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>

@foreach($products as $product)
<div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                    Sửa sản phẩm
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">
                            Tên sản phẩm:
                        </label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" />
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">
                            Mô tả:
                        </label>
                        <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                    </div>


                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold">
                            Giá:
                        </label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" />
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label fw-bold">
                            Hình ảnh:
                        </label>
                        <input type="file" class="form-control" id="img" name="img" />
                        <div class="text-center p-3">
                            <img src="{{ asset($product->img) }}" alt="" width="50px" />
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="category_id" class="form-label fw-bold">
                            Danh mục:
                        </label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{$product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary justify-content-end">

                        Lưu
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection