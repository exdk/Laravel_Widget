@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
             <div style="display:flex; align-items:center; justify-content: space-between;">
                   <div style="font-size:24px; font-weight:400; margin-left:20px;">Очередь распределения новых заказов</div>    
                   <div>
                        <div style="font-size:12px;">тип распределения</div>
                        <select onchange="change_queue_type($(this).val());" style="padding:5px 10px; font-size:15px;">
                          <option @if($queue_type == 0) selected="selected"  @endif value="0">Всем по очереди из списка</option>
                          <option  @if($queue_type == 1) selected="selected"  @endif value="1">Сначала, тому у кого больше квота</option>
                          <option  @if($queue_type == 2) selected="selected"  @endif value="2">Сначала с самыми низкими ценами</option>
                        </select>  

                        <input onclick="clear_all_queue();" type="button" style=" margin-left:10px; padding:5px 10px; font-size:15px;" class="btn btn-xs btn-danger" value="Очистить нераспределенные">
                       
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
                            Пунт отправки
                        </th>
                        <th>
                            Пункт прибытя
                        </th>
                        <th>
                            Назначеная компания перевозчик
                        </th>
                         <th>
                            Назначеная заявка
                        </th>
                        <th>
                          Дата назанчения
                        </th>
                       
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($queues as $key => $item)
                        <tr data-entry-id="{{ $item['id'] }}">
                            <td>

                            </td>
                            <td>
                                {{ $item['id'] ?? '' }}
                            </td>
                            <td>
                                {{ $item['point_start']['title'] ?? '' }}
                            </td>
                            <td>
                                {{ $item['point_end']['title'] ?? '' }}
                            </td>
                            <td>
                                #{{ $item['transporter_company']['hortname'] }}
                              <div>ИНН: <b>{{ $item['transporter_company']['innkpp'] }}</b></div>
                              
                            </td>
                           
                            <td>
                                 @if($item['lead_id'] != 0) 
                                  #{{ $item['lead_id'] ?? '' }} 
                                 @else
                                  Ожидает назанчения 
                                 @endif
                            </td>
                            <td>
                                {{ $item['updated_at'] ?? '' }}
                            </td>
                           
                            <td>

                        
                                    <!--a class="btn btn-xs btn-info" href="{{ route('admin.quotes-tarifs.edit', $item['id']) }}">
                                        {{ trans('global.edit') }}
                                    </a-->
                      

                                     @if($item['lead_id'] == 0) 
                                    <form action="{{ route('admin.quotes-tarifs.destroy', $item['id']) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                     @endif

                               

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>

function change_queue_type(queue_type){
    $.ajax({
        type: 'GET',
        data: ({'_token':'{{ csrf_token() }}', '_method':'GET', 'queue_type':queue_type }),
        url : "/admin/quotes-tarifs/change-queue-type",
        async: true,
        success: function(response){ 
           if(response == "+"){
                location.reload();
           }
        }
    }); 
    
}

function clear_all_queue(){
    $.ajax({
        type: 'GET',
        data: ({'_token':'{{ csrf_token() }}', '_method':'GET' }),
        url : "/admin/quotes-tarifs/clear-queue",
        async: true,
        success: function(response){ 
           if(response == "+"){
                location.reload();
           }
        }
    }); 
    
}
</script>


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

