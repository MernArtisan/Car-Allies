<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-outlines">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport" />
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/bundles/datatables/datatables.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/bundles/jqvmap/dist/jqvmap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('fav.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
                                <i data-feather="menu"></i></a></li>
                        <li style="display: none">
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                        data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    @role('admin')
                        <li class="dropdown dropdown-list-toggle">
                            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg">
                                <i data-feather="bell"></i>
                                <span class="badge badge-danger nav-count"
                                    id="notification-count">{{ \App\Models\Contact::where('seen', 0)->count() }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                                <div class="dropdown-header">
                                    Notifications
                                    <div class="float-right">
                                        <a href="#" id="mark-all-read">Mark All As Read</a>
                                    </div>
                                </div>
                                <div class="dropdown-list-content dropdown-list-icons" id="notification-list">
                                    @foreach (\App\Models\Contact::where('seen', 0)->latest()->get() as $contact)
                                        <a href="{{ route('admin.inquiries.index') }}"
                                            class="dropdown-item dropdown-item-unread">
                                            <span class="dropdown-item-icon l-bg-orange text-white"><i
                                                    class="far fa-envelope"></i></span>
                                            <span class="dropdown-item-desc">
                                                📩 <b>{{ $contact->name }}</b> ({{ $contact->email }})
                                                <span class="time">{{ $contact->created_at->diffForHumans() }}</span>
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="dropdown-footer text-center">
                                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </li>
                    @else
                        @can('inquiry-management')
                            <li class="dropdown dropdown-list-toggle">
                                <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg">
                                    <i data-feather="bell"></i>
                                    <span class="badge badge-danger nav-count"
                                        id="notification-count">{{ \App\Models\Contact::where('seen', 0)->count() }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                                    <div class="dropdown-header">
                                        Notifications
                                        <div class="float-right">
                                            <a href="#" id="mark-all-read">Mark All As Read</a>
                                        </div>
                                    </div>
                                    <div class="dropdown-list-content dropdown-list-icons" id="notification-list">
                                        @foreach (\App\Models\Contact::where('seen', 0)->latest()->get() as $contact)
                                            <a href="{{ route('admin.inquiries.index') }}"
                                                class="dropdown-item dropdown-item-unread">
                                                <span class="dropdown-item-icon l-bg-orange text-white"><i
                                                        class="far fa-envelope"></i></span>
                                                <span class="dropdown-item-desc">
                                                    📩 <b>{{ $contact->name }}</b> ({{ $contact->email }})
                                                    <span class="time">{{ $contact->created_at->diffForHumans() }}</span>
                                                </span>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="dropdown-footer text-center">
                                        <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </li>
                        @endcan
                    @endrole


                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            @if (Auth::user()->hasRole('admin') && Auth::user()->image)
                                <img alt="image" src="{{ asset('uploads/profileImage/' . Auth::user()->image) }}"
                                    class="user-img-radious-style">
                            @elseif (Auth::user()->hasRole('vendor') && Auth::user()->vendor->image)
                                <img alt="image"
                                    src="{{ asset('uploads/vendors/' . Auth::user()->vendor->image) }}"
                                    class="user-img-radious-style">
                            @else
                                <img alt="image" src="{{ asset('default.png') }}" class="user-img-radious-style">
                            @endif
                            <span class="d-sm-none d-lg-inline-block"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">{{ Auth::user()->name }}</div>
                            <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                                <i style="color: black" class="far fa-user"></i> Profile
                            </a>


                            <a href="#" class="dropdown-item has-icon" id="btnlogout">
                                <i style="color: black" class="fas fa-sign-out-alt"></i> Logout
                            </a>

                            <form action="{{ route('admin.logout') }}" method="POST" id="logoutForm"
                                style="display: none;">
                                @csrf
                            </form>

                            <script>
                                document.getElementById('btnlogout').addEventListener('click', function(event) {
                                    event.preventDefault(); // Prevent the default action (page navigation)

                                    // Trigger SweetAlert
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: 'You will be logged out!',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'Yes, log out!',
                                        cancelButtonText: 'Cancel',
                                        reverseButtons: true
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // If confirmed, submit the logout form
                                            document.getElementById('logoutForm').submit();
                                        }
                                    });
                                });

                                function confirmDelete(deleteFormId) {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: 'You won\'t be able to revert this!',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'Yes, delete it!',
                                        cancelButtonText: 'No, cancel!',
                                        reverseButtons: true
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // If confirmed, submit the form with the provided ID
                                            document.getElementById(deleteFormId).submit();
                                        }
                                    });
                                }
                            </script>
                        </div>
                    </li>
                </ul>
            </nav>

            @include('admin.layouts.sidebar')
            @yield('content')
            <footer class="main-footer" style="position: fixed;margin-top: 454px;">
                <div class="footer-left">
                    Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="#">Redstar</a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/page/index.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('admin/assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('admin/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/page/datatables.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.15.3/dist/echo.iife.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    @yield('scripts')
    {{-- <script>
       const markAllBtn = document.getElementById('mark-all-read');

        if (markAllBtn) {
            markAllBtn.addEventListener('click', function(e) {
                e.preventDefault();

                fetch('{{ route('admin.contacts.markAllRead') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('notification-list').innerHTML = '';
                            document.getElementById('notification-count').innerText = '0';
                            toastr.success('All notifications marked as read.', '', {
                                "closeButton": true,
                                "progressBar": true,
                                "timeOut": "3000",
                                "positionClass": "toast-top-right",
                                "toastClass": "toast toast-dark"
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        toastr.error('Something went wrong!');
                    });
            });
        }




        window.Pusher = Pusher;

        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: '{{ env('PUSHER_APP_KEY') }}',
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            forceTLS: true
        });

        Echo.channel('admin-channel')
            .listen('.new-contact', (data) => {

                toastr.success(
                    `<i class="far fa-envelope"></i> New Inquiry Mr <br> ${data.contact.name}  ${data.contact.email}`,
                    '', {
                        closeButton: true,
                        positionClass: 'toast-top-right',
                        timeOut: 5000,
                        progressBar: true,
                        escapeHtml: false,
                        toastClass: 'toast toast-info',
                    });


                let notificationList = document.getElementById('notification-list');
                let notificationCount = document.getElementById('notification-count');

                let newNotification = `
                    <a href="{{ route('admin.inquiries.index') }}" class="dropdown-item dropdown-item-unread">
                        <span class="dropdown-item-icon l-bg-orange text-white">
                            <i class="far fa-envelope"></i>
                        </span>
                        <span class="dropdown-item-desc">
                            📩 New Contact: <b>${data.contact.name}</b> (${data.contact.email})
                            <span class="time">just now</span>
                        </span>
                    </a>
                `;

                notificationList.insertAdjacentHTML('afterbegin', newNotification);

                notificationCount.innerText = parseInt(notificationCount.innerText) + 1;
            });

            const markAllBtn = document.getElementById('mark-all-read');

                if (markAllBtn) {
                    markAllBtn.addEventListener('click', function(e) {
                        e.preventDefault();

                        fetch('/mark-contacts-read', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(() => {
                            const list = document.getElementById('notification-list');
                            const count = document.getElementById('notification-count');

                            if (list) list.innerHTML = '';
                            if (count) count.innerText = '0';
                        });
                    });
                }


       
    </script> --}}
    <script>
        // ✅ Mark All Notifications Read (Admin Button)
        const markAllBtn = document.getElementById('mark-all-read');
    
        if (markAllBtn) {
            markAllBtn.addEventListener('click', function(e) {
                e.preventDefault();
    
                fetch('{{ route('admin.contacts.markAllRead') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const list = document.getElementById('notification-list');
                        const count = document.getElementById('notification-count');
    
                        if (list) list.innerHTML = '';
                        if (count) count.innerText = '0';
    
                        toastr.success('All notifications marked as read.', '', {
                            closeButton: true,
                            progressBar: true,
                            timeOut: 3000,
                            positionClass: 'toast-top-right',
                            toastClass: 'toast toast-dark'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('Something went wrong!');
                });
            });
        }
    
        // ✅ Real-time Notifications via Pusher
        window.Pusher = Pusher;
    
        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: '{{ env('PUSHER_APP_KEY') }}',
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            forceTLS: true
        });
    
        Echo.channel('admin-channel')
            .listen('.new-contact', (data) => {
                toastr.success(
                    `<i class="far fa-envelope"></i> New Inquiry Mr <br> ${data.contact.name}  ${data.contact.email}`,
                    '', {
                        closeButton: true,
                        positionClass: 'toast-top-right',
                        timeOut: 5000,
                        progressBar: true,
                        escapeHtml: false,
                        toastClass: 'toast toast-info',
                    });
    
                let notificationList = document.getElementById('notification-list');
                let notificationCount = document.getElementById('notification-count');
    
                if (notificationList) {
                    let newNotification = `
                        <a href="{{ route('admin.inquiries.index') }}" class="dropdown-item dropdown-item-unread">
                            <span class="dropdown-item-icon l-bg-orange text-white">
                                <i class="far fa-envelope"></i>
                            </span>
                            <span class="dropdown-item-desc">
                                📩 New Contact: <b>${data.contact.name}</b> (${data.contact.email})
                                <span class="time">just now</span>
                            </span>
                        </a>
                    `;
                    notificationList.insertAdjacentHTML('afterbegin', newNotification);
                }
    
                if (notificationCount) {
                    notificationCount.innerText = parseInt(notificationCount.innerText) + 1;
                }
            });
    </script>
    
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
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif


        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000",
            "extendedTimeOut": "1000"
        };

        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                callbacks: {
                    onImageUpload: function(files) {}
                }
            });

            $('input[name="image"]').on('change', function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

        function previewFile() {
            const fileInput = document.getElementById('imageUploader');
            const previewImage = document.getElementById('previewImage');
            const removeBtn = document.getElementById('removeBtn');
            const selectBtn = document.getElementById('selectBtn');
            const imagePreviewDiv = document.getElementById('imagePreview');

            const file = fileInput.files[0];
            const reader = new FileReader();

            // If a file is selected, show the preview
            if (file) {
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                    imagePreviewDiv.style.display = 'block'; // Show preview container
                    removeBtn.style.display = 'inline-block'; // Show the remove button
                    selectBtn.style.display = 'none'; // Hide select button after selecting
                };
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            const fileInput = document.getElementById('imageUploader');
            const previewImage = document.getElementById('previewImage');
            const removeBtn = document.getElementById('removeBtn');
            const selectBtn = document.getElementById('selectBtn');
            const imagePreviewDiv = document.getElementById('imagePreview');

            fileInput.value = '';
            previewImage.style.display = 'none'; // Hide the preview
            removeBtn.style.display = 'none'; // Hide the remove button
            selectBtn.style.display = 'inline-block'; // Show select button again
            imagePreviewDiv.style.display = 'none'; // Hide preview container
        }

        $(document).ready(function() {
            $('.collapse-btn').on('click', function() {
                if ($('body').hasClass('sidebar-collapsed')) {
                    $('#logo').attr('src', '{{ asset('PNG-01.png') }}').css({
                        'width': '120px',
                        'height': '61px'
                    });
                } else {
                    $('#logo').attr('src', '{{ asset('PNG-01.png') }}').css({
                        'width': '50px',
                        'height': '50px'
                    });
                }
                $('body').toggleClass('sidebar-collapsed');
            });
        });
    </script>

    <style>
        .toast-black {
            background-color: #000 !important;
            color: #fff !important;
        }

        .loader {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 8px solid #ffffff;
            border-top: 8px solid #003cff;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            display: none;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .table thead th {
            background: #353c48 !important;
            color: white !important;
        }

        .table tbody tr td {
            background: #f5f5f5 !important;
            color: black !important;
            font-weight: bold !important;
        }
    </style>

</body>
</body>

</html>
