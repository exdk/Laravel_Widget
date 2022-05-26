@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rfi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rfis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.id') }}
                        </th>
                        <td>
                            {{ $rfi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Rfi::STATUS_SELECT[$rfi->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.typetran') }}
                        </th>
                        <td>
                            @foreach($rfi->typetrans as $key => $typetran)
                                <span class="label label-info">{{ $typetran->type }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.title') }}
                        </th>
                        <td>
                            {{ $rfi->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.finish') }}
                        </th>
                        <td>
                            {{ $rfi->finish }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.created_at') }}
                        </th>
                        <td>
                            {{ $rfi->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.letter') }}
                        </th>
                        <td>
                            {{ $rfi->letter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.limited') }}
                        </th>
                        <td>
                            {{ $rfi->limited }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.applications') }}
                        </th>
                        <td>
                            @foreach($rfi->applications as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.contact') }}
                        </th>
                        <td>
                            {{ $rfi->contact->fio ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.contact_2') }}
                        </th>
                        <td>
                            {{ $rfi->contact_2->fio ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.id_1') }}
                        </th>
                        <td>
                            {{ $rfi->id_1->titleanketa ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rfis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection