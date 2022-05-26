@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-9">
<div class="card"><a name="gruz"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Груз</h4>
            </div>
        </div>
    </div>
<div class="card-body">          
    <div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.id') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->id }}
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.gruz') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->gruz->gruz ?? '' }}
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.tonnag') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->tonnag }} {{ $zakaznagruz->unit->titleru ?? '' }}
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.kubatura') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->kubatura }}
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.grutype') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->grutype->title ?? '' }}
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.qpack') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->qpack }}
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.lendth') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->lendth }}
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.width') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->width }}
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.height') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->height }}
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.diameter') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->diameter }}
        </div>
    </div>
</div>
</div>
<div class="card"><a name="mar"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Маршрут</h4>
            </div>
        </div>
    </div>
<div class="card-body">
<div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.pointload') }}* :</label>
        </div>
        <div class="col-8">
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
            {{ $zakaznagruz->pointload->title ?? '' }}
        </div>
</div>
<div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.krugorei') }}* :</label>
        </div>
        <div class="col-8">
            <input type="checkbox" disabled="disabled" {{ $zakaznagruz->krugorei ? 'checked' : '' }}>
        </div>
</div>
<div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.dateload') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->dateload }}
        </div>
</div>
<div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.timeloada') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->timeloada }}
        </div>
</div>
<div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.timeloadado') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->timeloadado }}
        </div>
</div>
<div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.a_24') }}* :</label>
        </div>
        <div class="col-8">
            <input type="checkbox" disabled="disabled" {{ $zakaznagruz->a_24 ? 'checked' : '' }}>
        </div>
</div>
<div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.dopinfoload') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->dopinfoload }}
        </div>
</div>
<div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.cload') }}* :</label>
        </div>
        <div class="col-8">
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
            {{ $zakaznagruz->cload->title ?? '' }}
        </div>
</div>
<div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.cdate') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->cdate }}
        </div>
</div>
<div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.ctime') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->ctime }}
        </div>
</div>
<div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.ctimedo') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->ctimedo }}
        </div>
</div>
<div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.с_24') }}* :</label>
        </div>
        <div class="col-8">
            <input type="checkbox" disabled="disabled" {{ $zakaznagruz->с_24 ? 'checked' : '' }}>
        </div>
</div>
<div class="row">
        <div class="col-4">
            <label for="email">{{ trans('cruds.zakaznagruz.fields.cdopinfo') }}* :</label>
        </div>
        <div class="col-8">
            {{ $zakaznagruz->cdopinfo }}
        </div>
</div>
</div>
</div>
<div class="card"><a name="auto"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Транспортое средство</h4>
            </div>
        </div>
    </div>
<div class="card-body"> 
<div class="row">
    <div class="col-4">
        <label for="email"> {{ trans('cruds.zakaznagruz.fields.typekuzov') }}* :</label>
    </div>
    <div class="col-8">
        @foreach($zakaznagruz->typekuzovs as $key => $typekuzov)
            <span class="label label-info">{{ $typekuzov->korot }}</span>
        @endforeach
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.typeload') }}* :</label>
    </div>
    <div class="col-8">
                            @foreach($zakaznagruz->typeloads as $key => $typeload)
                                <span class="label label-info">{{ $typeload->title }}</span>
                            @endforeach
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.type_unload') }}* :</label>
    </div>
    <div class="col-8">
                            @foreach($zakaznagruz->type_unloads as $key => $type_unload)
                                <span class="label label-info">{{ $type_unload->kor }}</span>
                            @endforeach
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.ltlftl') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->ltlftl->title ?? '' }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.treb') }}* :</label>
    </div>
    <div class="col-8">
                            @foreach($zakaznagruz->trebs as $key => $treb)
                                <span class="label label-info">{{ $treb->title }}</span>
                            @endforeach
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.trandoc') }}* :</label>
    </div>
    <div class="col-8">
                            @foreach($zakaznagruz->trandocs as $key => $trandoc)
                                <span class="label label-info">{{ $trandoc->title }}</span>
                            @endforeach
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.qauto') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->qauto }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.adr') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->adr->title ?? '' }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.qbelt') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->qbelt }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.tempot') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->tempot }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.tempdo') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->tempdo }}
    </div>
</div>
</div></div>           

<div class="card"><a name="oplata"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Оплата</h4>
            </div>
        </div>
    </div>
<div class="card-body">                
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.uoviaoplati') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->uoviaoplati }}
    </div>
</div>

</div></div>
<div class="card"><a name="offer"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Условия</h4>
            </div>
        </div>
    </div>
<div class="card-body">
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.typetorgov') }}* :</label>
    </div>
    <div class="col-8">
        {{ App\Models\Zakaznagruz::TYPETORGOV_RADIO[$zakaznagruz->typetorgov] ?? '' }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.tekprice') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->tekprice }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.tart_tena') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->tart_tena }}
    </div>
</div>              
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.valuta') }}* :</label>
    </div>
    <div class="col-8">
        {{ App\Models\Zakaznagruz::VALUTA_SELECT[$zakaznagruz->valuta] ?? '' }}
    </div>
</div>                                
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.bankday') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->bankday }}
    </div>
</div>       
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.tart_nd') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->tart_nd }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.valnd') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->valnd->code ?? '' }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.bank_daynd') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->bank_daynd }}
    </div>
</div>                            
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.nal') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->nal }}
    </div>
</div>                 
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.naldn') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->naldn }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.nalcard') }}* :</label>
    </div>
    <div class="col-8">
        <input type="checkbox" disabled="disabled" {{ $zakaznagruz->nalcard ? 'checked' : '' }}>
    </div>
</div>             
                       
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.hagponig') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->hagponig }}
    </div>
</div>    
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.max') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->max }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.dopinfoplata') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->dopinfoplata }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.ktomoget') }}* :</label>
    </div>
    <div class="col-8">
        {{ App\Models\Zakaznagruz::KTOMOGET_RADIO[$zakaznagruz->ktomoget] ?? '' }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.kromezakaz') }}* :</label>
    </div>
    <div class="col-8">
                            @foreach($zakaznagruz->kromezakazs as $key => $kromezakaz)
                                <span class="label label-info">{{ $kromezakaz->title }}</span>
                            @endforeach
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.perevozkrome') }}* :</label>
    </div>
    <div class="col-8">
                            @foreach($zakaznagruz->perevozkromes as $key => $perevozkrome)
                                <span class="label label-info">{{ $perevozkrome->title }}</span>
                            @endforeach
    </div>
</div>
</div></div>


<div class="card"><a name="date"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Сроки проведения торгов</h4>
            </div>
        </div>
    </div>
<div class="card-body">

<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.nahalo') }}* :</label>
    </div>
    <div class="col-8">
         {{ App\Models\Zakaznagruz::NAHALO_SELECT[$zakaznagruz->nahalo] ?? '' }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.nahalodate') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->nahalodate }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.nahalotime') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->nahalotime }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.finita') }}* :</label>
    </div>
    <div class="col-8">
        {{ App\Models\Zakaznagruz::FINITA_SELECT[$zakaznagruz->finita] ?? '' }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.finitadate') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->finitadate }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.hour') }}* :</label>
    </div>
    <div class="col-8">
        {{ App\Models\Zakaznagruz::HOUR_SELECT[$zakaznagruz->hour] ?? '' }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.finitatime') }}* :</label>
    </div>
    <div class="col-8">
        {{ $zakaznagruz->finitatime }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.zakaznagruz.fields.min') }}* :</label>
    </div>
    <div class="col-8">
        {{ App\Models\Zakaznagruz::MIN_SELECT[$zakaznagruz->min] ?? '' }}
    </div>
</div>

</div></div>





<div class="card"><a name="hi"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>История предложений</h4>
            </div>
        </div>
    </div>
<div class="card-body">

<div class="row">
    <div class="col-12">
<table class="table table-striped table-hover ">
<thead>
<tr>
<th>Компания</th>
<th>Стоимость</th>
<th>Дата</th>
</tr>
</thead>
<tbody>
        @php 
        $uid = Auth::user()->id;
        $idd = $zakaznagruz->id;
        $users = DB::table('bids')->where('id_zak', $idd)->get();
        foreach ($users as $user) {
            echo "<tr><td>";
            $iddd = $user->id_user;
            echo DB::table('users')->where('id', $iddd)->value('surname');
            echo "&nbsp";
            echo DB::table('users')->where('id', $iddd)->value('name');
            echo "<br>";
            echo DB::table('users')->where('id', $iddd)->value('mobile');
            echo "<br>";
            echo "<a href='https://admin.7rights.ru/public/admin/messenger/create'>";
            echo DB::table('users')->where('id', $iddd)->value('emailto'); echo "</a>";
            echo "</td>";
            echo "<td>".$user->bid; echo "</td>";
            echo "<td>".$user->at_date; echo "</td></tr>";
        }
        @endphp
</tbody>
</table>

    </div>
</div>

</div></div>

    </div>
    <div class="col-3 ">
    
    <div class="position-fixed">
    <div class="card ">
       <div class="card-body ">
<div class="btn-group-vertical " style="width:100%;">
<a href="#gruz" style="width:100%;"><button class="btn btn-outline-primary">Груз</button></a>
<a href="#mar" style="width:100%;"><button class="btn btn-outline-primary">Маршрут</button></a>
<a href="#auto" style="width:100%;"><button class="btn btn-outline-primary">Транспорт</button></a>
<a href="#oplata" style="width:100%;"><button class="btn btn-outline-primary">Оплата</button></a>
<a href="#offer" style="width:100%;"><button class="btn btn-outline-primary">Условия</button></a>
<a href="#date" style="width:100%;"><button class="btn btn-outline-primary">Сроки</button></a>
<a href="#hi" style="width:100%;"><button class="btn btn-outline-primary">Предложения</button></a>
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


<div class="card" style="display:none;" >
    <div class="card-header">
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.id') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.bookmark') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $zakaznagruz->bookmark ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                       
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.sapid') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->sapid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.gruz') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->gruz->gruz ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.tonnag') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->tonnag }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.unit') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->unit->titleru ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.kubatura') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->kubatura }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.grutype') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->grutype->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.qpack') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->qpack }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.lendth') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->lendth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.width') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->width }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.height') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->height }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.diameter') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->diameter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.krugorei') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $zakaznagruz->krugorei ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.pointload') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->pointload->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.dateload') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->dateload }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.timeloada') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->timeloada }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.timeloadado') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->timeloadado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.a_24') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $zakaznagruz->a_24 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.dopinfoload') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->dopinfoload }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.cload') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->cload->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.cdate') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->cdate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.ctime') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->ctime }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.ctimedo') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->ctimedo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.с_24') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $zakaznagruz->с_24 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.cdopinfo') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->cdopinfo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.typekuzov') }}
                        </th>
                        <td>
                            @foreach($zakaznagruz->typekuzovs as $key => $typekuzov)
                                <span class="label label-info">{{ $typekuzov->korot }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.typeload') }}
                        </th>
                        <td>
                            @foreach($zakaznagruz->typeloads as $key => $typeload)
                                <span class="label label-info">{{ $typeload->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.type_unload') }}
                        </th>
                        <td>
                            @foreach($zakaznagruz->type_unloads as $key => $type_unload)
                                <span class="label label-info">{{ $type_unload->kor }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.ltlftl') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->ltlftl->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.treb') }}
                        </th>
                        <td>
                            @foreach($zakaznagruz->trebs as $key => $treb)
                                <span class="label label-info">{{ $treb->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.trandoc') }}
                        </th>
                        <td>
                            @foreach($zakaznagruz->trandocs as $key => $trandoc)
                                <span class="label label-info">{{ $trandoc->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.qauto') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->qauto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.adr') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->adr->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.qbelt') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->qbelt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.tempot') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->tempot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.tempdo') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->tempdo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.typeoplata') }}
                        </th>
                        <td>
                            {{ App\Models\Zakaznagruz::TYPEOPLATA_RADIO[$zakaznagruz->typeoplata] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.uoviaoplati') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->uoviaoplati }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.typetorgov') }}
                        </th>
                        <td>
                            {{ App\Models\Zakaznagruz::TYPETORGOV_RADIO[$zakaznagruz->typetorgov] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.tekprice') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->tekprice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.tart_tena') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->tart_tena }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.valuta') }}
                        </th>
                        <td>
                            {{ App\Models\Zakaznagruz::VALUTA_SELECT[$zakaznagruz->valuta] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.bankday') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->bankday }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.tart_nd') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->tart_nd }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.valnd') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->valnd->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.bank_daynd') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->bank_daynd }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.nal') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->nal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.naldn') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->naldn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.nalcard') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $zakaznagruz->nalcard ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.hagponig') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->hagponig }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.max') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->max }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.dopinfoplata') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->dopinfoplata }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.kurator_1') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->kurator_1->surname ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.kontaktprim') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->kontaktprim }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.ktomoget') }}
                        </th>
                        <td>
                            {{ App\Models\Zakaznagruz::KTOMOGET_RADIO[$zakaznagruz->ktomoget] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.kromezakaz') }}
                        </th>
                        <td>
                            @foreach($zakaznagruz->kromezakazs as $key => $kromezakaz)
                                <span class="label label-info">{{ $kromezakaz->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.perevozkrome') }}
                        </th>
                        <td>
                            @foreach($zakaznagruz->perevozkromes as $key => $perevozkrome)
                                <span class="label label-info">{{ $perevozkrome->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.nahalo') }}
                        </th>
                        <td>
                            {{ App\Models\Zakaznagruz::NAHALO_SELECT[$zakaznagruz->nahalo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.nahalodate') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->nahalodate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.nahalotime') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->nahalotime }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.finita') }}
                        </th>
                        <td>
                            {{ App\Models\Zakaznagruz::FINITA_SELECT[$zakaznagruz->finita] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.finitadate') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->finitadate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.hour') }}
                        </th>
                        <td>
                            {{ App\Models\Zakaznagruz::HOUR_SELECT[$zakaznagruz->hour] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.finitatime') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->finitatime }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.min') }}
                        </th>
                        <td>
                            {{ App\Models\Zakaznagruz::MIN_SELECT[$zakaznagruz->min] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.look') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->look }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.kolo') }}
                        </th>
                        <td>
                            {{ $zakaznagruz->kolo }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zakaznagruzs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
<style>
    .label-info {
    background-color: #fff !important;
    color: #000 !important;
}
</style>


@endsection