@include('includes.admin.header')
<body>
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        @include('includes.admin.topbar')
        @include('includes.admin.sidebar')
        <div class="main-content">
            <section class="section">
                @yield('content')
                <footer class="main-footer">
                    <div class="text-right">
                        Copyright &copy; 2020 <div class="bullet"></div><a href="https://tik.uns.ac.id" target="_blank">Maganger UPT TIK UNS</a>
                    </div>
                </footer>
        </div>
    </div>
    @yield('modal')
</body>
@include('includes.pendaftar.stisla.script')
@stack('addon-script')
</html>