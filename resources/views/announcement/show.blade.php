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
                <a href="{{ route('announcement_index') }}" class="back-button">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" /></svg>
                    <span>Liste des annonces</span>
                </a>

				<div class="announcement-header"> 
                    <h2>{{ $announcement->title }} {{ !empty($announcement->price) ? '-' : '' }} {{ $announcement->price }}{{ !empty($announcement->price) ? '€' : '' }}</h2>

                    @auth
                        @if ($announcement->users_id == auth()->user()->id)
                            <div class="announcement-setting">
                                <svg id="announcement-setting-icon" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14.647 4.081a.724 .724 0 0 0 1.08 .448c2.439 -1.485 5.23 1.305 3.745 3.744a.724 .724 0 0 0 .447 1.08c2.775 .673 2.775 4.62 0 5.294a.724 .724 0 0 0 -.448 1.08c1.485 2.439 -1.305 5.23 -3.744 3.745a.724 .724 0 0 0 -1.08 .447c-.673 2.775 -4.62 2.775 -5.294 0a.724 .724 0 0 0 -1.08 -.448c-2.439 1.485 -5.23 -1.305 -3.745 -3.744a.724 .724 0 0 0 -.447 -1.08c-2.775 -.673 -2.775 -4.62 0 -5.294a.724 .724 0 0 0 .448 -1.08c-1.485 -2.439 1.305 -5.23 3.744 -3.745a.722 .722 0 0 0 1.08 -.447c.673 -2.775 4.62 -2.775 5.294 0zm-2.647 4.919a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" stroke-width="0" fill="currentColor" /></svg>
                                <div id="setting-menu" class="setting-menu">
                                    <a id="announcement-edit-button" class="edit" href="{{ route('announcement_edit', ['id' => $announcement->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                        <span>Modifier</span>
                                    </a>
                                    <a id="announcement-delete-button" class="delete" href="{{ route('announcement_delete', ['id' => $announcement->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                        <span>Supprimer</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endauth
				</div>

                <span class="time-elapsed">{{ $toolbox->time_elapsed_string($announcement->created_at) }}</span>

                @if (!empty($announcement->image))
                    <div class="illustration-list">
                        <img alt="announcement-illustration" class="announcement-illustration" src="/upload/announcement/{{ $announcement->image }}" />
                    </div>
                @endif

                <p class="announcement-content">{{ $announcement->description }}</p>

                @if (count($userContact) > 0)
                    <h3 class="title-contact-info">Voici mes informations de contact :</h3>

                    <div class="user-contact">
                        <span>Mon nom : {{ ucfirst($userContact[0]->firstname) }} {{ ucfirst($userContact[0]->lastname) }}</span>
                        <span>Email : {{ $userContact[0]->email }}</span>
                        <span>Téléphone : {{ $userContact[0]->phone }}</span>
                    </div>
                @endif

                <div class="comment-section">
                    @auth
                        <form method="post" action="{{ route('message_save') }}" class="add-a-comment">
                            @csrf <!-- {{ csrf_field() }} -->
                            <div class="user-avatar"></div>
                            <input type="hidden" id="announcement-id" name="announcement-id" value="{{ $announcement->id }}" />
                            <input type="hidden" id="user-id" name="user-id" value="{{ auth()->user()->id }}" />
                            <input type="text" id="comment-field" name="comment-field" placeholder="Ajouter un commentaire..." class="comment-field" maxlength="255" />
                        </form>
                    @endauth

                    @if (count($messages) == 0)
                        <p>Aucun commentaire</p>
                    @else
                        @foreach ($messages as $message)
                            <div class="comment">
                                <div class="user-avatar"></div>
                                <div class="comment-body">
                                    <div class="comment-header">
                                        <span class="user-name">{{ "@" . $message->firstname }} {{ $message->lastname }}</span>
                                        <span class="comment-date">{{ $toolbox->time_elapsed_string($message->created_at) }}</span>
                                    </div>
                                    <p class="comment-content">{{ $message->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </main>
        </div>

		<script type="text/javascript" src="./../../js/script.js"></script>
        <script type="text/javascript" src="./../../js/announcement/show.js"></script> 
    </body>
</html>