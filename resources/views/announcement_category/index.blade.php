<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link rel="stylesheet" href="./../../css/announcement/announcement.css" />
        <link rel="stylesheet" href="./../../css/style.css" />
		<link rel="stylesheet" href="./../../css/crud.css" />
    </head>

    <body>
        <div id="page">
			@include('fragment/navigation_bar')

            <main>
                <h2>Liste des catégories d'annonce</h2>

                <a href="{{ route('announcement_category_add') }}" class="button-create-announcement">+ Créer une catégorie</a>

				@if (count($announcementCategories) == 0)
					<p>Il n'y pas de catégories d'annonces</p>
				@else
					<table class="crud-table">
						<thead>
							<tr>
								<th>Nom</th>
								<th class="action">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($announcementCategories as $announcementCategory)
								<tr>
									<td>{{ $announcementCategory['name'] }}</td>
									<td class="action">
										<a class="edit-button" href="{{ route('announcement_category_show', ['id' => $announcementCategory['id']]) }}">
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
										</a>
										<a class="delete-button" href="{{ route('announcement_category_delete', ['id' => $announcementCategory['id']]) }}">
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@endif
            </main>
        </div>

		<script type="text/javascript" src="./../../js/script.js"></script>
    </body>
</html>