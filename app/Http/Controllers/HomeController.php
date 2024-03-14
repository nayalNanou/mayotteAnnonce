<?php
namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Announcement;
use App\Service\Toolbox;

class HomeController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        $currentDate = new \DateTime();
        $toolbox = new Toolbox();

        $announcements = DB::select(
            'SELECT * 
            FROM announcements 
            WHERE EXTRACT(YEAR FROM created_at) = :year
            AND EXTRACT(MONTH FROM created_at) = :month
            ORDER BY number_of_views 
            DESC LIMIT 4',
            [
                'year' => $currentDate->format('Y'),
                'month' => intval($currentDate->format('m'))
            ]
        );

        return view('home/index', [
            'user' => $user,
            'announcements' => $announcements,
            'toolbox' => $toolbox,
        ]);
    }
}
