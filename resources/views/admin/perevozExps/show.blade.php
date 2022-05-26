@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.perevozExp.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.perevoz-exps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozExp.fields.id') }}
                        </th>
                        <td>
                            {{ $perevozExp->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozExp.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\PerevozExp::STATUS_RADIO[$perevozExp->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozExp.fields.title') }}
                        </th>
                        <td>
                            {{ $perevozExp->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozExp.fields.inn') }}
                        </th>
                        <td>
                            {{ $perevozExp->inn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozExp.fields.telefon') }}
                        </th>
                        <td>
                            {{ $perevozExp->telefon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozExp.fields.contactperson') }}
                        </th>
                        <td>
                            {{ $perevozExp->contactperson }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.perevoz-exps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection