@extends('layouts.admin')
@section('content')
@can('typeloadunload_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.typeloadunloads.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.typeloadunload.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Typeloadunload', 'route' => 'admin.typeloadunloads.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.typeloadunload.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Typeloadunload">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.typeloadunload.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.typeloadunload.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.typeloadunload.fields.de') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($typeloadunloads as $key => $typeloadunload)
                        <tr data-entry-id="{{ $typeloadunload->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $typeloadunload->id ?? '' }}
                            </td>
                            <td>
                                {{ $typeloadunload->title ?? '' }}
                            </td>
                            <td>
                                {{ $typeloadunload->de ?? '' }}
                            </td>
                            <td>
                                @can('typeloadunload_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.typeloadunloads.show', $typeloadunload->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('typeloadunload_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.typeloadunloads.edit', $typeloadunload->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('typeloadunload_delete')
                                    <form action="{{ route('admin.typeloadunloads.destroy', $typeloadunload->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('typeloadunload_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.typeloadunloads.massDestroy') }}",
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
  let table = $('.datatable-Typeloadunload:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection