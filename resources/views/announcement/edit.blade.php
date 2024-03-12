<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link rel="stylesheet" href="./../../css/style.css" />
        <link rel="stylesheet" href="./../../css/announcement/edit.css" />
    </head>

    <body>
        <div id="page">
            <nav class="navigation-bar">
                <h1 class="website-title"><a href="#">Mayotte Annonce</a></h1>
				<div class="user-information">
					<span class="user-full-name">Tanja Peronel</span>
					<div id="user-icon" class="user-icon">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
		
						<div id="user-menu" class="user-menu">
							<a class="user-navigation-link" href="#">Se connecter</a>
							<a class="user-navigation-link" href="#">S'inscrire</a>
							<a class="user-navigation-link" href="#">Profil</a>
							<a class="user-navigation-link" href="#">Se déconnecter</a>
						</div>
					</div>
				</div>
            </nav>

            <main>
                <h2>Modifier une annonce</h2>

                <form method="post" action="#">
                    <div class="form-field">
                        <label for="announcement-title">Titre de l'annonce</label>
                        <input type="text" name="announcement-title" id="announcement-title" />
                    </div>

                    <div class="form-field">
                        <label for="announcement-content">Contenu de l'annonce</label>
                        <textarea name="announcement-content" id="announcement-content"></textarea>
                    </div>

                    <div class="form-field">
                        <p>Associer des images à l'annonce</p>
                        <div>
                            <label for="image">Uploader l'image</label>
                            <input type="file" name="image" id="image" />
                            <span>Ou</span>
                            <label for="image-link">Insérer l'url d'une image</label>
                            <input type="text" name="image-link" id="image-link" />
                        </div>
                    </div>

                    <div class="associated-image">
                        <img src="https://cdn-images-1.medium.com/v2/resize:fit:2000/1*9UN-8OUzyVJBaKiVNX5dig.png" alt="associated-image" />
                        <img src="https://cdn-images-1.medium.com/v2/resize:fit:2000/1*9UN-8OUzyVJBaKiVNX5dig.png" alt="associated-image" />
                        <img src="https://cdn-images-1.medium.com/v2/resize:fit:2000/1*9UN-8OUzyVJBaKiVNX5dig.png" alt="associated-image" />
                    </div>

                    <input type="submit" value="Créer l'annonce" />
                </form>
            </main>
        </div>

		<script type="text/javascript" src="./../../js/script.js"></script> 
    </body>
</html>