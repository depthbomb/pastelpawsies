@extends('layouts/global', [
	'page_title' => '',
	'has_navbar' => false,
	'has_footer' => false,
])

@section('content')
<div class="hero">
	<div class="hero-content">
		<h1>pastelpawsies <span class="pp-paw"></span></h1>
		<p>furry artist &amp; illustrator</p>
		<div class="hero-buttons">
			<a href="{{ route('about') }}" class="btn {{ theme_class('btn-outline-light', 'btn-outline-dark') }}">About Me</a>
			<a href="{{ route('gallery.index') }}" class="btn {{ theme_class('btn-outline-light', 'btn-outline-dark') }}">Gallery</a>
			<a href="{{ route('commission.info') }}" class="btn {{ theme_class('btn-outline-light', 'btn-outline-dark') }}">Commission Info</a>
		</div>
	</div>
</div>
@endsection