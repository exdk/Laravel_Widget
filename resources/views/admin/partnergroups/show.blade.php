@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.partnergroup.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.partnergroups.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.partnergroup.fields.id') }}
                        </th>
                        <td>
                            {{ $partnergroup->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnergroup.fields.title') }}
                        </th>
                        <td>
                            {{ $partnergroup->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partnergroup.fields.partner') }}
                        </th>
                        <td>
                            @foreach($partnergroup->partners as $key => $partner)
                                <span class="label label-info">{{ $partner->dogovor_number }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.partnergroups.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection