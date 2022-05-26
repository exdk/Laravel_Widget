@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.valutum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.valuta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.valutum.fields.id') }}
                        </th>
                        <td>
                            {{ $valutum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.valutum.fields.code') }}
                        </th>
                        <td>
                            {{ $valutum->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.valutum.fields.code_2') }}
                        </th>
                        <td>
                            {{ $valutum->code_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.valutum.fields.title') }}
                        </th>
                        <td>
                            {{ $valutum->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.valutum.fields.unicode') }}
                        </th>
                        <td>
                            {{ $valutum->unicode }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.valuta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection