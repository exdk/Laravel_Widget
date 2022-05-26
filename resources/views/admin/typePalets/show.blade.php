@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.typePalet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.type-palets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.typePalet.fields.id') }}
                        </th>
                        <td>
                            {{ $typePalet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.typePalet.fields.title') }}
                        </th>
                        <td>
                            {{ $typePalet->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.typePalet.fields.weight') }}
                        </th>
                        <td>
                            {{ $typePalet->weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.typePalet.fields.long') }}
                        </th>
                        <td>
                            {{ $typePalet->long }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.type-palets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection