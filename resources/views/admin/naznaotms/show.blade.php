@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.naznaotm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.naznaotms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.naznaotm.fields.id') }}
                        </th>
                        <td>
                            {{ $naznaotm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.naznaotm.fields.datefpogr') }}
                        </th>
                        <td>
                            {{ $naznaotm->datefpogr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.naznaotm.fields.dateunload') }}
                        </th>
                        <td>
                            {{ $naznaotm->dateunload }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.naznaotms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection