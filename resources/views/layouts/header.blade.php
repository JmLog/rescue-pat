@php($auth = \Illuminate\Support\Facades\Auth::guard('admin')->user())

<nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
    <a class="navbar-brand fw-bold text-uppercase text-base" href="{{ route('index') }}">
        <span class="d-none d-brand-partial">RESCUE </span><span class="d-none d-sm-inline">PAT</span>
    </a>
    <ul class="ms-auto d-flex align-items-center list-unstyled mb-0">
        <li class="nav-item dropdown">
            <form class="ms-auto me-4 d-none d-lg-block" id="searchForm">
                <div class="input-group input-group-sm input-group-navbar">
                    <input class="form-control" id="searchInput" type="search" placeholder="Search">
                    <button class="btn" type="button"> <i class="fas fa-search"></i></button>
                </div>
            </form>
        </li>
        <li class="nav-item dropdown ms-auto">
            <a class="nav-link pe-0" id="userInfo" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="avatar" src="{{ empty($auth) ? asset('images/icon/icon_logout.png') : asset('images/icon/icon_login.png') }}" alt="Jason Doe">
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated" aria-labelledby="userInfo">
                <div class="dropdown-header text-gray-700">
                    <h6 class="text-uppercase font-weight-bold">Welcome!</h6>
                    <a href="#" @if(!empty($auth)) onclick="openPopup('{{ route('auth.info', $auth->id) }}', 'width=900, height=1000')" @endif>
                        {{ empty($auth) ? '게스트' : $auth->name }} 님!
                    </a>
                </div>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ empty($auth) ? route('auth.login') : route('auth.logout') }}">{{ empty($auth) ? 'Login' : 'Logout' }}</a>
            </div>
        </li>
    </ul>
</nav>

