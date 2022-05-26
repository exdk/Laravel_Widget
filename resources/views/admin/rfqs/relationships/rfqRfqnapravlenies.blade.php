<div class="m-3">
    @can('rfqnapravlenie_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.rfqnapravlenies.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.rfqnapravlenie.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.rfqnapravlenie.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-rfqRfqnapravlenies">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.rfqnapravlenie.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.rfqnapravlenie.fields.rfq') }}
                            </th>
                            <th>
                                {{ trans('cruds.rfqnapravlenie.fields.apoint') }}
                            </th>
                            <th>
                                {{ trans('cruds.apoint.fields.address') }}
                            </th>
                            <th>
                                {{ trans('cruds.apoint.fields.index') }}
                            </th>
                            <th>
                                {{ trans('cruds.apoint.fields.time') }}
                            </th>
                            <th>
                                {{ trans('cruds.apoint.fields.city') }}
                            </th>
                            <th>
                                {{ trans('cruds.rfqnapravlenie.fields.bpoint') }}
                            </th>
                            <th>
                                {{ trans('cruds.bpoit.fields.address') }}
                            </th>
                            <th>
                                {{ trans('cruds.bpoit.fields.index') }}
                            </th>
                            <th>
                                {{ trans('cruds.bpoit.fields.time') }}
                            </th>
                            <th>
                                {{ trans('cruds.bpoit.fields.city') }}
                            </th>
                            <th>
                                {{ trans('cruds.bpoit.fields.region') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rfqnapravlenies as $key => $rfqnapravlenie)
                            <tr data-entry-id="{{ $rfqnapravlenie->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $rfqnapravlenie->id ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqnapravlenie->rfq->title ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqnapravlenie->apoint->title ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqnapravlenie->apoint->address ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqnapravlenie->apoint->index ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqnapravlenie->apoint->time ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqnapravlenie->apoint->city ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqnapravlenie->bpoint->title ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqnapravlenie->bpoint->address ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqnapravlenie->bpoint->index ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqnapravlenie->bpoint->time ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqnapravlenie->bpoint->city ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqnapravlenie->bpoint->region ?? '' }}
                                </td>
                                <td>
                                    @can('rfqnapravlenie_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.rfqnapravlenies.show', $rfqnapravlenie->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('rfqnapravlenie_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.rfqnapravlenies.edit', $rfqnapravlenie->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('rfqnapravlenie_delete')
                                        <form action="{{ route('admin.rfqnapravlenies.destroy', $rfqnapravlenie->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('rfqnapravlenie_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rfqnapravlenies.massDestroy') }}",
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
  let table = $('.datatable-rfqRfqnapravlenies:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection