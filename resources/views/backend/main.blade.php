<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.elements.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div>
        @include('backend.elements.nav-bar')

        @include('backend.elements.side-bar')

        @yield('content')
    </div>
    @include('backend.elements.script')
</body>

</html>
