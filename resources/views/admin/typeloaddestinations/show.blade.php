@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.typeloaddestination.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.typeloaddestinations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.typeloaddestination.fields.id') }}
                        </th>
                        <td>
                            {{ $typeloaddestination->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.typeloaddestination.fields.title') }}
                        </th>
                        <td>
                            {{ $typeloaddestination->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.typeloaddestination.fields.kor') }}
                        </th>
                        <td>
                            {{ $typeloaddestination->kor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.typeloaddestination.fields.di') }}
                        </th>
                        <td>
                            {{ $typeloaddestination->di }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.typeloaddestinations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection