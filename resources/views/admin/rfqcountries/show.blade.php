@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rfqcountry.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rfqcountries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.id') }}
                        </th>
                        <td>
                            {{ $rfqcountry->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.created_at') }}
                        </th>
                        <td>
                            {{ $rfqcountry->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.rfq') }}
                        </th>
                        <td>
                            {{ $rfqcountry->rfq->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.apoint') }}
                        </th>
                        <td>
                            {{ $rfqcountry->apoint->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.bpoint') }}
                        </th>
                        <td>
                            {{ $rfqcountry->bpoint->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.lead_time') }}
                        </th>
                        <td>
                            {{ $rfqcountry->lead_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.otif') }}
                        </th>
                        <td>
                            {{ $rfqcountry->otif }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.good') }}
                        </th>
                        <td>
                            {{ $rfqcountry->good->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.pack') }}
                        </th>
                        <td>
                            {{ $rfqcountry->pack->type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.pack_weight') }}
                        </th>
                        <td>
                            {{ $rfqcountry->pack_weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.qty') }}
                        </th>
                        <td>
                            {{ $rfqcountry->qty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.qty_auto') }}
                        </th>
                        <td>
                            {{ $rfqcountry->qty_auto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.additional') }}
                        </th>
                        <td>
                            {{ $rfqcountry->additional }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.target') }}
                        </th>
                        <td>
                            {{ $rfqcountry->target }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.price') }}
                        </th>
                        <td>
                            {{ $rfqcountry->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.garant') }}
                        </th>
                        <td>
                            {{ $rfqcountry->garant }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfqcountry.fields.comment') }}
                        </th>
                        <td>
                            {{ $rfqcountry->comment }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rfqcountries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection