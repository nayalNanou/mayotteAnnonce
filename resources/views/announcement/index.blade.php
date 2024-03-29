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

                <form method="get" action="{{ route('announcement_index') }}" class="filter-form">
                    <div class="filter-fields" method="get" action="{{ route('announcement_index') }}">
                        <div class="filter-field" id="categorie-filter">
                            <label for="announcement-category">Catégorie</label>
                            <select id="announcement-category" name="announcement-category">
                                <option value="all">Tous</option>
                                @foreach ($announcementCategories as $announcementCategory)
                                    <option {{ $categoryFilter == $announcementCategory['id'] ? 'selected' : null }} value="{{ $announcementCategory['id'] }}">{{ $announcementCategory['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="filter-field">
                            <label for="announcement-search">Recherche</label>
                            <input type="search" id="announcement-search" name="announcement-search" value="{{ $searchFilter }}" />
                        </div>
                    </div>

                    <input type="submit" value="Filtrer" />
                </form>

                <a href="{{ route('announcement_add') }}" class="button-create-announcement">+ Créer une annonce</a>

                <div class="list-announcement">
				    @if (count($announcements) == 0)
                        <p>Il n'y a pas d'annonces</p>
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
            </main>
        </div>

		<script type="text/javascript" src="./../../js/script.js"></script>
    </body>
</html>