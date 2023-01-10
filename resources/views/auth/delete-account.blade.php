<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->
<head>

    <!--begin::Base Path (base relative path for assets of this page) -->
    <base href="../../../../">

    <!--end::Base Path -->
    <meta charset="utf-8" />
    <title>{{env('APP_NAME')}}

        | Delete My account</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{asset('assets/css/demo1/pages/general/login/login-3.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/demo1/pages/general/login/login-3.rtl.min.css')}}" rel="stylesheet" type="text/css" />

    <!--end::Page Custom Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="{{asset('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />

    <!--end:: Global Mandatory Vendors -->

    <link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{asset('assets/css/demo1/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/demo1/style.bundle.rtl.min.css')}}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{asset('assets/css/demo1/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/demo1/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/demo1/skins/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/demo1/skins/aside/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" type="text/css" />

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{asset('assets/media//bg/bg-3.jpg')}});">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper user-form">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="#">
                            <img src="{{asset('assets/media/logos/logo-5.png')}}" alt="logo" class="img-fluid logo-a">
                        </a>
                        {{--                        <a href="{{route('lang','ar')}}">AR</a> |--}}
                        {{--                        <a href="{{route('lang','en')}}">EN</a>--}}
                    </div>
                    <div class="kt-login__signin">
                        @if(session()->has('loginFailed'))
                            <div class="alert" role="alert" style="color: red">
                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                <div class="alert-text">{{session()->get('loginFailed')}}</div>
                            </div>
                        @endif
                            @if(session()->has('success'))
                                <div class="alert" role="alert" style="color: red">
                                    <div class="alert-icon"><i class=""></i></div>
                                    <div class="alert-text">{{session()->get('success')}}</div>
                                </div>
                            @endif
                        <div class="alert alert-danger" style="color: red">Delete your account </div>
                        <form class="kt-form"  method="POST" action="{{ route('delete_account') }}">
                            @csrf
                            <div class="input-group">
                                <input class="form-control{{ $errors->has('company_code') ? ' is-invalid' : '' }}" type="text" placeholder="Your company code" name="company_code" value="{{ old('company_code') }}">
                                @if ($errors->has('company_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group">
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" placeholder="{{ ucwords(trans('common.email'))}}" name="email" value="{{ old('email') }}" autocomplete="off">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group">
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="{{ ucwords(trans('common.password'))}}" name="password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="kt-login__actions">
                                <button type="submit" class="btn btn-elevate kt-login__btn-primary">Delete</button>
                            </div>


                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


</body>

<!-- end::Body -->
</html>


