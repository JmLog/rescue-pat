<!DOCTYPE html>
<html lang="ko">
    <head>
        <title></title>
        @component('layouts.components._meta')
            META 영역
        @endcomponent

        @component('layouts.components._css')
            CSS 영역
        @endcomponent

        @component('layouts.components._script')
            SCRIPT 영역
        @endcomponent

        <!-- (D) 페이지 전용 스크립트는 .mm_page-content 하단에 넣어주세요. -->
    </head>
    <body>
        <div class="wrap">
            <header class="header">
                @component('layouts.header')
                    HEADER
                @endcomponent
            </header>
            <div class="d-flex align-items-stretch">
                @component('layouts.nav')
                    NAV
                @endcomponent
                <div class="page-holder bg-gray-100">
                    <div class="container-fluid px-lg-4 px-xl-5">
                        @yield('content')
                    </div>
                    @component('layouts.footer')
                        FOOTER
                    @endcomponent
                </div>
            </div>
        </div>
    </body>
</html>
