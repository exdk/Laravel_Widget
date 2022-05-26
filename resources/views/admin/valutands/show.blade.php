@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.valutand.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.valutands.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.valutand.fields.id') }}
                        </th>
                        <td>
                            {{ $valutand->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.valutand.fields.code') }}
                        </th>
                        <td>
                            {{ $valutand->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.valutand.fields.code_2') }}
                        </th>
                        <td>
                            {{ $valutand->code_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.valutand.fields.title') }}
                        </th>
                        <td>
                            {{ $valutand->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.valutand.fields.unicode') }}
                        </th>
                        <td>
                            {{ $valutand->unicode }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.valutands.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection