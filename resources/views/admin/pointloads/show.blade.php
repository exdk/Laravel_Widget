@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>{{ $pointload->id }} - {{ $pointload->title }}</h4>
            </div>
            <div class="col-6" style="float:right;">
                @can('pointload_edit')
                <a style="float:right;" class="" href="{{ route('admin.pointloads.edit', $pointload->id) }}">
                    <i class="fa fa-pen" aria-hidden="true"></i>
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card-body">
<div class="row">
    <div class="col-6">
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.pointload.fields.country') }}* :</label>
    </div>
    <div class="col-8">
        {{ $pointload->country->name ?? '' }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email"> {{ trans('cruds.pointload.fields.region') }}* :</label>
    </div>
    <div class="col-8">
        {{ $pointload->region }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email">{{ trans('cruds.pointload.fields.gorod') }}* :</label>
    </div>
    <div class="col-8">
        {{ $pointload->gorod }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email"> {{ trans('cruds.pointload.fields.zip') }}* :</label>
    </div>
    <div class="col-8">
        {{ $pointload->zip }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email"> {{ trans('cruds.pointload.fields.ulitca') }}* :</label>
    </div>
    <div class="col-8">
        {{ $pointload->ulitca }}, {{ $pointload->dom }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email"> {{ trans('cruds.pointload.fields.komment') }}* :</label>
    </div>
    <div class="col-8">
        {{ $pointload->komment }}
    </div>
</div>
<div class="row" style="display:none;">
    <div class="col-4">
        <label for="email"> {{ trans('cruds.pointload.fields.type') }}* :</label>
    </div>
    <div class="col-8">
        {{ App\Models\Pointload::TYPE_SELECT[$pointload->type] ?? '' }}
    </div>
</div>
<!--
<div class="row">
    <div class="col-4">
        <label for="email"> {{ trans('cruds.pointload.fields.komuperevozklient') }}* :</label>
    </div>
    <div class="col-8">
        {{ $pointload->komuperevozklient->title ?? '' }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email"> {{ trans('cruds.pointload.fields.komuzakazklient') }}* :</label>
    </div>
    <div class="col-8">
        {{ $pointload->komuzakazklient->title ?? '' }}
    </div>
</div>
-->
<div class="row">
    <div class="col-4">
        <label for="email"> {{ trans('cruds.pointload.fields.innfio') }}* :</label>
    </div>
    <div class="col-8">
        {{ $pointload->innfio }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email"> {{ trans('cruds.pointload.fields.fioload') }}* :</label>
    </div>
    <div class="col-8">
        {{ $pointload->fioload }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email"> {{ trans('cruds.pointload.fields.mobileload') }}* :</label>
    </div>
    <div class="col-8">
        {{ $pointload->mobileload }}
    </div>
</div>
<div class="row">
    <div class="col-2">
        <label for="email"> ПН* :</label>
    </div>
    <div class="col-10">
        {{ $pointload->pnot }} - {{ $pointload->pndo }}, {{ $pointload->pnbrot }} -  {{ $pointload->pnbrdo }}
    </div>
</div>
<div class="row">
    <div class="col-2">
        <label for="email"> ВТ* :</label>
    </div>
    <div class="col-10">
        {{ $pointload->thot }} - {{ $pointload->thdo }}, {{ $pointload->thbrot }} -  {{ $pointload->thbrdo }}
    </div>
</div>
<div class="row">
    <div class="col-2">
        <label for="email"> СР* :</label>
    </div>
    <div class="col-10">
        {{ $pointload->wedot }} - {{ $pointload->weddo }}, {{ $pointload->wedbrot }} -  {{ $pointload->wedbrto }}
    </div>
</div>
<div class="row">
    <div class="col-2">
        <label for="email"> ЧТ* :</label>
    </div>
    <div class="col-10">
        {{ $pointload->thuot }} - {{ $pointload->thudo }}, {{ $pointload->thubrot }} -  {{ $pointload->thubrdo }}
    </div>
</div>
<div class="row">
    <div class="col-2">
        <label for="email"> ПТ* :</label>
    </div>
    <div class="col-10">
        {{ $pointload->friot }} - {{ $pointload->frido }}, {{ $pointload->fribrot }} -  {{ $pointload->fribrdo }}
    </div>
</div>
<div class="row">
    <div class="col-2">
        <label for="email"> СБ* :</label>
    </div>
    <div class="col-10">
        {{ $pointload->satot }} - {{ $pointload->satdo }}, {{ $pointload->satbrot }} -  {{ $pointload->satbrdo }}
    </div>
</div>
<div class="row">
    <div class="col-2">
        <label for="email"> ВС* :</label>
    </div>
    <div class="col-10">
        {{ $pointload->sunot }} - {{ $pointload->sundo }}, {{ $pointload->sunbrot }} -  {{ $pointload->sunbrdo }}
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="email"> {{ trans('cruds.pointload.fields.holidayli') }}* :</label>
    </div>
    <div class="col-8">
         @foreach($pointload->holidaylis as $key => $holidayli)
                                <span class="label label-info">{{ $holidayli->date }}</span>
                            @endforeach
    </div>
</div>
</div>
   <div class="col-6">

 {{ trans('cruds.pointload.fields.hemaproezda') }}
 <br>
                      
                     
                            @foreach($pointload->hemaproezda as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
</div>
</div>

<!--

        <div class="form-group">

            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.id') }}
                        </th>
                        <td>
                            {{ $pointload->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.sapid') }}
                        </th>
                        <td>
                            {{ $pointload->sapid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.title') }}
                        </th>
                        <td>
                            {{ $pointload->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.gorod') }}
                        </th>
                        <td>
                            {{ $pointload->gorod }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.country') }}
                        </th>
                        <td>
                            {{ $pointload->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.zip') }}
                        </th>
                        <td>
                            {{ $pointload->zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.region') }}
                        </th>
                        <td>
                            {{ $pointload->region }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.ulitca') }}
                        </th>
                        <td>
                            {{ $pointload->ulitca }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.dom') }}
                        </th>
                        <td>
                            {{ $pointload->dom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.komment') }}
                        </th>
                        <td>
                            {{ $pointload->komment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Pointload::TYPE_SELECT[$pointload->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.komuperevozklient') }}
                        </th>
                        <td>
                            {{ $pointload->komuperevozklient->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.komuzakazklient') }}
                        </th>
                        <td>
                            {{ $pointload->komuzakazklient->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.innfio') }}
                        </th>
                        <td>
                            {{ $pointload->innfio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.fioload') }}
                        </th>
                        <td>
                            {{ $pointload->fioload }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.mobileload') }}
                        </th>
                        <td>
                            {{ $pointload->mobileload }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.hemaproezda') }}
                        </th>
                        <td>
                            @foreach($pointload->hemaproezda as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.pnot') }}
                        </th>
                        <td>
                            {{ $pointload->pnot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.pndo') }}
                        </th>
                        <td>
                            {{ $pointload->pndo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.pnbrot') }}
                        </th>
                        <td>
                            {{ $pointload->pnbrot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.pnbrdo') }}
                        </th>
                        <td>
                            {{ $pointload->pnbrdo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.thot') }}
                        </th>
                        <td>
                            {{ $pointload->thot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.thdo') }}
                        </th>
                        <td>
                            {{ $pointload->thdo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.thbrot') }}
                        </th>
                        <td>
                            {{ $pointload->thbrot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.thbrdo') }}
                        </th>
                        <td>
                            {{ $pointload->thbrdo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.wedot') }}
                        </th>
                        <td>
                            {{ $pointload->wedot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.weddo') }}
                        </th>
                        <td>
                            {{ $pointload->weddo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.wedbrot') }}
                        </th>
                        <td>
                            {{ $pointload->wedbrot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.wedbrto') }}
                        </th>
                        <td>
                            {{ $pointload->wedbrto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.thuot') }}
                        </th>
                        <td>
                            {{ $pointload->thuot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.thudo') }}
                        </th>
                        <td>
                            {{ $pointload->thudo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.thubrot') }}
                        </th>
                        <td>
                            {{ $pointload->thubrot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.thubrdo') }}
                        </th>
                        <td>
                            {{ $pointload->thubrdo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.friot') }}
                        </th>
                        <td>
                            {{ $pointload->friot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.frido') }}
                        </th>
                        <td>
                            {{ $pointload->frido }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.fribrot') }}
                        </th>
                        <td>
                            {{ $pointload->fribrot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.fribrdo') }}
                        </th>
                        <td>
                            {{ $pointload->fribrdo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.satot') }}
                        </th>
                        <td>
                            {{ $pointload->satot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.satdo') }}
                        </th>
                        <td>
                            {{ $pointload->satdo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.satbrot') }}
                        </th>
                        <td>
                            {{ $pointload->satbrot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.satbrdo') }}
                        </th>
                        <td>
                            {{ $pointload->satbrdo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.sunot') }}
                        </th>
                        <td>
                            {{ $pointload->sunot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.sundo') }}
                        </th>
                        <td>
                            {{ $pointload->sundo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.sunbrot') }}
                        </th>
                        <td>
                            {{ $pointload->sunbrot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.sunbrdo') }}
                        </th>
                        <td>
                            {{ $pointload->sunbrdo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.holiday') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $pointload->holiday ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pointload.fields.holidayli') }}
                        </th>
                        <td>
                            @foreach($pointload->holidaylis as $key => $holidayli)
                                <span class="label label-info">{{ $holidayli->date }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pointloads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>-->
    </div>
</div>
<!--
<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#pointload_zakaznagruzs" role="tab" data-toggle="tab">
                {{ trans('cruds.zakaznagruz.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#cload_zakaznagruzs" role="tab" data-toggle="tab">
                {{ trans('cruds.zakaznagruz.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="pointload_zakaznagruzs">
            @includeIf('admin.pointloads.relationships.pointloadZakaznagruzs', ['zakaznagruzs' => $pointload->pointloadZakaznagruzs])
        </div>
        <div class="tab-pane" role="tabpanel" id="cload_zakaznagruzs">
            @includeIf('admin.pointloads.relationships.cloadZakaznagruzs', ['zakaznagruzs' => $pointload->cloadZakaznagruzs])
        </div>
    </div>
</div>
-->
@endsection