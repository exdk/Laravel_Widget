@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
	 <div class="row">
        <div class="col-lg-6">    
            <h2>Журнал ТС</h2>
        </div>    
            <div class="col-lg-6">
        	@can('auto_create')
        	<button style="float:right;margin-left:10px;" class="btn btn-outline-success" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Auto', 'route' => 'admin.autos.parseCsvImport'])

            <a style="float:right;" class="btn btn-success" href="{{ route('admin.autos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.auto.title') }}
            </a>
            	@endcan
	        </div>
	    </div>
    </div>
	   


<div class="card">
    <div class="card-header">
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Auto">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.id') }}
                        </th>
                        <!--
                        <th>
                            {{ trans('cruds.auto.fields.own') }}
                        </th>-->
                       <th>
                            {{ trans('cruds.auto.fields.govnomer') }}
                        </th>
                       <!-- <th>
                            {{ trans('cruds.auto.fields.marka') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.model') }}
                        </th>-->
                        <th>
                            {{ trans('cruds.auto.fields.type_kuzov') }}
                        </th>
                        <!--<th>
                            {{ trans('cruds.auto.fields.category_tc') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.year_ot') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.color') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.ecoclass') }}
                        </th>-->
                        <th>
                            {{ trans('cruds.auto.fields.max_nagruz') }}
                        </th>
                        <!--<th>
                            {{ trans('cruds.auto.fields.registry') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.kolo') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.bakov_volume_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.levelco_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.vnutr_dlina') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.vnutr_weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.vnutr_height') }}
                        </th>-->
                        <th>
                            {{ trans('cruds.auto.fields.vnutr_kub') }}
                        </th>
                        <!--<th>
                            {{ trans('cruds.auto.fields.holod') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.temp_ot') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.temp_do') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.type_tahograf') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.fuel') }}
                        </th>-->
                        <th>
                            {{ trans('cruds.auto.fields.typeload') }}
                        </th>
                        <!--<th>
                            {{ trans('cruds.auto.fields.adr') }}
                        </th>
                        <th>
                            {{ trans('cruds.auto.fields.ekmt') }}
                        </th>-->
                        <th>
                            {{ trans('cruds.auto.fields.gruzopod') }}
                        </th>
                        <!--<th>
                            &nbsp;
                        </th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach($autos as $key => $auto)
                        <tr data-entry-id="{{ $auto->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $auto->id ?? '' }}
                            </td>
                            <!--
                            <td>
                                {{ App\Models\Auto::OWN_RADIO[$auto->own] ?? '' }}
                            </td>-->
                            <td>
                                
                                @can('auto_edit')
                                    <a href="{{ route('admin.autos.edit', $auto->id) }}">
                                        {{ $auto->govnomer ?? '' }}
                                    </a>
                                @endcan
                                
                                
                                
                            </td>
                            <!--<td>
                                {{ $auto->marka ?? '' }}
                            </td>
                            <td>
                                {{ $auto->model ?? '' }}
                            </td>-->
                            <td>
                                {{ App\Models\Auto::TYPE_KUZOV_RADIO[$auto->type_kuzov] ?? '' }}
                            </td>
                            <td>
                                {{ $auto->category_tc ?? '' }}
                            </td>
                            <!--
                            <td>
                                {{ $auto->year_ot ?? '' }}
                            </td>
                            <td>
                                {{ $auto->color ?? '' }}
                            </td>
                            <td>
                                {{ $auto->ecoclass ?? '' }}
                            </td>-->
                            <td>
                                {{ $auto->max_nagruz ?? '' }}
                            </td>
                            <!--<td>
                                {{ $auto->registry ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Auto::KOLO_RADIO[$auto->kolo] ?? '' }}
                            </td>
                            <td>
                                {{ $auto->bakov_volume_2 ?? '' }}
                            </td>
                            <td>
                                {{ $auto->levelco_2 ?? '' }}
                            </td>-->
                            <!--<td>
                                {{ $auto->vnutr_dlina ?? '' }}
                            </td>
                            <td>
                                {{ $auto->vnutr_weight ?? '' }}
                            </td>
                            <td>
                                {{ $auto->vnutr_height ?? '' }}
                            </td>-->
                            <td>
                                {{ $auto->vnutr_kub ?? '' }}
                            </td>
                           <!-- <td>
                                {{ $auto->holod ?? '' }}
                            </td>
                            <td>
                                {{ $auto->temp_ot ?? '' }}
                            </td>
                            <td>
                                {{ $auto->temp_do ?? '' }}
                            </td>
                            <td>
                                {{ $auto->type_tahograf ?? '' }}
                            </td>
                            <td>
                                {{ $auto->fuel ?? '' }}
                            </td>
                            <td>
                                @foreach($auto->typeloads as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($auto->adrs as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                <span style="display:none">{{ $auto->ekmt ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $auto->ekmt ? 'checked' : '' }}>
                            </td>-->
                            <td>
                                {{ $auto->gruzopod ?? '' }}
                            </td>
                           <!-- <td>
                                @can('auto_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.autos.show', $auto->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('auto_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.autos.edit', $auto->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('auto_delete')
                                    <form action="{{ route('admin.autos.destroy', $auto->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('auto_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.autos.massDestroy') }}",
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
  let table = $('.datatable-Auto:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection