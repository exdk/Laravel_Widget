@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.filialmain.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.filialmains.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.filialmain.fields.id') }}
                        </th>
                        <td>
                            {{ $filialmain->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filialmain.fields.inn') }}
                        </th>
                        <td>
                            {{ $filialmain->inn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filialmain.fields.title') }}
                        </th>
                        <td>
                            {{ $filialmain->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.filialmain.fields.main') }}
                        </th>
                        <td>
                            {{ $filialmain->main }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.filialmains.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection