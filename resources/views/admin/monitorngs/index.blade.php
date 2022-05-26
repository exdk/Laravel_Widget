@extends('layouts.admin')
@section('content')
@can('monitorng_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.monitorngs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.monitorng.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.monitorng.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Monitorng">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.monitorng.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.monitorng.fields.driver') }}
                        </th>
                        <th>
                            {{ trans('cruds.monitorng.fields.lang') }}
                        </th>
                        <th>
                            {{ trans('cruds.monitorng.fields.lat') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monitorngs as $key => $monitorng)
                        <tr data-entry-id="{{ $monitorng->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $monitorng->id ?? '' }}
                            </td>
                            <td>
                                {{ $monitorng->driver->fam ?? '' }}
                            </td>
                            <td>
                                {{ $monitorng->lang ?? '' }}
                            </td>
                            <td>
                                {{ $monitorng->lat ?? '' }}
                            </td>
                            <td>
                                @can('monitorng_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.monitorngs.show', $monitorng->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('monitorng_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.monitorngs.edit', $monitorng->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('monitorng_delete')
                                    <form action="{{ route('admin.monitorngs.destroy', $monitorng->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

    <script type="text/javascript">
      var result = HTTP.call(
        "GET",
        'http://46.101.12.153:8082/api/devices/',
        {
          auth: '7rights@mail.ru:admin' ,
          params: {
          }
        }
      );
      console.log(result);
    </script>


@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('monitorng_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.monitorngs.massDestroy') }}",
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
  let table = $('.datatable-Monitorng:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection