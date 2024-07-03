@extends('admin.admin')
@section('title', 'Users')

@section('content')
<article class="col-sm-10 bg-body-secondary" style="border-radius: 10px; padding: 10px">
    <div class="row">
        <div class="col-6">
            <h3 class="fw-bold py-3">Tài khoản</h3>
        </div>

        <div class="col-3 py-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
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
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->role == 1)
                        User
                        @elseif($user->role == 2)
                        Admin
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showUserModal{{ $user->id }}">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                        @if($user->locked)
                        <a type="button" class="btn btn-primary" href="{{ route('unlockUser', ['id' => $user->id]) }}"><i class="fa-solid fa-lock"></i></a>
                        @else
                        <a type="button" class="btn btn-primary" href="{{ route('lockUser', ['id' => $user->id]) }}"><i class="fa-solid fa-lock-open"></i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
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

<!-- <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                    Thêm người dùng
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="UserFullName" class="form-label fw-bold">Họ và tên:</label>
                        <input type="text" class="form-control" id="userFullName" name="userFullName" placeholder="Nhập họ và tên" />
                    </div>
                    <div class="mb-3">
                        <label for="userAccount" class="form-label fw-bold">Tài khoản:</label>
                        <input type="text" class="form-control" id="userAccount" name="userAccount" placeholder="Nhập tài khoản" />
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label fw-bold">Mật khẩu:</label>
                        <input type="password" class="form-control" ng-model="user.password" id="userPassword" name="userPassword" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="mb-3">
                        <label for="userGender" class="form-label fw-bold">Giới tính:</label>
                        <select class="form-control" id="userGender" name="userGender">
                            <option value="" disabled selected>Chọn giới tính</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="userPhoneNumber" class="form-label fw-bold">Số điện thoại:</label>
                        <input type="text" class="form-control" id="userPhoneNumber" name="userPhoneNumber" placeholder="Nhập số điện thoại" />
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label fw-bold">Email:</label>
                        <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Nhập email" />
                    </div>
                    <div class="mb-3">
                        <label for="userRole" class="form-label fw-bold">Chức vụ:</label>
                        <select class="form-control" id="userrole" name="userrole">
                            <option value="" disabled selected>Chọn chức vụ</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-dark justify-content-end">
                        Thêm người dùng
                    </button>
                </form>
            </div>
        </div>
    </div>
</div> -->

@foreach($users as $user)
<div class="modal fade" id="showUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="showUserModal{{ $user->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                    Tài khoản
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.updateRole')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Họ và tên:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" disabled />
                    </div>

                    <div class="mb-3">
                        <label for="Phone" class="form-label fw-bold">Số điện thoại:</label>
                        <input type="text" class="form-control" id="Phone" name="Phone" value="{{ $user->phone }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label for="Eamil" class="form-label fw-bold">Email:</label>
                        <input type="email" class="form-control" id="Eamil" name="Eamil" value="{{ $user->email }}" disabled />
                    </div>

                    <div class="mb-3">
                        <label for="birth_date" class="form-label fw-bold">Sinh ngày:</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $user->birth_date }}" disabled />
                    </div>

                    <div class="mb-3">
                        <label for="Address" class="form-label fw-bold">Địa chỉ:</label>
                        <input type="text" class="form-control" id="Address" name="Address" value="{{ $user->address }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label fw-bold">Chức vụ:</label>
                        <select class="form-control" id="role" name="role">
                            <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>User</option>
                            <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>













                    <button type="submit" class="btn btn-dark justify-content-end">



                        Lưu

                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection