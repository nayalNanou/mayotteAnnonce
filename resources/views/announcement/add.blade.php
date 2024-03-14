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
                <h2>Créer une annonce</h2>

                <form method="post" action="{{ route('announcement_save') }}" enctype="multipart/form-data">
                    @csrf <!-- {{ csrf_field() }} -->
                    <div class="form-field">
                        <label for="announcement-title">Titre de l'annonce</label>
                        <input type="text" name="announcement-title" id="announcement-title" />
                    </div>

                    <div class="form-field">
                        <label for="announcement-description">Contenu de l'annonce</label>
                        <textarea name="announcement-description" id="announcement-description"></textarea>
                    </div>

                    <div class="form-field">
                        <label for="announcement-category">Catégorie de l'annonce</label>
                        <select name="announcement-category" id="announcement-category">
                            @foreach ($announcementCategories as $announcementCategory)
                                <option value="{{ $announcementCategory['id'] }}">{{ $announcementCategory['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-field">
                        <label for="announcement-price">Prix (Facultatif : si l'annonce est une vente)</label>
                        <input type="number" name="announcement-price" id="announcement-price" />
                    </div>

                    <!-- <div class="form-field">
                        <p>Associer des images à l'annonce</p>
                        <div>
                            <label for="image">Uploader l'image</label>
                            <input type="file" name="image" id="image" />
                            <span>Ou</span>
                            <label for="image-link">Insérer l'url d'une image</label>
                            <input type="text" name="image-link" id="image-link" />
                        </div>
                    </div> -->

                    <div class="form-field">
                        <label for="announcement-image">Image associé à l'annonce</label>
                        <input type="file" id="announcement-image" name="announcement-image" />
                    </div>

                    <!-- <div class="associated-image">
                        <img src="https://cdn-images-1.medium.com/v2/resize:fit:2000/1*9UN-8OUzyVJBaKiVNX5dig.png" alt="associated-image" />
                        <img src="https://cdn-images-1.medium.com/v2/resize:fit:2000/1*9UN-8OUzyVJBaKiVNX5dig.png" alt="associated-image" />
                        <img src="https://cdn-images-1.medium.com/v2/resize:fit:2000/1*9UN-8OUzyVJBaKiVNX5dig.png" alt="associated-image" />
                    </div> -->

                    <input type="submit" value="Créer l'annonce" />
                </form>
            </main>
        </div>

		<script type="text/javascript" src="./../../js/script.js"></script> 
    </body>
</html>