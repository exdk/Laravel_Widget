@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.listproduct.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.listproducts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.listproduct.fields.id') }}
                        </th>
                        <td>
                            {{ $listproduct->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listproduct.fields.id_vnutr') }}
                        </th>
                        <td>
                            {{ $listproduct->id_vnutr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listproduct.fields.title') }}
                        </th>
                        <td>
                            {{ $listproduct->title->product_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listproduct.fields.quantity') }}
                        </th>
                        <td>
                            {{ $listproduct->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listproduct.fields.type_pack') }}
                        </th>
                        <td>
                            {{ $listproduct->type_pack }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listproduct.fields.unitcount') }}
                        </th>
                        <td>
                            {{ $listproduct->unitcount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listproduct.fields.type_pack_tr') }}
                        </th>
                        <td>
                            {{ $listproduct->type_pack_tr->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listproduct.fields.tr_quan') }}
                        </th>
                        <td>
                            {{ $listproduct->tr_quan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listproduct.fields.type_pal') }}
                        </th>
                        <td>
                            {{ $listproduct->type_pal->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listproduct.fields.qua_pal') }}
                        </th>
                        <td>
                            {{ $listproduct->qua_pal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listproduct.fields.total_quant') }}
                        </th>
                        <td>
                            {{ $listproduct->total_quant }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listproduct.fields.total_weight') }}
                        </th>
                        <td>
                            {{ $listproduct->total_weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listproduct.fields.total_sum') }}
                        </th>
                        <td>
                            {{ $listproduct->total_sum }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.listproducts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection