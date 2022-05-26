@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.zakaznagruz.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zakaznagruzs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
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
                        <th>
                            {{ trans('cruds.zakaznagruz.fields.draft') }}
                        </th>
                        <td>
                            {{ App\Models\Zakaznagruz::DRAFT_RADIO[$zakaznagruz->draft] ?? '' }}
                        </td>
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



@endsection