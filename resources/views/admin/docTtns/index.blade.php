@extends('layouts.admin')
@section('content')
@can('doc_ttn_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.doc-ttns.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.docTtn.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.docTtn.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DocTtn">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.docTtn.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.docTtn.fields.id_list_product') }}
                        </th>
                        <th>
                            {{ trans('cruds.docTtn.fields.otpravitel') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.innogrn') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.hortname') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.longname') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.innkpp') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.uradres') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.bank') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.korhet') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.rathet') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.bik') }}
                        </th>
                        <th>
                            {{ trans('cruds.docTtn.fields.poluchatel') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.inn') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($docTtns as $key => $docTtn)
                        <tr data-entry-id="{{ $docTtn->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $docTtn->id ?? '' }}
                            </td>
                            <td>
                                {{ $docTtn->id_list_product->id_vnutr ?? '' }}
                            </td>
                            <td>
                                {{ $docTtn->otpravitel->hortname ?? '' }}
                            </td>
                            <td>
                                {{ $docTtn->otpravitel->innogrn ?? '' }}
                            </td>
                            <td>
                                {{ $docTtn->otpravitel->hortname ?? '' }}
                            </td>
                            <td>
                                {{ $docTtn->otpravitel->longname ?? '' }}
                            </td>
                            <td>
                                {{ $docTtn->otpravitel->innkpp ?? '' }}
                            </td>
                            <td>
                                {{ $docTtn->otpravitel->uradres ?? '' }}
                            </td>
                            <td>
                                {{ $docTtn->otpravitel->bank ?? '' }}
                            </td>
                            <td>
                                {{ $docTtn->otpravitel->korhet ?? '' }}
                            </td>
                            <td>
                                {{ $docTtn->otpravitel->rathet ?? '' }}
                            </td>
                            <td>
                                {{ $docTtn->otpravitel->bik ?? '' }}
                            </td>
                            <td>
                                {{ $docTtn->poluchatel->title ?? '' }}
                            </td>
                            <td>
                                @if($docTtn->poluchatel)
                                    {{ $docTtn->poluchatel::STATUS_RADIO[$docTtn->poluchatel->status] ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $docTtn->poluchatel->title ?? '' }}
                            </td>
                            <td>
                                {{ $docTtn->poluchatel->inn ?? '' }}
                            </td>
                            <td>
                                @can('doc_ttn_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.doc-ttns.show', $docTtn->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('doc_ttn_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.doc-ttns.edit', $docTtn->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('doc_ttn_delete')
                                    <form action="{{ route('admin.doc-ttns.destroy', $docTtn->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('doc_ttn_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.doc-ttns.massDestroy') }}",
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
  let table = $('.datatable-DocTtn:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection