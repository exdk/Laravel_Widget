@extends('layouts.admin')
@section('content')
@can('unitma_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.unitmas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.unitma.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.unitma.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Unitma">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.unitma.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.unitma.fields.titleru') }}
                        </th>
                        <th>
                            {{ trans('cruds.unitma.fields.rubol') }}
                        </th>
                        <th>
                            {{ trans('cruds.unitma.fields.megd') }}
                        </th>
                        <th>
                            {{ trans('cruds.unitma.fields.megd_bol') }}
                        </th>
                        <th>
                            {{ trans('cruds.unitma.fields.di') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($unitmas as $key => $unitma)
                        <tr data-entry-id="{{ $unitma->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $unitma->id ?? '' }}
                            </td>
                            <td>
                                {{ $unitma->titleru ?? '' }}
                            </td>
                            <td>
                                {{ $unitma->rubol ?? '' }}
                            </td>
                            <td>
                                {{ $unitma->megd ?? '' }}
                            </td>
                            <td>
                                {{ $unitma->megd_bol ?? '' }}
                            </td>
                            <td>
                                {{ $unitma->di ?? '' }}
                            </td>
                            <td>
                                @can('unitma_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.unitmas.show', $unitma->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('unitma_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.unitmas.edit', $unitma->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('unitma_delete')
                                    <form action="{{ route('admin.unitmas.destroy', $unitma->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('unitma_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.unitmas.massDestroy') }}",
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
  let table = $('.datatable-Unitma:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection