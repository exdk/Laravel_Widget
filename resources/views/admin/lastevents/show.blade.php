@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lastevent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lastevents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.lastevent.fields.id') }}
                        </th>
                        <td>
                            {{ $lastevent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lastevent.fields.title') }}
                        </th>
                        <td>
                            {{ $lastevent->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lastevent.fields.di') }}
                        </th>
                        <td>
                            {{ $lastevent->di }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lastevent.fields.user') }}
                        </th>
                        <td>
                            {{ $lastevent->user }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lastevents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection