<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
    <div class="theiaStickySidebar">
        <div class="settings-widget dash-profile">
            <div class="settings-menu p-0">
                <div class="profile-bg">
                    <div class="profile-img">
                        <a href="">
                            <img alt="{{ Auth::user()->name }}"
                                src="{{ 'uploads/profileImage/'.Auth::user()->image ? asset('uploads/profileImage/'.Auth::user()->image) : asset('default.png') }}"
                                class="avatar avatar-72 photo" height="72" width="72" decoding="async">
                        </a>
                    </div>
                </div>
                <div class="profile-group">
                    <div class="profile-name text-center">
                        <h4>
                            <a href="">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="settings-widget account-settings mt-4">
            <div class="settings-menu">
                <h3>Dashboard</h3>
                <ul class="tutor-dashboard-permalinks list-unstyled ms-n2 mb-0">
                    <li class="nav-item {{ Route::currentRouteName() == 'account.index' ? 'active' : '' }}">
                        <a href="{{route('account.orders')}}" class="nav-link">
                            <i class="fa-solid fa-gauge"></i> Orders </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'account.index' ? 'active' : '' }}">
                        <a href="{{route('account.bookings')}}" class="nav-link">
                            <i class="fa-solid fa-gauge"></i> Bookings </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'account.profile' ? 'active' : '' }}">
                        <a href="{{route('account.profile')}}" class="nav-link">
                            <i class="fa-solid fa-user"></i> My Profile </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'account.editprofile' ? 'active' : '' }}">
                        <a href="{{route('account.editprofile')}}" class="nav-link">
                            <i class="fa-solid fa-gear"></i> Edit Profile </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'account.wishlist' ? 'active' : '' }}">
                        <a href="{{route('account.wishlist')}}" class="nav-link">
                            <i class="fa-solid fa-heart"></i>Wishlist </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'account.resetpassword' ? 'active' : '' }}">
                        <a href="{{route('account.resetpassword')}}" class="nav-link">
                            <i class="fa-solid fa-lock"></i> Change Password </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="badge bg-danger" style="margin-left: 39px">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    .settings-widget {
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 15px;
    }

    .profile-bg {
        background-color: #f1f1f1;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
    }

    .profile-img img {
        border-radius: 50%;
    }

    .settings-widget h3 {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 15px;
    }

    .settings-menu ul {
        padding-left: 0;
    }

    .settings-menu li a {
        display: flex;
        align-items: center;
        color: #333;
        padding: 10px 15px;
        border-radius: 6px;
        transition: background-color 0.3s ease;
    }

    .settings-menu li a.active {
        background-color: #007bff;
        color: #fff;
    }

    .settings-menu li a i {
        margin-right: 10px;
    }
</style>