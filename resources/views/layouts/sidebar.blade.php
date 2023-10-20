<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ auth()->user()->type }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }} | {{ auth()->user()->email }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link {{ Route::currentRouteName() == 'dashboard.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @canany(['viewAny', 'create'], \App\Models\Role::class)
                <li class="nav-item {{in_array(Route::currentRouteName(), ['roles.index', 'roles.create']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Roles
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('viewAny', \App\Models\Role::class)
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link {{ Route::currentRouteName() == 'roles.index' ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listing</p>
                            </a>
                        </li>
                        @endcan
                        @can('create', \App\Models\Role::class)
                        <li class="nav-item">
                            <a href="{{ route('roles.create') }}" class="nav-link {{ Route::currentRouteName() == 'roles.create' ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                
                @canany(['viewAny', 'create'], \App\Models\User::class)
                <li class="nav-item {{in_array(Route::currentRouteName(), ['users.index', 'users.create']) ? 'menu-open': '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Employees
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('viewAny', \App\Models\User::class)
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link {{ Route::currentRouteName() == 'users.index' ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listing</p>
                            </a>
                        </li>
                        @endcan
                        @can('create', \App\Models\User::class)
                        <li class="nav-item">
                            <a href="{{ route('users.create') }}" class="nav-link {{ Route::currentRouteName() == 'users.create' ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany

                @canany(['viewAny', 'create'], \App\Models\Task::class)
                <li class="nav-item {{in_array(Route::currentRouteName(), ['task.index', 'task.create']) ? 'menu-open': ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Tasks
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                        @can('viewAny', \App\Models\Task::class)
                        <li class="nav-item">
                            <a href="{{ route('task.index') }}" class="nav-link {{ Route::currentRouteName() == 'task.index' ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listing</p>
                            </a>
                        </li>
                        @endcan
                        @can('create', \App\Models\Task::class)
                        <li class="nav-item">
                            <a href="{{ route('task.create') }}" class="nav-link {{ Route::currentRouteName() == 'task.create' ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>