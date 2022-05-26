@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.perevozklient.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.perevozklients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozklient.fields.id') }}
                        </th>
                        <td>
                            {{ $perevozklient->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozklient.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Perevozklient::STATUS_RADIO[$perevozklient->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozklient.fields.title') }}
                        </th>
                        <td>
                            {{ $perevozklient->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozklient.fields.inn') }}
                        </th>
                        <td>
                            {{ $perevozklient->inn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozklient.fields.telefon') }}
                        </th>
                        <td>
                            {{ $perevozklient->telefon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozklient.fields.contactperson') }}
                        </th>
                        <td>
                            {{ $perevozklient->contactperson }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.perevozklients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection