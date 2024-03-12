<?php
namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Service\FileHandler;
use App\Models\Message;

class TicketController extends Controller
{
    public function userTickets(): View
    {
        $userId = auth()->user()->id;

        $tickets = DB::select(
            'SELECT * FROM tickets WHERE user_id = ?', 
            [$userId]
        );

        return view('ticket/user_tickets', [
            'tickets' => $tickets
        ]);
    }

    public function form(): View
    {
        $idLoggedInUser = auth()->user()->id;

        return view('ticket/form', ["idLoggedInUser" => $idLoggedInUser]);
    }

    public function show(int $id): View
    {
        try {
            $ticket = Ticket::findOrFail($id);
        } catch (Exception $e) {
            return view('errors/404');
        }

        $messages = Message::all();

        return view('ticket/show', [
            'ticket' => $ticket
        ]);
    }

    public function update(Request $request)
    {
        $ticketId = $request->input('ticket_id');
        $ticket = Ticket::findOrFail($request->input('ticket_id'));

        $ticket->subject = $request->input('subject');
        $ticket->message = $request->input('message');

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');

            $fileHandler = new FileHandler();
            $fileHandler->deleteFile($ticket->attachment);
            $ticket->attachment = $fileHandler->uploadFile($file);
        }

        $ticket->save();

        return redirect()->route('user_tickets');
    }

    public function save(Request $request)
    {
        $ticket = new Ticket();
        $ticket->user_id = $request->input('user_id');
        $ticket->subject = $request->input('subject');
        $ticket->message = $request->input('message');

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');

            $fileHandler = new FileHandler();
            $ticket->attachment = $fileHandler->uploadFile($file);
        }

        $ticket->save();

        return redirect()->route('user_tickets');
    }
}
