@extends('layouts.admin')
@section('content')
<?php
//connect mysql database
$host = "localhost";
$user = "alexavl1_lk";
$pass = "HKH4O&oZ";
$db = "alexavl1_lk";
$con = mysqli_connect($host, $user, $pass, $db) or die("Error " . mysqli_error($con));

// fetch files
$sql = "select data, nomer, type, filename, opi from tbl_files";
$result = mysqli_query($con, $sql);

function transliterate($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'i',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'kh',   'ц' => 'tc',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'shch',
        'ь' => '',  'ы' => 'y',   'ъ' => '',
        'э' => 'e',   'ю' => 'iu',  'я' => 'ia',
         '’' => ' ',  '.' => '',
         
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'I',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'Kh',   'Ц' => 'Tc',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Shch',
        'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
        'Э' => 'E',   'Ю' => 'Iu',  'Я' => 'Ia',
    );
    return strtr($string, $converter);
}


?>
<div class="row">
    <div class="col-9">
	<div class="card"><a name="ob"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Общая информация</h4>
            </div>
            <div class="col-6" style="float:right;">
                @can('mycompan_edit')
                <a style="float:right;" class="" href="{{ route('admin.mycompans.edit', $mycompan->id) }}">
                    <i class="fa fa-pen" aria-hidden="true"></i>
                </a>
                @endcan
            </div>
        </div>
    </div>
    <div class="card-body">
            <div class="row" style="margin-bottom:40px;">
                <div class="col-4">
                    @if($mycompan->logo)
                    <img src="{{ $mycompan->logo->getUrl('thumb') }}">
                    @endif
                </div>
                <div class="col-8">
                    <h4>
                        {{ $mycompan->hortname }}
                    </h4><br>
                    {{ $mycompan->longname }}<br>
                  <b>  @php
$uid = Auth::user()->id;
    $role = \DB::table('role_user')
        ->where('role_user.user_id','=',$uid)
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('roles.title as roleid' )
        ->first();
echo $role->roleid;

@endphp	</b>

                </div>
            </div>

<div class="row">
                    <div class="col-4">
                        <label for="email">{{ trans('cruds.mycompan.fields.direktor') }}* :</label>
                    </div>
                    <div class="col-8">
                        {{ $mycompan->direktor }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="email">{{ trans('cruds.mycompan.fields.oporg') }}* :</label>
                    </div>
                    <div class="col-8">
                        {{ $mycompan->oporg }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="email">{{ trans('cruds.mycompan.fields.typedejat') }}* :</label>
                    </div>
                    <div class="col-8">
                        {{ App\Models\Mycompan::TYPEDEJAT_SELECT[$mycompan->typedejat] ?? '' }}
                    </div>
                </div>
                                <div class="row">
                    <div class="col-4">
                        <label for="email">Дата регистрации на сайте* :</label>
                    </div>
                    <div class="col-8">
                        {{ $mycompan->created_at }}
                    </div>
                </div>
                                <div class="row">
                    <div class="col-4">
                        <label for="email">Дата регистрации компании* :</label>
                    </div>
                    <div class="col-8">
                            {{ $mycompan->datet }}
                    </div>
                </div>
				</div></div>
				<div class="card"><a name="ko">
</a>
    <div class="card-header">
        <h4>Контакты</h4>
    </div>
    <div class="card-body">
				        <div class="row">
            <div class="col-4">
                <label for="email">Городской телефон :</label>
            </div>
            <div class="col-8">
                {{ $mycompan->telefonorg }}
            </div>
        </div>
                 <div class="row">
            <div class="col-4">
                <label for="email">Мобильный телефон :</label>
            </div>
            <div class="col-8">
                {{ $mycompan->telefonorg }}
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.mycompan.fields.web') }} :</label>
            </div>
            <div class="col-8">
                <a href="https://{{ $mycompan->web }}" target="_blank">{{ $mycompan->web }}</a>
                
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.mycompan.fields.email') }} :</label>
            </div>
            <div class="col-8">
                <a href="mailto:{{ $mycompan->email ?? '' }}">{{ $mycompan->email }}</a>
            </div>
        </div>

				
				
				</div></div>

<div class="card"><a name="re">
</a>
    <div class="card-header">
        <h4>Реквизиты</h4>
    </div>
    <div class="card-body">
<div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.mycompan.fields.typenalog') }} :</label>
            </div>
            <div class="col-8">
                {{ App\Models\Mycompan::TYPENALOG_SELECT[$mycompan->typenalog] ?? '' }}
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.mycompan.fields.uradres') }} :</label>
            </div>
            <div class="col-8">
                {{ $mycompan->uradres }}
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.mycompan.fields.factadr') }} :</label>
            </div>
            <div class="col-8">
                {{ $mycompan->factadr }}
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.mycompan.fields.innkpp') }} :</label>
            </div>
            <div class="col-8">
                {{ $mycompan->innkpp }}
            </div>
        </div>
                <div class="row">
            <div class="col-4">
                <label for="email">КПП :</label>
            </div>
            <div class="col-8">
                {{ $mycompan->kpp }}
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="email">ОГРН :</label>
            </div>
            <div class="col-8">
                {{ $mycompan->innogrn }}
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.mycompan.fields.bank') }} :</label>
            </div>
            <div class="col-8">
                {{ $mycompan->bank }}
            </div>
        </div>
                <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.mycompan.fields.rathet') }} :</label>
            </div>
            <div class="col-8">
                {{ $mycompan->rathet }}
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.mycompan.fields.korhet') }} :</label>
            </div>
            <div class="col-8">
                {{ $mycompan->korhet }}
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.mycompan.fields.bik') }} :</label>
            </div>
            <div class="col-8">
                {{ $mycompan->bik }}
            </div>
        </div>

    </div>
</div>
<div class="card"><a name="rei">
</a>
    <div class="card-header">
        <h4>Рейтинг</h4>&#9734; 	
&#9734; 	
&#9734;
&#9734;&#9734;
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <label for="email">Открытые данные :</label>
            </div>
            <div class="col-8">
                  {{ $mycompan->reitopen }}
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="email">Рейтинг компании :</label>
            </div>
            <div class="col-8">
               {{ $mycompan->reiin }}
            </div>
        </div>
    </div>
</div>
<div class="card"><a name="geo">
</a>
    <div class="card-header">
        <h4>География перевозок</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <label for="email">Городская перевозка :</label>
            </div>
            <div class="col-8">
                    {{ $mycompan->geogorod }}
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="email">Междугородняя перевозка :</label>
            </div>
            <div class="col-8">
                
               {{ $mycompan->megdu }}
            </div>
        </div>
    </div>
</div>
<div class="card" style="display:none;"><a name="file">
</a>    <div class="card-header">
        <h4>Файлы</h4>
    </div>
      <div class="card-body">
        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.mycompan.fields.utav') }} :</label>
            </div>
            <div class="col-8">
                @if($mycompan->utav)
                <a href="{{ $mycompan->utav->getUrl() }}" target="_blank">
                    {{ trans('global.view_file') }}
                </a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="email">Бухгалтерский баланс :</label>
            </div>
            <div class="col-8">
                @if($mycompan->doveren)
    <a href="{{ $mycompan->doveren->getUrl() }}" target="_blank">
        {{ trans('global.view_file') }}
    </a>
    @endif
            </div>
        </div>
                <div class="row">
            <div class="col-4">
                <label for="email">Договор на помещение :</label>
            </div>
            <div class="col-8">
                @if($mycompan->utav)
                <a href="{{ $mycompan->utav->getUrl() }}" target="_blank">
                    {{ trans('global.view_file') }}
                </a>
                @endif
            </div>
        </div>
    </div>
   </div>
  <div class="card" ><a name="file">
</a>    <div class="card-header">
        <h4>Файлы</h4>
        
        
        
    </div>
      <div class="card-body">
 <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Дата</th>
                        <th>Номер</th>
                        <th>Тип</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['data']; ?></td>
                    <td><?php echo $row['nomer']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['filename']; ?></td>
                    <td><?php echo $row['opi']; ?></td>
                    <td>
                        <div class="dropdown">
<b><button onclick="myFunction()" class="dropbtn">&#8942;</button></b>
  <div id="myDropdown" class="dropdown-content">
    <a href="http://autopark.7rights.ru/public/g/uploads/<?php echo $row['filename']; ?>" target="_blank">Просмотр</a>
    <a href="http://autopark.7rights.ru/public/g/uploads/<?php echo $row['filename']; ?>" download>Скачать</a>
  </div>
</div>
<style>
.dropbtn {
    color: gray;
    padding: 0px;
    font-size: 20px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    color: #000;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </td>
                    <!--<td><a href="http://autopark.7rights.ru/public/g/uploads/<?php echo $row['filename']; ?>" target="_blank">Просмотр</a></td>
                    <td><a href="http://autopark.7rights.ru/public/g/uploads/<?php echo $row['filename']; ?>" download>Скачать</td>-->
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<div style="display:none;" class="row">
        <div class="col-xs-8 col-xs-offset-2 well">
        <form action="http://autopark.7rights.ru/public/g/upload.php" method="post" enctype="multipart/form-data">
            <legend>Добавить документ:</legend>
            <div class="form-group">
                <input type="file" name="file1" />
                <input type="text" name="date" hidden/><br>
                <label for="type">Тип документа</label>
                <select class="form-control" type="text" name="type">
                    <option value = "Баланс (форма №1)">Баланс (форма №1)</option>
<option value = "Выписка из ЕГРЮЛ">Выписка из ЕГРЮЛ</option>
<option value = "Доверенность">Доверенность</option>
<option value = "Договор аренды офиса">Договор аренды офиса</option>
<option value = "Договор с системой (В2С)">Договор с системой (В2С)</option>
<option value = "Лист записи ЕГРИП">Лист записи ЕГРИП</option>
<option value = "Налоговая декларация">Налоговая декларация</option>
<option value = "Налоговый учет (ИНН)">Налоговый учет (ИНН)</option>
<option value = "Отчет о прибылях и убытках">Отчет о прибылях и убытках</option>
<option value = "Патент">Патент</option>
<option value = "Печать организации">Печать организации</option>
<option value = "Подпись">Подпись</option>
<option value = "Положение">Положение</option>
<option value = "Приказ о назначении ген.директора">Приказ о назначении ген.директора</option>
<option value = "Приказ о назначении гл.бухгалтера">Приказ о назначении гл.бухгалтера</option>
<option value = "Распоряжение">Распоряжение</option>
<option value = "Решение">Решение</option>
<option value = "Свидетельство о праве собственности на помещение">Свидетельство о праве собственности на помещение</option>
<option value = "Свидетельство о регистрации ИП">Свидетельство о регистрации ИП</option>
<option value = "Свидетельство о регистрации ЮЛ">Свидетельство о регистрации ЮЛ</option>
<option value = "Справка 1 - Т (о численности работников)">Справка 1 - Т (о численности работников)</option>
<option value = "Уведомление о применении УСН">Уведомление о применении УСН</option>
<option value = "Устав">Устав</option>
<option value = "Учредительный договор">Учредительный договор</option>
                </select>
                <label for="nom">Номер документа</label>
                <input class="form-control" type="text" name="nom" />
                <label for="data">Дата создания документа</label>
                <input class="form-control" type="date" name="data" />
                <label for="opi">Описание документа</label>
                <input class="form-control" type="text" name="opi" />
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Загрузить" class="btn btn-info"/>
            </div>
            <?php if(isset($_GET['st'])) { ?>
                <div class="alert alert-danger text-center">
                <?php if ($_GET['st'] == 'success') {
                        echo "Документ добавлен!";
                    }
                    else
                    {
                        echo 'Invalid File Extension!';
                    } ?>
                </div>
            <?php } ?>
        </form>
        </div>
    </div>




    





    </div>
   </div> 
   
   </div>
<div class="col-3 ">
    <div class="position-fixed">
    <div class="card ">
       <div class="card-body ">
<div class="btn-group-vertical ">
<a href="#ob" style="width:100%;"><button class="btn btn-outline-primary">Общая информация</button></a>
<a href="#ko" style="width:100%;"><button class="btn btn-outline-primary">Контакты</button></a>
<a href="#re" style="width:100%;"><button class="btn btn-outline-primary">Реквизиты</button></a>
<a href="#rei" style="width:100%;"><button class="btn btn-outline-primary">Рейтинг</button></a>
<a href="#geo" style="width:100%;"><button class="btn btn-outline-primary">География перевозок</button></a>
<a href="#file" style="width:100%;"><button class="btn btn-outline-primary">Документы</button></a>
</div>
</div> 
    </div>
     <div class="card">
         <div class="card-header">
             <h6>Профиль заполнен на: </h6>
         </div>
       <div class="card-body ">
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
</div>
</div> 
    </div>
    </div>
</div>
</div>
   


<!--
    <div class="card-body">
        <div class="form-group">
 
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.id') }}
                        </th>
                        <td>
                            {{ $mycompan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.hortname') }}
                        </th>
                        <td>
                            {{ $mycompan->hortname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.longname') }}
                        </th>
                        <td>
                            {{ $mycompan->longname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.main') }}
                        </th>
                        <td>
                            {{ $mycompan->main->hortname ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.logo') }}
                        </th>
                        <td>
                            @if($mycompan->logo)
                                <a href="{{ $mycompan->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $mycompan->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.typecomp') }}
                        </th>
                        <td>
                            @foreach($mycompan->typecomps as $key => $typecomp)
                                <span class="label label-info">{{ $typecomp->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.typeperevoz') }}
                        </th>
                        <td>
                            @foreach($mycompan->typeperevozs as $key => $typeperevoz)
                                <span class="label label-info">{{ $typeperevoz->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.oporg') }}
                        </th>
                        <td>
                            {{ $mycompan->oporg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.datet') }}
                        </th>
                        <td>
                            {{ $mycompan->datet }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.typedejat') }}
                        </th>
                        <td>
                            {{ App\Models\Mycompan::TYPEDEJAT_SELECT[$mycompan->typedejat] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.direktor') }}
                        </th>
                        <td>
                            {{ $mycompan->direktor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.uradres') }}
                        </th>
                        <td>
                            {{ $mycompan->uradres }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.factadr') }}
                        </th>
                        <td>
                            {{ $mycompan->factadr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.telefonorg') }}
                        </th>
                        <td>
                            {{ $mycompan->telefonorg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.orgmobile') }}
                        </th>
                        <td>
                            {{ $mycompan->orgmobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.web') }}
                        </th>
                        <td>
                            {{ $mycompan->web }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.email') }}
                        </th>
                        <td>
                            {{ $mycompan->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.typenalog') }}
                        </th>
                        <td>
                            {{ App\Models\Mycompan::TYPENALOG_SELECT[$mycompan->typenalog] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.innkpp') }}
                        </th>
                        <td>
                            {{ $mycompan->innkpp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.kpp') }}
                        </th>
                        <td>
                            {{ $mycompan->kpp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.innogrn') }}
                        </th>
                        <td>
                            {{ $mycompan->innogrn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.bik') }}
                        </th>
                        <td>
                            {{ $mycompan->bik }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.bank') }}
                        </th>
                        <td>
                            {{ $mycompan->bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.rathet') }}
                        </th>
                        <td>
                            {{ $mycompan->rathet }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.korhet') }}
                        </th>
                        <td>
                            {{ $mycompan->korhet }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.reitopen') }}
                        </th>
                        <td>
                            {{ $mycompan->reitopen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.reiin') }}
                        </th>
                        <td>
                            {{ $mycompan->reiin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.geogorod') }}
                        </th>
                        <td>
                            {{ $mycompan->geogorod }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.megdu') }}
                        </th>
                        <td>
                            @foreach($mycompan->megdus as $key => $megdu)
                                <span class="label label-info">{{ $megdu->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.note') }}
                        </th>
                        <td>
                            {{ $mycompan->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.utav') }}
                        </th>
                        <td>
                            @if($mycompan->utav)
                                <a href="{{ $mycompan->utav->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.doveren') }}
                        </th>
                        <td>
                            @if($mycompan->doveren)
                                <a href="{{ $mycompan->doveren->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.filedog') }}
                        </th>
                        <td>
                            @if($mycompan->filedog)
                                <a href="{{ $mycompan->filedog->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.newfil') }}
                        </th>
                        <td>
                            @if($mycompan->newfil)
                                <a href="{{ $mycompan->newfil->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.newfill') }}
                        </th>
                        <td>
                            @if($mycompan->newfill)
                                <a href="{{ $mycompan->newfill->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.newfilll') }}
                        </th>
                        <td>
                            @foreach($mycompan->newfilll as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mycompans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>-->



@endsection