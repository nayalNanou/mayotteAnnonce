<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link rel="stylesheet" href="./../../css/announcement/announcement.css" />
        <link rel="stylesheet" href="./../../css/style.css" />
    </head>

    <body>
        <div id="page">
			@include('fragment/navigation_bar')

            <main>
                <h2>Liste des annonces</h2>

                <div class="filter-fields">
                    <div class="filter-field" id="categorie-filter">
                        <label for="announcement-category">Catégorie</label>
                        <select id="announcement-category" name="announcement-category">
                            <option value="all">Tous</option>
                            <option value="sport">Sport</option>
                            <option value="real_estate">Immobilier</option>
                            <option value="video_games">Jeux vidéos</option>
                            <option value="politics">Politique</option>
                        </select>
                    </div>

                    <div class="filter-field">
                        <label for="announcement-search">Recherche</label>
                        <input type="search" id="announcement-search" name="announcement-search" />
                    </div>
                </div>

                <a href="{{ route('announcement_add') }}" class="button-create-announcement">+ Créer une annonce</a>

                <div class="list-announcement">
				    @if (count($announcements) == 0)
                        <p>Il n'y a pas d'annonces</p>
                    @else
                        @foreach ($announcements as $announcement)
                            <div class="announcement">
                                <a href="{{ route('announcement_show', ['id' => $announcement['id']]) }}">
                                    <span class="announcement-title">
                                        {{ $announcement['title'] }}
                                        @if (!empty($announcement['price']))
                                            - {{ $announcement['price'] }}€
                                        @endif
                                    </span>
                                    <div class="announcement-content">
                                        <img src="/upload/announcement/{{ $announcement['image'] }}" alt="announcement-illustration" class="announcement-illustration" />
                                        <p>{{ $announcement['description'] }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </main>
        </div>

		<script type="text/javascript" src="./../../js/script.js"></script>
    </body>
</html>