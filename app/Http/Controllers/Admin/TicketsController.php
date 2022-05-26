<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Mailers\AppMailer;
use App\Models\Categories;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate(10);

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('tickets.create', compact('categories'));
    }

    public function categories()
    {
        $categories = Category::all();

        return view('tickets.categories', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'message' => 'required'
        ]);

        $ticket = new Ticket([
            'title' => $request->input('title'),
            'user_id' => Auth::user()->id,
            'ticket_id' => strtoupper(Str::random(10)),
            'category_id' => $request->input('category'),
            'priority' => $request->input('priority'),
            'message' => $request->input('message'),
            'status' => "Открыто"
        ]);

        $ticket->save();
        mail('admin@admin.com', 'Новое обращение на 7Rights', 'Здравствуйте.<br><br>Пользователем '.Auth::user()->name.' было создано обращение #'.$ticket->ticket_id.' на сайте 7Rights.<br><br>С уважением,<br>команда 7Rights.', 'From: ticket@7rights.ru');
        mail(''.Auth::user()->email.'', 'Создание обращения на 7Rights', 'Здравствуйте, '.Auth::user()->name.'<br><br>Вами было создано обращение #'.$ticket->ticket_id.' на сайте 7Rights.<br><br>Мы приняли его к обработке и скоро дадим Вам ответ.<br><br>С уважением,<br>команда 7Rights.', 'From: ticket@7rights.ru');
        return redirect()->away('my_tickets')->with("status", "Обращение с ID: #$ticket->ticket_id было открыто");
    }


    public function store2(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'title' => 'required',
            'id' => strtoupper(Str::random(10)),
        ]);

        $categories = new \App\Models\Category([
            'name' => $request->input('title')
        ]);

        $categories->save();
        return redirect()->away('categories')->with("status", "Категория $categories->name создана");
    }


    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
        return view('tickets.user_tickets', compact('tickets'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        return view('tickets.show', compact('ticket'));
    }

    public function close($ticket_id, AppMailer $mailer)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $ticket->status = "Закрыто";
        $ticket->save();
        mail(''.$ticket->user->email.'', 'Закрытие обращения на 7Rights', 'Здравствуйте, '.$ticket->user->name.'<br><br>Ваше обращение #'.$ticket->ticket_id.' на сайте 7Rights было закрыто.<br><br>Спасибо за обращение.<br><br>С уважением,<br>команда 7Rights.', 'From: ticket@7rights.ru');
        return redirect()->back()->with("status", "Обращение было закрыто");
    }

    public function delete($ticket_id, AppMailer $mailer)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $ticket->delete();
        $ticketOwner = $ticket->user;
        // $mailer->sendTicketStatusNotification($ticketOwner, $ticket);
        return redirect()->away('../tickets')->with("status", "Обращение было удалено");
    }


    public function delete2($ticket_id)
    {
        $ticket = \App\Models\Category::where('id', $ticket_id)->firstOrFail();
        $ticket->delete();
        return redirect()->away('../categories')->with("status", "Категория $ticket->name была удалена");
    }
}
