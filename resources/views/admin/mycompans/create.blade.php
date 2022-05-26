@extends('layouts.admin')
@section('content')
<?php
/*//connect mysql database
$host = "localhost";
$user = "alexavl1_wb";
$pass = "Y%vV8dPG";
$db = "alexavl1_wb";
$con = mysqli_connect($host, $user, $pass, $db) or die("Error " . mysqli_error($con));

// fetch files
$sql = "select data, nomer, type, filename, opi from tbl_files";
$result = mysqli_query($con, $sql);
*/
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
        <form method="POST" action="{{ route("admin.mycompans.store") }}" enctype="multipart/form-data">
            @csrf
<div class="card"><a name="ob"></a>
    <div class="card-header">

        <h4>Общая информация</h4>
    </div>
	 <div class="card-body">
	     
            <div class="form-group">
                <label for="hortname">{{ trans('cruds.mycompan.fields.hortname') }}</label>
                <input class="form-control {{ $errors->has('hortname') ? 'is-invalid' : '' }}" type="text" name="hortname" id="hortname" value="{{ old('hortname', '') }}">
                @if($errors->has('hortname'))
                    <span class="text-danger">{{ $errors->first('hortname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.hortname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="longname">{{ trans('cruds.mycompan.fields.longname') }}</label>
                <input class="form-control {{ $errors->has('longname') ? 'is-invalid' : '' }}" type="text" name="longname" id="longname" value="{{ old('longname', '') }}">
                @if($errors->has('longname'))
                    <span class="text-danger">{{ $errors->first('longname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.longname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="main_id">{{ trans('cruds.mycompan.fields.main') }}</label>
                <select class="form-control select2 {{ $errors->has('main') ? 'is-invalid' : '' }}" name="main_id" id="main_id">
                    @foreach($mains as $id => $entry)
                        <option value="{{ $id }}" {{ old('main_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('main'))
                    <span class="text-danger">{{ $errors->first('main') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.main_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.mycompan.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="direktor">{{ trans('cruds.mycompan.fields.direktor') }}</label>
                <input class="form-control {{ $errors->has('direktor') ? 'is-invalid' : '' }}" type="text" name="direktor" id="direktor" value="{{ old('direktor', '') }}">
                @if($errors->has('direktor'))
                    <span class="text-danger">{{ $errors->first('direktor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.direktor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="oporg">{{ trans('cruds.mycompan.fields.oporg') }}</label>
                <input class="form-control {{ $errors->has('oporg') ? 'is-invalid' : '' }}" type="text" name="oporg" id="oporg" value="{{ old('oporg', '') }}">
                @if($errors->has('oporg'))
                    <span class="text-danger">{{ $errors->first('oporg') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.oporg_helper') }}</span>
            </div>
                        <div class="row">
                <div class="col-6">
                    <div class="form-group">
                <label>{{ trans('cruds.mycompan.fields.typedejat') }}</label>
                <select class="form-control {{ $errors->has('typedejat') ? 'is-invalid' : '' }}" name="typedejat" id="typedejat">
                    <option value disabled {{ old('typedejat', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Mycompan::TYPEDEJAT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('typedejat', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('typedejat'))
                    <span class="text-danger">{{ $errors->first('typedejat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.typedejat_helper') }}</span>
            </div>
            </div><div class="col-6">
                        <div class="form-group">
                <label for="datet">{{ trans('cruds.mycompan.fields.datet') }}</label>
                <input class="form-control {{ $errors->has('datet') ? 'is-invalid' : '' }}" type="text" name="datet" id="datet" value="{{ old('datet', '') }}">
                @if($errors->has('datet'))
                    <span class="text-danger">{{ $errors->first('datet') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.datet_helper') }}</span>
            </div>
            </div></div>
             <div class="row">
                <div class="col-6">
            
            <div class="form-group">
                <label for="typecomps">{{ trans('cruds.mycompan.fields.typecomp') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('typecomps') ? 'is-invalid' : '' }}" name="typecomps[]" id="typecomps" multiple>
                    @foreach($typecomps as $id => $typecomp)
                        <option value="{{ $id }}" {{ in_array($id, old('typecomps', [])) ? 'selected' : '' }}>{{ $typecomp }}</option>
                    @endforeach
                </select>
                @if($errors->has('typecomps'))
                    <span class="text-danger">{{ $errors->first('typecomps') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.typecomp_helper') }}</span>
            </div></div><div class="col-6">
            <div class="form-group">
                <label for="typeperevozs">{{ trans('cruds.mycompan.fields.typeperevoz') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('typeperevozs') ? 'is-invalid' : '' }}" name="typeperevozs[]" id="typeperevozs" multiple>
                    @foreach($typeperevozs as $id => $typeperevoz)
                        <option value="{{ $id }}" {{ in_array($id, old('typeperevozs', [])) ? 'selected' : '' }}>{{ $typeperevoz }}</option>
                    @endforeach
                </select>
                @if($errors->has('typeperevozs'))
                    <span class="text-danger">{{ $errors->first('typeperevozs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.typeperevoz_helper') }}</span>
            </div>
            </div></div>
            
			    </div>
</div>
<div class="card"><a name="ko"></a>
    <div class="card-header">
        <h4>Контакты</h4>
    </div>
    <div class="card-body">
            


            

            <div class="form-group">
                <label for="uradres">{{ trans('cruds.mycompan.fields.uradres') }}</label>
                <input class="form-control {{ $errors->has('uradres') ? 'is-invalid' : '' }}" type="text" name="uradres" id="uradres" value="{{ old('uradres', '') }}">
                @if($errors->has('uradres'))
                    <span class="text-danger">{{ $errors->first('uradres') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.uradres_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="factadr">{{ trans('cruds.mycompan.fields.factadr') }}</label>
                <input class="form-control {{ $errors->has('factadr') ? 'is-invalid' : '' }}" type="text" name="factadr" id="factadr" value="{{ old('factadr', '') }}">
                @if($errors->has('factadr'))
                    <span class="text-danger">{{ $errors->first('factadr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.factadr_helper') }}</span>
            </div>
                        <div class="row">
                <div class="col-6">
            <div class="form-group">
                <label for="telefonorg">{{ trans('cruds.mycompan.fields.telefonorg') }}</label>
                <input class="form-control mask-phone {{ $errors->has('telefonorg') ? 'is-invalid' : '' }}" type="text" name="telefonorg" id="telefonorg" value="{{ old('telefonorg', '') }}">
                @if($errors->has('telefonorg'))
                    <span class="text-danger">{{ $errors->first('telefonorg') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.telefonorg_helper') }}</span>
            </div>
            </div>
            <div class="col-6">
            <div class="form-group">
                <label for="orgmobile">{{ trans('cruds.mycompan.fields.orgmobile') }}</label>
                <input class="form-control mask-phone {{ $errors->has('orgmobile') ? 'is-invalid' : '' }}" type="text" name="orgmobile" id="orgmobile" value="{{ old('orgmobile', '') }}">
                @if($errors->has('orgmobile'))
                    <span class="text-danger">{{ $errors->first('orgmobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.orgmobile_helper') }}</span>
            </div>
            </div></div>
                        <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://snipp.ru/cdn/maskedinput/jquery.maskedinput.min.js"></script>
            <script>
                $('.mask-phone').mask('+7 999 9999999');
            </script>
            <div class="row">
                <div class="col-6">
            <div class="form-group">
                <label for="web">{{ trans('cruds.mycompan.fields.web') }}</label>
                <input class="form-control {{ $errors->has('web') ? 'is-invalid' : '' }}" type="text" name="web" id="web" value="{{ old('web', '') }}">
                @if($errors->has('web'))
                    <span class="text-danger">{{ $errors->first('web') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.web_helper') }}</span>
            </div>
             </div>
            <div class="col-6">
            <div class="form-group">
                <label for="email">{{ trans('cruds.mycompan.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.email_helper') }}</span>
            </div></div></div>
</div></div>          
    <div class="card"><a name="re"></a>
        <div class="card-header">
            <h4>Реквизиты</h4>
        </div>
        <div class="card-body">              
            <div class="form-group">
                <label>{{ trans('cruds.mycompan.fields.typenalog') }}</label>
                <select class="form-control {{ $errors->has('typenalog') ? 'is-invalid' : '' }}" name="typenalog" id="typenalog">
                    <option value disabled {{ old('typenalog', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Mycompan::TYPENALOG_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('typenalog', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('typenalog'))
                    <span class="text-danger">{{ $errors->first('typenalog') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.typenalog_helper') }}</span>
            </div>
            <div class="row">
              <div class="col-4">
            <div class="form-group">
                <label for="innkpp">{{ trans('cruds.mycompan.fields.innkpp') }}</label>
                <input class="form-control {{ $errors->has('innkpp') ? 'is-invalid' : '' }}" type="text" name="innkpp" id="innkpp" value="{{ old('innkpp', '') }}">
                @if($errors->has('innkpp'))
                    <span class="text-danger">{{ $errors->first('innkpp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.innkpp_helper') }}</span>
            </div></div>
              <div class="col-4">
            <div class="form-group">
                <label for="kpp">{{ trans('cruds.mycompan.fields.kpp') }}</label>
                <input class="form-control {{ $errors->has('kpp') ? 'is-invalid' : '' }}" type="text" name="kpp" id="kpp" value="{{ old('kpp', '') }}">
                @if($errors->has('kpp'))
                    <span class="text-danger">{{ $errors->first('kpp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.kpp_helper') }}</span>
            </div> </div>
              <div class="col-4">
            <div class="form-group">
                <label for="innogrn">{{ trans('cruds.mycompan.fields.innogrn') }}</label>
                <input class="form-control {{ $errors->has('innogrn') ? 'is-invalid' : '' }}" type="text" name="innogrn" id="innogrn" value="{{ old('innogrn', '') }}">
                @if($errors->has('innogrn'))
                    <span class="text-danger">{{ $errors->first('innogrn') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.innogrn_helper') }}</span>
            </div>
                 </div>
          </div>
            
 <div class="row">
                 <div class="col-6">
            <div class="form-group">
                <label for="bik">{{ trans('cruds.mycompan.fields.bik') }}</label>
                <input placeholder="Введите БИК" class="form-control {{ $errors->has('bik') ? 'is-invalid' : '' }}" type="text" name="bik" id="bik" value="{{ old('bik', '') }}">
                @if($errors->has('bik'))
                    <span class="text-danger">{{ $errors->first('bik') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.bik_helper') }}</span>
            </div></div>
              <div class="col-6"> 
            <div class="form-group">
                <label for="bank">{{ trans('cruds.mycompan.fields.bank') }}</label>
                <input class="form-control {{ $errors->has('bank') ? 'is-invalid' : '' }}" type="text" name="bank" id="bank" value="{{ old('bank', '') }}">
                @if($errors->has('bank'))
                    <span class="text-danger">{{ $errors->first('bank') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.bank_helper') }}</span>
            </div>
              </div>

            </div>
            <div class="row">
            <div class="col-6">
            <div class="form-group">
                <label for="rathet">{{ trans('cruds.mycompan.fields.rathet') }}</label>
                <input class="form-control {{ $errors->has('rathet') ? 'is-invalid' : '' }}" type="text" name="rathet" id="rathet" value="{{ old('rathet', '') }}">
                @if($errors->has('rathet'))
                    <span class="text-danger">{{ $errors->first('rathet') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.rathet_helper') }}</span>
            </div>
            </div>
            <div class="col-6">
            <div class="form-group">
                <label for="korhet">{{ trans('cruds.mycompan.fields.korhet') }}</label>
                <input class="form-control {{ $errors->has('korhet') ? 'is-invalid' : '' }}" type="text" name="korhet" id="korhet" value="{{ old('korhet', '') }}">
                @if($errors->has('korhet'))
                    <span class="text-danger">{{ $errors->first('korhet') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.korhet_helper') }}</span>
            </div>
            </div>
            </div>
            

 </div></div>
         <div class="card"><a name="rei"></a>
        <div class="card-header">
            <h4>Рейтинг</h4>
        </div>
        <div class="card-body">  			
			<div class="row"><div class="col-6">
            <div class="form-group">
                <label for="reitopen">{{ trans('cruds.mycompan.fields.reitopen') }}</label>
                <input class="form-control {{ $errors->has('reitopen') ? 'is-invalid' : '' }}" type="text" name="reitopen" id="reitopen" value="{{ old('reitopen', '') }}">
                @if($errors->has('reitopen'))
                    <span class="text-danger">{{ $errors->first('reitopen') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.reitopen_helper') }}</span>
            </div></div><div class="col-6">
            <div class="form-group">
                <label for="reiin">{{ trans('cruds.mycompan.fields.reiin') }}</label>
                <input class="form-control {{ $errors->has('reiin') ? 'is-invalid' : '' }}" type="text" name="reiin" id="reiin" value="{{ old('reiin', '') }}">
                @if($errors->has('reiin'))
                    <span class="text-danger">{{ $errors->first('reiin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.reiin_helper') }}</span>
            </div></div></div>
 </div></div>
         <div class="card"><a name="geo"></a>
        <div class="card-header">
            <h4>География перевозок</h4>
        </div>
        <div class="card-body">  
            <div class="form-group">
                <label for="geogorod">{{ trans('cruds.mycompan.fields.geogorod') }}</label>
                <input class="form-control {{ $errors->has('geogorod') ? 'is-invalid' : '' }}" type="text" name="geogorod" id="geogorod" value="{{ old('geogorod', '') }}">
                @if($errors->has('geogorod'))
                    <span class="text-danger">{{ $errors->first('geogorod') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.geogorod_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="megdus">{{ trans('cruds.mycompan.fields.megdu') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('megdus') ? 'is-invalid' : '' }}" name="megdus[]" id="megdus" multiple>
                    @foreach($megdus as $id => $megdu)
                        <option value="{{ $id }}" {{ in_array($id, old('megdus', [])) ? 'selected' : '' }}>{{ $megdu }}</option>
                    @endforeach
                </select>
                @if($errors->has('megdus'))
                    <span class="text-danger">{{ $errors->first('megdus') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.megdu_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.mycompan.fields.note') }}</label>
                <input class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" type="text" name="note" id="note" value="{{ old('note', '') }}">
                @if($errors->has('note'))
                    <span class="text-danger">{{ $errors->first('note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.note_helper') }}</span>
            </div>
            			 </div></div>
         
             <!--<div class="form-group">
                <label for="newfil">{{ trans('cruds.mycompan.fields.newfil') }}</label>
                <div class="needsclick dropzone {{ $errors->has('newfil') ? 'is-invalid' : '' }}" id="newfil-dropzone">
                </div>
                @if($errors->has('newfil'))
                    <span class="text-danger">{{ $errors->first('newfil') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.newfil_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="newfill">{{ trans('cruds.mycompan.fields.newfill') }}</label>
                <div class="needsclick dropzone {{ $errors->has('newfill') ? 'is-invalid' : '' }}" id="newfill-dropzone">
                </div>
                @if($errors->has('newfill'))
                    <span class="text-danger">{{ $errors->first('newfill') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.newfill_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="newfilll">{{ trans('cruds.mycompan.fields.newfilll') }}</label>
                <div class="needsclick dropzone {{ $errors->has('newfilll') ? 'is-invalid' : '' }}" id="newfilll-dropzone">
                </div>
                @if($errors->has('newfilll'))
                    <span class="text-danger">{{ $errors->first('newfilll') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mycompan.fields.newfilll_helper') }}</span>
            </div>-->
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
        
        
<div class="card"><a name="file"></a>
        <div class="card-header">
            <h4>Документы</h4>
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
                $i = 1; /*
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
    <a href="http://admin.7rights.ru/public/upload/<?php echo $row['filename']; ?>" target="_blank">Просмотр</a>
    <a href="http://admin.7rights.ru/public/upload/<?php echo $row['filename']; ?>" download>Скачать</a>
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
toggle between hiding and showing the dropdown content 
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
                <?php } */ ?>
                </tbody>
            </table>
        </div>
    </div>
        
        
        
        
        
           <div class="row">
        <div class="col-xs-8 col-xs-offset-2 well">
        <form action="http://admin.7rights.ru/public/upload.php" method="post" enctype="multipart/form-data">
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
</div><div class="col-3 ">
    
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
             <h6>Профиль заполне на: </h6>
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



@endsection

@section('scripts')
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.mycompans.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($mycompan) && $mycompan->logo)
      var file = {!! json_encode($mycompan->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.utavDropzone = {
    url: '{{ route('admin.mycompans.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="utav"]').remove()
      $('form').append('<input type="hidden" name="utav" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="utav"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($mycompan) && $mycompan->utav)
      var file = {!! json_encode($mycompan->utav) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="utav" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.doverenDropzone = {
    url: '{{ route('admin.mycompans.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="doveren"]').remove()
      $('form').append('<input type="hidden" name="doveren" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="doveren"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($mycompan) && $mycompan->doveren)
      var file = {!! json_encode($mycompan->doveren) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="doveren" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.filedogDropzone = {
    url: '{{ route('admin.mycompans.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="filedog"]').remove()
      $('form').append('<input type="hidden" name="filedog" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="filedog"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($mycompan) && $mycompan->filedog)
      var file = {!! json_encode($mycompan->filedog) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="filedog" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.newfilDropzone = {
    url: '{{ route('admin.mycompans.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="newfil"]').remove()
      $('form').append('<input type="hidden" name="newfil" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="newfil"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($mycompan) && $mycompan->newfil)
      var file = {!! json_encode($mycompan->newfil) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="newfil" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.newfillDropzone = {
    url: '{{ route('admin.mycompans.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="newfill"]').remove()
      $('form').append('<input type="hidden" name="newfill" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="newfill"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($mycompan) && $mycompan->newfill)
      var file = {!! json_encode($mycompan->newfill) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="newfill" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    var uploadedNewfilllMap = {}
Dropzone.options.newfilllDropzone = {
    url: '{{ route('admin.mycompans.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="newfilll[]" value="' + response.name + '">')
      uploadedNewfilllMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedNewfilllMap[file.name]
      }
      $('form').find('input[name="newfilll[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($mycompan) && $mycompan->newfilll)
          var files =
            {!! json_encode($mycompan->newfilll) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="newfilll[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<style>
.btn-xs {
    display:none;
}
</style>
@endsection