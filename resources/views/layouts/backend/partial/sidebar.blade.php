<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('bower_components/adminbsb-materialdesign/images/image-gallery/15.jpg') }}" width="48"
                height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="#"><i class="material-icons">settings</i>{{ trans('Settings') }}</a>
                    </li>
                    <li role="seperator" class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>{{ trans('logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">{{ trans('main_nav') }}</li>
            <li class="active">
                <a href="#">
                    <i class="material-icons">dashboard</i>
                    <span>{{ trans('Home') }}</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('tags.index') }}">
                    <i class="material-icons">label</i>
                    <span>{{ trans('Tag') }}</span>
                </a>
            </li>
            <li class="active">
                <a href="#">
                    <i class="material-icons">apps</i>
                    <span>{{ trans('Categories') }}</span>
                </a>
            </li>
            <li class="active">
                <a href="#">
                    <i class="material-icons">library_books</i>
                    <span>{{ trans('Posts') }}</span>
                </a>
            </li>
            <li class="active">
                <a href="#">
                    <i class="material-icons">library_books</i>
                    <span>{{ trans('pending_posts') }}</span>
                </a>
            </li>
            <li class="active">
                <a href="#">
                    <i class="material-icons">favorite</i>
                    <span>{{ trans('favor_posts') }}</span>
                </a>
            </li>
            <li class="active">
                <a href="#">
                    <i class="material-icons">comment</i>
                    <span>{{ trans('comment') }}</span>
                </a>
            </li>
            <li class="active">
                <a href="#">
                    <i class="material-icons">account_circle</i>
                    <span>{{ trans('author') }}</span>
                </a>
            </li>
            <li class="active">
                <a href="#">
                    <i class="material-icons">subscriptions</i>
                    <span>{{ trans('subcriber') }}</span>
                </a>
            </li>
            <li class="header">System</li>
            <li class="active">
                <a href="#">
                    <i class="material-icons">settings</i>
                    <span>{{ trans('setting') }}</span>
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="material-icons">input</i>
                    <span>{{ trans('Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
