<!DOCTYPE html><!--

	Made with love by depthbomb 🐐
	https://s.team/p/fwc-crhc
	------------------------------
	Release Candidate 4 -- https://github.com/depthbomb/pastelpawsies

--><html lang="en" dir="ltr" class="www">
	<head>
		@include('partials/_prejs')
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="theme-color" content="#9783fe">
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

		<meta property="og:site_name" content="pastelpawsies">
		<meta property="og:locale" content="en_US">
		<meta property="og:title" content="{{ page_title($page_title ?? null) }}">
		<meta property="og:url" content="{{ request()->url() }}">
		<meta property="og:description" content="furry artist & illustrator">
		<meta property="og:image" content="{{ bust('/assets/img/app/app-144.png') }}">
		<meta property="og:image:secure_url" content="{{ bust('/assets/img/app/app-144.png') }}">
		<meta property="og:image:type" content="image/png">
		<meta property="og:image:width" content="144">
		<meta property="og:image:height" content="144">
		<meta property="og:type" content="website">

		<meta itemprop="name" content="{{ page_title($page_title ?? null) }}">
		<meta itemprop="url" content="{{ request()->url() }}">
		<meta itemprop="description" content="furry artist & illustrator">
		<meta itemprop="image" content="{{ bust('/assets/img/app/app-144.png') }}">

		<meta name="twitter:card" content="summary">
		<meta name="twitter:title" content="{{ page_title($page_title ?? null) }}">
		<meta name="twitter:url" content="{{ request()->url() }}">
		<meta name="twitter:description" content="furry artist & illustrator">
		<meta name="twitter:image" content="{{ bust('/assets/img/app/app-144.png') }}">

		@stack('head')
	</head>
<body id="{{ isset($id) ? $id : 'not-nirvana-goatfood' }}" class="{{ $has_navbar ? 'has-navbar' : 'has-no-navbar' }} {{ theme_class('bg-dark text-white', 'bg-white text-dark') }}">
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