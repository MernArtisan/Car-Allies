<div class="main-sidebar sidebar-style-2" style="background:#ffffff; color:white">
    <style>
        span {
            color: black !important;
        }
    </style>
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand" style="background-color: #353c48">
            <a href="{{ route('admin.dashboard') }}">
                <img alt="image" src="{{ asset('PNG-01.png') }}" class="header-logo" id="logo"
                    style="width: 120px;height: 61px;" />
            </a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-details">
                <div class="sidebar-user-picture profile-image-wrapper">
                    @if (Auth::user()->hasRole('admin') && Auth::user()->image)
                        <img alt="image" src="{{ asset('uploads/profileImage/' . Auth::user()->image) }}"
                            class="profile-image">
                    @elseif (Auth::user()->hasRole('vendor') && Auth::user()->vendor->image)
                        <img alt="image" src="{{ asset('uploads/vendors/' . Auth::user()->vendor->image) }}"
                            class="profile-image">
                    @else
                        <img alt="image" src="{{ asset('default.png') }}" class="profile-image">
                    @endif
                </div>
                <div class="user-name">{{ Auth::user()->name }}</div>
            </div>
        </div>


        <ul class="sidebar-menu">
            <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i data-feather="monitor"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @role('admin')
                <li class="{{ request()->is('admin/homebanners*') ? 'active' : '' }}">
                    <a href="{{ route('admin.homebanners.index') }}" class="nav-link">
                        <i data-feather="layout"></i>
                        <span>Home Banner</span>
                    </a>
                </li>
            @else
                @can('banner-management')
                    <li class="{{ request()->is('admin/homebanners*') ? 'active' : '' }}">
                        <a href="{{ route('admin.homebanners.index') }}" class="nav-link">
                            <i data-feather="layout"></i>
                            <span>Home Banner</span>
                        </a>
                    </li>
                @endcan
            @endrole

            @role('admin')
                <li class="{{ request()->is('admin/contents*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contents.index') }}" class="nav-link">
                        <i data-feather="file-text"></i>
                        <span>CMS Management</span>
                    </a>
                </li>
            @else
                @can('content-management')
                    <li class="{{ request()->is('admin/contents*') ? 'active' : '' }}">
                        <a href="{{ route('admin.contents.index') }}" class="nav-link">
                            <i data-feather="file-text"></i>
                            <span>CMS Management</span>
                        </a>
                    </li>
                @endcan
            @endrole


            <!-- Vendor/User Management - Show for admin or users with user-management permission -->
            @role('admin')
                <li class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i data-feather="users"></i>
                        <span>Vendor/User Management</span>
                    </a>
                </li>
            @else
                @can('user-management')
                    <li class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}" class="nav-link">
                            <i data-feather="users"></i>
                            <span>Vendor/User Management</span>
                        </a>
                    </li>
                @endcan
            @endrole

            <!-- Roles Management - Show for admin or users with roles-management permission -->
            @role('admin')
                <li class="{{ request()->is('admin/roles*') ? 'active' : '' }}">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link">
                        <i data-feather="users"></i>
                        <span>Roles</span>
                    </a>
                </li>
            @else
                @can('roles-management')
                    <li class="{{ request()->is('admin/roles*') ? 'active' : '' }}">
                        <a href="{{ route('admin.roles.index') }}" class="nav-link">
                            <i data-feather="users"></i>
                            <span>Roles</span>
                        </a>
                    </li>
                @endcan
            @endrole

            @role('admin')
                <li class="{{ request()->is('admin/permissions*') ? 'active' : '' }}">
                    <a href="{{ route('admin.permissions.index') }}" class="nav-link">
                        <i data-feather="users"></i>
                        <span>Permissions</span>
                    </a>
                </li>
            @else
                @can('permission-management')
                    <li class="{{ request()->is('admin/permissions*') ? 'active' : '' }}">
                        <a href="{{ route('admin.permissions.index') }}" class="nav-link">
                            <i data-feather="users"></i>
                            <span>Permission</span>
                        </a>
                    </li>
                @endcan
            @endrole

            <!-- Products Management - Show for admin or users with product-management permission -->
            @role('admin')
                <li class="{{ request()->is('admin/products*') ? 'active' : '' }}">
                    <a href="{{ route('admin.products.index') }}" class="nav-link">
                        <i data-feather="box"></i>
                        <span>Products</span>
                    </a>
                </li>
            @else
                @can('product-management')
                    <li class="{{ request()->is('admin/products*') ? 'active' : '' }}">
                        <a href="{{ route('admin.products.index') }}" class="nav-link">
                            <i data-feather="box"></i>
                            <span>Products</span>
                        </a>
                    </li>
                @endcan
            @endrole

            <!-- Services Management - Show for admin or users with services-managment permission -->
            @role('admin')
                <li class="{{ request()->is('admin/services*') ? 'active' : '' }}">
                    <a href="{{ route('admin.services.index') }}" class="nav-link">
                        <i data-feather="briefcase"></i>
                        <span>Services</span>
                    </a>
                </li>
            @else
                @can('services-managment')
                    <li class="{{ request()->is('admin/services*') ? 'active' : '' }}">
                        <a href="{{ route('admin.services.index') }}" class="nav-link">
                            <i data-feather="briefcase"></i>
                            <span>Services</span>
                        </a>
                    </li>
                @endcan
            @endrole

            <!-- Requested Vendors - Show for admin or users with requested-vendor permission -->
            @role('admin')
                <li class="{{ request()->is('admin/requested-vendors*') ? 'active' : '' }}">
                    <a href="{{ route('admin.requestedVendors') }}" class="nav-link">
                        <i data-feather="send"></i>
                        <span>Requested Vendors</span>
                        <span style="width: 30px" class="badge badge-warning">{{ $holdCount }}</span>
                    </a>
                </li>
            @else
                @can('requested-vendor')
                    <li class="{{ request()->is('admin/requested-vendors*') ? 'active' : '' }}">
                        <a href="{{ route('admin.requestedVendors') }}" class="nav-link">
                            <i data-feather="send"></i>
                            <span>Requested Vendors</span>
                            <span style="width: 30px" class="badge badge-warning">{{ $holdCount }}</span>
                        </a>
                    </li>
                @endcan
            @endrole

            <!-- Blocked Vendors - Show for admin or users with blocked-vendors permission -->
            @role('admin')
                <li class="{{ request()->is('admin/blocked-vendors*') ? 'active' : '' }}">
                    <a href="{{ route('admin.BlockedVendors') }}" class="nav-link">
                        <i data-feather="shield-off"></i>
                        <span>Blocked Vendors</span>
                        <span style="width: 30px" class="badge badge-danger">{{ $blockedCount }}</span>
                    </a>
                </li>
            @else
                @can('blocked-vendors')
                    <li class="{{ request()->is('admin/blocked-vendors*') ? 'active' : '' }}">
                        <a href="{{ route('admin.BlockedVendors') }}" class="nav-link">
                            <i data-feather="shield-off"></i>
                            <span>Blocked Vendors</span>
                            <span style="width: 30px" class="badge badge-danger">{{ $blockedCount }}</span>
                        </a>
                    </li>
                @endcan
            @endrole

            <!-- Orders - Show for admin or users with order-managment permission -->
            @role('admin')
                <li class="{{ request()->is('admin/orders*') ? 'active' : '' }}">
                    <a href="{{ route('admin.orders.index') }}" class="nav-link">
                        <i data-feather="clipboard"></i>
                        <span>Orders</span>
                        <span style="width: 30px" class="badge badge-warning">{{ $inProgressOrdersCount }}</span>
                    </a>
                </li>
            @else
                @can('order-managment')
                    <li class="{{ request()->is('admin/orders*') ? 'active' : '' }}">
                        <a href="{{ route('admin.orders.index') }}" class="nav-link">
                            <i data-feather="clipboard"></i>
                            <span>Orders</span>
                            <span style="width: 30px" class="badge badge-warning">{{ $inProgressOrdersCount }}</span>
                        </a>
                    </li>
                @endcan
            @endrole

            <!-- Bookings - Show for admin or users with booking-management permission -->
            @role('admin')
                <li class="{{ request()->is('admin/bookings*') ? 'active' : '' }}">
                    <a href="{{ route('admin.bookings.index') }}" class="nav-link">
                        <i data-feather="clipboard"></i>
                        <span>Bookings</span>
                        <span style="width: 30px" class="badge badge-warning">{{ $inProgressBookingsCount }}</span>
                    </a>
                </li>
            @else
                @can('booking-management')
                    <li class="{{ request()->is('admin/bookings*') ? 'active' : '' }}">
                        <a href="{{ route('admin.bookings.index') }}" class="nav-link">
                            <i data-feather="clipboard"></i>
                            <span>Bookings</span>
                            <span style="width: 30px" class="badge badge-warning">{{ $inProgressBookingsCount }}</span>
                        </a>
                    </li>
                @endcan
            @endrole

            <!-- Vendor Reviews - Show for admin or users with vendor-reviews permission -->
            @role('admin')
                <li class="{{ request()->is('admin/vendor-reviews*') ? 'active' : '' }}">
                    <a href="{{ route('admin.vendor-reviews.index') }}" class="nav-link">
                        <i data-feather="message-circle"></i>
                        <span>Vendors Reviews</span>
                    </a>
                </li>
            @else
                @can('vendor-reviews')
                    <li class="{{ request()->is('admin/vendor-reviews*') ? 'active' : '' }}">
                        <a href="{{ route('admin.vendor-reviews.index') }}" class="nav-link">
                            <i data-feather="message-circle"></i>
                            <span>Vendors Reviews</span>
                        </a>
                    </li>
                @endcan
            @endrole

            @role('admin')
                <li class="{{ request()->is('admin/inquiries*') ? 'active' : '' }}">
                    <a href="{{ route('admin.inquiries.index') }}" class="nav-link">
                        <i data-feather="layout"></i>
                        <span>Contact Inquiry</span>
                        <span style="width: 30px" class="badge badge-warning">{{ $ContactCount }}</span>
                    </a>
                </li>
            @else
                @can('banner-management')
                    <li class="{{ request()->is('admin/inquiries*') ? 'active' : '' }}">
                        <a href="{{ route('admin.inquiries.index') }}" class="nav-link">
                            <i data-feather="layout"></i>
                            <span>Contact Inquiry</span>
                        </a>
                    </li>
                @endcan
            @endrole
            @role('admin')
            <li class="{{ request()->is('admin/payments*') ? 'active' : '' }}">
                <a href="{{ route('admin.payments') }}" class="nav-link">
                    <i data-feather="dollar-sign"></i> {{-- ✅ Feather icon for payments --}}
                    <span>Payments</span>
                </a>
            </li>
        @else
            @can('payment-management')
                <li class="{{ request()->is('admin/payments*') ? 'active' : '' }}">
                    <a href="{{ route('admin.payments') }}" class="nav-link">
                        <i data-feather="dollar-sign"></i>
                        <span>Payments</span>
                    </a>
                </li>
            @endcan
        @endrole
        
            @role('admin')
                <li class="{{ request()->is('admin/generals*') ? 'active' : '' }}">
                    <a href="{{ route('admin.generals.index') }}" class="nav-link">
                        <i data-feather="settings"></i>
                        <span>General Details</span>
                    </a>
                </li>
            @else
                @can('general-management')
                    <li class="{{ request()->is('admin/generals*') ? 'active' : '' }}">
                        <a href="{{ route('admin.generals.index') }}" class="nav-link">
                            <i data-feather="settings"></i>
                            <span>General Details</span>
                        </a>
                    </li>
                @endcan
            @endrole

            <!-- Profile - Always accessible -->
            <li class="{{ request()->is('admin/profile*') ? 'active' : '' }}">
                <a href="{{ route('admin.profile') }}" class="nav-link">
                    <i data-feather="user"></i>
                    <span>Profile</span>
                </a>
            </li>

            <!-- Logout - Always accessible -->
            <li>
                <a href="#" id="btnSidelogout" class="nav-link">
                    <i data-feather="log-out"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Logout Form (Hidden) -->
            <form id="logoutFormSide" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>

        <script>
            document.getElementById('btnSidelogout').addEventListener('click', function(event) {
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
                        document.getElementById('logoutFormSide').submit();
                    }
                });
            });
        </script>
    </aside>
</div>
<style>
    .sidebar-menu .active a {
        background-color: #000000;
        color: white;
    }

    .profile-image-wrapper {
        width: 100px;
        height: 100px;
        overflow: hidden;
        margin-left: 68px;
        transition: 0.3s ease;
    }

    .profile-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.3s ease;
    }

    /* When sidebar is collapsed */
    body.sidebar-collapsed .profile-image-wrapper {
        width: 45px;
        height: 45px;
        margin-left: -4px;
    }

    body.sidebar-collapsed .user-name {
        display: none;
    }

    .sidebar-user-picture img {
        width: 100px;
        border-radius: 20%;
        box-shadow: 0px 5px 5px 0px rgba(44, 44, 44, 0.2);
    }
</style>
