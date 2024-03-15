<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mayotte annonce</title>
        <link rel="stylesheet" href="/css/dashboard.css" />
		<link rel="stylesheet" href="/css/style.css" />
    </head>
    <body>
		<div id="page">
			@include('fragment/navigation_bar')

            <main>
                <h2 class="welcome-message">Bienvenue sur votre tableau de bord, {{ $user['firstname'] }} {{ $user['lastname'] }}</h2>

				<div class="dashboard">
					<div class="left-side">
						<div id="user-avatar" class="user-avatar"></div>

						<a href="{{ route('announcement_user') }}">Mes annonces</a>
						<a href="{{ route('announcement_index') }}">Liste des annonces</a>
						<a href="{{ route('announcement_add') }}">Créer une annonce</a>
						<a href="{{ route('profile.edit') }}">Gérer mon compte</a>
						<a href="{{ route('announcement_category_index') }}">Gérer les catégories d'annonces</a>
					</div>

					<div class="right-side">
						<div class="user-info">
							<span class="field-name">Nom</span>
							<span class="field-value">{{ $user['lastname'] }}</span>
						</div>

						<div class="user-info">
							<span class="field-name">Prénom</span>
							<span class="field-value">{{ $user['firstname'] }}</span>
						</div>

						<div class="user-info">
							<span class="field-name">Email</span>
							<span class="field-value">{{ $user['email'] }}</span>
						</div>

						<div class="user-info">
							<span class="field-name">Téléphone</span>
							<span class="field-value">{{ $user['phone'] }}</span>
						</div>

						<div class="user-info">
							<span class="field-name">Role</span>
							<span class="field-value">Administrateur</span>
						</div>
					</div>
				</div>
            </main>
		</div>

		<script type="text/javascript" src="/js/script.js"></script>

		<script>
			const userAvatarPicture = {{ Js::from($user['avatar']) }};
			const userAvatarDiv = document.getElementById('user-avatar');

			if (userAvatarPicture != '' && userAvatarPicture != null) {
				userAvatarDiv.style.background = 'url("' + userAvatarPicture + '")';
				userAvatarDiv.style.backgroundSize = '100% auto';
			}
		</script>
    </body>
</html>
