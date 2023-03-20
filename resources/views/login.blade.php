@extends('layouts.login_layout')

@section('content')
    <div class="page-holder align-items-center py-4 bg-gray-100 vh-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 px-lg-4">
                    <div class="card">
                        <div class="card-header px-lg-5">
                            <div class="card-heading text-primary">Bubbly Dashboard</div>
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
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                                {{--                                <button class="btn btn-primary btn-lg" type="button" onclick="login()">Submit</button>--}}
                            </form>
                        </div>
                        <div class="card-footer px-lg-5 py-lg-4">
                            <div class="text-sm text-muted">Don't have an account? <a href="register.html">Register</a>.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 ms-xl-auto px-lg-4 text-center text-primary"><img class="img-fluid mb-4"
                                                                                                width="300"
                                                                                                src="{{ asset('images/drawkit-illustration.svg') }}"
                                                                                                alt=""
                                                                                                style="transform: rotate(10deg)">
                    <h1 class="mb-4">Start saving <br class="d-none d-lg-inline">your time & money</h1>
                    <p class="lead text-muted">One morning, when Gregor Samsa woke from troubled dreams, he found
                        himself transformed in his bed in</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        {{--function login() {--}}

        {{--    $.ajax({--}}
        {{--        type : 'post',--}}
        {{--        url : '{!! route('auth.login') !!}',--}}
        {{--        headers: {--}}
        {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--        },--}}
        {{--        data : {--}}
        {{--            'email': 'wmlals0002@gmail.com',--}}
        {{--            'password': '123456789a'--}}
        {{--        },--}}
        {{--        success : function(result) {--}}
        {{--            console.log('result');--}}
        {{--        },--}}
        {{--        error : function(request, status, error) {--}}
        {{--            console.log('error')--}}
        {{--        }--}}
        {{--    })--}}
        {{--}--}}
    </script>
@endsection
