@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.monitorng.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.monitorngs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.monitorng.fields.id') }}
                        </th>
                        <td>
                            {{ $monitorng->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.monitorng.fields.driver') }}
                        </th>
                        <td>
                            {{ $monitorng->driver->fam ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.monitorng.fields.lang') }}
                        </th>
                        <td>
                            {{ $monitorng->lang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.monitorng.fields.lat') }}
                        </th>
                        <td>
                            {{ $monitorng->lat }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.monitorngs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection