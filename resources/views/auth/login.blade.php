@extends('layout')
@section('title', 'Đăng nhập')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-2 fw-bold text-center">ĐĂNG NHẬP</h5>
                    <h6 class="text-center pb-4">
                        Bạn chưa có tài khoản?
                        <a href="/register"> Đăng ký tại đây.</a>
                    </h6>
                    <form name="formLogin" method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="row mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-regular fa-envelope"></i>
                                </span>
                                <input type="email" placeholder="Email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autofocus required />
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required />
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 form-check d-flex justify-content-between">
                            <div>
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember" />
                                <label class="form-check-label" for="exampleCheck1">Nhớ mật khẩu</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-decoration-none text-black">Quên mật
                                khẩu?</a>
                        </div>

                        <button type="submit" class="btn btn-secondary d-block w-100">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




</div>
@endsection