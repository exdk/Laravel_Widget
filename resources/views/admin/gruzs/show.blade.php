@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.gruz.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gruzs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.gruz.fields.id') }}
                        </th>
                        <td>
                            {{ $gruz->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gruz.fields.title') }}
                        </th>
                        <td>
                            {{ $gruz->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gruz.fields.kor') }}
                        </th>
                        <td>
                            {{ $gruz->kor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gruz.fields.gruz') }}
                        </th>
                        <td>
                            {{ $gruz->gruz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gruz.fields.di') }}
                        </th>
                        <td>
                            {{ $gruz->di }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gruzs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#gruz_zakaznagruzs" role="tab" data-toggle="tab">
                {{ trans('cruds.zakaznagruz.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="gruz_zakaznagruzs">
            @includeIf('admin.gruzs.relationships.gruzZakaznagruzs', ['zakaznagruzs' => $gruz->gruzZakaznagruzs])
        </div>
    </div>
</div>

@endsection