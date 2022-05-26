@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.marka.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.markas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.marka.fields.id') }}
                        </th>
                        <td>
                            {{ $marka->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.marka.fields.title') }}
                        </th>
                        <td>
                            {{ $marka->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.marka.fields.country') }}
                        </th>
                        <td>
                            {{ $marka->country->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.markas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection