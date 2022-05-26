@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.typekuzova.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.typekuzovas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.typekuzova.fields.id') }}
                        </th>
                        <td>
                            {{ $typekuzova->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.typekuzova.fields.typekuzova') }}
                        </th>
                        <td>
                            {{ $typekuzova->typekuzova }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.typekuzova.fields.korot') }}
                        </th>
                        <td>
                            {{ $typekuzova->korot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.typekuzova.fields.world') }}
                        </th>
                        <td>
                            {{ $typekuzova->world }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.typekuzovas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection