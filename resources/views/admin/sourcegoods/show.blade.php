@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sourcegood.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sourcegoods.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sourcegood.fields.id') }}
                        </th>
                        <td>
                            {{ $sourcegood->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sourcegood.fields.title') }}
                        </th>
                        <td>
                            {{ $sourcegood->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sourcegood.fields.de') }}
                        </th>
                        <td>
                            {{ $sourcegood->de }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sourcegoods.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection