@extends('layout')
@section('title', 'Hồ sơ cá nhân')

@section('content')
<div class="container py-5">
    <h3 class="fw-bold">HỒ SƠ CÁ NHÂN</h3>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Thêm CSRF token -->
                <div class="mb-3">
                    <label for="name" class="form-label">Họ và tên:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Gmail:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại:</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" required>
                </div>

                <div class="mb-3">
                    <label for="birth_date" class="form-label">Ngày sinh:</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $user->birth_date }}" required>
                </div>

                <div class="mb-3">
                    <label for="avatar" class="form-label">Avatar:</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>

            @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <d class="col-md-6 d-flex flex-column justify-content-center align-items-center">
            @if($user->avatar)
            <img src="{{ $user->avatar}}" class="circle-image rounded-circle mb-3" style="width: 250px;">
            @else
            <i class="fa-solid fa-user-tie" style="font-size: 250px;"></i>
            @endif
        </d iv>
    </div>
</div>
@endsection