@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" href="https://yunusov.me/projects/direction/public/css/app.css">
    <link rel="stylesheet" href="https://yunusov.me/a/font-awesome.min.css">
    <style>
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content button {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
    <div class="content">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <p class="h4">Документы</p>
                    </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Дата</th>
                                    <th>Номер</th>
                                    <th>Тип</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th><i class="fa fa-cog" aria-hidden="true"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $id = Auth::id();
                                $team= DB::table('users')->where('id', $id)->get();
                                foreach ($team as $tea) {
                                    $files= DB::table('files')->where('team_id', $tea->team_id)->get();
                                    foreach ($files as $user) {
                                        echo'
                                        <tr class="border-b hover:bg-orange-100">
                                            <td>'.$user->date_create.'</td>
                                            <td>'.$user->number.'</td>
                                            <td>'.$user->type.'</td>
                                            <td>'.$user->name.'</td>
                                            <td>'.$user->description.'</td>
                                            <td><div class="dropdown">
                                                  <button>...</button>
                                                  <div class="dropdown-content">
                                                    <a href="'.$user->file_path.'">Скачать</a>
                                                    <a href="file/'.$user->id.'">Редактировать</a>
                                                    <form action="file/'.$user->id.'" class="inline-block">
                                                        <button type="submit" name="delete" formmethod="POST">Удалить</button>
                                                        '.csrf_field().'
                                                    </form>
                                                  </div>
                                                </div>
                                            </td>';
                                    }
                                }
                            @endphp
                            </tbody>
                        </table>
                    <br><br>
    <form action="" method="post" enctype="multipart/form-data">
        <hr>
        <br><p class="h2 text-center ">Загрузите Ваши документы</p><br>
        @csrf
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="chooseFile">
            <label class="custom-file-label" for="chooseFile">Нажмите для выбора файла</label>
        </div>
        <div class="card-header">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="number">Номер документа</label>
                    <input type="hidden" name="team_id" value="@php echo $tea->team_id; @endphp" />
                    <input type="text" class="form-control" name="number" id="number" placeholder="Введите номер документа">
                </div>
                <div class="form-group col-md-6">
                    <label for="date_create">Дата создания документа</label>
                    <input type="date" class="form-control" name="date_create" id="date_create">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="type">Тип документа:</label>
                    <select id="type" name="type" class="form-control">
                        <option selected>Выберите тип документа</option>
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
                <textarea class="form-control" name="description" id="description" rows="2" placeholder="Введите описание документа"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline btn-lg">Загрузить</button>
        </div>
    </form>
</div>
@endsection
