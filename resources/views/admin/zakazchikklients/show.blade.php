@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.zakazchikklient.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zakazchikklients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.id') }}
                        </th>
                        <td>
                            {{ $zakazchikklient->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Zakazchikklient::STATUS_RADIO[$zakazchikklient->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.title') }}
                        </th>
                        <td>
                            {{ $zakazchikklient->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.inn') }}
                        </th>
                        <td>
                            {{ $zakazchikklient->inn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.telefon') }}
                        </th>
                        <td>
                            {{ $zakazchikklient->telefon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.contactperson') }}
                        </th>
                        <td>
                            {{ $zakazchikklient->contactperson }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zakazchikklients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection