<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.elements.head')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.elements.side-bar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
                            alt="logo" /></a>
                </div>
                @include('backend.elements.top-nav')
            </nav>

            @yield('content')

        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('backend.elements.script')
</body>

</html>
