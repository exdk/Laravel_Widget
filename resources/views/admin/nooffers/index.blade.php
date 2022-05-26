@extends('layouts.admin')
@section('content')
@can('nooffer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.nooffers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.nooffer.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Nooffer', 'route' => 'admin.nooffers.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.nooffer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Nooffer">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.nooffer.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.nooffer.fields.datefpogr') }}
                        </th>
                        <th>
                            {{ trans('cruds.nooffer.fields.dateunload') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nooffers as $key => $nooffer)
                        <tr data-entry-id="{{ $nooffer->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $nooffer->id ?? '' }}
                            </td>
                            <td>
                                {{ $nooffer->datefpogr ?? '' }}
                            </td>
                            <td>
                                {{ $nooffer->dateunload ?? '' }}
                            </td>
                            <td>
                                @can('nooffer_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.nooffers.show', $nooffer->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('nooffer_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.nooffers.edit', $nooffer->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('nooffer_delete')
                                    <form action="{{ route('admin.nooffers.destroy', $nooffer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('nooffer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.nooffers.massDestroy') }}",
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
  let table = $('.datatable-Nooffer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection