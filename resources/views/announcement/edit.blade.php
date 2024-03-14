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
                <a href="{{ route('announcement_show', ['id' => $announcement->id]) }}" class="back-button">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" /></svg>
                    <span>Retour</span>
                </a>

                <h2>Modifier l'annonce</h2>

                <form method="post" action="{{ route('announcement_update') }}" enctype="multipart/form-data">
                    @csrf <!-- {{ csrf_field() }} -->
                    <div class="form-field">
                        <label for="announcement-title">Titre de l'annonce</label>
                        <input type="text" name="announcement-title" id="announcement-title" value="{{ $announcement->title }}" />
                    </div>

                    <div class="form-field">
                        <label for="announcement-description">Contenu de l'annonce</label>
                        <textarea name="announcement-description" id="announcement-description">{{ $announcement->description }}</textarea>
                    </div>

                    <div class="form-field">
                        <label for="announcement-category">Catégorie de l'annonce</label>
                        <select name="announcement-category" id="announcement-category">
                            @foreach ($announcementCategories as $announcementCategory)
                                <option {{ $announcement->announcement_categories_id == $announcementCategory->id ? "selected" : "" }} value="{{ $announcementCategory['id'] }}">{{ $announcementCategory['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-field">
                        <label for="announcement-price">Prix (Facultatif : si l'annonce est une vente)</label>
                        <input type="number" name="announcement-price" id="announcement-price" value="{{ $announcement->price }}" />
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

                    <div class="associated-image">
                        <!-- <img src="https://cdn-images-1.medium.com/v2/resize:fit:2000/1*9UN-8OUzyVJBaKiVNX5dig.png" alt="associated-image" />
                        <img src="https://cdn-images-1.medium.com/v2/resize:fit:2000/1*9UN-8OUzyVJBaKiVNX5dig.png" alt="associated-image" />
                        <img src="https://cdn-images-1.medium.com/v2/resize:fit:2000/1*9UN-8OUzyVJBaKiVNX5dig.png" alt="associated-image" /> -->
                        <img src="/upload/announcement/{{ $announcement->image }}" alt="associated-image" />
                    </div>

                    <input type="hidden" id="announcement-id" name="announcement-id" value="{{ $announcement->id }}" />

                    <input type="submit" value="Modifier l'annonce" />
                </form>
            </main>
        </div>

		<script type="text/javascript" src="./../../js/script.js"></script> 
    </body>
</html>