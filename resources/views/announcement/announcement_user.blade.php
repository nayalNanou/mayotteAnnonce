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
                <h2>Mes annonces</h2>

                <a href="{{ route('announcement_add') }}" class="button-create-announcement">+ Créer une annonce</a>

				@if (count($announcements) == 0)
					<p>Vous n'avez pas d'annonce créées</p>
				@else
					<table class="crud-table">
						<thead>
							<tr>
								<th>Titre</th>
								<th>Catégorie</th>
								<th>Prix</th>
								<th>Vues</th>
								<th class="action">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($announcements as $announcement)
								<tr>
									<td>{{ $announcement->title }}</td>
									<td>{{ $announcement->category }}</td>
									<td>{{ $announcement->price }}</td>
									<td>{{ $announcement->number_of_views }}</td>
									<td class="action">
										<a class="see-button" href="{{ route('announcement_show', ['id' => $announcement->id]) }}">
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
										</a>
										<a class="edit-button" href="{{ route('announcement_edit', ['id' => $announcement->id]) }}">
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
										</a>
										<a class="delete-button" href="{{ route('announcement_delete', ['id' => $announcement->id]) }}">
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