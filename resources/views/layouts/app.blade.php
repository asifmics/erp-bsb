<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Dashboard</title>
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/googlefont.css">
	<link href="{{asset('contents/admin')}}/assets/css/pages/login/login-2.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('contents/admin')}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('contents/admin')}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('contents/admin')}}/assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('contents/admin')}}/assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('contents/admin')}}/assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('contents/admin')}}/assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('contents/admin')}}/assets/css/style.css" rel="stylesheet" type="text/css" />
    @stack('css')
</head>
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
	<div class="kt-grid kt-grid--ver kt-grid--root">
		<div class="kt-grid kt-grid--hor kt-grid--root kt-login kt-login--v2 kt-login--signin" id="kt_login">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{asset('contents/admin')}}/assets/media/bg/bg-1.jpg);">
				<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
					<div class="kt-login__container">
						<div class="kt-login__logo">
							<a href="#">
								<img src="{{asset('contents/admin')}}/assets/media/logos/logo-main.png">
							</a>
						</div>
						<div class="kt-login__signin">
              @yield('content')
						<div class="kt-login__account">	<span class="kt-login__account-msg">
						Don't have an account yet ?
					</span>&nbsp;&nbsp;	<a href="javascript:;" class="kt-link kt-link--light kt-login__account-link">Sign Up</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{asset('contents/admin')}}/assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
	<script src="{{asset('contents/admin')}}/assets/js/scripts.bundle.js" type="text/javascript"></script>
	<script src="{{asset('contents/admin')}}/assets/js/pages/custom/login/login-general.js" type="text/javascript"></script>
    <script src="{{asset('contents/admin')}}/assets/js/custom.js" type="text/javascript"></script>
    @stack('js')
</body>
</html>
