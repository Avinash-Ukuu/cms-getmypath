<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">

                @if (!empty(auth()->user()->image) && file_exists('assets/uploads/users/' . auth()->user()->image))
                    <img height="30px" src="{{ asset('assets/uploads/users/'.auth()->user()->image) }}" class="img-circle elevation-2"
                    alt="User Image">
                @else
                    <img height="30px" src="{{ asset('assets/adminlte/dist/img/avatar5.png') }}" class="img-circle elevation-2"
                    alt="User Image">
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="{{ route('cms.changePassword') }}" class="dropdown-item">
                    Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('cms.profile') }}" class="dropdown-item">Profile</a>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();"
                    class="dropdown-item">
                    Logout
                </a>

                <form action="{{ route('logout') }}" id="logout-form" method="post">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
