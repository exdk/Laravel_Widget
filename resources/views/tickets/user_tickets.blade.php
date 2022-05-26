@extends('layouts.admin')

@section('title', 'My Tickets')

@section('content')
@php
use Illuminate\Support\Facades\Auth;
@endphp
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="card-header">
                <p class="h4">Мои обращения</p>
                <a href="new-ticket" type="submit" class="bt btn-warning px-4 rounded">Создать</a>
                @php
                    $uid = Auth::user()->id;
                        $role = \DB::table('role_user')
                            ->where('role_user.user_id','=',$uid)
                            ->join('roles', 'role_user.role_id', '=', 'roles.id')
                            ->select('roles.id as roleid', 'roles.title as rtitle')
                            ->first();
                if($role->roleid == '1') {
                    echo ' <a href="admin/tickets" type="submit" class="bt btn-success px-4 rounded">Управление</a>';
                }
                @endphp
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if($tickets->isEmpty())
                <p>Пока у Вас нет созданных запросов.</p>
                @else
                <table class=" table table-bordered table-striped table-hover datatable datatable-Driver">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Категория</th>
                        <th>Заголовок</th>
                        <th>Статус</th>
                        <th>Обновлен</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td>
                        </td>
                        <td>
                            {{ $ticket->category->name }}
                        </td>
                        <td>
                            <a href="{{ url('admin/tickets/' . $ticket->ticket_id) }}">
                                #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                            </a>
                        </td>
                        <td>
                            @if($ticket->status == "Открыто")
                            <span class="label label-success">{{ $ticket->status }}</span>
                            @else
                            <span class="label label-danger">{{ $ticket->status }}</span>
                            @endif
                        </td>
                        <td>
                            {{ $ticket->updated_at }}
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
