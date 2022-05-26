@extends('layouts.admin')
@section('content')
@can('valutand_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.valutands.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.valutand.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Valutand', 'route' => 'admin.valutands.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.valutand.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Valutand">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.valutand.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.valutand.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.valutand.fields.code_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.valutand.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.valutand.fields.unicode') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($valutands as $key => $valutand)
                        <tr data-entry-id="{{ $valutand->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $valutand->id ?? '' }}
                            </td>
                            <td>
                                {{ $valutand->code ?? '' }}
                            </td>
                            <td>
                                {{ $valutand->code_2 ?? '' }}
                            </td>
                            <td>
                                {{ $valutand->title ?? '' }}
                            </td>
                            <td>
                                {{ $valutand->unicode ?? '' }}
                            </td>
                            <td>
                                @can('valutand_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.valutands.show', $valutand->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('valutand_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.valutands.edit', $valutand->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('valutand_delete')
                                    <form action="{{ route('admin.valutands.destroy', $valutand->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('valutand_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.valutands.massDestroy') }}",
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
  let table = $('.datatable-Valutand:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection