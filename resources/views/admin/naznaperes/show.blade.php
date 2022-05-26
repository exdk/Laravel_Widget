@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.naznapere.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.naznaperes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.naznapere.fields.id') }}
                        </th>
                        <td>
                            {{ $naznapere->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.naznapere.fields.datefpogr') }}
                        </th>
                        <td>
                            {{ $naznapere->datefpogr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.naznapere.fields.dateunload') }}
                        </th>
                        <td>
                            {{ $naznapere->dateunload }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.naznaperes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection