@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.typeloadunload.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.typeloadunloads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.typeloadunload.fields.id') }}
                        </th>
                        <td>
                            {{ $typeloadunload->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.typeloadunload.fields.title') }}
                        </th>
                        <td>
                            {{ $typeloadunload->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.typeloadunload.fields.de') }}
                        </th>
                        <td>
                            {{ $typeloadunload->de }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.typeloadunloads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection