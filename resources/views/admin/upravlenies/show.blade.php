@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.upravlenie.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.upravlenies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.upravlenie.fields.id') }}
                        </th>
                        <td>
                            {{ $upravlenie->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.upravlenie.fields.mainauto') }}
                        </th>
                        <td>
                            {{ $upravlenie->mainauto->govnomer ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.upravlenie.fields.prizep') }}
                        </th>
                        <td>
                            {{ $upravlenie->prizep->govnomer ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.upravlenie.fields.driver') }}
                        </th>
                        <td>
                            {{ $upravlenie->driver->fam ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.upravlenie.fields.driver_2') }}
                        </th>
                        <td>
                            {{ $upravlenie->driver_2->fam ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.upravlenie.fields.datestart') }}
                        </th>
                        <td>
                            {{ $upravlenie->datestart }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.upravlenie.fields.date_fin') }}
                        </th>
                        <td>
                            {{ $upravlenie->date_fin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.upravlenie.fields.timetart') }}
                        </th>
                        <td>
                            {{ $upravlenie->timetart }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.upravlenie.fields.time_fin') }}
                        </th>
                        <td>
                            {{ $upravlenie->time_fin }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.upravlenies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection