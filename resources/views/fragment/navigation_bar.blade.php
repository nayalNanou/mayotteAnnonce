<nav class="navigation-bar">
	<h1 class="website-title"><a href="{{ url('/') }}">Mayotte Annonce</a></h1>
	@if (Route::has('login'))
		<div class="user-information">
			<span class="user-full-name">
				@if (isset($user) && !empty($user))
					{{ $user['firstname'] }} {{ $user['lastname'] }}
				@endif
			</span>
			<div id="user-icon" class="user-icon">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
					<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
					<path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
					<path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
				</svg>
				<div id="user-menu" class="user-menu">
					@auth
						<a class="user-navigation-link" href="{{ url('/dashboard') }}">Tableau de bord</a>

						<a class="user-navigation-link" href="{{ url('/profile') }}">Profil</a>

						<form method="POST" action="{{ route('logout') }}">
							@csrf

							<a class="user-navigation-link" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Se déconnecter</a>
						</form>
					@else
						<a class="user-navigation-link" href="{{ route('login') }}">Se connecter</a>

						@if (Route::has('register'))
							<a class="user-navigation-link" href="{{ route('register') }}">S'inscrire</a>
						@endif
					@endauth
				</div>
			</div>
		</div>
	@endif
</nav>