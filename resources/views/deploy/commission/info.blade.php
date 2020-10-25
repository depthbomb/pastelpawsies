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


		<div class="commission-figure commission-figure-right {{ theme_class(null, 'commission-figure-light') }}" style="background-image:url('{{ bust('/assets/img/commissions/figure1.png') }}');">
			<div class="commission-figure-info">
				<div class="commission-figure-info-inner">
					<h2>Character Illustrations</h2>
					<ul>
						<li>Single Character - $30 USD</li>
						<li class="mb-3">Additional Characters - $25 USD</li>

						<li>Cel-Shaded Illustration - $10 USD</li>
						<li>Full-Shaded Illustration - $20 USD</li>
						<li class="mb-3">NSFW - $20+ USD</li>

						<li>Simple Backgrounds - Free!</li>
						<li>Complex Backgrounds - ~$20+ USD, contact me for an exact quote</li>
					</ul>
					<p>Subject to complex character fees</p>
				</div>
			</div>
		</div>

		<div class="commission-figure commission-figure-left {{ theme_class(null, 'commission-figure-light') }}" style="background-image:url('{{ bust('/assets/img/commissions/figure2.png') }}');">
			<div class="commission-figure-info">
				<div class="commission-figure-info-inner">
					<h2>Icons</h2>
					<ul>
						<li>Single Character Icon - $20 USD</li>
						<li>Double Character Icon - $35 USD</li>
					</ul>
					<p>Icons come free with a coloured/splash design of your choice! Accessories may be requested.</p>
				</div>
			</div>
		</div>

		<div class="commission-figure commission-figure-right {{ theme_class(null, 'commission-figure-light') }}" style="background-image:url('{{ bust('/assets/img/commissions/figure3.png') }}');">
			<div class="commission-figure-info">
				<div class="commission-figure-info-inner">
					<h2>Character Reference Sheets</h2>
					<ul>
						<li>Simple Reference Sheet - $75 USD</li>
						<ul>
							<li>This includes a full-body front and back view of your character, a chibi/miniature version of your character, close-ups of body parts of your choosing, and character details of your choosing.</li>
						</ul>
						<li>Complex Reference Sheet - $110 USD</li>
						<ul>
							<li>This includes all of the same details as the Simple Reference Sheet, with the addition of a full-body custom painted pose of your character, 5 accessories of your choosing, and a close up headshot of your character.</li>
						</ul>
					</ul>
					<p>Complex character fees may apply. Want a custom reference sheet with less/more details? Contact me!</p>
				</div>
			</div>
		</div>

		<div class="commission-figure commission-figure-left {{ theme_class(null, 'commission-figure-light') }}" style="background-image:url('{{ bust('/assets/img/commissions/figure4.png') }}');">
			<div class="commission-figure-info">
				<div class="commission-figure-info-inner">
					<h2>Discord Emotes &amp; Telegram Stickers</h2>
					<ul>
						<li>Discord Emotes - $7.50 USD</li>
						<ul>
							<li>This will often be a headshot portrait of your character in order to maintain visibility when using on Discord.</li>
						</ul>
						<li>Telegram Stickers - $15 USD</li>
						<ul>
							<li>Additional Characters - $10 USD</li>
							<li>YCH (Your Character Here) - $5 USD</li>
						</ul>
					</ul>
					<p>The client is able to choose their desired expressions. Purchases of emotes/stickers in large quantities/bulk may be able to receive discounts. Complex character fees may apply.</p>
				</div>
			</div>
		</div>

		<a href="https://docs.google.com/forms/d/e/1FAIpQLSer8Tjsw2IO-kxs1cS8l8oQFY807j90ombSNDbJTl-MvMVQmg/viewform" class="mt-4 p-3 btn btn-primary btn-block text-white" target="_blank">Commission Form</a>
	</div>
@endsection