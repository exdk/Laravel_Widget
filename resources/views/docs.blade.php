@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="https://yunusov.me/projects/direction/public/css/app.css">
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <p class="h4">Отредактировать документ</p>
                </div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @php
                        $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                        $url = explode('?', $url);
                        $url = $url[0];
                        $path = parse_url($url, PHP_URL_PATH);
                        $res1 = explode("/", trim($path, "/"));
                        $result = array_shift($res1);
                                    $id = Auth::id();
                                    $team = DB::table('users')->where('id', $id)->get();
                                    foreach ($team as $tea) {
                                        $files = DB::table('files')->where('id', $res1[1])->get();
                                        foreach ($files as $user) {
                                            if ($user->team_id == $tea->team_id) {
                                                @endphp
                        <form action="@php echo $user->id; @endphp" method="post" enctype="multipart/form-data">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="card-header">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="number">Номер документа</label>
                                    <input type="text" class="form-control" name="number" id="number" value="@php echo $user->number; @endphp">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date_create">Дата создания документа</label>
                                    <input type="date" class="form-control" name="date_create" id="date_create" value="@php echo date('Y-m-d', strtotime($user->date_create)); @endphp">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="type">Тип документа:</label>
                                    <select id="type" name="type" class="form-control">
                                        <option selected>@php echo $user->type; @endphp</option>
                                        <option value="Баланс (форма №1)">Баланс (форма №1)</option>
                                        <option value="Выписка из ЕГРЮ">Выписка из ЕГРЮ</option>
                                        <option value="Доверенность">Доверенность</option>
                                        <option value="Договор аренды офиса">Договор аренды офиса</option>
                                        <option value="Договор с системой (B2C)">Договор с системой (B2C)</option>
                                        <option value="Лист записи ЕГРИП">Лист записи ЕГРИП</option>
                                        <option value="Налоговая декларация">Налоговая декларация</option>
                                        <option value="Налоговый учет (ИНН)">Налоговый учет (ИНН)</option>
                                        <option value="Отчет о прибылях и убытках">Отчет о прибылях и убытках</option>
                                        <option value="Патент">Патент</option>
                                        <option value="Печать организации">Печать организации</option>
                                        <option value="Подпись">Подпись</option>
                                        <option value="Положение">Положение</option>
                                        <option value="Приказ">Приказ</option>
                                        <option value="Распоряжение">Распоряжение</option>
                                        <option value="Решение">Решение</option>
                                        <option value="Свидетельство о праве собственности">Свидетельство о праве собственности</option>
                                        <option value="Свидетельство о регистрации ИП">Свидетельство о регистрации ИП</option>
                                        <option value="Свидетельство о регистрации ЮЛ">Свидетельство о регистрации ЮЛ</option>
                                        <option value="Справка 1-Т (о численности работников)">Справка 1-Т (о численности работников)</option>
                                        <option value="Уведомление о применении УСН">Уведомление о применении УСН</option>
                                        <option value="Устав">Устав</option>
                                        <option value="Учредительный договор">Учредительный договор</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Введите описание документа</label>
                                <textarea class="form-control" name="description" id="description" rows="2">@php echo $user->description; @endphp</textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline btn-lg">Сохранить</button>
                        </div>
                        </form>
                        @php
                                            } else {    header("Location: /admin/upload-file");
                                                        die();
                                            }
                        @endphp

                        @php
                                        }
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
