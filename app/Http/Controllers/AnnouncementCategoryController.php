<?php
namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\AnnouncementCategory;

class AnnouncementCategoryController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $announcementCategories = AnnouncementCategory::all();

        return view('announcement_category/index', [
            'user' => $user,
            'announcementCategories' => $announcementCategories
        ]);
    }

	public function add(): View
	{
        $user = auth()->user();

		return view('announcement_category/add', [
            'user' => $user
		]);
	}

    public function save(Request $request)
    {
        $announcementCategory = new AnnouncementCategory();
        $announcementCategory->name = $request->input('announcement-category-name');   

        $announcementCategory->save();

        return redirect()->route('announcement_category_index');
    }

	public function show(?int $id): View
	{
        $user = auth()->user();
        $announcementCategory = AnnouncementCategory::findOrFail($id);

		return view('announcement_category/show', [
            'user' => $user,
            'announcementCategory' => $announcementCategory
		]);
	}

    public function update(Request $request)
    {
        $announcementCategory = AnnouncementCategory::findOrFail($request->input('announcement-category-id'));
        $announcementCategory->name = $request->input('announcement-category-name');

        $announcementCategory->save();

        return redirect()->route('announcement_category_index');
    }

    public function delete(Request $request, ?int $id)
    {
        $announcementCategory = AnnouncementCategory::findOrFail($id);

        $announcementCategory->delete();

        return redirect()->route('announcement_category_index');
    }
}