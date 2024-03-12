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
                    <!-- Display the announcements here -->

                    @foreach ($announcements as $announcement)
                        <div class="announcement">
                            <a href="{{ route('announcement_show', ['id' => $announcement['id']]) }}">
                                <span class="announcement-title">{{ $announcement['title'] }}</span>
                                <div class="announcement-content">
                                    <p class="announcement-content">{{ $announcement['description'] }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach

                    <!-- <div class="announcement">
                        <span class="announcement-title">Titre de l'annonce</span>
                        <div class="announcement-content">
                            <img src="https://cdn-images-1.medium.com/v2/resize:fit:2000/1*9UN-8OUzyVJBaKiVNX5dig.png" alt="announcement-illustration" class="announcement-illustration" />
                            <p>Cras laoreet quam mi, a rhoncus magna faucibus sit amet. In sagittis ante ac lorem cursus, vitae rutrum ligula tincidunt. Integer diam nisl, volutpat id est eget, posuere lacinia lectus. Aenean vel urna mattis, elementum erat eu, sagittis velit. Phasellus porta lectus vel erat sollicitudin tincidunt. Sed elementum ullamcorper orci, a volutpat ligula tincidunt aliquam. Proin rutrum ultricies mi vitae fringilla. Nulla at lacus hendrerit, euismod tortor eu, tempor felis. Praesent nec tempus massa. Morbi ut commodo diam. Praesent ac neque nisl. Ut consequat, magna luctus porttitor eleifend, ex nulla hendrerit enim, sit amet tristique dui velit ac ipsum. Donec posuere aliquet faucibus. Vivamus pulvinar interdum nisi ut volutpat.</p>
                        </div>
                    </div>

                    <div class="announcement">
                        <span class="announcement-title">Titre de l'annonce</span>
                        <div class="announcement-content">
                            <p class="announcement-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam venenatis, sapien vel viverra dapibus, ante magna blandit justo, non porttitor turpis ipsum at odio. Fusce...</p>
                        </div>
                    </div>

                    <div class="announcement">
                        <span class="announcement-title">Titre de l'annonce</span>
                        <div class="announcement-content">
                            <p class="announcement-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam venenatis, sapien vel viverra dapibus, ante magna blandit justo, non porttitor turpis ipsum at odio. Fusce...</p>
                        </div>
                    </div> -->

                    <!-- Display the announcements here -->
                </div>
            </main>
        </div>

		<script type="text/javascript" src="./../../js/script.js"></script>
    </body>
</html>