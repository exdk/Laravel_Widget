@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dopeq.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dopeqs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dopeq.fields.id') }}
                        </th>
                        <td>
                            {{ $dopeq->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dopeq.fields.title') }}
                        </th>
                        <td>
                            {{ $dopeq->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dopeq.fields.di') }}
                        </th>
                        <td>
                            {{ $dopeq->di }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dopeqs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection