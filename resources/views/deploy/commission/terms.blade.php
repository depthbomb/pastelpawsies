@extends('layouts/global', [
	'page_title' => 'Commission Terms',
	'has_navbar' => true,
	'has_footer' => true,
])

@push('precontent')
<header class="masthead">
	<div class="container">
		<h1>Commission Terms</h1>
	</div>
</header>
@endpush

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<h2 class="ki ki-bold">Requirements</h2>
			</div>
			<div class="col-lg-9">
				<ul>
					<li>Please make sure that you are able to pay shortly after I confirm your commission. I only accept payments through PayPal. I do not and will not accept any other forms of payment.</li>
					<li>Visual references are very much preferred. I will work without a visual reference but that may be accompanied with a fee depending on what is asked.</li>
					<li>You may not commission NSFW work unless you are at least 18. If I have a reason to suspect that you are under 18, I will refuse.</li>
				</ul>
			</div>
		</div>

		<div class="mt-5 row">
			<div class="col-lg-3">
				<h2 class="ki ki-bold">Payment</h2>
			</div>
			<div class="col-lg-9">
				<ul>
					<li>I use PayPal for payments. No account with PayPal is needed, only a working credit or debit card and an email. (Prepaid Visa cards also work.)</li>
					<li>All of my prices are in USD.</li>
					<li>You will receive an invoice from me with my PayPal email. I will not begin work on your commission until your commission is paid for. If your payment isn't received within five days of the invoice being sent, your commission will be cancelled.</li>
					<li>I charge a 4% fee to the base price of your commission to compensate for PayPal seller fees.</li>
					<li>If there are extenuating circumstances and you cannot pay within five days, contact me so we can work something out.</li>
					<li>I do not accept other types of payments.</li>
					<li>If you are splitting a payment, please inform me.</li>
				</ul>
			</div>
		</div>

		<div class="mt-5 row">
			<div class="col-lg-3">
				<h2 class="ki ki-bold">Process</h2>
			</div>
			<div class="col-lg-9">
				<ul>
					<li>You may opt-in to receive work-in-progress updates of your commission. You may request changes to W.I.P.s, as long as it falls in line with the theme of what was commissioned.</li>
					<li>I may post a W.I.P. of your commission publicly. If you would like me not to, please inform me.</li>
					<li>If asked, I give you an estimated completion date when I finish your sketch, and in the case that it is not possible for me to complete it by this date, I will inform you.</li>
					<li>I have a Trello! If you would like to view the progress of your commission, you can do so by visiting my commission queue on <a href="{{ route('trello') }}" target="_blank">Trello.</a></li>
				</ul>
			</div>
		</div>

		<div class="mt-5 row">
			<div class="col-lg-3">
				<h2 class="ki ki-bold">Artist Rights</h2>
			</div>
			<div class="col-lg-9">
				<ul>
					<li>I will refuse to draw certain topics if they make me feel uncomfortable. <a href="#forbidden-topics" data-toggle="collapse">Click here to see that list of topics.</a></li>
					<ul id="forbidden-topics" class="collapse">
						<li>Underaged characters</li>
						<li>Derogatory themes</li>
						<li>Scat/watersports</li>
						<li>Transformation</li>
						<li>Micro/Macro</li>
						<li>Inflation</li>
						<li>Vore</li>
						<li>Gore</li>
					</ul>
					<li>I reserve the right to deny or refuse a commission due to a breach of my Terms of Service.</li>
					<li>I reserve the right to post your commission for non-commercial uses. If you would like your art not to be posted, please tell me in advance and I will not.</li>
					<li>In the case of Telegram stickers, I will send you a compressed folder with your stickers and my contact info sticker. I will also send you a link to the sticker pack. Please do not remove the contact info sticker, but feel free to add the stickers to your own pack.</li>
				</ul>
			</div>
		</div>

		<div class="mt-5 row">
			<div class="col-lg-3">
				<h2 class="ki ki-bold">Commissioner Rights</h2>
			</div>
			<div class="col-lg-9">
				<ul>
					<li>You may post the artwork on social media, and a link back to me as the artist would be appreciated.</li>
					<li>You may use art for promotional/personal purposes, but you may not make direct and significant changes to the artwork. I will either do it for you for a fee, depending on what is asked or I will allow you to do so. You may not remove my watermark.</li>
					<li>You reserve the right to request for an edit for free if it was a mistake on my behalf.</li>
					<li>You may not use my artwork for profit (an exception is if you are selling the character and my artwork is included).</li>
				</ul>
			</div>
		</div>

		<div class="mt-5 row">
			<div class="col-lg-3">
				<h2 class="ki ki-bold">Refunds</h2>
			</div>
			<div class="col-lg-9">
				<ul>
					<li>If you decide that you would like to refund, please inform me as soon as you can.</li>
					<li>A full refund will be made if I have not started on your commission yet.</li>
					<li>A partial refund will be made if I have started on your commission, and the refund amount will be based on what has been completed.</li>
				</ul>
			</div>
		</div>
	</div>
@endsection