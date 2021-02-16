<header>
    <div class="container-fluid position-relative no-side-padding">
        <a href="{{ route('home') }}" class="logo">Blog</a>

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

        <ul class="main-menu visible-on-click" id="main-menu">
            <li><a href="{{ route('post.index') }}">Posts</a></li>
            <li><a href="{{ route('lang', ['lang' => 'vi']) }}">
                    <i class="flag-icon flag-icon-vn"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('lang', ['lang' => 'en']) }}">
                    <i class="flag-icon flag-icon-gb"></i>
                </a>
            </li>
            @guest
                <li><a href="{{ route('login') }}">{{ trans('Login') }}</a></li>
                <li><a href="{{ route('register') }}">{{ trans('Register') }}</a></li>
            @else
                @if (Auth::user()->role->id == 1)
                    <li><a href="{{ route('dashboard') }}">{{ trans('Dashboard') }}</a></li>
                @endif
                @if (Auth::user()->role->id == 2)
                    <li><a href="{{ route('about') }}">{{ trans('Profile') }}</a></li>
                @endif
            @endguest
        </ul><!-- main-menu -->

        <div class="src-area">
            <form method="GET" action="{{ route('search') }}">
                <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                <input class="src-input" value="{{ isset($query) ? $query : '' }}" name="query" type="text"
                    placeholder="Search">
            </form>
        </div>
    </div><!-- conatiner -->
</header>
