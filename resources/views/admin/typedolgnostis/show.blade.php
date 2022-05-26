@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.typedolgnosti.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.typedolgnostis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.typedolgnosti.fields.id') }}
                        </th>
                        <td>
                            {{ $typedolgnosti->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.typedolgnosti.fields.title') }}
                        </th>
                        <td>
                            {{ $typedolgnosti->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.typedolgnosti.fields.di') }}
                        </th>
                        <td>
                            {{ $typedolgnosti->di }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.typedolgnosti.fields.role') }}
                        </th>
                        <td>
                            @foreach($typedolgnosti->roles as $key => $role)
                                <span class="label label-info">{{ $role->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.typedolgnostis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection