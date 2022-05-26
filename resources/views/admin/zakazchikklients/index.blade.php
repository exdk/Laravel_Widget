@extends('layouts.admin')
@section('content')
@can('zakazchikklient_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.zakazchikklients.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.zakazchikklient.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Zakazchikklient', 'route' => 'admin.zakazchikklients.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.zakazchikklient.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Zakazchikklient">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.inn') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.telefon') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.contactperson') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($zakazchikklients as $key => $zakazchikklient)
                        <tr data-entry-id="{{ $zakazchikklient->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $zakazchikklient->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Zakazchikklient::STATUS_RADIO[$zakazchikklient->status] ?? '' }}
                            </td>
                            <td>
                                {{ $zakazchikklient->title ?? '' }}
                            </td>
                            <td>
                                {{ $zakazchikklient->inn ?? '' }}
                            </td>
                            <td>
                                {{ $zakazchikklient->telefon ?? '' }}
                            </td>
                            <td>
                                {{ $zakazchikklient->contactperson ?? '' }}
                            </td>
                            <td>
                                @can('zakazchikklient_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.zakazchikklients.show', $zakazchikklient->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('zakazchikklient_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.zakazchikklients.edit', $zakazchikklient->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('zakazchikklient_delete')
                                    <form action="{{ route('admin.zakazchikklients.destroy', $zakazchikklient->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('zakazchikklient_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.zakazchikklients.massDestroy') }}",
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
  let table = $('.datatable-Zakazchikklient:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection