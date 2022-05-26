@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
                <div class="row">
        <div class="col-lg-6">    
            <h4>Пункты погрузки и выгрузки</h4>
        </div>    
        <div class="col-lg-6">
@can('pointload_create') <a style="margin-right: 10px;float:right;" class="btn btn-success" href="{{ route('admin.pointloads.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pointload.title') }}
            </a>
            <div style="margin-right: 10px;float:right;" class="row">
                    <div class="col-lg-12">
            <button style="float:right;" class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Pointload', 'route' => 'admin.pointloads.parseCsvImport'])
                            </div>
                </div>
        </div>
    </div>
@endcan
</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-hover datatable datatable-Pointload">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Название
                        </th>
                        <th>
                            Город
                        </th>
                        <th>
                            Адрес
                        </th>
                        <th>
                            Грузоотправитель/Грузополучатель
                        </th>
                        <!--<th>
                            {{ trans('cruds.pointload.fields.sapid') }}
                        </th>
                        <th>
                            {{ trans('cruds.pointload.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.pointload.fields.gorod') }}
                        </th>
                        <th>
                            {{ trans('cruds.pointload.fields.region') }}
                        </th>
                        <th>
                            {{ trans('cruds.pointload.fields.ulitca') }}
                        </th>
                        <th>
                            {{ trans('cruds.pointload.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.pointload.fields.komuperevozklient') }}
                        </th>
                        <th>
                            {{ trans('cruds.perevozklient.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.perevozklient.fields.inn') }}
                        </th>
                        <th>
                            {{ trans('cruds.pointload.fields.komuzakazklient') }}
                        </th>
                        <th>
                            {{ trans('cruds.zakazchikklient.fields.inn') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach($pointloads as $key => $pointload)
                        <tr data-entry-id="{{ $pointload->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pointload->id ?? '' }}
                            </td>
                                                        <td>                              
                                @can('pointload_show')
                                    <a href="{{ route('admin.pointloads.show', $pointload->id) }}">
                                        {{ $pointload->title ?? '' }}
                                    </a>
                                @endcan
                            </td>
                                                        <td>
{{ $pointload->gorod ?? '' }}
                            </td>
                                                        <td>
{{ $pointload->ulitca ?? '' }}
                            </td>
                                                        <td>
{{ $pointload->innfio ?? '' }}
                            </td>
                                                        <td>

                            </td>
                            <!--<td>
                                {{ $pointload->sapid ?? '' }}
                            </td>
                            <td>
                                {{ $pointload->title ?? '' }}
                            </td>
                            <td>
                                {{ $pointload->gorod ?? '' }}
                            </td>
                            <td>
                                {{ $pointload->region ?? '' }}
                            </td>
                            <td>
                                {{ $pointload->ulitca ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Pointload::TYPE_SELECT[$pointload->type] ?? '' }}
                            </td>
                            <td>
                                {{ $pointload->komuperevozklient->title ?? '' }}
                            </td>
                            <td>
                                {{ $pointload->komuperevozklient->title ?? '' }}
                            </td>
                            <td>
                                {{ $pointload->komuperevozklient->inn ?? '' }}
                            </td>
                            <td>
                                {{ $pointload->komuzakazklient->title ?? '' }}
                            </td>
                            <td>
                                {{ $pointload->komuzakazklient->inn ?? '' }}
                            </td>
                            <td>
                                @can('pointload_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pointloads.show', $pointload->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pointload_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pointloads.edit', $pointload->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pointload_delete')
                                    <form action="{{ route('admin.pointloads.destroy', $pointload->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('pointload_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pointloads.massDestroy') }}",
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
  let table = $('.datatable-Pointload:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection