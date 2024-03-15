<?php
namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function dashboard(): View
    {
        $user = auth()->user();

        return view('user/dashboard', [
            'user' => $user
        ]);
    }
}
