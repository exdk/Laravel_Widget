@extends('layouts.admin')
@section('content')
@can('driver_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.drivers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.driver.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Driver', 'route' => 'admin.drivers.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.driver.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Driver">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.fam') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.oth') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.birth_place') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.pa_ty') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.pa_nomer') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.pa_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.pa_kod') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.pa_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.pa_perv') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.pa_vtor') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.adr_pro') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.pro_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.pro_vr_adr') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.pro_vr_date_ot') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.pro_vr_date_do') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.nomervu') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.datevu') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.byvu') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.vu_gorod') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.vu_perv') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.vu_vtor') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.taho') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.inn') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.inn_photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.pfr') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.pfr_perv') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.mobile_a') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.mobile_b') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.medb_nomer') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.medb_typ') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.medb_date_ot') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.medb_perv') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.trud_nomer') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.trud_date_ot') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.trud_dol') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($drivers as $key => $driver)
                        <tr data-entry-id="{{ $driver->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $driver->id ?? '' }}
                            </td>
                            <td>
                                {{ $driver->fam ?? '' }}
                            </td>
                            <td>
                                {{ $driver->name ?? '' }}
                            </td>
                            <td>
                                {{ $driver->oth ?? '' }}
                            </td>
                            <td>
                                {{ $driver->date ?? '' }}
                            </td>
                            <td>
                                {{ $driver->birth_place ?? '' }}
                            </td>
                            <td>
                                {{ $driver->pa_ty ?? '' }}
                            </td>
                            <td>
                                {{ $driver->pa_nomer ?? '' }}
                            </td>
                            <td>
                                {{ $driver->pa_date ?? '' }}
                            </td>
                            <td>
                                {{ $driver->pa_kod ?? '' }}
                            </td>
                            <td>
                                {{ $driver->pa_by ?? '' }}
                            </td>
                            <td>
                                @if($driver->pa_perv)
                                    <a href="{{ $driver->pa_perv->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $driver->pa_perv->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($driver->pa_vtor)
                                    <a href="{{ $driver->pa_vtor->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $driver->pa_vtor->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $driver->adr_pro ?? '' }}
                            </td>
                            <td>
                                {{ $driver->pro_date ?? '' }}
                            </td>
                            <td>
                                {{ $driver->pro_vr_adr ?? '' }}
                            </td>
                            <td>
                                {{ $driver->pro_vr_date_ot ?? '' }}
                            </td>
                            <td>
                                {{ $driver->pro_vr_date_do ?? '' }}
                            </td>
                            <td>
                                {{ $driver->nomervu ?? '' }}
                            </td>
                            <td>
                                {{ $driver->datevu ?? '' }}
                            </td>
                            <td>
                                {{ $driver->byvu ?? '' }}
                            </td>
                            <td>
                                {{ $driver->vu_gorod ?? '' }}
                            </td>
                            <td>
                                @if($driver->vu_perv)
                                    <a href="{{ $driver->vu_perv->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $driver->vu_perv->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($driver->vu_vtor)
                                    <a href="{{ $driver->vu_vtor->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $driver->vu_vtor->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $driver->taho ?? '' }}
                            </td>
                            <td>
                                {{ $driver->inn ?? '' }}
                            </td>
                            <td>
                                @if($driver->inn_photo)
                                    <a href="{{ $driver->inn_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $driver->inn_photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $driver->pfr ?? '' }}
                            </td>
                            <td>
                                @if($driver->pfr_perv)
                                    <a href="{{ $driver->pfr_perv->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $driver->pfr_perv->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $driver->email ?? '' }}
                            </td>
                            <td>
                                {{ $driver->mobile_a ?? '' }}
                            </td>
                            <td>
                                {{ $driver->mobile_b ?? '' }}
                            </td>
                            <td>
                                {{ $driver->medb_nomer ?? '' }}
                            </td>
                            <td>
                                {{ $driver->medb_typ ?? '' }}
                            </td>
                            <td>
                                {{ $driver->medb_date_ot ?? '' }}
                            </td>
                            <td>
                                @foreach($driver->medb_perv as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $driver->trud_nomer ?? '' }}
                            </td>
                            <td>
                                {{ $driver->trud_date_ot ?? '' }}
                            </td>
                            <td>
                                {{ $driver->trud_dol ?? '' }}
                            </td>
                            <td>
                                @can('driver_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.drivers.show', $driver->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('driver_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.drivers.edit', $driver->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('driver_delete')
                                    <form action="{{ route('admin.drivers.destroy', $driver->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

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
@can('driver_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.drivers.massDestroy') }}",
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
  let table = $('.datatable-Driver:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection