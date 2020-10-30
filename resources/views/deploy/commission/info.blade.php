@extends('layouts/global', [
	'page_title' => 'Commission Info',
	'has_navbar' => true,
	'has_footer' => true,
])

@section('content')
	@php
		$commissions_open = get_setting('commissions_open', 'boolean');
		$commissions_closed_message = get_setting('commissions_closed_message', 'string');
	@endphp
	<div class="container">
		<div class="mb-4 commission-status {{ $commissions_open ? 'commission-status-open' : 'commission-status-closed' }}">
			<h3>Commissions are {{ $commissions_open ? 'open!' : 'closed.' }}</h3>
			@if (!$commissions_open)
			<p class="mb-0 lead">{{ $commissions_closed_message }}</p>
			@endif
		</div>

		<p class="lead">This is a general guide for estimating how much your commission will cost. Prices vary per commission, as they can change as a result of more complex characters, backgrounds, or other factors.</p>
		<p class="lead"> there something you want that isn't listed here? You can contact me via any of my socials for an exact quote!</p>

		@if(!request()->should_use_mobile)
			@include('partials/commission/_figures-desktop')
		@else
			@include('partials/commission/_figures-mobile')
		@endif

		<a href="https://docs.google.com/forms/d/e/1FAIpQLSer8Tjsw2IO-kxs1cS8l8oQFY807j90ombSNDbJTl-MvMVQmg/viewform" class="mt-4 p-3 btn btn-primary btn-block text-white" target="_blank">Commission Form</a>
	</div>
@endsection