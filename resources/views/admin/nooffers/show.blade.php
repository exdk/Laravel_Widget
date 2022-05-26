@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.nooffer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.nooffers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.nooffer.fields.id') }}
                        </th>
                        <td>
                            {{ $nooffer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nooffer.fields.datefpogr') }}
                        </th>
                        <td>
                            {{ $nooffer->datefpogr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nooffer.fields.dateunload') }}
                        </th>
                        <td>
                            {{ $nooffer->dateunload }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.nooffers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection