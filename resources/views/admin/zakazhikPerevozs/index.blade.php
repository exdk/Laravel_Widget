@extends('layouts.admin')
@section('content')
@can('zakazhik_perevoz_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.zakazhik-perevozs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.zakazhikPerevoz.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'ZakazhikPerevoz', 'route' => 'admin.zakazhik-perevozs.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.zakazhikPerevoz.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ZakazhikPerevoz">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.zakazhikPerevoz.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakazhikPerevoz.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakazhikPerevoz.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakazhikPerevoz.fields.inn') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakazhikPerevoz.fields.telefon') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakazhikPerevoz.fields.contactperson') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($zakazhikPerevozs as $key => $zakazhikPerevoz)
                        <tr data-entry-id="{{ $zakazhikPerevoz->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $zakazhikPerevoz->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ZakazhikPerevoz::STATUS_RADIO[$zakazhikPerevoz->status] ?? '' }}
                            </td>
                            <td>
                                {{ $zakazhikPerevoz->title ?? '' }}
                            </td>
                            <td>
                                {{ $zakazhikPerevoz->inn ?? '' }}
                            </td>
                            <td>
                                {{ $zakazhikPerevoz->telefon ?? '' }}
                            </td>
                            <td>
                                {{ $zakazhikPerevoz->contactperson ?? '' }}
                            </td>
                            <td>
                                @can('zakazhik_perevoz_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.zakazhik-perevozs.show', $zakazhikPerevoz->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('zakazhik_perevoz_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.zakazhik-perevozs.edit', $zakazhikPerevoz->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('zakazhik_perevoz_delete')
                                    <form action="{{ route('admin.zakazhik-perevozs.destroy', $zakazhikPerevoz->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('zakazhik_perevoz_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.zakazhik-perevozs.massDestroy') }}",
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
  let table = $('.datatable-ZakazhikPerevoz:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection