@extends('layouts.admin')

@section('title', 'Обращения')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="card-header">
                    <p class="h4"> Управление обращениями</p>
                    <a href="../new-ticket" type="submit" class="bt btn-warning px-4 rounded">Создать</a>
                    <a href="categories" type="submit" class="bt btn-success px-4 rounded">Управление категориями</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($tickets->isEmpty())
                        <p>Сейчас обращений нет</p>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Категория</th>
                                <th>Заголовок</th>
                                <th>Автор</th>
                                <th>Статус</th>
                                <th>Обновлен</th>
                                <th style="text-align:center" colspan="2">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>
                                        {{ $ticket->category->name }}
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/tickets/'. $ticket->ticket_id) }}">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $ticket->user->name }}
                                    </td>
                                    <td>
                                        @if ($ticket->status === 'Открыто')
                                            <span class="label label-success">{{ $ticket->status }}</span>
                                        @else
                                            <span class="label label-danger">{{ $ticket->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $ticket->updated_at }}</td>
                                    <td>
                                        @if($ticket->status === 'Открыто')
                                            <form action="{{ url('admin/admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-danger px-4 mt-2 rounded">Закрыть</button>

                                            </form>
                                        @else
                                            <form action="{{ url('admin/admin/delete_ticket/' . $ticket->ticket_id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-danger px-4 mt-2 rounded">Удалить обращение</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $tickets->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
