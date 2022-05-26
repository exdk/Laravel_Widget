@extends('layouts.admin')
@section('content')
<script src="//code.jquery.com/jquery.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/2.4.1/lodash.min.js"></script>
<script src="//cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js"></script>
<script src="https://stevenlevithan.com/assets/misc/date.format.js"></script>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-2">
                <h4>Найти заказ</h4>
            </div>
             <div class="col-6">
            </div>

@can('zakaznagruz_create')

            <div class="col-4">
            <a style="float:right;" class="btn btn-success" href="https://admin.7rights.ru/admin/zakaznagruzs/create">
                Создать заказ +
            </a>
                    <div style="margin-right: 10px;float:right;" class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-outline-success" data-toggle"modal" data-target="#csvImportModal">
                                   {{ trans('global.app_csvImport') }}
                            </button>
                @include('csvImport.modalz', ['model' => 'Zakaznagruz', 'route' => 'admin.zakaznagruzs.parseCsvImport'])

                        </div>
                    </div>
        </div>        
@endcan
        </div>
    </div>
</div>



<div class="card">
    <div class="card-body" style=" padding: 0rem !important;">
        <div class="table-responsive">
            <table class=" table table-hover datatable datatable-Zakaznagruz">
                <thead>
                    <tr>
                        <th width="5" style="padding:8px;">

                        </th>
                        <th width="10">
                            №
                        </th>
                        <th>
                            Статус
                        </th>
                        <th>
                            
                        </th>
                        <th style="text-align: center;">
                            Маршрут
                        </th>
                        <th>
                            Погрузка
                        </th>      
                        <th>
                            
                        </th> 
                        <th style="text-align: center;">
                            Стоимость
                        </th>
                        <th>
                            
                        </th>
                        <!--
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.bookmark') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.draft') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.sapid') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.gruz') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.tonnag') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.unit') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.kubatura') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.pointload') }}
                        </th>
                        <th>
                            {{ trans('cruds.pointload.fields.gorod') }}
                        </th>
                        <th>
                            {{ trans('cruds.pointload.fields.ulitca') }}
                        </th>
                        <th>
                            {{ trans('cruds.pointload.fields.dom') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.dateload') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.timeloada') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.timeloadado') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.a_24') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.dopinfoload') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.cload') }}
                        </th>
                        <th>
                            {{ trans('cruds.pointload.fields.gorod') }}
                        </th>
                        <th>
                            {{ trans('cruds.pointload.fields.ulitca') }}
                        </th>
                        <th>
                            {{ trans('cruds.pointload.fields.dom') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.cdate') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.ctime') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.ctimedo') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.с_24') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.typekuzov') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.typeload') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.type_unload') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.ltlftl') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.treb') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.trandoc') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.adr') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.tempot') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.tempdo') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.typeoplata') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.uoviaoplati') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.typetorgov') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.tekprice') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.tart_tena') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.valuta') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.bankday') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.tart_nd') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.valnd') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.bank_daynd') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.nal') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.naldn') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.nalcard') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.hagponig') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.max') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.dopinfoplata') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.kurator_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.kontaktprim') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.ktomoget') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.kromezakaz') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.perevozkrome') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.nahalo') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.nahalodate') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.nahalotime') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.finita') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.finitadate') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.hour') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.finitatime') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.min') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.look') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.kolo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>-->
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($zakaznagruzs as $key => $zakaznagruz)
                        <tr data-entry-id="{{ $zakaznagruz->id }}" id="tr{{ $zakaznagruz->id ?? ''}}">
                            <td style="padding: 20px 0rem !important;"> <div id="bm{{ $zakaznagruz->id ?? ''}}" 
                            @php 
                            if ($zakaznagruz->bookmark ==1) {echo "class='bookmark clickf'";}
                            if ($zakaznagruz->bookmark ==0) {echo "class='bookmark'";}
                            @endphp
                            ></div>
                                  <!--<i class="fa fa-bookmark fa-rotate-270" aria-hidden="true"></i>-->
                            <script>
$(document).ready(function(){
	$('#bm{{ $zakaznagruz->id ?? ''}}').click(function () {
		$(this).toggleClass('clickf');
                var user_name    = {{ $zakaznagruz->id ?? '' }};
                var user_email   = {{ $zakaznagruz->bookmark ?? '' }};;
                var text_comment = 10;
                $.ajax({
                    url: 'https://admin.7rights.ru/public/fav.php', // куда отправляем
                    type: 'post', // метод передачи
                    dataType: 'json', // тип передачи данных
                    data: { // что отправляем
                        'user_name':    user_name,
                        'user_email':   user_email,
                        'text_comment': text_comment
                    },
                    success: function(data){
                        $('.messages').html(data.result); // выводим ответ сервера
                    }
                });
		});
	});
</script>
                            </td>
                            <td>
                                @can('zakaznagruz_show')
                                    <a href="{{ route('admin.zakaznagruzs.show', $zakaznagruz->id ?? '') }}">
                                        {{ $zakaznagruz->id ?? '' }}
                                    </a>
                                @endcan
                            </td>
                            <td>
                                @php $fDate = strtotime($zakaznagruz->finitadate ?? '');
                                        $fin = date('Y/m/d', $fDate); @endphp
                                <i class="fa fa-caret-right" style="color:#24b377;" aria-hidden="true"></i>&nbsp;<span style="color:#24b377;" id="datedata" data-countdown='@php echo $fin; @endphp {{ $zakaznagruz->finitatime ?? "00:00" }}'></span>
                           
                            </td>
                            <td>
                                <button style="background:#007bff;color:#fff;padding:2px;" type="button" class="btn" id="from{{ $zakaznagruz->id ?? '' }}">
                                <script>
                                    var abbrev = '7 Rights Logistocs'.match(/\b([A-Z])/g).join('');
                                    document.getElementById("from{{ $zakaznagruz->id ?? '' }}").innerHTML = abbrev;
                                </script>
                                </button>
                            </td>
                            <td>
                                <div class="row">
                                <div class="col-6">
                                @php 
                                $uid = Auth::user()->id;
                                $idd = $zakaznagruz->id;
                                if ($uid == 100000 or $uid == 100001) {
                                        $pid = DB::table('zakaznagruzs')->where('id', $idd)->value('pointload_id');
                                        $country = DB::table('pointloads')->where('id', $pid)->value('country_id');
                                        echo "<b style='text-transform: uppercase;'>";
                                        echo $ru = DB::table('countries')->where('id', $country)->value('short_code');
                                        echo "&nbsp;";
                                        echo $point = DB::table('pointloads')->where('id', $pid)->value('gorod');
                                        echo "&nbsp;";
                                        echo $point = DB::table('pointloads')->where('id', $pid)->value('region');
                                        echo "</b>";
                                }
                                @endphp
                                   <b style="text-transform: uppercase;">{{ $zakaznagruz->pointload->country->short_code ?? '' }}&nbsp; {{ $zakaznagruz->pointload->gorod ?? '' }}&nbsp; {{ $zakaznagruz->pointload->region ?? '' }}</b><br>
                                    @php $futureDate = strtotime($zakaznagruz->dateload ?? '');
                                        echo date('d.m', $futureDate); @endphp,
                                    {{ $zakaznagruz->timeloada ?? '' }}
                                </div>
                                <div class="col-6">
                                @php 
                                $uid = Auth::user()->id;
                                $idd = $zakaznagruz->id;
                                if ($uid == 100000 or $uid == 100001) {
                                        $pidf = DB::table('zakaznagruzs')->where('id', $idd)->value('cload_id');
                                        $country = DB::table('pointloads')->where('id', $pidf)->value('country_id');
                                        echo "<b style='text-transform: uppercase;'>";
                                        echo $ru = DB::table('countries')->where('id', $country)->value('short_code');
                                        echo "&nbsp;";
                                        echo $point = DB::table('pointloads')->where('id', $pidf)->value('gorod');
                                        echo "&nbsp;";
                                        echo $point = DB::table('pointloads')->where('id', $pidf)->value('region');
                                        echo "</b>";
                                }
                                @endphp
                                    
                                    
                                    
                                    <b style=" text-transform: uppercase;">{{ $zakaznagruz->pointload->country->short_code ?? '' }}&nbsp; {{ $zakaznagruz->cload->gorod ?? '' }}&nbsp; {{ $zakaznagruz->cload->region ?? '' }}</b><br>
                                        @php $futureDate = strtotime($zakaznagruz->cdate ?? '');
                                        echo date('d.m', $futureDate); @endphp,
                                    {{ $zakaznagruz->ctime ?? '' }}
                                </div>
                            </div>
                            </td>
                            <td>
                               <b> @foreach($zakaznagruz->typekuzovs as $key => $item){{ $item->korot }}@endforeach, 
                                {{ $zakaznagruz->tonnag ?? '' }}</b>т,  <b>{{ $zakaznagruz->kubatura ?? '' }}</b>м³<br>
                                {{ $zakaznagruz->ltlftl->title ?? '' }}
                            </td>
                            <td>
                             @php
                                if ($zakaznagruz->typetorgov==0 or $zakaznagruz->typetorgov==1 )
                                echo " ";
                                else 
                                echo "<i style='color:#007bff;'class='fa-fw nav-icon fas fa-coins'></i>";
                            @endphp
                            </td>
                            <td>
                                <div class="poster">
                                <button type="button" style="backgroud-color:transparent;" class="btn"><b >
                                @php
                                    if ($zakaznagruz->typetorgov==1)
                                    echo " ";
                                    else 
                                    echo  number_format($zakaznagruz->tekprice ?? '0', 2, ',', ' ')."</b> ".App\Models\Zakaznagruz::VALUTA_SELECT[$zakaznagruz->valuta ?? ''];
                                @endphp
                                </button>
                                <div class="descr">
                                    Без НДС: <b>@php echo number_format($zakaznagruz->tekprice ?? '0' , 2, ',', ' ');@endphp {{ App\Models\Zakaznagruz::VALUTA_SELECT[$zakaznagruz->valuta] ?? '' }}</b>, {{ $zakaznagruz->bankday ?? '' }} б.д.<br>
                                    С НДС: <b>@php echo number_format($zakaznagruz->tekprice*1.2 , 2, ',', ' '); @endphp {{ App\Models\Zakaznagruz::VALUTA_SELECT[$zakaznagruz->valuta] ?? '' }}</b>, {{ $zakaznagruz->bank_daynd ?? '' }} б.д.<br>
                                    @php if ($zakaznagruz->nal >0) { @endphp
                                    Наличные: <b>@php echo number_format($zakaznagruz->nal ?? '0'  , 2, ',', ' '); @endphp {{ App\Models\Zakaznagruz::VALUTA_SELECT[$zakaznagruz->valuta] ?? '' }}</b>, {{ $zakaznagruz->naldn ?? '' }} д.<br>
                                    @php } @endphp
                                    Стоимость: <b>@php echo number_format($zakaznagruz->tekprice ?? '0' , 2, ',', ' ');@endphp {{ App\Models\Zakaznagruz::VALUTA_SELECT[$zakaznagruz->valuta] ?? '' }}/км</b> Расстояние: <b>0 км</b>
                                </div>
                                </div>
                            </td><td>
                                <a style="margin-left: 40px;"
                                    @php
                                        if ($zakaznagruz->typetorgov ==0)
                                        echo "id='fi".($zakaznagruz->id ?? '')."'";
                                        if ($zakaznagruz->typetorgov ==1)
                                        echo "id='zap".($zakaznagruz->id ?? '')."'";
                                        if ($zakaznagruz->typetorgov==2) 
                                        echo "id='btn-map".($zakaznagruz->id ?? '')."'";
                                        else 
                                        echo "id='btn-ma".($zakaznagruz->id ?? '')."'";
                                    @endphp
                                    href="#">
                                    <button class="btn btn-outline-secondary" style="padding: 1px 5px;width:120px;float:right;margin-right:20px;font-weight:300;" id="t{{ $zakaznagruz->id ?? '' }}">
                                        {{ App\Models\Zakaznagruz::TYPETORGOV_RADIO[$zakaznagruz->typetorgov ?? ''] ?? '' }}
                                    </button>
                                </a>
                                
                                <div id="list__routes{{ $zakaznagruz->id ?? '' }}" class="list__routes">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Сделать ставку</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-9 col-lg-offset-3">
                                                    <div class="input-group">
                                                        <input id="calcb{{ $zakaznagruz->id ?? '' }}" type="text" autocomplete="off" class="form-control plminput" value="{{ $zakaznagruz->tekprice ?? '' }}" style='text-align:right;'>
                                                        <span class="input-group-btn ">
                                                            <button id="minusb{{ $zakaznagruz->id ?? '' }}" class="btn plmin" type="button">-</button>
                                                        </span>
                                                        <span class="input-group-btn ">
                                                            <button id="plusb{{ $zakaznagruz->id ?? '' }}" class="btn plmin" type="button">+</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <script>
                                            $('#minusb{{ $zakaznagruz->id ?? '' }}').click(function(){
                                             $("#calcb{{ $zakaznagruz->id ?? '' }}").val(parseInt($("#calcb{{ $zakaznagruz->id ?? '' }}").val())-{{ $zakaznagruz->hagponig ?? '100' }});
                                            });
                                            $('#plusb{{ $zakaznagruz->id ?? '' }}').click(function(){
                                             $("#calcb{{ $zakaznagruz->id ?? '' }}").val(parseInt($("#calcb{{ $zakaznagruz->id ?? '' }}").val())+{{ $zakaznagruz->hagponig ?? '100' }});
                                            }); 
                                        </script>
                                        <div class="row">
                                            <div class="col-lg-6 col-lg-offset-3">
                                                Стартовая цена
                                            </div>
                                            <div class="col-lg-6 col-lg-offset-3">
                                                {{ $zakaznagruz->tart_tena ?? '' }}
                                                <input type="text" hidden>
                                            </div>
                                            <div class="col-lg-6 col-lg-offset-3">
                                                Минимальный шаг
                                            </div>
                                            <div class="col-lg-6 col-lg-offset-3">
                                                {{ $zakaznagruz->hagponig ?? '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div id="modalbb{{ $zakaznagruz->id ?? '' }}" class="card-footer" style="cursor:pointer;width:100%;border-radius:0px;background-color:#007bff;color:white; text-align:center;">
                                        Сделать ставку
                                    </div>
                                </div>
                            </div>
                                                        
                            <div id="list__routesma{{ $zakaznagruz->id ?? '' }}" class="list__routes">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Сделать ставку</h5>
                                    </div>
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-9 col-lg-offset-3">
                                            <div class="input-group">
                                                <input id="calcbma{{ $zakaznagruz->id ?? '' }}" type="text" autocomplete="off" class="form-control plminput" value="{{ $zakaznagruz->tekprice ?? '' }}" style='text-align:right;'>
                                                <span class="input-group-btn ">
                                                    <button id="minusbma{{ $zakaznagruz->id ?? '' }}" class="btn plmin" type="button">-</button>
                                                </span>
                                                <span class="input-group-btn ">
                                                    <button id="plusbma{{ $zakaznagruz->id ?? '' }}" class="btn plmin" type="button">+</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <script>
                                    $('#minusbma{{ $zakaznagruz->id ?? '' }}').click(function(){
                                        $("#calcbma{{ $zakaznagruz->id ?? '' }}").val(parseInt($("#calcbma{{ $zakaznagruz->id ?? '' }}").val())-{{ $zakaznagruz->hagponig ?? '100' }});
                                    });
                                    $('#plusbma{{ $zakaznagruz->id ?? '' }}').click(function(){
                                        $("#calcbma{{ $zakaznagruz->id ?? '' }}").val(parseInt($("#calcbma{{ $zakaznagruz->id ?? '' }}").val())+0);
                                    }); 
                                </script>
                                <div class="row">
                                    <div class="col-lg-6 col-lg-offset-3">
                                        Стартовая цена
                                    </div>
                                    <div class="col-lg-6 col-lg-offset-3">
                                        {{ $zakaznagruz->tart_tena ?? '' }}
                                        <input type="text" hidden>
                                    </div>
                                    <div class="col-lg-6 col-lg-offset-3">
                                        Минимальный шаг
                                    </div>
                                    <div class="col-lg-6 col-lg-offset-3">
                                        {{ $zakaznagruz->hagponig ?? '' }}
                                    </div>
                                </div>
                            </div>
                            <div id="modalbbma{{ $zakaznagruz->id ?? '' }}" class="card-footer" style="cursor:pointer;width:100%;border-radius:0px;background-color:#007bff;color:white; text-align:center;">
                                Сделать ставку
                            </div>
                        </div>
                    </div>




                    <div id="list__routeszap{{ $zakaznagruz->id ?? '' }}" class="list__routes">
                        <div class="card">
                            <div class="card-header">
                                <h5>Предложить цену</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-9 col-lg-offset-3">
                                        <div class="input-group">
                                            <input id="calcbzap{{ $zakaznagruz->id ?? '' }}" type="text" autocomplete="off" class="form-control plminput" value="{{ $zakaznagruz->tekprice ?? '' }}" style='text-align:right;'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="modalbbzap{{ $zakaznagruz->id ?? '' }}" class="card-footer" style="cursor:pointer;width:100%;border-radius:0px;background-color:#007bff;color:white; text-align:center;">
                                Предложить цену
                            </div>
                        </div>
                    </div>

                    <div id="list__routesfi{{ $zakaznagruz->id ?? '' }}" class="list__routes">
                        <div class="card">
                            <div class="card-header">
                                <h5>Подать заявку</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-9 col-lg-offset-3">
                                        <div class="input-group">
                                            {{ $zakaznagruz->tekprice ?? '' }}  {{App\Models\Zakaznagruz::VALUTA_SELECT[$zakaznagruz->valuta ?? ''] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="modalbbfi{{ $zakaznagruz->id ?? '' }}" class="card-footer" style="cursor:pointer;width:100%;border-radius:0px;background-color:#007bff;color:white; text-align:center;">
                                Подать заявку
                            </div>
                        </div>
                    </div>


                    <script>
                        $('#btn-map{{ $zakaznagruz->id ?? '' }}').click(function(event) {
                          event.preventDefault();
                          $('#list__routes{{ $zakaznagruz->id ?? '' }}').toggleClass('on');
                        });
                        $('#btn-ma{{ $zakaznagruz->id ?? '' }}').click(function(event) {
                          event.preventDefault();
                          $('#list__routesma{{ $zakaznagruz->id ?? '' }}').toggleClass('on');
                        });
                        $('#zap{{ $zakaznagruz->id ?? '' }}').click(function(event) {
                          event.preventDefault();
                          $('#list__routeszap{{ $zakaznagruz->id ?? '' }}').toggleClass('on');
                        });
                        $('#fi{{ $zakaznagruz->id ?? '' }}').click(function(event) {
                          event.preventDefault();
                          $('#list__routesfi{{ $zakaznagruz->id ?? '' }}').toggleClass('on');
                        });
                    </script>

<script>
        $(document).ready(function(){
            $('#modalbb{{ $zakaznagruz->id ?? '' }}').click(function(){
                // собираем данные с формы
                var user_name    = {{ $zakaznagruz->id ?? '' }};
                var user_email   = document.getElementById('calcb{{ $zakaznagruz->id ?? '' }}').value;//$('#calc{{ $zakaznagruz->id ?? '' }}').val();//
                var text_comment = {{ Auth::user()->id }}; //$('#calc{{ $zakaznagruz->id ?? '' }}').val();
                // отправляем данные
                $.ajax({
                    url: 'https://admin.7rights.ru/public/action.php', // куда отправляем
                    type: 'post', // метод передачи
                    dataType: 'json', // тип передачи данных
                    data: { // что отправляем
                        'user_name':    user_name,
                        'user_email':   user_email,
                        'text_comment': text_comment
                    },
                    // после получения ответа сервера
                    success: function(data){
                        $('.messages').html(data.result); // выводим ответ сервера
                    }
                });
                setTimeout(function(){
	location.reload();
}, 1000);
            });

        });
$(document).ready(function(){
            $('#modalbbma{{ $zakaznagruz->id ?? '' }}').click(function(){
                // собираем данные с формы
                var user_name    = {{ $zakaznagruz->id ?? '' }};
                var user_email   = document.getElementById('calcbma{{ $zakaznagruz->id ?? '' }}').value;
                var text_comment = {{ Auth::user()->id }};//$('#calc{{ $zakaznagruz->id ?? '' }}').val();
                // отправляем данные
                $.ajax({
                    url: 'https://admin.7rights.ru/public/action.php', // куда отправляем
                    type: 'post', // метод передачи
                    dataType: 'json', // тип передачи данных
                    data: { // что отправляем
                        'user_name':    user_name,
                        'user_email':   user_email,
                        'text_comment': text_comment
                    },
                    // после получения ответа сервера
                    success: function(data){
                        $('.messages').html(data.result); // выводим ответ сервера
                    }
                });
                setTimeout(function(){
	location.reload();
}, 1000);
            });

        });
        



$(document).ready(function(){
            $('#modalbbzap{{ $zakaznagruz->id ?? '' }}').click(function(){
                // собираем данные с формы
                var user_name    = {{ $zakaznagruz->id ?? '' }};
                var user_email   = document.getElementById('calcbzap{{ $zakaznagruz->id ?? '' }}').value;
                var text_comment = {{ Auth::user()->id }};//$('#calc{{ $zakaznagruz->id ?? '' }}').val();
                // отправляем данные
                $.ajax({
                    url: 'https://admin.7rights.ru/public/action.php', // куда отправляем
                    type: 'post', // метод передачи
                    dataType: 'json', // тип передачи данных
                    data: { // что отправляем
                        'user_name':    user_name,
                        'user_email':   user_email,
                        'text_comment': text_comment
                    },
                    // после получения ответа сервера
                    success: function(data){
                        $('.messages').html(data.result); // выводим ответ сервера
                    }
                });
                setTimeout(function(){
	location.reload();
}, 1000);
            });

        });
        
        
$(document).ready(function(){
            $('#modalbbfi{{ $zakaznagruz->id ?? '' }}').click(function(){
                // собираем данные с формы
                var user_name    = {{ $zakaznagruz->id ?? '' }};
                var user_email   = document.getElementById('calcbfi{{ $zakaznagruz->id ?? '' }}').value;
                var text_comment = {{ Auth::user()->id }};//$('#calc{{ $zakaznagruz->id ?? '' }}').val();
                // отправляем данные
                $.ajax({
                    url: 'https://admin.7rights.ru/public/action.php', // куда отправляем
                    type: 'post', // метод передачи
                    dataType: 'json', // тип передачи данных
                    data: { // что отправляем
                        'user_name':    user_name,
                        'user_email':   user_email,
                        'text_comment': text_comment
                    },
                    // после получения ответа сервера
                    success: function(data){
                        $('.messages').html(data.result); // выводим ответ сервера
                    }
                });
                setTimeout(function(){
	location.reload();
}, 1000);
            });

        });
</script>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<script type="text/javascript">
$('[data-countdown]').each(function(){

  var $this = $(this), finalDate = $(this).data('countdown');
  $this.countdown(finalDate)
    .on('update.countdown', function(event){
	var totalHours = event.offset.totalDays * 24 + event.offset.hours;
	$this.html(event.strftime(totalHours+':%M:%S'));
    })
    .on('finish.countdown', function(event){
      //alert("teste");
      tr{{ $zakaznagruz -> id ?? ''}}.style.display="none";
      /*var user_name    = {{ $zakaznagruz->id ?? '' }};
      var user_email   = 1;
      var text_comment = 1;//$('#calc{{ $zakaznagruz->id ?? '' }}').val();
      $.ajax({
        url: 'https://admin.7rights.ru/public/zak.php', // куда отправляем
        type: 'post', // метод передачи
        dataType: 'json', // тип передачи данных
        data: { // что отправляем
            'user_name':    user_name,
            'user_email':   user_email,
            'text_comment': text_comment
            },
        success: function(data){
            $('.messages').html(data.result); // выводим ответ сервера
        }
      });
      setTimeout(function(){location.reload();}, 1000);*/
    });
});
</script>


@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(false, [], $.fn.dataTable.defaults.buttons)
@can('zakaznagruz_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.zakaznagruzs.massDestroy') }}",
    className: 'btn-info',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Zakaznagruz:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})
new $.fn.dataTable.Buttons( table, {
    buttons:[
        {
            extend: 'searchBuilder',
            config: {
                depthLimit: 2
            }
        }
    ],
} );
</script>
<style>
    .plmin{border-radius:0px;
        border: 1px #ced4da solid;
        width:34px;
        color:#082567;
        font-weight: 700;
    }
    .plminput {border-radius:0px;
        border: 1px #ced4da solid;
        font-size: 20px;
    }
</style>
<style>
.list__routes {
  background-color: white;
  padding: 0px 0px 0px;
  display: none;
  width:400px;
  right:50px;
}
.list__routes.on {
  display:block;
  position: fixed;
  z-index: 10000;
}
table.dataTable {
    margin-top: 0px !important;
    margin-bottom: 0px !important;
}
</style>
<style>
.poster{
    position:relative;
}
.descr{
    display:none;
    margin-left:-200px;
    padding:10px;
    margin-top:17px;
    background:#fff;
    height:auto;
    -moz-box-shadow:0 5px 5px rgba(0,0,0,0.3);
    -webkit-box-shadow:0 5px 5px rgba(0,0,0,0.3);
    box-shadow:0 5px 5px rgba(0,0,0,0.3);
}
.poster:hover .descr{
    display:block;
    position:absolute;
    top:10px;
    z-index:9999;
    width: auto;
}
</style>
<style>
    *, *:before, *:after{ 
    box-sizing: border-box; 
    -moz-box-sizing: border-box; 
    -webkit-box-sizing: border-box; 
} 
.bookmark{ 
    position: relative; 
    height: 10px; 
    width: 10px; 
    padding: 0px; 
    -webkit-transform: rotate(0deg) skew(0deg); 
    transform: rotate(0deg) skew(0deg); 
    border-top: 5px solid #000; 
    border-bottom: 5px solid #000; 
    border-right: 5px solid transparent; 
}
.clickf {
    border-top: 5px solid #ff0000; 
    border-bottom: 5px solid #ff0000; 
}
.fa-bookmark {
	color: #000;
}
</style>
@endsection