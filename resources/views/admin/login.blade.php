<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Login - Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/bundles/bootstrap-social/bootstrap-social.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('admin/assets/img/favicon.ico') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-header h4 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            /* background-color: #007bff; */
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            /* background-color: #0056b3; */
        }

        .invalid-feedback {
            color: #ff6b6b;
        }

        .custom-checkbox .custom-control-label::before {
            border-radius: 0.25rem;
        }

        .card-body {
            padding: 2rem;
        }

        .text-center a {
            color: #007bff;
            transition: color 0.3s ease;
        }

        .text-center a:hover {
            /* color: #0056b3; */
        }

        .loader {
            display: none;
        }

        /* Mobile optimization */
        @media (max-width: 576px) {
            .card {
                margin-top: 1rem;
            }

            .card-header h4 {
                font-size: 1.25rem;
            }

            .btn-primary {
                font-size: 0.875rem;
            }
        }
    </style>
</head>

<body style="background-color: #ffffff">
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                        <div class="card card-primary" style="margin-top: 100px">
                            <div class="card-header text-center" style="background-color: #03002e ">
                                <img src="{{asset('PNG-01.png')}}" alt="Logo"
                                    style="width: 150px; margin-bottom: 20px;margin-left: 70px;">
                            </div>

                            <div class="card-body">
                                <form action="{{ route('admin.authenticate') }}" method="POST" action="#"
                                    class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="1" required autofocus>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">
                                            Please fill in your email.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">
                                            Please fill in your password.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn-lg btn-block"
                                            style="background-color: #03002e; color: white; border-radius: 10px;"
                                            tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (session('success'))
            var successSound = new Audio('{{ asset('admin/sounds/success.mp3') }}');
            successSound.play();
            toastr.success('{{ session('success') }}', 'Success');
        @endif

        @if (session('error'))
            var errorSound = new Audio('{{ asset('admin/sounds/error.mp3') }}');
            errorSound.play();
            toastr.error('{{ session('error') }}', 'Error');
        @endif
    </script>



    <script>
        toastr.options = {
            "closeButton": true, // Show close button
            "progressBar": true, // Show progress bar
            "positionClass": "toast-top-right", // Position the toast in the top right
            "timeOut": "5000", // Toast will disappear after 5 seconds
            "extendedTimeOut": "1000" // Extended time for closing the toast after hover
        };
    </script>
</body>

</html>
