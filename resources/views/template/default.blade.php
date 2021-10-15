@include('template/header')

<body id="page-top">
    <div id="wrapper">
        @include('template/sidebar')
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                @include('template/topbar')
            </div>
            @yield('content')

            <div class="footer">
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>
        </div>
    </div>


    @include('template/script')
    @yield('script-custom')
</body>