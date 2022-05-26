@extends('layouts.admin')
@section('content')
@can('typeolpatum_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.typeolpata.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.typeolpatum.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.typeolpatum.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Typeolpatum">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.typeolpatum.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.typeolpatum.fields.title') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($typeolpata as $key => $typeolpatum)
                        <tr data-entry-id="{{ $typeolpatum->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $typeolpatum->id ?? '' }}
                            </td>
                            <td>
                                {{ $typeolpatum->title ?? '' }}
                            </td>
                            <td>
                                @can('typeolpatum_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.typeolpata.show', $typeolpatum->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('typeolpatum_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.typeolpata.edit', $typeolpatum->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('typeolpatum_delete')
                                    <form action="{{ route('admin.typeolpata.destroy', $typeolpatum->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('typeolpatum_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.typeolpata.massDestroy') }}",
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
  let table = $('.datatable-Typeolpatum:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection