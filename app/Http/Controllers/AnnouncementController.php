<?php
namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\AnnouncementCategory;
use App\Models\Announcement;
use App\Service\FileHandler;
use App\Service\Toolbox;
use Illuminate\Support\Facades\DB;

class AnnouncementController extends Controller
{
    public function index(Request $request): View
    {
        $user = auth()->user();
        $toolbox = new Toolbox();

        $categoryFilter = $request->input('announcement-category');
        $searchFilter = $request->input('announcement-search');

        $sql = 'SELECT * FROM announcements';
        $parameters = [];

        if ($categoryFilter && $categoryFilter != 'all') {
            $sql .= " WHERE announcement_categories_id = :announcement_categories_id";

            $parameters["announcement_categories_id"] = $categoryFilter;
        }

        if ($searchFilter) {
            if ($categoryFilter && $categoryFilter != 'all') {
                $sql .= " AND";
            } else {
                $sql .= " WHERE";
            }

            $sql .= " title LIKE :title OR description LIKE :description";

            $parameters["title"] = "%" . $searchFilter . "%";
            $parameters["description"] = "%" . $searchFilter . "%";
        }

        $announcements = DB::select($sql, $parameters);
        
        $announcementCategories = AnnouncementCategory::all();

        return view('announcement/index', [
            'user' => $user,
            'toolbox' => $toolbox,
            'announcements' => $announcements,
            'announcementCategories' => $announcementCategories,
            'categoryFilter' => $categoryFilter,
            'searchFilter' => $searchFilter
        ]);
    }

    public function onClickAnnouncement(int $id)
    {
        $announcement = Announcement::findOrFail($id);

        $announcement->number_of_views = intval($announcement->number_of_views) + 1;
        $announcement->save();

        return redirect()->route('announcement_show', ['id' => $id]);
    }

    public function show(?int $id): View
    {
        $user = auth()->user();
        $toolbox = new Toolbox();

        $announcement = Announcement::findOrFail($id);

        $userContact = DB::select('
            SELECT u.firstname, u.lastname, u.email, u.phone
            FROM announcements AS a
            INNER JOIN users AS u
            ON a.users_id = u.id
            WHERE a.id = :announcement_id
        ', [
            'announcement_id' => $id
        ]);

        $sql = '
            SELECT m.id, m.content, u.firstname, u.lastname, m.created_at 
            FROM messages AS m
            INNER JOIN users AS u
            ON m.users_id = u.id
            WHERE announcements_id = :announcements_id 
            ORDER BY m.created_at
        ';

        $messages = DB::select(
            $sql,
            ['announcements_id' => $id]
        );

        return view('announcement/show', [
            'user' => $user,
            'announcement' => $announcement,
            'messages' => $messages,
            'toolbox' => $toolbox,
            'userContact' => $userContact
        ]);
    }

    public function announcementUser(): View
    {
        $user = auth()->user();

        $sql = '
            SELECT a.id, a.title, ac.name AS category, a.price, a.number_of_views
            FROM announcements AS a
            INNER JOIN announcement_categories AS ac
            ON a.announcement_categories_id = ac.id
            WHERE a.users_id = :users_id
        ';

        $announcements = DB::select($sql, [
            'users_id' => $user->id
        ]);

        return view('announcement/announcement_user', [
            'announcements' => $announcements
        ]);
    }

	public function add(): View
	{
        $user = auth()->user();
        $announcementCategories = AnnouncementCategory::all();

		return view('announcement/add', [
            'user' => $user,
            'announcementCategories' => $announcementCategories
		]);
	}

    public function save(Request $request)
    {
        $user = auth()->user();
        $announcement = new Announcement();
        $announcement->users_id = $user->id;
        $announcement->title = $request->input('announcement-title');
        $announcement->description = $request->input('announcement-description');
        $announcement->announcement_categories_id = $request->input('announcement-category');
        $announcement->number_of_views = 0;
        $announcement->price = $request->input('announcement-price');

        if ($request->hasFile('announcement-image')) {
            $file = $request->file('announcement-image');

            $fileHandler = new FileHandler();
            $announcement->image = $fileHandler->uploadFile($file, 'upload/announcement');
        }

        $announcement->save();

        return redirect()->route('announcement_index');
    }

	public function edit(?int $id): View
	{
        $user = auth()->user();
        $announcement = Announcement::findOrFail($id);
        $announcementCategories = AnnouncementCategory::all();

		return view('announcement/edit', [
            'user' => $user,
            'announcement' => $announcement,
            'announcementCategories' => $announcementCategories
		]);
	}

    public function update(Request $request)
    {
        $user = auth()->user();
        $announcement = Announcement::findOrFail($request->input('announcement-id'));
        $announcement->title = $request->input('announcement-title');
        $announcement->description = $request->input('announcement-description');
        $announcement->announcement_categories_id = $request->input('announcement-category');
        $announcement->price = $request->input('announcement-price');

        if ($request->hasFile('announcement-image')) {
            $file = $request->file('announcement-image');

            $fileHandler = new FileHandler();
            $fileHandler->deleteFile($announcement->image, 'upload/announcement');
            $announcement->image = $fileHandler->uploadFile($file, 'upload/announcement');
        }

        $announcement->save();

        return redirect()->route('announcement_show', ["id" => $request->input('announcement-id')]);
    }

    public function delete(?int $id)
    {
        $announcement = Announcement::findOrFail($id);

        if ($announcement->image) {
            $fileHandler = new FileHandler();
            $fileHandler->deleteFile($announcement->image, 'upload/announcement');
        }

        $announcement->delete();

        return redirect()->route('announcement_index');
    }
}