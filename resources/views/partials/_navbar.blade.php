<nav id="navigation" class="navbar navbar-expand-lg {{ theme_class('navbar-dark bg-darker', 'navbar-light bg-white') }} fixed-top at-top">
	<div class="container">
		<a href="{{ route('landing') }}" class="navbar-brand">pastelpawsies <span class="pp-paw"></span></a>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link {{ active_class('landing') }}" href="{{ route('landing') }}">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ active_class('about') }}" href="{{ route('about') }}">About Me</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ active_class('gallery.*') }}" href="{{ route('gallery.index') }}">Gallery</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle {{ active_class('commission.*') }}" href="#" role="button" data-toggle="dropdown">Commissions</a>
				<ul class="dropdown-menu {{ theme_class('dropdown-menu-dark') }}">
					<li><a href="{{ route('commission.info') }}" class="dropdown-item">Info</a></li>
					<li><a href="{{ route('commission.terms') }}"class="dropdown-item">Terms</a></li>
				</ul>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="ml-1 d-flex nav-item align-items-center">
				<div class="form-check form-switch">
					<input class="form-check-input" type="checkbox" id="theme-toggler" {{ uses_dark_theme() ? 'checked' : '' }}>
					<label class="form-check-label" for="theme-toggler">Dark Theme</label>
				</div>
			</li>
		</ul>
	</div>
</nav>