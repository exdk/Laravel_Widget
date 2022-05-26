@extends('layouts.admin')
@section('content')


<div class="card">
    <div class="card-header">
                <div class="row">
        <div class="col-lg-6">    
            <h4>{{ trans('cruds.mycompan.title') }}</h4>
        </div>    
        <div class="col-lg-6">
        @can('mycompan_create')    <a style="float:right;" class="btn btn-success" href="{{ route('admin.mycompans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.mycompan.title') }}
            </a>@endcan
        </div>
    </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover datatable datatable-Mycompan">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.id') }}
                        </th>
                                                <th>
                            {{ trans('cruds.mycompan.fields.logo') }}
                        </th>
                        <th>
                            Компания
                        </th>
                        <th>
                            ОГРН
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.innkpp') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.direktor') }}
                        </th>
                        <th>
                            Телефон
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.web') }}
                        </th>
                        <th>
                             Эл.почта
                        </th>
                        <!--<th>
                            {{ trans('cruds.mycompan.fields.hortname') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.longname') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.main') }}
                        </th>

                        <th>
                            {{ trans('cruds.mycompan.fields.typecomp') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.typeperevoz') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.oporg') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.datet') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.typedejat') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.direktor') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.uradres') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.factadr') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.telefonorg') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.orgmobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.web') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.typenalog') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.innkpp') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.kpp') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.innogrn') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.bik') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.bank') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.rathet') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.korhet') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.reitopen') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.reiin') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.geogorod') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.megdu') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.note') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.utav') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.doveren') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.filedog') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.newfil') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.newfill') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.newfilll') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach($mycompans as $key => $mycompan)
                        <tr data-entry-id="{{ $mycompan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $mycompan->id ?? '' }}
                            </td>
                                                        <td>
                                @if($mycompan->logo)
                                        <img src="{{ $mycompan->logo->getUrl('thumb') }}">
                                @endif
                            </td>
                            <td>
                                 @can('mycompan_show')
                                    <a href="{{ route('admin.mycompans.show', $mycompan->id) }}">
                                        {{ $mycompan->hortname ?? '' }}
                                    </a>
                                @endcan
                            </td>
                            <td>
                                                                {{ $mycompan->innogrn ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->innkpp ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->direktor ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->telefonorg ?? '' }}
                            </td>
                            <td>
<a href="https://{{ $mycompan->web ?? '' }}" target="_blank">{{ $mycompan->web ?? '' }}</a>                            </td>
                            <td>
                                <a href="mailto:{{ $mycompan->email ?? '' }}" target="_blank">{{ $mycompan->email ?? '' }}</a>
                            </td>
                            <!--<td>
                                {{ $mycompan->hortname ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->longname ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->main->hortname ?? '' }}
                            </td>

                            <td>
                                @foreach($mycompan->typecomps as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($mycompan->typeperevozs as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $mycompan->oporg ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->datet ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Mycompan::TYPEDEJAT_SELECT[$mycompan->typedejat] ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->direktor ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->uradres ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->factadr ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->telefonorg ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->orgmobile ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->web ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->email ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Mycompan::TYPENALOG_SELECT[$mycompan->typenalog] ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->innkpp ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->kpp ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->innogrn ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->bik ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->bank ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->rathet ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->korhet ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->reitopen ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->reiin ?? '' }}
                            </td>
                            <td>
                                {{ $mycompan->geogorod ?? '' }}
                            </td>
                            <td>
                                @foreach($mycompan->megdus as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $mycompan->note ?? '' }}
                            </td>
                            <td>
                                @if($mycompan->utav)
                                    <a href="{{ $mycompan->utav->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($mycompan->doveren)
                                    <a href="{{ $mycompan->doveren->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($mycompan->filedog)
                                    <a href="{{ $mycompan->filedog->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($mycompan->newfil)
                                    <a href="{{ $mycompan->newfil->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($mycompan->newfill)
                                    <a href="{{ $mycompan->newfill->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @foreach($mycompan->newfilll as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('mycompan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.mycompans.show', $mycompan->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('mycompan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.mycompans.edit', $mycompan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('mycompan_delete')
                                    <form action="{{ route('admin.mycompans.destroy', $mycompan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>-->

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('mycompan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mycompans.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Mycompan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
})
</script>
@endsection