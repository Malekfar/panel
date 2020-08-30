<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        {{ __('auth.login') }}
    </title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="/admin/css/app.css">
    <!-- Place favicon.ico in the root directory -->
    <!-- Optional: page related CSS-->
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-brands.css">
</head>
<body>
<div class="page-wrapper" id="page-loign">
    <div class="page-inner bg-brand-gradient">
        <div class="page-content-wrapper bg-transparent m-0">
            <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                <div class="d-flex align-items-center container p-0">
                    <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                        <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                            <img src="admin/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                            <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex-1" style="background: url(/admin/img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                    <div class="row">
                        <div class="col col-md-6 col-lg-7 hidden-sm-down">
                            <h2 class="login-title fs-xxl fw-500 mt-4 text-white">

                                <small class="login-description h3 fw-300 mt-3 mb-5 text-white opacity-60">

                                </small>
                            </h2>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                            <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
                                Secure login
                            </h1>
                            <div class="card p-4 rounded-plus bg-faded">
                                <form id="js-login" method="POST" action="{{ route('dashboard.login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="username">{{__('auth.login.email')}}  </label>
                                        <input type="email" id="username" name="email" class="form-control form-control-lg" placeholder="{{__('auth.login.email.placeholder')}}" value="drlantern@gotbootstrap.com" required>
                                        @if(isset($errors) && $errors->get('email'))
                                            <div class="invalid-feedback" style="display:block">{{__('auth.login.email.feedback')}} </div>
                                        @else
                                            <div class="help-block">{{__('auth.login.email.help')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">{{ __('auth.password') }}</label>
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="{{ __('auth.password') }}" value="password123" required>
                                        <div class="invalid-feedback">{{__('auth.login.password.feedback')}}</div>
                                        <div class="help-block">{{ __('auth.password') }}</div>
                                    </div>
                                    <div class="form-group text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberme" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="rememberme"> {{__('auth.login.remember')}}</label>
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-lg-12 pr-lg-12 my-2">
                                            <button id="js-login-btn" type="submit" class="btn btn-danger btn-block btn-lg">{{ __('auth.login.button') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/admin/js/app.js"></script>
<script>
    $("#js-login-btn").click(function(event)
    {
        // Fetch form to apply custom Bootstrap validation
        var form = $("#js-login")
        if (form[0].checkValidity() === false)
        {
            event.preventDefault()
            event.stopPropagation()
        }
        form.addClass('was-validated');
        // Perform ajax submit here...
    });
</script>
</body>
</html>
