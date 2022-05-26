@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contactperson.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contactpeople.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contactperson.fields.id') }}
                        </th>
                        <td>
                            {{ $contactperson->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactperson.fields.fio') }}
                        </th>
                        <td>
                            {{ $contactperson->fio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactperson.fields.email') }}
                        </th>
                        <td>
                            {{ $contactperson->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactperson.fields.mobile') }}
                        </th>
                        <td>
                            {{ $contactperson->mobile }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contactpeople.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection