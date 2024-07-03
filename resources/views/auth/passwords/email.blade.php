@extends('layout')
@section('title', 'Quên mật khẩu')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-2 fw-bold text-center">
                        QUÊN MẬT KHẨU
                    </h5>
                    <h6 class="text-center pb-4">
                        Bạn chưa có tài khoản?
                        <a href="/register"> Đăng ký tại đây.</a>
                    </h6>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" required />
                        </div>
                        <button type="submit" class="btn btn-secondary d-block w-100">
                            GỬI
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection