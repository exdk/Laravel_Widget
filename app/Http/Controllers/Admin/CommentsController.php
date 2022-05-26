<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Mailers\AppMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function postComment(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);
        $comment = Comment::create([
            'ticket_id' => $request->input('ticket_id'),
            'user_id' => Auth::user()->id,
            'comment' => $request->input('comment')
        ]);
        // send mail if the user commenting is not the ticket owner
        if($comment->ticket->user->id !== Auth::user()->id) {
            $mailer->sendTicketComments($comment->ticket->user, Auth::user(), $comment->ticket, $comment);
            mail($comment->ticket->user->email, 'Новый ответ на обращение 7Rights', 'Здравствуйте '.$comment->ticket->user->name.', на Ваше обращение '.$comment->ticket->ticket_id.' поступил новый ответ.<br><br>С уважением,<br>команда 7Rights','From: ticket@7rights.ru');
        }

        mail('admin@admin.com', 'Новый ответ на обращение 7Rights', 'Здравствуйте.<br><br>На обращение '.$comment->ticket->ticket_id.' поступил новый ответ от пользователя.<br><br>С уважением,<br>команда 7Rights','From: ticket@7rights.ru');
        return redirect()->back()->with("status", "Комментарий был успешно добавлен");
    }
}
