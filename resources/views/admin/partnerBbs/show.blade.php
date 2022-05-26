@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.partnerBb.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.partner-bbs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerBb.fields.id') }}
                        </th>
                        <td>
                            {{ $partnerBb->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerBb.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\PartnerBb::STATUS_SELECT[$partnerBb->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerBb.fields.partner') }}
                        </th>
                        <td>
                            {{ $partnerBb->partner->innogrn ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerBb.fields.typedogovor') }}
                        </th>
                        <td>
                            {{ App\Models\PartnerBb::TYPEDOGOVOR_SELECT[$partnerBb->typedogovor] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerBb.fields.dogovor_number') }}
                        </th>
                        <td>
                            {{ $partnerBb->dogovor_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerBb.fields.dogovor_start') }}
                        </th>
                        <td>
                            {{ $partnerBb->dogovor_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerBb.fields.dogovor_end') }}
                        </th>
                        <td>
                            {{ $partnerBb->dogovor_end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerBb.fields.valuta') }}
                        </th>
                        <td>
                            {{ $partnerBb->valuta->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerBb.fields.dogovor_copy') }}
                        </th>
                        <td>
                            @if($partnerBb->dogovor_copy)
                                <a href="{{ $partnerBb->dogovor_copy->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerBb.fields.description') }}
                        </th>
                        <td>
                            {{ $partnerBb->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerBb.fields.contactperson') }}
                        </th>
                        <td>
                            {{ $partnerBb->contactperson }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnerBb.fields.telefon') }}
                        </th>
                        <td>
                            {{ $partnerBb->telefon }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.partner-bbs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection