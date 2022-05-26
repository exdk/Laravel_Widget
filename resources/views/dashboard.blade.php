@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="https://yunusov.me/projects/direction/public/css/app.css">
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <p class="h4">Список маршрутов</p><br>
                        <a href="/admin/task" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Добавить новый маршрут</a>
                </div>
                <div class="card-body">
				<table class="w-full text-md rounded mb-4">
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Маршрут</th>
                        <th class="text-left p-3 px-5">Действия</th>
                    </tr>
                    <tbody>
                    @php
                    if (count(auth()->user()->tasks) != 0) {
                       foreach (auth()->user()->tasks as $task) {
                           echo'
						   <tr class="border-b hover:bg-orange-100">
                               <td class="p-3 px-5">
                                  '.$task->description.' - '.$task->description2.'
                               </td>
                               <td class="p-3 px-5">
                                   <a href="task/v/'.$task->id.'" name="view" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Посмотреть</a>
                                   <a href="task/'.$task->id.'" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Редактировать</a>
                                   <form action="task/'.$task->id.'" class="inline-block">
                                       <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Удалить</button>
                                       '.csrf_field().'
                                   </form>
                               </td>
                           </tr>';
                       }
                    } else { echo 'Добавленных маршрутов пока нет'; }
                    @endphp
					</tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
