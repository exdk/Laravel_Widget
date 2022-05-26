@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.zakazhikPerevoz.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zakazhik-perevozs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazhikPerevoz.fields.id') }}
                        </th>
                        <td>
                            {{ $zakazhikPerevoz->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazhikPerevoz.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\ZakazhikPerevoz::STATUS_RADIO[$zakazhikPerevoz->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazhikPerevoz.fields.title') }}
                        </th>
                        <td>
                            {{ $zakazhikPerevoz->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazhikPerevoz.fields.inn') }}
                        </th>
                        <td>
                            {{ $zakazhikPerevoz->inn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazhikPerevoz.fields.telefon') }}
                        </th>
                        <td>
                            {{ $zakazhikPerevoz->telefon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zakazhikPerevoz.fields.contactperson') }}
                        </th>
                        <td>
                            {{ $zakazhikPerevoz->contactperson }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zakazhik-perevozs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection