<div class="m-3">
    @can('rfqcountry_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.rfqcountries.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.rfqcountry.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.rfqcountry.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-rfqRfqcountries">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.rfqcountry.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.rfqcountry.fields.rfq') }}
                            </th>
                            <th>
                                {{ trans('cruds.rfqcountry.fields.apoint') }}
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
                                {{ trans('cruds.rfqcountry.fields.bpoint') }}
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
                        @foreach($rfqcountries as $key => $rfqcountry)
                            <tr data-entry-id="{{ $rfqcountry->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $rfqcountry->id ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqcountry->rfq->title ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqcountry->apoint->title ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqcountry->apoint->address ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqcountry->apoint->index ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqcountry->apoint->time ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqcountry->apoint->city ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqcountry->bpoint->title ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqcountry->bpoint->address ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqcountry->bpoint->index ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqcountry->bpoint->time ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqcountry->bpoint->city ?? '' }}
                                </td>
                                <td>
                                    {{ $rfqcountry->bpoint->region ?? '' }}
                                </td>
                                <td>
                                    @can('rfqcountry_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.rfqcountries.show', $rfqcountry->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('rfqcountry_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.rfqcountries.edit', $rfqcountry->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('rfqcountry_delete')
                                        <form action="{{ route('admin.rfqcountries.destroy', $rfqcountry->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('rfqcountry_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rfqcountries.massDestroy') }}",
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
  let table = $('.datatable-rfqRfqcountries:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection