@extends('layout')
@section('title', 'Register')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-2 fw-bold text-center">ĐĂNG KÝ</h5>
                    <h6 class="text-center pb-4">
                        Bạn đã có tài khoản?
                        <a href="/login"> Đăng nhập tại đây.</a>
                    </h6>
                    <form name="formReg" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-regular fa-envelope"></i>
                                </span>
                                <input type="email" placeholder="Email" name="email" class="form-control" autofocus required />
                            </div>
                            @error('email')
                            <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                                <input name="password" type="password" class="form-control" placeholder="Mật khẩu" required />
                            </div>
                            @error('password')
                            <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Nhập lại mật khẩu" required />
                            </div>
                            @error('password_confirmation')
                            <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-secondary d-block w-100">
                            Đăng ký
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection