@extends('layouts.admin')
@section('content')
@can('catware_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.catware.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.catware.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.catware.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Catware">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.catware.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.catware.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.catware.fields.dep') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($catware as $key => $catware)
                        <tr data-entry-id="{{ $catware->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $catware->id ?? '' }}
                            </td>
                            <td>
                                {{ $catware->category ?? '' }}
                            </td>
                            <td>
                                {{ $catware->dep ?? '' }}
                            </td>
                            <td>
                                @can('catware_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.catware.show', $catware->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('catware_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.catware.edit', $catware->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('catware_delete')
                                    <form action="{{ route('admin.catware.destroy', $catware->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('catware_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.catware.massDestroy') }}",
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
  let table = $('.datatable-Catware:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection