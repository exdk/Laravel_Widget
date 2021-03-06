@extends('layouts.adminz')
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
            <div class="col-4">

            <a style="float:right;" class="btn btn-success" href="{{ route('admin.zakaznagruzs.create') }}">
                Создать заказ +
            </a>
@can('zakaznagruz_create')
    <div style="margin-right: 10px;float:right;" class="row">
        <div class="col-lg-12">
            <button class="btn btn-outline-success" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modalz', ['model' => 'Zakaznagruz', 'route' => 'admin.zakaznagruzs.parseCsvImport'])
        </div>
    </div>
@endcan
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body" style="padding:0;">
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
                       <!-- <th>
                            SAP ID
                        </th>-->
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

                        <!--<th>
                            {{ trans('cruds.zakaznagruz.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.bookmark') }}
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
                            {{ trans('cruds.aemploi.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.aemploi.fields.oth') }}
                        </th>
                        <th>
                            {{ trans('cruds.aemploi.fields.emailto') }}
                        </th>
                        <th>
                            {{ trans('cruds.aemploi.fields.mobileto') }}
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
                        <tr data-entry-id="{{ $zakaznagruz->id ?? '' }}" id="tr{{ $zakaznagruz->id ?? ''}}">
                                  <td>
                                <i class="fa fa-bookmark fa-rotate-270" aria-hidden="true"></i>
                            </td>


                            <td>
                            
                                @can('zakaznagruz_show')
                                    <a href="{{ route('admin.zakaznagruzs.show', $zakaznagruz->id ?? '') }}">
                                        {{ $zakaznagruz->id ?? '' }}
                                    </a>
                                @endcan
                            </td>
                            <!--<td >
                                <span style="display:none">{{ $zakaznagruz->bookmark ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $zakaznagruz->bookmark ? 'checked' : '' }}>
                            </td>-->
                            <td>
            <i class="fa fa-caret-right" style="color:#24b377;" aria-hidden="true"></i>&nbsp;<span style="color:#24b377;" id="datedata" data-countdown='{{ $zakaznagruz->finitadate ?? "2021/10/04" }} {{ $zakaznagruz->finitatime ?? "00:00" }}'></span>
                               <!--{{ $zakaznagruz->pointload->title ?? '' }}-->
                               
                               
                              <!-- <div class="example-multiple" data-countdown="true">1185 days 10:47:29</div>
    <div class="example-multiple" data-countdown="2021/10/03 22:00"></div>-->



                            </td>
    
    <td>
                                                                 <button style="background:#007bff;color:#fff;padding:2px;" type="button" class="btn" id="from{{ $zakaznagruz->id ?? '' }}">
                                        <script>
                                        var abbrev = '7 Rights Logistocs'.match(/\b([A-Z])/g).join('');
                                        document.getElementById("from{{ $zakaznagruz->id ?? '' }}").innerHTML = abbrev;
                                    </script>
                                    </button>
                                <!--{{ $zakaznagruz->pointload->gorod ?? '' }}-->
                            </td>
                            <td>
                                <div class="row">
                                <div class="col-6">
                                    
                                   <b style=" text-transform: uppercase;">{{ $zakaznagruz->pointload->country->short_code ?? '' }}&nbsp; {{ $zakaznagruz->pointload->gorod ?? '' }}&nbsp; {{ $zakaznagruz->pointload->region ?? '' }}</b><br>
    <!--                             {{ $zakaznagruz->pointload->ulitca ?? '' }}, {{ $zakaznagruz->pointload->dom ?? '' }}-->
                                @php $futureDate = strtotime($zakaznagruz->dateload ?? '');
                                        echo date('d.m', $futureDate); @endphp,
                                    <!--{{ $zakaznagruz->dateload ?? '' }}--> {{ $zakaznagruz->timeloada ?? '' }}
                                </div>
                                <div class="col-6">
                                    <b style=" text-transform: uppercase;">{{ $zakaznagruz->pointload->country->short_code ?? '' }}&nbsp; {{ $zakaznagruz->cload->gorod ?? '' }}&nbsp; {{ $zakaznagruz->cload->region ?? '' }}</b><br>
    <!--                                {{ $zakaznagruz->bpoint->ulitca ?? '' }}, {{ $zakaznagruz->bpoint->dom ?? '' }}-->
                                    
                                        @php $futureDate = strtotime($zakaznagruz->cdate ?? '');
                                        echo date('d.m', $futureDate); @endphp,
                                        <!--{{ $zakaznagruz->cdate ?? '' }}-->
                                    {{ $zakaznagruz->ctime ?? '' }}

                                </div>
                            </div>
                                
                               <!-- {{ $zakaznagruz->pointload->ulitca ?? '' }}-->
                            </td>
                             <!--<td>
                                                           <span style="background:#007bff;color:#fff;padding:2px;" id="tuda{{ $zakaznagruz->id ?? '' }}">
                                        <script>
                                        var abbrev = '7 Rights Logistocs'.match(/\b([A-Z])/g).join('');
                                        document.getElementById("tuda{{ $zakaznagruz->id ?? '' }}").innerHTML = abbrev;
                                    </script>
                                    </span>
                               {{ $zakaznagruz->pointload->dom ?? '' }}
                            </td>-->
                            <td>
                               <b> @foreach($zakaznagruz->typekuzovs as $key => $item){{ $item->korot }}@endforeach, 
                                {{ $zakaznagruz->tonnag ?? '' }}</b>т,  <b>{{ $zakaznagruz->kubatura ?? '' }}</b>м³<br>
                                {{ $zakaznagruz->ltlftl->title ?? '' }}
                                <!--{{ $zakaznagruz->dateload ?? '' }}-->
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

        
            <button type="button" style="backgroud-color:transparent;" class="btn"><b >
        @php
            if (App\Models\Zakaznagruz::TYPETORGOV_RADIO[$zakaznagruz->typetorgov ?? ''] =="Запрос")
            echo " ";
            else 
            echo  number_format($zakaznagruz->tekprice ?? '', 2, ',', ' ')."</b> ".App\Models\Zakaznagruz::VALUTA_SELECT[$zakaznagruz->valuta ?? ''];
        @endphp
                
                
                <!--{{ $zakaznagruz->tekprice ?? '' }}</b> {{ App\Models\Zakaznagruz::VALUTA_SELECT[$zakaznagruz->valuta ?? ''] ?? '' }}--></button>
            
<a style="margin-left: 40px;"
        @php
            if (App\Models\Zakaznagruz::TYPETORGOV_RADIO[$zakaznagruz->typetorgov ?? ''] =="Фикс")
            echo "id='fi".($zakaznagruz->id ?? '')."'";
            if (App\Models\Zakaznagruz::TYPETORGOV_RADIO[$zakaznagruz->typetorgov ?? ''] =="Запрос")
            echo "id='zap".($zakaznagruz->id ?? '')."'";
            if ($zakaznagruz->typetorgov==2) 
            echo "id='btn-map".($zakaznagruz->id ?? '')."'";
            else 
            echo "id='btn-ma".($zakaznagruz->id ?? '')."'";
        @endphp
         href="#"><button class="btn btn-outline-secondary" style="width:120px;float:right;margin-right:20px;font-weight:300;" id="t{{ $zakaznagruz->id ?? '' }}">
                                         {{ App\Models\Zakaznagruz::TYPETORGOV_RADIO[$zakaznagruz->typetorgov ?? ''] ?? '' }}
                                    </button></a>
                                    
                                    
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
 </div><!-- /input-group -->
 </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<script>
$('#minusb{{ $zakaznagruz->id ?? '' }}').click(function(){
 $("#calcb{{ $zakaznagruz->id ?? '' }}").val(parseInt($("#calcb{{ $zakaznagruz->id ?? '' }}").val())-{{ $zakaznagruz->hagponig ?? '' }});
});
$('#plusb{{ $zakaznagruz->id ?? '' }}').click(function(){
 $("#calcb{{ $zakaznagruz->id ?? '' }}").val(parseInt($("#calcb{{ $zakaznagruz->id ?? '' }}").val())+{{ $zakaznagruz->hagponig ?? '' }});
}); 
</script>
<div class="row">
 <div class="col-lg-6 col-lg-offset-3">
Стартовая цена
 </div><!-- /.col-lg-6 -->
  <div class="col-lg-6 col-lg-offset-3">
{{ $zakaznagruz->tart_tena ?? '' }}
<input type="text" hidden>
 </div><!-- /.col-lg-6 -->
 <div class="col-lg-6 col-lg-offset-3">
Минимальный шаг
 </div><!-- /.col-lg-6 -->
  <div class="col-lg-6 col-lg-offset-3">
{{ $zakaznagruz->hagponig ?? '' }}
 </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
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
 $("#calcbma{{ $zakaznagruz->id ?? '' }}").val(parseInt($("#calcbma{{ $zakaznagruz->id ?? '' }}").val())-{{ $zakaznagruz->hagponig ?? '' }});
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
 </div><!-- /input-group -->
 </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

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
 </div><!-- /input-group -->
 </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

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
                var text_comment = 10;//$('#calc{{ $zakaznagruz->id ?? '' }}').val();
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
                var text_comment = 10;//$('#calc{{ $zakaznagruz->id ?? '' }}').val();
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
                var text_comment = 10;//$('#calc{{ $zakaznagruz->id ?? '' }}').val();
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
                var text_comment = 10;//$('#calc{{ $zakaznagruz->id ?? '' }}').val();
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
                                
                                
                                <!--{{ $zakaznagruz->timeloada ?? '' }}-->
                            </td>
    
                          
    
    
                            <!--<td>
                                {{ $zakaznagruz->sapid ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->gruz->gruz ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->tonnag ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->unit->titleru ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->kubatura ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->pointload->title ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->pointload->gorod ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->pointload->ulitca ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->pointload->dom ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->dateload ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->timeloada ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->timeloadado ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $zakaznagruz->a_24 ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $zakaznagruz->a_24 ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $zakaznagruz->dopinfoload ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->cload->title ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->cload->gorod ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->cload->ulitca ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->cload->dom ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->cdate ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->ctime ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->ctimedo ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $zakaznagruz->с_24 ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $zakaznagruz->с_24 ? 'checked' : '' }}>
                            </td>
                            <td>
                                @foreach($zakaznagruz->typekuzovs as $key => $item)
                                    <span class="badge badge-info">{{ $item->korot }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($zakaznagruz->typeloads as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($zakaznagruz->type_unloads as $key => $item)
                                    <span class="badge badge-info">{{ $item->kor }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $zakaznagruz->ltlftl->title ?? '' }}
                            </td>
                            <td>
                                @foreach($zakaznagruz->trebs as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($zakaznagruz->trandocs as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $zakaznagruz->adr->title ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->tempot ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->tempdo ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Zakaznagruz::TYPEOPLATA_RADIO[$zakaznagruz->typeoplata] ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->uoviaoplati ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Zakaznagruz::TYPETORGOV_RADIO[$zakaznagruz->typetorgov] ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->tekprice ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->tart_tena ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Zakaznagruz::VALUTA_SELECT[$zakaznagruz->valuta] ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->bankday ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->tart_nd ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->valnd->code ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->bank_daynd ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->nal ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->naldn ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $zakaznagruz->nalcard ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $zakaznagruz->nalcard ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $zakaznagruz->hagponig ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->max ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->dopinfoplata ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->kurator_1->fam ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->kurator_1->name ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->kurator_1->oth ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->kurator_1->emailto ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->kurator_1->mobileto ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->kontaktprim ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Zakaznagruz::KTOMOGET_RADIO[$zakaznagruz->ktomoget] ?? '' }}
                            </td>
                            <td>
                                @foreach($zakaznagruz->kromezakazs as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($zakaznagruz->perevozkromes as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ App\Models\Zakaznagruz::NAHALO_SELECT[$zakaznagruz->nahalo] ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->nahalodate ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->nahalotime ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Zakaznagruz::FINITA_SELECT[$zakaznagruz->finita] ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->finitadate ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Zakaznagruz::HOUR_SELECT[$zakaznagruz->hour] ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->finitatime ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Zakaznagruz::MIN_SELECT[$zakaznagruz->min] ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->look ?? '' }}
                            </td>
                            <td>
                                {{ $zakaznagruz->kolo ?? '' }}
                            </td>-->
                            <td style="display:none;">
                                @can('zakaznagruz_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.zakaznagruzs.show', $zakaznagruz->id ?? '') }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('zakaznagruz_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.zakaznagruzs.edit', $zakaznagruz->id ?? '') }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('zakaznagruz_delete')
                                    <form action="{{ route('admin.zakaznagruzs.destroy', $zakaznagruz->id ?? '') }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

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
      var user_name    = {{ $zakaznagruz->id ?? '' }};
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
      setTimeout(function(){location.reload();}, 1000);
    });
});
</script>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('zakaznagruz_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.zakaznagruzs.massDestroy') }}",
    className: 'btn-danger',
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

</script>
<script>
$(document).ready(function(){
	$('.fa-bookmark').click(function () {
		$(this).toggleClass('clickb');
                // собираем данные с формы
                var user_name    = {{ $zakaznagruz->id ?? '' }};
                var user_email   = {{ $zakaznagruz->bookmark ?? '' }};;
                var text_comment = 10;//$('#calc{{ $zakaznagruz->id ?? '' }}').val();
                // отправляем данные
               
               
                $.ajax({
                    url: 'https://admin.7rights.ru/public/fav.php', // куда отправляем
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
                
                
                
   
		});
	});
</script>
<style>
.fa-bookmark {
	color: #000;
}
.clickb {
	color: #ff0000;
}
</style>
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
tbody tr:hover {
    box-shadow: 0 0 5px 2px gray !important;
    background-color: white !important;
}
</style>
@endsection