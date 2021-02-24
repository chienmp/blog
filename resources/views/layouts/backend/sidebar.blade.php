    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ trans('Dashboard') }}</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            {{ trans('Post') }}
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('tags.index') }}" >
                <i class="fas fa-hashtag"></i>
                <span>{{ trans('Tag') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('posts.index') }}">
                <i class="fas fa-blog"></i>
                <span>{{ trans('Posts') }}</span>
            </a>

        </li>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('category.index') }}">
                <i class="fas fa-angle-double-right"></i>
                <span>{{ trans('Categories') }}</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>{{ trans('lang') }}</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('lang',['lang' => 'vi']) }}">
                        <i class="display-flex-center flag-icon flag-icon-vn"></i>
                        {{ trans('vietnam') }}
                    </a>
                    <a class="collapse-item" href="{{ route('lang',['lang' => 'en']) }}">
                        <i class="display-flex-center flag-icon flag-icon-gb"></i>
                        {{ trans('english') }}
                    </a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('subcribers.index') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>{{ trans('Subcriber') }}</span></a>
        </li>
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.profile') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>{{ trans('profile') }}</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
        <!-- Sidebar Message -->
    </ul>
    <!-- End of Sidebar -->
