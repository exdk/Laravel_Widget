@extends('layouts.admin')

@section('title', $ticket->title)

@section('content')


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="card-header">
                    <p class="h4">#{{ $ticket->ticket_id }} - {{ $ticket->title }}</p>
                    <a href="../my_tickets" type="submit" class="bt btn-warning px-4 rounded">Мои обращения</a>
                    <a href="../admin/tickets" type="submit" class="bt btn-success px-4 rounded">Управление</a>
                    @php
                        $uid = Auth::user()->id;
                            $role = \DB::table('role_user')
                                ->where('role_user.user_id','=',$uid)
                                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                                ->select('roles.id as roleid', 'roles.title as rtitle')
                                ->first();
                    if($role->roleid == '1') {
                    @endphp
                    @if ($ticket->status === 'Закрыто')
                        <a href="#" type="submit" class="bt btn-danger px-4 rounded">Обращение закрыто</a>
                        <form action="{{ url('admin/admin/delete_ticket/' . $ticket->ticket_id) }}" method="POST">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger px-4 mt-2 rounded">Удалить обращение</button>
                        </form>
                    @else
                    <form action="{{ url('admin/admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-danger px-4 mt-2 rounded">Закрыть обращение</button>
                    </form>
                    @endif
                    @php
                    }
                    @endphp
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="ticket-info">
                        <p class="h5">{{ $ticket->message }}</p>
                        <br><br>
                        <p>Автор: {{ $ticket->user->name }}</p>
                        <p>Категория: {{ $ticket->category->name }}</p>
                        <p>
                            @if ($ticket->status === 'Открыто')
                                Статус: <span class="label label-success">{{ $ticket->status }}</span>
                            @else
                                Статус: <span class="label label-danger">{{ $ticket->status }}</span>
                            @endif
                        </p>
                        <p>Создано: {{ $ticket->created_at->diffForHumans() }}</p>
                    </div>

                </div>
            </div>

            <hr>

            @include('tickets.comments')
            @if ($ticket->status === 'Закрыто')
            <hr>
            @else
            @include('tickets.reply')
            @endif
        </div>
    </div>


@endsection
