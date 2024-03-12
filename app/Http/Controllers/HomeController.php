<?php
namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Announcement;

class HomeController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $announcements = Announcement::all();

        return view('home/index', [
            'user' => $user,
            'announcements' => $announcements
        ]);
    }
}
