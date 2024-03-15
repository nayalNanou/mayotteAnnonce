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
						@if (count($announcements) == 0)
							<p>Aucune annonce n'a été posté ce mois-ci</p>
						@else
							@foreach ($announcements as $announcement)
								<div class="announcement">
									<a href="{{ route('announcement_click', ['id' => $announcement->id]) }}">
										<div class="announcement-header">
											<div>
												<span class="announcement-title">
													{{ $announcement->title }}
													@if (!empty($announcement->price))
														- {{ $announcement->price }}€
													@endif
												</span>
												<span class="announcement-views">{{ $announcement->number_of_views }} vues</span>
											</div>
											<span class="time-elapsed">{{ $toolbox->time_elapsed_string($announcement->created_at) }}</span>
										</div>
										<div class="announcement-content">
											<img src="/upload/announcement/{{ $announcement->image }}" alt="announcement-illustration" class="announcement-illustration" />
											<p>{{ $announcement->description }}</p>
										</div>
									</a>
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</main>
		</div>

		<script type="text/javascript" src="/js/script.js"></script>
    </body>
</html>
