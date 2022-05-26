@extends('layouts.admin')
@section('content')
@can('type_palet_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.type-palets.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.typePalet.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.typePalet.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TypePalet">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.typePalet.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.typePalet.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.typePalet.fields.weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.typePalet.fields.long') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($typePalets as $key => $typePalet)
                        <tr data-entry-id="{{ $typePalet->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $typePalet->id ?? '' }}
                            </td>
                            <td>
                                {{ $typePalet->title ?? '' }}
                            </td>
                            <td>
                                {{ $typePalet->weight ?? '' }}
                            </td>
                            <td>
                                {{ $typePalet->long ?? '' }}
                            </td>
                            <td>
                                @can('type_palet_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.type-palets.show', $typePalet->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('type_palet_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.type-palets.edit', $typePalet->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('type_palet_delete')
                                    <form action="{{ route('admin.type-palets.destroy', $typePalet->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('type_palet_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.type-palets.massDestroy') }}",
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
  let table = $('.datatable-TypePalet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection