@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.custom.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.custom.fields.id') }}
                        </th>
                        <td>
                            {{ $custom->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.custom.fields.title') }}
                        </th>
                        <td>
                            {{ $custom->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.custom.fields.number') }}
                        </th>
                        <td>
                            {{ $custom->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.custom.fields.address') }}
                        </th>
                        <td>
                            {{ $custom->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.custom.fields.type') }}
                        </th>
                        <td>
                            @foreach($custom->types as $key => $type)
                                <span class="label label-info">{{ $type->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection