@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mycompan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mycompans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.id') }}
                        </th>
                        <td>
                            {{ $mycompan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.hortname') }}
                        </th>
                        <td>
                            {{ $mycompan->hortname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.longname') }}
                        </th>
                        <td>
                            {{ $mycompan->longname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.main') }}
                        </th>
                        <td>
                            {{ $mycompan->main->hortname ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.logo') }}
                        </th>
                        <td>
                            @if($mycompan->logo)
                                <a href="{{ $mycompan->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $mycompan->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.typecomp') }}
                        </th>
                        <td>
                            @foreach($mycompan->typecomps as $key => $typecomp)
                                <span class="label label-info">{{ $typecomp->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.typeperevoz') }}
                        </th>
                        <td>
                            @foreach($mycompan->typeperevozs as $key => $typeperevoz)
                                <span class="label label-info">{{ $typeperevoz->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.oporg') }}
                        </th>
                        <td>
                            {{ $mycompan->oporg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.datet') }}
                        </th>
                        <td>
                            {{ $mycompan->datet }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.typedejat') }}
                        </th>
                        <td>
                            {{ App\Models\Mycompan::TYPEDEJAT_SELECT[$mycompan->typedejat] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.direktor') }}
                        </th>
                        <td>
                            {{ $mycompan->direktor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.uradres') }}
                        </th>
                        <td>
                            {{ $mycompan->uradres }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.factadr') }}
                        </th>
                        <td>
                            {{ $mycompan->factadr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.telefonorg') }}
                        </th>
                        <td>
                            {{ $mycompan->telefonorg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.orgmobile') }}
                        </th>
                        <td>
                            {{ $mycompan->orgmobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.web') }}
                        </th>
                        <td>
                            {{ $mycompan->web }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.email') }}
                        </th>
                        <td>
                            {{ $mycompan->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.typenalog') }}
                        </th>
                        <td>
                            {{ App\Models\Mycompan::TYPENALOG_SELECT[$mycompan->typenalog] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.innkpp') }}
                        </th>
                        <td>
                            {{ $mycompan->innkpp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.kpp') }}
                        </th>
                        <td>
                            {{ $mycompan->kpp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.innogrn') }}
                        </th>
                        <td>
                            {{ $mycompan->innogrn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.bik') }}
                        </th>
                        <td>
                            {{ $mycompan->bik }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.bank') }}
                        </th>
                        <td>
                            {{ $mycompan->bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.rathet') }}
                        </th>
                        <td>
                            {{ $mycompan->rathet }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.korhet') }}
                        </th>
                        <td>
                            {{ $mycompan->korhet }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.reitopen') }}
                        </th>
                        <td>
                            {{ $mycompan->reitopen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.reiin') }}
                        </th>
                        <td>
                            {{ $mycompan->reiin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.geogorod') }}
                        </th>
                        <td>
                            {{ $mycompan->geogorod }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.megdu') }}
                        </th>
                        <td>
                            @foreach($mycompan->megdus as $key => $megdu)
                                <span class="label label-info">{{ $megdu->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.note') }}
                        </th>
                        <td>
                            {{ $mycompan->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.utav') }}
                        </th>
                        <td>
                            @if($mycompan->utav)
                                <a href="{{ $mycompan->utav->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.doveren') }}
                        </th>
                        <td>
                            @if($mycompan->doveren)
                                <a href="{{ $mycompan->doveren->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.filedog') }}
                        </th>
                        <td>
                            @if($mycompan->filedog)
                                <a href="{{ $mycompan->filedog->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.newfil') }}
                        </th>
                        <td>
                            @if($mycompan->newfil)
                                <a href="{{ $mycompan->newfil->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.newfill') }}
                        </th>
                        <td>
                            @if($mycompan->newfill)
                                <a href="{{ $mycompan->newfill->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mycompan.fields.newfilll') }}
                        </th>
                        <td>
                            @foreach($mycompan->newfilll as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mycompans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection