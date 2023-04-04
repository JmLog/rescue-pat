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
                            <h3 class="mb-4">Hi, welcome back! 👋👋</h3>
                            <p class="text-muted text-sm mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore.</p>
                            <form id="loginForm" action="{{ route('auth.login') }}" method="post">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="floatingInput" type="email" name="email"
                                           placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="floatingPassword" type="password" name="password"
                                           placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
{{--                                <div class="form-check mb-3">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">--}}
{{--                                    <label class="form-check-label" for="remember">자동 로그인</label>--}}
{{--                                </div>--}}
                                <button class="btn btn-primary btn-lg" type="submit">로그인</button>
                            </form>
                        </div>
                        <div class="card-footer px-lg-5 py-lg-4">
                            <div class="text-sm text-muted">아직 계정이 없으신가요? <a href="{{ route('auth.register') }}">회원가입</a>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
@endsection
