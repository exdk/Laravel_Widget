@extends('layouts.admin')
@section('content')
@can('partner_bb_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.partner-bbs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.partnerBb.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'PartnerBb', 'route' => 'admin.partner-bbs.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.partnerBb.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PartnerBb">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.partnerBb.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.partnerBb.fields.partner') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.hortname') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.innkpp') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.telefonorg') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.web') }}
                        </th>
                        <th>
                            {{ trans('cruds.mycompan.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.partnerBb.fields.typedogovor') }}
                        </th>
                        <th>
                            {{ trans('cruds.partnerBb.fields.dogovor_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.partnerBb.fields.dogovor_end') }}
                        </th>
                        <th>
                            {{ trans('cruds.partnerBb.fields.contactperson') }}
                        </th>
                        <th>
                            {{ trans('cruds.partnerBb.fields.telefon') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partnerBbs as $key => $partnerBb)
                        <tr data-entry-id="{{ $partnerBb->id }}">
                            <td>

                            </td>
                            <td>
                                {{ App\Models\PartnerBb::STATUS_SELECT[$partnerBb->status] ?? '' }}
                            </td>
                            <td>
                                {{ $partnerBb->partner->innogrn ?? '' }}
                            </td>
                            <td>
                                {{ $partnerBb->partner->hortname ?? '' }}
                            </td>
                            <td>
                                {{ $partnerBb->partner->innkpp ?? '' }}
                            </td>
                            <td>
                                {{ $partnerBb->partner->telefonorg ?? '' }}
                            </td>
                            <td>
                                {{ $partnerBb->partner->web ?? '' }}
                            </td>
                            <td>
                                {{ $partnerBb->partner->email ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PartnerBb::TYPEDOGOVOR_SELECT[$partnerBb->typedogovor] ?? '' }}
                            </td>
                            <td>
                                {{ $partnerBb->dogovor_start ?? '' }}
                            </td>
                            <td>
                                {{ $partnerBb->dogovor_end ?? '' }}
                            </td>
                            <td>
                                {{ $partnerBb->contactperson ?? '' }}
                            </td>
                            <td>
                                {{ $partnerBb->telefon ?? '' }}
                            </td>
                            <td>
                                @can('partner_bb_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.partner-bbs.show', $partnerBb->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('partner_bb_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.partner-bbs.edit', $partnerBb->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('partner_bb_delete')
                                    <form action="{{ route('admin.partner-bbs.destroy', $partnerBb->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('partner_bb_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.partner-bbs.massDestroy') }}",
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
  let table = $('.datatable-PartnerBb:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection