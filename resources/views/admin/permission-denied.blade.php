<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-outlines">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- ==== Document Title ==== -->
    <title>Permission Denied 🚫</title>
    
    <!-- ==== Document Meta ==== -->
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- ==== Favicon ==== -->
    <link rel="icon" href="{{ asset('admin/assets/favicon.png') }}" type="image/png">

    <!-- ==== Google Font ==== -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CMontserrat:400,500">

    <!-- ==== Bootstrap CSS ==== -->
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <!-- ==== Font Awesome CSS ==== -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- ==== Custom CSS ==== -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
</head>
<body>

    <!-- Wrapper Start -->
    <div class="wrapper d-flex align-items-center justify-content-center min-vh-100 bg-light">
        <!-- Error Page Start -->
        <div class="text-center">
            <div class="m-error--title">
                <h1 class="display-1 text-danger">403</h1>
            </div>

            <div class="m-error--desc">
                <h2 class="h2 text-dark">Permission Denied</h2>
                <p class="lead text-muted">You do not have permission to view this page.</p>

                <div class="m-error--search mt-4">
                    <a href="javascript:history.back()" class="btn btn-lg btn-primary">
                        <i class="fas fa-arrow-left mr-2"></i> Go Back To Dashboard
                    </a>
                </div>
            </div>
        </div>
        <!-- Error Page End -->
    </div>
    <!-- Wrapper End -->

    <!-- ==== jQuery ==== -->
    <script src="http://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- ==== Bootstrap JS ==== -->
    <script src="http://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ==== Custom JS ==== -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
</body>
</html>