<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link rel="stylesheet" href="./../../css/style.css" />
        <link rel="stylesheet" href="./../../css/announcement/add.css" />
    </head>

    <body>
        <div id="page">
            @include('fragment/navigation_bar')

            <main>
                <h2>Modifier la catégorie d'annonce</h2>

                <form method="get" action="{{ route('announcement_category_update') }}">
                    <div class="form-field">
						<input type="hidden" name="announcement-category-id" id="announcement-category-id" value="{{ $announcementCategory['id'] }}" />

                        <label for="announcement-category-name">Nom de la catégorie</label>
                        <input type="text" name="announcement-category-name" id="announcement-category-name" value="{{ $announcementCategory['name'] }}" />
                    </div>

                    <input type="submit" value="Modifier l'annonce" />
                </form>
            </main>
        </div>

		<script type="text/javascript" src="./../../js/script.js"></script> 
    </body>
</html>