@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.unitma.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.unitmas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.unitma.fields.id') }}
                        </th>
                        <td>
                            {{ $unitma->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unitma.fields.titleru') }}
                        </th>
                        <td>
                            {{ $unitma->titleru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unitma.fields.rubol') }}
                        </th>
                        <td>
                            {{ $unitma->rubol }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unitma.fields.megd') }}
                        </th>
                        <td>
                            {{ $unitma->megd }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unitma.fields.megd_bol') }}
                        </th>
                        <td>
                            {{ $unitma->megd_bol }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unitma.fields.di') }}
                        </th>
                        <td>
                            {{ $unitma->di }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.unitmas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection