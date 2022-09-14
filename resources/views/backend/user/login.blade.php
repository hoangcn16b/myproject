<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-center mb-3">Login Admin</h3>
                            @if (session('error-login'))
                                <div class="alert alert-danger">{{ session('error-login') }}</div>
                            @endif
                            @if (session('message-logout'))
                                <div class="alert alert-danger">{{ session('message-logout') }}</div>
                            @endif
                            @if (session('error-permitsion'))
                                <div class="alert alert-danger">{{ session('error-permitsion') }}</div>
                            @endif
                            <form action="{{ route('auth/postLogin') }}" method="post">
                                @csrf @method('post')
                                <div class="form-group">
                                    <label>Username or email *</label>
                                    <input type="text" name="email" class="form-control p_input">
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="text" name="password" class="form-control p_input">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                                </div>
                                <div class="form-group">
                                    <a type="button" class="btn btn-danger btn-block enter-btn"
                                        href="{{ route('home/frontend') }}">
                                        Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('backend/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('backend/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('backend/assets/js/misc.js') }}"></script>
    <script src="{{ asset('backend/assets/js/settings.js') }}"></script>
    <script src="{{ asset('backend/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
</body>

</html>
