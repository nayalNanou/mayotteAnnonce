<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mayotte annonce</title>
        <link rel="stylesheet" href="/css/home.css" />
		<link rel="stylesheet" href="/css/style.css" />
    </head>
    <body>
		<div id="page">
			@include('fragment/navigation_bar')

			<div class="decorative-image-website">
				<a href="{{ route('announcement_index') }}" class="link-see-announcements">
					<span>Voir les annonces</span>
				</a>
			</div>

			<main>
				<div class="announcement-section">
					<h3>Annonces les plus vues du mois</h3>

					<div class="list-announcement">

						<!-- Example announcements -->

						<div class="announcement">
							<a href="#">
								<span class="announcement-title">Titre de l'annonce</span>
								<span class="short-description">Courte description de l'annonce...</span>
							</a>
						</div>

						<div class="announcement">
							<a href="#">
								<span class="announcement-title">Titre de l'annonce</span>
								<span class="short-description">Courte description de l'annonce...</span>
							</a>
						</div>

						<div class="announcement">
							<a href="#">
								<span class="announcement-title">Titre de l'annonce</span>
								<span class="short-description">Courte description de l'annonce...</span>
							</a>
						</div>

						<!-- Example announcements -->

					</div>
				</div>
			</main>
		</div>

		<script type="text/javascript" src="/js/script.js"></script>
    </body>
</html>
