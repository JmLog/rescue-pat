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
            @yield('content')
        </div>
    </body>
</html>
