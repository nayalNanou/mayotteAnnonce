<?php
namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\AnnouncementCategory;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $announcements = Announcement::all();

        return view('announcement/index', [
            'user' => $user,
            'announcements' => $announcements
        ]);
    }

    public function show(?int $id): View
    {
        $user = auth()->user();

        $announcement = Announcement::findOrFail($id);

        return view('announcement/show', [
            'user' => $user,
            'announcement' => $announcement
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

        $announcement->save();

        return redirect()->route('announcement_index');
    }

	public function edit(?int $id): View
	{
		return view('announcement/edit', [

		]);
	}

    public function delete(?int $id)
    {
        dd('Delete announcement');
    }
}