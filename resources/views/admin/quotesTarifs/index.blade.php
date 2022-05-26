@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
             <div style="display:flex; align-items:center; justify-content: space-between;">
                   <div style="font-size:24px; font-weight:400; margin-left:20px;">Матрицы</div>    
                   <div>
                        
                        <a class="btn btn-success" href="{{ route('admin.quotes-tarifs.create') }}">
                            {{ trans('global.add') }} Добавить
                        </a>           
          
                       
                    </div>
            </div>  
            
        </div>
    </div>

<div class="card">

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Adr">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            #
                        </th>
                        <th>
                            Дата начала
                        </th>
                        <th>
                            Дата заврешения
                        </th>
                        <th>
                            Город начала
                        </th>
                         <th>
                            Город завершения
                        </th>
                        <th>
                            Тариф
                        </th>
                        <th>
                            Квота
                        </th>
                        <th>
                            Kpi
                        </th>
                         <th>
                            Компания
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotesTarifs as $key => $quoteTarif)
                        <tr data-entry-id="{{ $quoteTarif['id'] }}">
                            <td>

                            </td>
                            <td>
                                {{ $quoteTarif['id'] ?? '' }}
                            </td>
                            <td>
                                {{ $quoteTarif['date_start'] ?? '' }}
                            </td>
                            <td>
                                {{ $quoteTarif['date_end'] ?? '' }}
                            </td>
                            <td>
                                {{ $quoteTarif['pl_title'] ?? '' }}<br/>
                                {{ $quoteTarif['pl_gorod'] ?? '' }}
                            </td>
                            <td>
                                {{ $quoteTarif['pe_title'] ?? '' }}<br/>
                                {{ $quoteTarif['pe_gorod'] ?? '' }}
                            </td>
                            <td>
                                {{ $quoteTarif['price'] ?? '' }} 
                            </td>
                            <td>
                                {{ $quoteTarif['quota'] ?? '' }}
                            </td>
                            <td>
                                {{ $quoteTarif['kpi'] ?? '' }}
                            </td>
                            <td>
                                {{ $quoteTarif['company_id'] ?? '' }}
                            </td>
                            <td>

                        
                                    <!--a class="btn btn-xs btn-info" href="{{ route('admin.quotes-tarifs.edit', $quoteTarif['id']) }}">
                                        {{ trans('global.edit') }}
                                    </a-->
                      

                              
                                    <form action="{{ route('admin.quotes-tarifs.destroy', $quoteTarif['id']) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                              

                               

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
@can('adr_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.adrs.massDestroy') }}",
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
  let table = $('.datatable-Adr:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection