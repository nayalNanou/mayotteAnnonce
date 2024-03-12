<?php
namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Planet;

class TicketController extends Controller
{
    public function add()
    {
        return view('planet/add');
    }

    public function save(Request $request)
    {
        $planet = new Planet();
        $planet->name = $request->input('name');
        $planet->image = $request->Input('image');
        $planet->size = $request->input('size');
        $planet->speed = $request->input('speed');
        $planet->radius = $request->input('radius');
        $planet->origin_y = $request->input('origin_y');
        $planet->origin_x = $request->input('origin_y');
        $planet->is_moving_to_the_right = $request->input('is_moving_to_the_right');

        $planet->save();

        return redirect()->route('user_tickets');
    }
}