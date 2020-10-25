<!DOCTYPE html><!--

	Made with love by depthbomb 🐐
	https://s.team/p/fwc-crhc
	------------------------------
	https://github.com/depthbomb/pastelpawsies

--><html lang="en" dir="ltr" class="www">
	<head>
		@include('partials/_prejs')
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>{{ page_title($page_title ?? null) }}</title>
		<link rel="stylesheet" href="{{ bust('/assets/css/app.css') }}">
		<script type="text/javascript">window.BRIDGE={!! bridge() !!};</script>

		<link rel="apple-touch-icon" sizes="60x60" href="{{ bust('/assets/img/app/app-60.png') }}">
		<link rel="apple-touch-icon" sizes="72x72" href="{{ bust('/assets/img/app/app-72.png') }}">
		<link rel="apple-touch-icon" sizes="114x114" href="{{ bust('/assets/img/app/app-114.png') }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ bust('/assets/img/app/app-120.png') }}">
		<link rel="apple-touch-icon" sizes="144x144" href="{{ bust('/assets/img/app/app-144.png') }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ bust('/assets/img/app/app-152.png') }}">
		<link rel="apple-touch-icon" sizes="180x180" href="{{ bust('/assets/img/app/app-180.png') }}">
		<link rel="icon" type="image/ico" href="{{ bust('/favicon.ico') }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ bust('/assets/img/app/app-16.png') }}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ bust('/assets/img/app/app-32.png') }}">
		<link rel="icon" type="image/png" sizes="96x96" href="{{ bust('/assets/img/app/app-96.png') }}">
		<link rel="icon" type="image/png" sizes="192x192" href="{{ bust('/assets/img/app/app-192.png') }}">

		@stack('head')
	</head>
	<body class="{{ $has_navbar ? 'has-navbar' : 'has-no-navbar' }} {{ theme_class('bg-dark text-white', 'bg-white text-dark') }}">
		@if ($has_navbar)
			@include('partials/_navbar')
		@endif
		@stack('precontent')
		<div class="content">
			@yield('content')
		</div>
		@if ($has_footer)
			@include('partials/_footer')
		@endif
		@if (app()->environment() === 'production')
		<script src="{{ bust('/assets/js/runtime.js') }}"></script>
		<script src="{{ bust('/assets/js/vendor.js') }}"></script>
		@endif
		<script src="{{ bust('/assets/js/main.js') }}"></script>
		@stack('foot')
	</body>
</html>