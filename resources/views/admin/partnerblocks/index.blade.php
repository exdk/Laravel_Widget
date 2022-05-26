@extends('layouts.admin')
@section('content')
@can('partnerblock_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.partnerblocks.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.partnerblock.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Partnerblock', 'route' => 'admin.partnerblocks.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.partnerblock.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Partnerblock">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.partnerblock.fields.partner') }}
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
                            {{ trans('cruds.partnerblock.fields.contactperson') }}
                        </th>
                        <th>
                            {{ trans('cruds.partnerblock.fields.telefon') }}
                        </th>
                        <th>
                            {{ trans('cruds.partnerblock.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partnerblocks as $key => $partnerblock)
                        <tr data-entry-id="{{ $partnerblock->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $partnerblock->partner->innogrn ?? '' }}
                            </td>
                            <td>
                                {{ $partnerblock->partner->hortname ?? '' }}
                            </td>
                            <td>
                                {{ $partnerblock->partner->innkpp ?? '' }}
                            </td>
                            <td>
                                {{ $partnerblock->partner->telefonorg ?? '' }}
                            </td>
                            <td>
                                {{ $partnerblock->partner->web ?? '' }}
                            </td>
                            <td>
                                {{ $partnerblock->partner->email ?? '' }}
                            </td>
                            <td>
                                {{ $partnerblock->contactperson ?? '' }}
                            </td>
                            <td>
                                {{ $partnerblock->telefon ?? '' }}
                            </td>
                            <td>
                                {{ $partnerblock->created_at ?? '' }}
                            </td>
                            <td>
                                @can('partnerblock_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.partnerblocks.show', $partnerblock->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('partnerblock_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.partnerblocks.edit', $partnerblock->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('partnerblock_delete')
                                    <form action="{{ route('admin.partnerblocks.destroy', $partnerblock->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('partnerblock_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.partnerblocks.massDestroy') }}",
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
  let table = $('.datatable-Partnerblock:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection