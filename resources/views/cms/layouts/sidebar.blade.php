<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void(0)" target="_blank" class="brand-link">
        {{-- <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">Get My Path</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (!empty(auth()->user()->image) && file_exists('assets/uploads/users/' . auth()->user()->image))
                    <img src="{{ asset('assets/uploads/users/'.auth()->user()->image) }}" class="img-circle elevation-2"
                    alt="User Image">
                @else
                    <img src="{{ asset('assets/adminlte/dist/img/avatar5.png') }}" class="img-circle elevation-2"
                    alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ ucfirst(auth()->user()->name) }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('cms.dashboard') }}"
                        class="nav-link @if (Route::currentRouteName() == 'cms.dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="text">Dashboard</p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
