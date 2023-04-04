@extends('layouts.login_layout')

@section('content')
    <div class="page-holder align-items-center py-4 bg-gray-100 vh-100">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 px-lg-4">
                    <div class="card">
                        <div class="card-header px-lg-5">
                            <div class="card-heading text-primary">RescuePat</div>
                        </div>
                        <div class="card-body p-lg-5">
                            <h3 class="mb-4">Get started with RescuePat</h3>
                            <p class="text-muted text-sm mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                            <form action="{{ route('auth.register.process') }}" method="post">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="username" name="name" type="text" placeholder="name@example.com">
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="floatingInput" name="email" type="email" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="floatingPassword" name="password" type="password" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="floatingPassword" name="password_check" type="password" placeholder="Password Check">
                                    <label for="floatingPassword">Password Check</label>
                                </div>
{{--                                <div class="form-check mb-3">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="agree" id="agree">--}}
{{--                                    <label class="form-check-label" for="agree"><a href="#">이용약관</a>에 동의합니다.</label>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <button class="btn btn-primary" id="register" type="submit" name="registerSubmit">회원가입</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer px-lg-5 py-lg-4">
                            <div class="text-sm text-muted">이미 계정이 있으신가요? <a href="{{ route('auth.login') }}">로그인</a>.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
