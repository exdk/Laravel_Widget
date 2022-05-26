@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="https://yunusov.me/projects/direction/public/css/app.css">
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <p class="h4">Отредактировать маршрут</p>
                </div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @php
$uid = Auth::user()->id;
    $role = \DB::table('role_user')
        ->where('role_user.user_id','=',$uid)
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('roles.id as roleid', 'roles.title as rtitle')
        ->first();
@endphp
                    @php
					echo'
					<form method="POST" action="'.$task->id.'">
						Стартовая точка:
						<div class="form-group">
							<textarea name="description" class="bg-gray-100 rounded border border-gray-100 leading-normal resize-none w-full h-10 py-2 px-3 font-medium placeholder-gray-400 focus:outline-none focus:bg-white">'.$task->description.'</textarea>';
							if ($errors->has('description')) {
								echo'<span class="text-danger">'.$errors->first('description').'</span>';
							}
						echo'
						</div>
						Конечная точка:
						<div class="form-group">
							<textarea name="description2" class="bg-gray-100 rounded border border-gray-100 leading-normal resize-none w-full h-10 py-2 px-3 font-medium placeholder-gray-400 focus:outline-none focus:bg-white">'.$task->description2.'</textarea>';
							if ($errors->has('description')) {
								echo'<span class="text-danger">'.$errors->first('description').'</span>';
							}
						echo'
						</div>
						<div class="form-group">
							<button type="submit" name="update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Сохранить</button>
						</div>
						'.csrf_field().'
					</form>
				</div>
			</div>
		</div>
				<table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Маршрут</th>
                        <th class="text-left p-3 px-5">Действия</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>';
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
					echo'
					</tbody>
                </table>';
                        @endphp
    </div>
</div>
@endsection
@section('scripts')

<script>
$('#upload').on('click', function() {
    var file_data = $('#sortpicture').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    alert(form_data);
    $.ajax({
                url: '{{route("admin.users.uploadUsers")}}',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
				headers: {'x-csrf-token': _token},
                type: 'post',
                success: function(php_script_response){
                    alert(php_script_response);
                }
     });
});
</script>

@parent

@endsection
