@extends('admin.admin')
@section('title', 'Comments')

@section('content')
<article class="col-sm-10 bg-body-secondary" style="border-radius: 10px; padding: 10px">
    <div class="row">
        <div class="col-6">
            <h3 class="fw-bold py-3">Bình luận</h3>
        </div>

        <div class="col-6 py-3 text-end">
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
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số bình luận</th>
                    <th scope="col">Cũ nhất</th>
                    <th scope="col">Mới nhất</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Adidas EQT Cushion ADV</td>
                    <td>5</td>
                    <td>20-11-2023</td>
                    <td>19-03-2024</td>
                    <td>
                        <a href="#" class="btn btn-dark"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Adidas Nmd R1</td>
                    <td>3</td>
                    <td>20-11-2023</td>
                    <td>19-03-2024</td>
                    <td>
                        <a href="#" class="btn btn-dark"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-center py-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
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
</article>
@endsection