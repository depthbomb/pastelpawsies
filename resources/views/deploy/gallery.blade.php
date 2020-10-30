@extends('layouts/global', [
	'page_title' => 'Gallery',
	'has_navbar' => true,
	'has_footer' => true,
])

@push('precontent')
<header class="masthead">
	<div class="container">
		<h1>Gallery</h1>
	</div>
</header>
@endpush

@section('content')
<div class="container">
	<div id="gallery">
		@foreach ($images->chunk(4) as $chunk)
		<div class="row {{ !$loop->first ? 'mt-4' : 'mb-0' }}">
			@foreach ($chunk as $title => $image)
			<div class="col-lg-3">
				<div class="gallery-thumbnail">
					<img src="{{ route('gallery.thumbnail', $image) }}" title="{{ $title }}" alt="{{ $title }}" data-full="{{ route('gallery.image', $image) }}">
				</div>
			</div>
			@endforeach
		</div>
		@endforeach
	</div>
</div>
@endsection