<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css')  }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/flag-icon-css/css/flag-icon.css') }}">
</head>

<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('images/signin-image.jpg') }}" alt="sing up image"></figure>
                        <a href="{{ route('register') }}" class="signup-image-link">{{ trans('new_account') }}</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">{{ trans('Login') }}</h2>
                        <p class="require-field">* {{ trans('require_text')}}</p>
                        <form method="POST" class="register-form" id="login-form" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="your_name" class=" @error('email') is-invalid @enderror" placeholder="{{ trans('your_email') }}" />

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="your_pass">
                                    <i class="zmdi zmdi-lock">
                                    </i>
                                    </label>
                                <input type="password" name="password" class="@error('password') is-invalid @enderror" id="your_pass" placeholder="{{ trans('password') }}" />

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input"  {{ old('remember') ? 'checked' : '' }} />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>{{ trans('Remember me') }}</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="{{ trans('Login') }}" />
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">{{ trans('lang') }}</span>
                            <ul class="socials">
                                <li><a href="{{ route('lang',['lang' => 'vi']) }}"><i class="display-flex-center flag-icon flag-icon-vn"></i></a></li>
                                <li><a href="{{ route('lang',['lang' => 'en']) }}"><i class="display-flex-center flag-icon flag-icon-gb"></i></a></li>
                            </ul>
                        </div>
                        <div class="social-login">
                            <span class="social-label">{{ trans('social') }}</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
