<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link rel="stylesheet" href="./../../css/announcement/show.css" />
        <link rel="stylesheet" href="./../../css/style.css" />
    </head>

    <body>
        <div id="page">
            @include('fragment/navigation_bar')

            <main>
				<div class="announcement-header">
                    <h2>{{ $announcement['title'] }}</h2>
					<div class="announcement-setting">
                        <svg id="announcement-setting-icon" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14.647 4.081a.724 .724 0 0 0 1.08 .448c2.439 -1.485 5.23 1.305 3.745 3.744a.724 .724 0 0 0 .447 1.08c2.775 .673 2.775 4.62 0 5.294a.724 .724 0 0 0 -.448 1.08c1.485 2.439 -1.305 5.23 -3.744 3.745a.724 .724 0 0 0 -1.08 .447c-.673 2.775 -4.62 2.775 -5.294 0a.724 .724 0 0 0 -1.08 -.448c-2.439 1.485 -5.23 -1.305 -3.745 -3.744a.724 .724 0 0 0 -.447 -1.08c-2.775 -.673 -2.775 -4.62 0 -5.294a.724 .724 0 0 0 .448 -1.08c-1.485 -2.439 1.305 -5.23 3.744 -3.745a.722 .722 0 0 0 1.08 -.447c.673 -2.775 4.62 -2.775 5.294 0zm-2.647 4.919a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" stroke-width="0" fill="currentColor" /></svg>
                        <div id="setting-menu" class="setting-menu">
                            <a id="announcement-edit-button" class="edit" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                <span>Modifier</span>
                            </a>
                            <a id="announcement-delete-button" class="delete" href="http://127.0.0.1:5500/page_des_annonces.html">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                <span>Supprimer</span>
                            </a>
                        </div>
					</div>
				</div>

                @if (!empty($announcement['image']))
                    <div class="illustration-list">
                        <img alt="announcement-illustration" class="announcement-illustration" src="/upload/announcement/{{ $announcement['image'] }}" />
                    </div>
                @endif

                <p class="announcement-content">{{ $announcement['description'] }}</p>

                <div class="comment-section">
                    <div class="add-a-comment">
                        <div class="user-avatar"></div>
                        <input type="text" id="comment-field" name="comment-field" placeholder="Ajouter un commentaire..." class="comment-field" />
                    </div>

                    <!-- Display the comments here -->

                    <div class="comment">
                        <div class="user-avatar"></div>
                        <div class="comment-body">
                            <div class="comment-header">
                                <span class="user-name">@Tanja Peronel</span>
                                <span class="comment-date">il y a 2 jours</span>
                            </div>
                            <p class="comment-content">condimentum turpis, ac ullamcorper massa ultrices eu. Nulla efficitur augue odio, nec feugiat libero mattis vitae.</p>
                        </div>
                    </div>

                    <div class="comment">
                        <div class="user-avatar"></div>
                        <div class="comment-body">
                            <div class="comment-header">
                                <span class="user-name">@Tanja Peronel</span>
                                <span class="comment-date">il y a 2 jours</span>
                            </div>
                            <p class="comment-content">condimentum turpis, ac ullamcorper massa ultrices eu. Nulla efficitur augue odio, nec feugiat libero mattis vitae.</p>
                        </div>
                    </div>

                    <div class="comment">
                        <div class="user-avatar"></div>
                        <div class="comment-body">
                            <div class="comment-header">
                                <span class="user-name">@Tanja Peronel</span>
                                <span class="comment-date">il y a 2 jours</span>
                            </div>
                            <p class="comment-content">condimentum turpis, ac ullamcorper massa ultrices eu. Nulla efficitur augue odio, nec feugiat libero mattis vitae.</p>
                        </div>
                    </div>

                    <!-- Display the comments here -->
                </div>
            </main>
        </div>

		<script type="text/javascript" src="./../../js/script.js"></script>
        <script type="text/javascript" src="./../../js/announcement/show.js"></script> 
    </body>
</html>