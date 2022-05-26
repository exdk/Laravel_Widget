@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.docTtn.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.doc-ttns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.docTtn.fields.id') }}
                        </th>
                        <td>
                            {{ $docTtn->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.docTtn.fields.id_list_product') }}
                        </th>
                        <td>
                            {{ $docTtn->id_list_product->id_vnutr ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.docTtn.fields.otpravitel') }}
                        </th>
                        <td>
                            {{ $docTtn->otpravitel->hortname ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.docTtn.fields.poluchatel') }}
                        </th>
                        <td>
                            {{ $docTtn->poluchatel->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.doc-ttns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection