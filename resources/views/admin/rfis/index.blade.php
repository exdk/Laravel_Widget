@extends('layouts.admin')
@section('content')

 <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
             <div style="display:flex; align-items:center; justify-content: space-between;">
                   <div style="font-size:24px; font-weight:400; margin-left:20px;">Квалификация RFI</div>    
                   <div>
                        <div class="col-lg-12">
                            <a class="btn btn-success" href="{{ route('admin.rfis.create') }}">
                                {{ trans('global.add') }} {{ trans('cruds.rfi.title_singular') }}
                            </a>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                                {{ trans('global.app_csvImport') }}
                            </button>
                            @include('csvImport.modal', ['model' => 'Rfi', 'route' => 'admin.rfis.parseCsvImport'])
                        </div>
                    </div>
            </div>  
            
        </div>
    </div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Rfi">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.rfi.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.rfi.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.rfi.fields.typetran') }}
                        </th>
                        <th>
                            {{ trans('cruds.rfi.fields.title') }}
                        </th>
                        <th>
                            Клиент
                        </th>
                        <th>
                            {{ trans('cruds.rfi.fields.finish') }}
                        </th>
                        <th>
                            Анкета
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rfis as $key => $rfi)
                        <tr data-entry-id="{{ $rfi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $rfi->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Rfi::STATUS_SELECT[$rfi->status] ?? '' }}
                            </td>
                            <td>
                                @foreach($rfi->typetrans as $key => $item)
                                    <span >{{ $item->type }}</span>
                                @endforeach
                            </td>
                            <td>
                                
                                 {{ $rfi->title ?? '' }}

                            </td>
                            <td>
@php
$uid = $rfi->team_id;
    $role = \DB::table('mycompans')
        ->where('mycompans.team_id','=',$uid)
        ->first();
	if($role){
		echo $role->hortname;
	}
    
@endphp
                            </td>
                            <td>
                                {{ $rfi->finish ?? '' }}
                            </td>
                            <td>
                                {{ $rfi->id_1->title ?? '' }}
                            </td>
                            <td>
                                @can('rfi_show')
                                    <!--a class="btn btn-xs btn-primary" href="{{ route('admin.rfis.show', $rfi->id) }}">
                                        {{ trans('global.view') }}
                                    </a-->
                                @endcan

                                @can('rfi_edit')
                                    <a class="btn btn-xs btn-danger" href="{{ route('admin.rfis.edit', $rfi->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                <div>
                                @isset($rfi->id_1->id)
                                 <a style="margin-top:5px;" class="btn btn-xs btn-info" href="{{ route('admin.formsValues.edit', [$rfi->id_1->id, 'rfi_id' => $rfi->id]) }}">
                                     Пройти анкету
                                </a>
                                @endisset

                                 @isset($rfi->id_1->id)
                                 <a style="margin-top:5px;" class="btn btn-xs btn-primary" href="{{ route('admin.formsValues.results', ['form_id'=>$rfi->id_1->id, 'rfi_id' => $rfi->id]) }}">
                                     Смотреть результаты
                                </a>
                                @endisset
                                </div>

                                @can('rfi_delete')
                                    <form action="{{ route('admin.rfis.destroy', $rfi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('rfi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rfis.massDestroy') }}",
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
  let table = $('.datatable-Rfi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>

@endsection