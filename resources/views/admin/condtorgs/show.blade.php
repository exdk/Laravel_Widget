@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.condtorg.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.condtorgs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.condtorg.fields.id') }}
                        </th>
                        <td>
                            {{ $condtorg->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.condtorg.fields.title') }}
                        </th>
                        <td>
                            {{ $condtorg->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.condtorg.fields.di') }}
                        </th>
                        <td>
                            {{ $condtorg->di }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.condtorgs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection