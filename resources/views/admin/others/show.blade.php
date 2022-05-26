@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.other.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.others.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.other.fields.id') }}
                        </th>
                        <td>
                            {{ $other->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.other.fields.title') }}
                        </th>
                        <td>
                            {{ $other->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.other.fields.di') }}
                        </th>
                        <td>
                            {{ $other->di }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.others.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection