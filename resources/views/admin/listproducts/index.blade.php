@extends('layouts.admin')
@section('content')
@can('listproduct_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.listproducts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.listproduct.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.listproduct.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Listproduct">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.listproduct.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.listproduct.fields.id_vnutr') }}
                        </th>
                        <th>
                            {{ trans('cruds.listproduct.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.nomer_pricelist') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.articel') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.unit_izm') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.type_pack') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.nomer_decalaration') }}
                        </th>
                        <th>
                            {{ trans('cruds.listproduct.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.listproduct.fields.type_pack') }}
                        </th>
                        <th>
                            {{ trans('cruds.listproduct.fields.unitcount') }}
                        </th>
                        <th>
                            {{ trans('cruds.listproduct.fields.type_pack_tr') }}
                        </th>
                        <th>
                            {{ trans('cruds.listproduct.fields.tr_quan') }}
                        </th>
                        <th>
                            {{ trans('cruds.listproduct.fields.type_pal') }}
                        </th>
                        <th>
                            {{ trans('cruds.listproduct.fields.qua_pal') }}
                        </th>
                        <th>
                            {{ trans('cruds.listproduct.fields.total_quant') }}
                        </th>
                        <th>
                            {{ trans('cruds.listproduct.fields.total_weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.listproduct.fields.total_sum') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listproducts as $key => $listproduct)
                        <tr data-entry-id="{{ $listproduct->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $listproduct->id ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->id_vnutr ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->title->product_code ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->title->nomer_pricelist ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->title->articel ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->title->title ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->title->price ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->title->unit_izm ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->title->type_pack ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->title->weight ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->title->nomer_decalaration ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->quantity ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->type_pack ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->unitcount ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->type_pack_tr->title ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->tr_quan ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->type_pal->title ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->qua_pal ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->total_quant ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->total_weight ?? '' }}
                            </td>
                            <td>
                                {{ $listproduct->total_sum ?? '' }}
                            </td>
                            <td>
                                @can('listproduct_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.listproducts.show', $listproduct->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('listproduct_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.listproducts.edit', $listproduct->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('listproduct_delete')
                                    <form action="{{ route('admin.listproducts.destroy', $listproduct->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('listproduct_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.listproducts.massDestroy') }}",
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
  let table = $('.datatable-Listproduct:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection