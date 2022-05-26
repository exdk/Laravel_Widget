@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.zakazgrup.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zakazgrups.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazgrup.fields.id') }}
                        </th>
                        <td>
                            {{ $zakazgrup->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazgrup.fields.title') }}
                        </th>
                        <td>
                            {{ $zakazgrup->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazgrup.fields.zakazperevoz') }}
                        </th>
                        <td>
                            @foreach($zakazgrup->zakazperevozs as $key => $zakazperevoz)
                                <span class="label label-info">{{ $zakazperevoz->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zakazgrups.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection