@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" href="https://yunusov.me/projects/direction/public/css/app.css">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Добавить маршрут</h4>
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
                            if($role->roleid == '1')
                            {

                            }
                            if($role->roleid=='2') {

                            }
                            if($role->roleid=='3') {
                    echo'
                        <form method="POST" action="task">
                            <div class="form-group">
                                <textarea name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-15 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder="Введите стартовую точку"></textarea>';
                                if ($errors->has('description')) {
                                    echo'<span class="text-danger">'.$errors->first('description').'</span>';
                                }
                            echo'
                            </div>
                            <div class="form-group">
                                <textarea name="description2" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-15 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder="Введите конечную точку"></textarea>';
                                if ($errors->has('description2')) {
                                    echo'<span class="text-danger">'.$errors->first('description2').'</span>';
                                }
                            echo'
                            </div>
                            <div class="form-group">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Добавить</button>
                            </div>
                            '.csrf_field().'
                        </form>
                    </div>
                </div>
            </div>';

                            }
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
