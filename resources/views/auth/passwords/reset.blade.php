@extends('layout')
@section('title', 'Đặt lại mật khẩu')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-2 fw-bold text-center">
                        ĐẶT LẠI MẬT KHẨU
                    </h5>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ $email ?? old('email') }}" required autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mật khẩu mới" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu" required>
                        </div>

                        <button type="submit" class="btn btn-secondary d-block w-100">
                            ĐẶT LẠI MẬT KHẨU
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection