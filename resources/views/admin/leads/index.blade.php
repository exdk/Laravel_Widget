@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
             <div style="display:flex; align-items:center; justify-content: space-between;">
                   <div style="font-size:24px; font-weight:400; margin-left:20px;">Заявки</div>    
                   <div>
                        <button type="button" style="padding-left:20px; padding-right:20px; margin-right:10px;"  class="btn btn-primary" data-toggle="modal" onclick="get_lead_create();" data-target="#LeadForm"> +  Добавить </button>
                        <!--a class="btn btn-success" href="{{ route('admin.rfqs.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.rfq.title_singular') }}
                        </a-->           
          
                        <button style="margin-right:15px;" class="btn btn-default" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                         @include('csvImport.modalz', ['model' => 'Leads', 'route' => 'admin.leads.parseCsvImport'])
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
                          Статус
                        </th>
                        <th>
                          Дата погрузки
                        </th>
                        <th>
                          Название компании - Старт
                        </th>
                        <th>
                          Город - Старт
                        </th>
                        <th>
                          Город - Место назначения
                        </th>
                        <th>
                          Название компании - Место назначения
                        </th>  
                        <th>
                          Справочная цена перевозки
                        </th>
                        <th>
                          Валюта оговоренной цены перевозки
                        </th>
                        <th>
                          Номера поставки
                        </th>
                          <th>
                          ID-Поставки
                        </th>
                        <th>
                          Грузоотправитель
                        </th>
                        <th>
                          Диспетчер грузоотправителя
                        </th>
                        <th>
                          Диспетчер перевозчика
                        </th>
                        <th>
                          Крайний срок
                        </th>
                        <th>
                          Период загрузки
                        </th>
                        <th>
                          Дата разгрузки
                        </th>
                        <th>
                          Период разгрузки
                        </th>
                        <th>
                          Почтовый индекс - Старт
                        </th>
                        <th>
                          Комментарий - Старт
                        </th>
                        <th>
                          Тип предложения
                        </th>

                        <th>
                          Предложение
                        </th>
                        <th>
                          Валюта предложения
                        </th>
                        <th>
                          Способ назначения
                        </th>
                        <th>
                          Комментарии к предложению
                        </th>
                        <th >
                          Груз
                        </th>
                         <th style="min-width:200px;">
                          Перевозчик - компания
                        </th>
                        <th>
                          Перевозчик - водитель
                        </th>
                        <th>
                          Перевозчик - авто
                        </th>
                        <th>

                        </th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($leads as $key => $lead)
                        <tr data-entry-id="{{ $lead['id'] }}" >

                            <td>

                            </td>

                            <td style="position:relative; ">
                                <div style="font-size:14px; font-weight:bold; padding-left:10px; margin-bottom:10px; font-weight:bold;">#{{ $lead['id'] ?? '' }}</div>
                                <div style="height: 100%;">
                                 <button class="btn btn-xs btn-primary" data-toggle="modal" onclick="get_lead_edit('{{ route('admin.leads.edit', $lead['id']) }}');" data-target="#LeadEditForm">
                                        {{ trans('global.edit') }}
                                    </button><br/>
                              
                                    <button style="margin-top:5px;" class="btn btn-xs btn-info" data-toggle="modal" onclick="$('#LeadHistoryIdInfo').html('{{ $lead['id'] }}'); get_lead_history('{{ route('admin.leads.history', ['lead_id'=>$lead['id']]) }}');" data-target="#LeadHistory">
                                        История
                                    </button><br/>
                                    @if($lead['status'] != 12)
                                    <button style="margin-top:5px;" class="btn btn-xs btn-danger"  onclick="cancel_transport_company({{ $lead['id'] }}, -1);">
                                        Отменить
                                    </button>
                                    @endif
                                   
                              </div>
                                
                            </td>

                             <td>
                              @if($lead['status'] == 0)
                                <div style="margin-bottom:5px; font-weight:bold; ">Опубликовано</div>
                              @elseif($lead['status'] == 1)  
                                <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Подтверждена транспортной</div>
                              @elseif($lead['status'] == 2) 
                                <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Назначена Транспортная</div>
                                <button onclick="change_quote_status({{ $lead['id'] }}, 3);" type="button" style="padding-left:20px; margin-top:10px; font-size:13px; padding-right:20px; margin-right:10px; margin-bottom:15px;"  class="btn btn-primary"> + Въезд на погрузки </button>
                              @elseif($lead['status'] == 3) 
                                <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Въезд на территорию погрузки</div>
                                <button onclick="change_quote_status({{ $lead['id'] }}, 4);" type="button" style="padding-left:20px; margin-top:10px; font-size:13px; padding-right:20px; margin-right:10px; margin-bottom:15px;"  class="btn btn-primary"> + Загрузка </button>
                              @elseif($lead['status'] == 4) 
                                <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Загрузка</div>
                                <button onclick="change_quote_status({{ $lead['id'] }}, 5);" type="button" style="padding-left:20px; margin-top:10px; font-size:13px; padding-right:20px; margin-right:10px; margin-bottom:15px;"  class="btn btn-primary"> + Выезд с погрузки </button>
                              @elseif($lead['status'] == 5) 
                                <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Покинул территорию погрузки</div>
                                <button onclick="change_quote_status({{ $lead['id'] }}, 6);" type="button" style="padding-left:20px; margin-top:10px; font-size:13px; padding-right:20px; margin-right:10px; margin-bottom:15px;"  class="btn btn-primary"> + В пути </button>
                              @elseif($lead['status'] == 6) 
                                <div style="margin-bottom:5px; line-height:1; font-weight:bold;">В пути</div>
                                <button onclick="change_quote_status({{ $lead['id'] }}, 7);" type="button" style="padding-left:20px; margin-top:10px; font-size:13px; padding-right:20px; margin-right:10px; margin-bottom:15px;"  class="btn btn-primary"> + Въезд на загрузку </button>

                              @elseif($lead['status'] == 7) 
                                <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Въезд на территорию выгрузки</div>
                                <button onclick="change_quote_status({{ $lead['id'] }}, 8);" type="button" style="padding-left:20px; margin-top:10px; font-size:13px; padding-right:20px; margin-right:10px; margin-bottom:15px;"  class="btn btn-primary"> + Выгрузка  </button>

                              @elseif($lead['status'] == 8) 
                              <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Выгрузка</div>
                                <button onclick="change_quote_status({{ $lead['id'] }}, 9);" type="button" style="padding-left:20px; margin-top:10px; font-size:13px; padding-right:20px; margin-right:10px; margin-bottom:15px;"  class="btn btn-primary"> + Выезд с погрузки </button>

                              @elseif($lead['status'] == 9) 
                              <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Покинул территорию выгрузки </div>
                                <button onclick="change_quote_status({{ $lead['id'] }}, 10);" type="button" style="padding-left:20px; margin-top:10px; font-size:13px; padding-right:20px; margin-right:10px; margin-bottom:15px;"  class="btn btn-primary"> + Документы получены </button>

                              @elseif($lead['status'] == 10) 
                              <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Документы получены</div>
                                <button onclick="change_quote_status({{ $lead['id'] }}, 11);" type="button" style="padding-left:20px; margin-top:10px; font-size:13px; padding-right:20px; margin-right:10px; margin-bottom:15px;"  class="btn btn-primary"> + Заявка оплачена </button>

                              @elseif($lead['status'] == 11) 
                                <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Заявка оплачена</div>
                               
                              @elseif($lead['status'] == 12) 
                                <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Отмененно</div>
                               
                              @endif

                              
                            </td>
                            <td >
                              {{ \Carbon\Carbon::parse($lead['date_start'])->format('d/m/Y')}}
                            
                            </td>
                            <td>
                              {{ $lead['point_start']['title'] ?? '' }}
                            </td>
                            <td>
                              {{ $lead['point_start']['gorod'] ?? '' }}
                            </td>
                             <td>
                              {{ $lead['point_end']['gorod'] ?? '' }}
                            </td>
                            <td>
                              {{ $lead['point_start']['title'] ?? '' }}
                            </td>
                            <td>
                              0
                            </td>
                            <td>
                              РУБ
                            </td>
                            <td>
                              {{ $lead['postavka_number'] }}
                              
                            </td>
                            <td>
                              {{ $lead['postavka_id'] }}
                            </td>
                            <td>
                              #@if(isset($lead['gruz_company']['hortname'])){{ $lead['gruz_company']['hortname'] }} @endif
                              <div>ИНН: <b>@if(isset($lead['gruz_company']['innkpp'])){{ $lead['gruz_company']['innkpp'] }} @endif</b></div>
                            </td>
                            <td>
                              @isset($lead['gruz_company_dispatcher']['surname']) {{ $lead['gruz_company_dispatcher']['surname'] }} {{ $lead['gruz_company_dispatcher']['name'] }} {{ $lead['gruz_company_dispatcher']['oth'] }}
                              <div sltyle="width:bold;">{{ $lead['gruz_company_dispatcher']['mobile'] }}</div>
                              @endisset
                            </td>
                            <td>
                              ---
                            </td>
                            <td>
                              ---
                            </td>
                            <td>
                              {{ $lead['loading_time'] }}
                            </td>

                            <td>
                             {{ \Carbon\Carbon::parse($lead['date_end'])->format('d/m/Y')}}
                            </td>

                            <td>
                             {{ $lead['unloading_time'] }}
                            </td>
                            <td>
                              ---
                            </td>
                             <td>
                              {{ $lead['comment'] }}
                            </td>

                            <td>
                              ---
                            </td>
                            <td>
                              0
                            </td>
                            <td>
                              РУБ
                            </td>
                             <td>
                              ---
                            </td>
                            <td>
                              ---
                            </td>

                            <td>
                              {{ $lead['gruz_title'] }}<br/>{{ $lead['gruz_package'] }}<br/>{{ $lead['gruz_weight'] }} т. , {{ $lead['gruz_value'] }}м<sup>3</sup>
                            </td>
                            <td>
                              @if($lead['status'] == 0)
                              <div style="margin-bottom:5px; font-weight:bold; margin-left:10px;">Не выбрано</div>
                              
                              <button onclick="get_lead_edit('{{ route('admin.leads.edit', $lead['id']) }}');" data-toggle="modal" data-target="#LeadEditForm" class="btn btn-xs btn-primary" style="text-align: left;    line-height: 1.2;    padding-top: 5px;    padding-bottom: 5px;">
                                   Выбрать<br/>траспортную компанию
                                </button>
                               @elseif($lead['status'] > 0)
                               
                               <div style="margin-bottom:5px; line-height:1; font-weight:bold; margin-left:10px;">@isset($lead['transport_comapny']['hortname']) {{ $lead['transport_comapny']['hortname'] }}  <div>ИНН: <b>{{ $lead['transport_comapny']['innkpp'] }}</b></div> @endisset</div>
                                  @if($lead['status'] == 1)
                                    <button onclick="get_lead_edit('{{ route('admin.leads.edit', $lead['id']) }}');" data-toggle="modal" data-target="#LeadEditForm" class="btn btn-xs btn-primary" style="text-align: left;    line-height: 1.2;    padding-top: 5px; margin-left:10px;    padding-bottom: 5px;">
                                   Утвердить
                                    </button>
                                  @elseif(($lead['status'] > 1)&&($lead['status'] != 12))
                                    <button onclick="cancel_transport_company({{ $lead['id'] }});" class="btn btn-xs btn-danger" style="text-align: left;    line-height: 1.2;    padding-top: 5px; margin-left:10px;    padding-bottom: 5px;">
                                        Отменить перевозчика
                                    </button>
                                  @endif
                            @endif
                            </td>
                            <td>
                               <div style="margin-bottom:5px; line-height:1; font-weight:bold; margin-left:10px;">@isset($lead['driver']['fam']) {{ $lead['driver']['fam'] }} {{ $lead['driver']['name'] }} {{ $lead['driver']['oth'] }} @endisset</div>
                            </td>
                            <td>
                              <div style="margin-bottom:5px; line-height:1; font-weight:bold; margin-left:10px;">@isset($lead['avto']['model']) {{ $lead['avto']['model'] }} {{ $lead['avto']['marka'] }} @endisset</div>
                            </td>
                             
                           
                            <td>
                               <button class="btn btn-xs btn-primary" data-toggle="modal" onclick="get_lead_edit('{{ route('admin.leads.edit', $lead['id']) }}');" data-target="#LeadEditForm">
                                        {{ trans('global.edit') }}
                                    </button><br/>
                              
                                    <button style="margin-top:5px;" class="btn btn-xs btn-info" data-toggle="modal" onclick="$('#LeadHistoryIdInfo').html('{{ $lead['id'] }}'); get_lead_history('{{ route('admin.leads.history', ['lead_id'=>$lead['id']]) }}');" data-target="#LeadHistory">
                                        История
                                    </button><br/>
                                
                                    <form action="{{ route('admin.leads.destroy', $lead['id']) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block; margin-top:5px;">
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

<!-- The Modal -->
<div class="modal fade" id="LeadForm">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="line-height:1;">Добаление заявки на перевозку</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="leadFormContent" style="padding:0px;">
        ---
      </div>

      <!-- Modal footer 
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
      </div>
--> 
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="LeadEditForm">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="line-height:1;">Редактирование заявки</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="leadEditFormContent" style="padding:0px;">
        ---
      </div>

      <!-- Modal footer 
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
      </div>
--> 
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="LeadHistory">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="line-height:1;">История изменений заявки (#<span id="LeadHistoryIdInfo"></span>)</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="leadHisotryContent" style="padding:0px;">
        ---
      </div>

      <!-- Modal footer 
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
      </div>
--> 
    </div>
  </div>
</div>


<script>
  function get_lead_create(){
    $.ajax({
        type: 'GET',
        data: ({}),
        url : "{{ route('admin.leads.create') }}",
        async: true,
        success: function(response){ 
            $('#leadFormContent').html(response);
            $('.time').mask('99:99');
            $('#date_start').datetimepicker({
              format: 'DD.MM.YYYY',
              locale: 'en',
              icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
              }
            });

            $('#date_end').datetimepicker({
              format: 'DD.MM.YYYY',
              locale: 'en',
              icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
              }
            });
        }
    }); 
}

  function get_lead_edit(url){
    $.ajax({
        type: 'GET',
        data: ({}),
        url : url,
        async: true,
        success: function(response){ 
            $('#leadEditFormContent').html(response);
            $('.time').mask('99:99');
            $('#date_start').datetimepicker({
              format: 'DD.MM.YYYY',
              locale: 'en',
              icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
              }
            });

            $('#date_end').datetimepicker({
              format: 'DD.MM.YYYY',
              locale: 'en',
              icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
              }
            });

        }
    }); 
}

  function get_lead_history(url){
    $.ajax({
        type: 'GET',
        data: ({}),
        url : url,
        async: true,
        success: function(response){ 
            $('#leadHisotryContent').html(response);
        }
    }); 
}

function change_quote_status(lead_id, status){
   
    $.ajax({
        type: 'POST',
        data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'lead_id':lead_id, 'status':status }),
        url : "{{ route('admin.leads.changeQuoteStatus') }}",
        async: true,
        success: function(response){ 
           if(response == "+"){
                location.reload();
           }
        }
    }); 
    
}

function cancel_transport_company(lead_id, create_dublicate = 0){
    $.ajax({
            type: 'POST',
            data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'lead_id':lead_id, 'transport_company_id':create_dublicate, 'driver_id':0, 'avto_id':0 }),
            url : "{{ route('admin.leads.attachTransportCompany') }}",
            async: true,
            success: function(response){ 
                location.reload();
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