@extends('layouts.admin')
@section('content')
@can('contactperson_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.contactpeople.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.contactperson.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.contactperson.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Contactperson">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.contactperson.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactperson.fields.fio') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactperson.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactperson.fields.mobile') }}
                        </th>
                        <!--<th>
                            &nbsp;
                        </th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactpeople as $key => $contactperson)
                        <tr data-entry-id="{{ $contactperson->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $contactperson->id ?? '' }}
                            </td>
                            <td>
                                @can('contactperson_edit')
                                    <a href="{{ route('admin.contactpeople.edit', $contactperson->id) }}">
                                        {{ $contactperson->fio ?? '' }}
                                    </a>
                                @endcan
                                
                            </td>
                            <td>
                                {{ $contactperson->email ?? '' }}
                            </td>
                            <td>
                                {{ $contactperson->mobile ?? '' }}
                            </td>
                            <!--<td>
                                @can('contactperson_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.contactpeople.show', $contactperson->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('contactperson_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.contactpeople.edit', $contactperson->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('contactperson_delete')
                                    <form action="{{ route('admin.contactpeople.destroy', $contactperson->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>-->

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
@can('contactperson_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contactpeople.massDestroy') }}",
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
  let table = $('.datatable-Contactperson:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection