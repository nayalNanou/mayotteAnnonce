<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Message;

class MessageController extends Controller
{
    public function save(Request $request)
    {
        $message = new Message();

        $messageContent = substr($request->input('comment-field'), 0, 255);

        $message->content = $messageContent;
        $message->users_id = $request->input('user-id');
        $message->announcements_id = $request->input('announcement-id');

        $message->save();

        return redirect()->route('announcement_show', ['id' => $request->input('announcement-id')]);
    }
}
