@extends('admin.admin')
@section('title', 'Category')

@section('content')
<article class="col-sm-10 bg-body-secondary" style="border-radius: 10px; padding: 10px">
    <div class="row">
        <div class="col-6">
            <h3 class="fw-bold py-3">Danh mục</h3>
        </div>

        <div class="col-3 py-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="col-3 py-3 text-end">
            <a href="#" class="btn btn-primary">
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
                    <th scope="col">Tên danh muc</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary me-2 edit-category-btn" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}">
                                <i class="fas fa-pen-to-square"></i>
                            </button>

                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Bạn có muốn xóa danh mục này?')">
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
                    @if ($categories->previousPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $categories->previousPageUrl() }}" rel="prev">
                            <i class="fa-solid fa-circle-left"></i>
                        </a>
                    </li>
                    @else
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fa-solid fa-circle-left"></i></span>
                    </li>
                    @endif

                    @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $categories->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endforeach

                    @if ($categories->nextPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $categories->nextPageUrl() }}" rel="next">
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
    </div>
</article>

<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="addCategoryModalLabel">Thêm danh mục</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Tên danh mục:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($categories as $category)
<div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                    Sửa danh mục
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">
                            Tên danh mục:
                        </label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" />
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