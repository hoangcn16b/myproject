<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('frontend.elements.head')
</head>

<body>

    @include('frontend.parts.menu-begin')
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    @include('frontend.parts.header')
    <!-- Header Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    @include('frontend.parts.footer')
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <!-- Search End -->

    <!-- Js Plugins -->
    @include('frontend.elements.script')
</body>

</html>
