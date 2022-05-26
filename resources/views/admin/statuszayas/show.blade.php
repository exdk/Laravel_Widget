@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.statuszaya.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.statuszayas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.statuszaya.fields.id') }}
                        </th>
                        <td>
                            {{ $statuszaya->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.statuszaya.fields.title') }}
                        </th>
                        <td>
                            {{ $statuszaya->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.statuszaya.fields.kor') }}
                        </th>
                        <td>
                            {{ $statuszaya->kor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.statuszaya.fields.di') }}
                        </th>
                        <td>
                            {{ $statuszaya->di }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.statuszayas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection