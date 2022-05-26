@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.partnerblock.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.partnerblocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerblock.fields.partner') }}
                        </th>
                        <td>
                            {{ $partnerblock->partner->innogrn ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerblock.fields.contactperson') }}
                        </th>
                        <td>
                            {{ $partnerblock->contactperson }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerblock.fields.telefon') }}
                        </th>
                        <td>
                            {{ $partnerblock->telefon }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.partnerblocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection