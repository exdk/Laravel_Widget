@extends('layouts.admin')
@section('content')
@can('perevoz_exp_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.perevoz-exps.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.perevozExp.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'PerevozExp', 'route' => 'admin.perevoz-exps.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.perevozExp.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PerevozExp">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.perevozExp.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.perevozExp.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.perevozExp.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.perevozExp.fields.inn') }}
                        </th>
                        <th>
                            {{ trans('cruds.perevozExp.fields.telefon') }}
                        </th>
                        <th>
                            {{ trans('cruds.perevozExp.fields.contactperson') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perevozExps as $key => $perevozExp)
                        <tr data-entry-id="{{ $perevozExp->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $perevozExp->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PerevozExp::STATUS_RADIO[$perevozExp->status] ?? '' }}
                            </td>
                            <td>
                                {{ $perevozExp->title ?? '' }}
                            </td>
                            <td>
                                {{ $perevozExp->inn ?? '' }}
                            </td>
                            <td>
                                {{ $perevozExp->telefon ?? '' }}
                            </td>
                            <td>
                                {{ $perevozExp->contactperson ?? '' }}
                            </td>
                            <td>
                                @can('perevoz_exp_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.perevoz-exps.show', $perevozExp->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('perevoz_exp_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.perevoz-exps.edit', $perevozExp->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('perevoz_exp_delete')
                                    <form action="{{ route('admin.perevoz-exps.destroy', $perevozExp->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('perevoz_exp_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.perevoz-exps.massDestroy') }}",
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
  let table = $('.datatable-PerevozExp:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection