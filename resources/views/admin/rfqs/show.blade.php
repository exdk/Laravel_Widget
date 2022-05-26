<style>
    .formPartBlockTitle{
        font-size:17px; 
        padding-left:20px; 
        padding-top:10px; 
        padding-bottom:10px; 
        background-color:#eeeeee; 
        border-bottom:solid 1px #dddddd;
    }

    .formPartContiner{
        display:flex; 
        flex-wrap: wrap; 
        align-items: flex-start; 
        justify-content: space-between; 
        padding-bottom:0px; 
        border-bottom:solid 1px #dddddd; 
        padding:20px; 
        padding-bottom:5px; 
        padding-top:10px;
    }

    .formPartContiner.BlockClosed{
        display:none;    
    }

    div.text-danger{
        margin-top:-10px;
        margin-bottom:0px;
    }

    select.formItem{
        border: solid 1px #dddddd; 
        border-radius:5px; 
        font-size:14px; 
        padding:5px 10px; 
        width:100%; 
        display:block; 
    }

    .formPartContiner .form-group{
        width:calc(50% - 20px);    
    }

    .form-control{
        border:solid 1px #dddddd;
    }

    .fomrInsideAddButton{
        padding-left:20px; 
        padding-right:20px; 
        margin-right:10px; 
        font-size:12px; 
        margin-top:25px;
    }

    .formSubmitContainer{
        margin-top:20px; 
        margin-bottom:20px; 
        margin-left:20px;
    }

    .formSubmitContainer .btn{
        padding-left:20px; 
        padding-right:20px; 
        margin-right:10px;
    }

    .formSubmitEditButtonContainer{
        background-color:#dddddd; 
        padding-top:5px; 
        padding-bottom:5px; 
        border-bottom-left-radius: 5px; 
        border-bottom-right-radius: 5px;
    }

    .formSubmitEditButtonContainer .btn{
        padding-left:20px; 
        padding-right:20px; 
        margin-right:10px;
    }

    .buttonStatusChange{
        padding-left:20px; 
        margin-top:10px; 
        padding-right:20px; 
        margin-right:10px; 
        margin-bottom:15px;
    }

    .btn.AcceptButton{
        padding-left:20px; 
        margin-top:22px; 
        padding-right:20px; 
        margin-right:10px; 
        margin-bottom:15px;
    }

    .table-responsive::-webkit-scrollbar {
    width: 15px;
    height:15px;
    background: #dddddd;
}

/* Track */
.table-responsive:-webkit-scrollbar-track {
    background: #011540;
}


/* Handle */
.table-responsive::-webkit-scrollbar-thumb {
    background: #011540;
}

/* Handle on hover */
.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #011540;
}

</style> 
@extends('layouts.admin')
@section('content')

 <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
             <div style="display:flex; align-items:center; justify-content: space-between;">
                   <div style="font-size:24px; font-weight:400; margin-left:20px;">{{ $rfq->title }}</div>    
                  
            </div>  
            
        </div>
    </div>

<div class="card">


    <div class="card-body" style="padding-top:10px; padding-bottom:0px;">
        <div style="width:100%; display:flex; align-items: center; justify-content: flex-start; border-bottom:solid 1px #eeeeee;  padding-bottom:10px;">
            <div style="width:220px; font-size:14px; font-style:italic;">Условия доступа</div>
            <div style="width:300px; font-size:14px; padding-left:20px; font-weight:bold;">{{ $rfq->limited ?? '' }}</div>
        </div>
         <div style="width:100%; display:flex; align-items: center; justify-content: flex-start; border-bottom:solid 1px #eeeeee; padding-top:10px; padding-bottom:10px;">
            <div style="width:220px; font-size:14px; font-style:italic;">Куратор</div>
            <div style="width:300px; font-size:14px; padding-left:20px; font-weight:bold;">{{ $rfq->contact->fio ?? '' }}</div>
        </div>
         <div style="width:100%; display:flex; align-items: center; justify-content: flex-start; border-bottom:solid 1px #eeeeee; padding-top:10px; padding-bottom:10px;">
            <div style="width:220px; font-size:14px; font-style:italic;">Период перевозок</div>
            <div style="width:300px; font-size:14px; padding-left:20px; font-weight:bold;">{{ $rfq->start ?? '' }} до {{ $rfq->finish ?? '' }}</div>
        </div>
         <div style="width:100%; display:flex; align-items: center; justify-content: flex-start; border-bottom:solid 1px #eeeeee; padding-top:10px; padding-bottom:10px;">
            <div style="width:220px; font-size:14px; font-style:italic;">Начало приёма предложений</div>
            <div style="width:300px; font-size:14px; padding-left:20px; font-weight:bold;">{{ $rfq->datestartdogovor ?? '' }}</div>
        </div>
         <div style="width:100%; display:flex; align-items: center; justify-content: flex-start; border-bottom:solid 1px #eeeeee; padding-top:10px; padding-bottom:10px;">
            <div style="width:220px; font-size:14px; font-style:italic;">Окончание приёма предложений</div>
            <div style="width:300px; font-size:14px; padding-left:20px; font-weight:bold;">{{ $rfq->dateenddogovor ?? '' }}</div>
        </div>
         <div style="width:100%; display:flex; align-items: center; justify-content: flex-start; border-bottom:solid 1px #eeeeee; padding-top:10px; padding-bottom:10px;">
            <div style="width:220px; font-size:14px; font-style:italic;">Примечание</div>
            <div style="width:300px; font-size:14px; padding-left:20px; font-weight:bold;">{{ $rfq->desc ?? '' }}</div>
        </div>

        <div style="width:100%; display:flex; align-items: center; justify-content: flex-start; border-bottom:solid 1px #eeeeee; padding-top:10px; padding-bottom:10px;">
            <div style="width:220px; font-size:14px; font-style:italic;">Предполагаемый бюджет</div>
            <div style="width:300px; font-size:14px; padding-left:20px; font-weight:bold;">{{ $total_budget ?? '' }}</div>
        </div>

        <div style="width:100%; display:flex; align-items: center; justify-content: flex-start;padding-top:10px; padding-bottom:10px;">
            <div style="width:220px; font-size:14px; font-style:italic;">Количество лотов</div>
            <div style="width:300px; font-size:14px; padding-left:20px; font-weight:bold;">{{ count($rfq->rfq_routes) ?? '' }}</div>
        </div>
        @can('rfq_create')
        <div style="padding:10px; padding-left:0px; padding-bottom:20px; display:flex; align-items: center; justify-content: flex-start;">
            <button style="font-size:15px; padding:7px 15px;" class="btn btn-xs btn-default"  data-toggle="modal" onclick="get_rfq_edit('{{ route('admin.rfqs.edit', $rfq->id) }}');" data-target="#RfqFrom">
                Редактировать
            </button>
            @if($rfq->status == 0)
            <form method="POST" action='{{ route('admin.rfqs.changeStatus') }}' style="margin-bottom:0px;">
                @method('POST')
                @csrf
                <input type="hidden" name="status" value="1"/>
                <input type="hidden" name="rfq_id" value="{{ $rfq->id }}"/>
                <button type="submit" style="font-size:15px; padding:7px 15px; margin-left:10px;" class="btn btn-xs btn-primary" >
                    Опубликовать
                </button>
            </form>
            @else
                <form method="POST" action='{{ route('admin.rfqs.changeStatus') }}' style="margin-bottom:0px;">
                @method('POST')
                @csrf
                <input type="hidden" name="status" value="0"/>
                <input type="hidden" name="rfq_id" value="{{ $rfq->id }}"/>
                <button type="submit" style="font-size:15px; padding:7px 15px; margin-left:10px;" class="btn btn-xs btn-danger" >
                    Убрать с публикации
                </button>
            </form>
            @endif
        </div>
        @endcan
    </div>

</div>


 <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
             <div style="display:flex; align-items:center; justify-content: space-between;">
                   <div style="font-size:18px; font-weight:400; margin-left:20px;">Лоты</div>    
                  
            </div>  
            
        </div>
    </div>

<div class="card">


    <div class="card-body" style="padding-top:0px; padding-bottom:0px; padding-left:0px; padding-right:0px;">
         <div>
             @cannot('rfq_create')
             <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-refqroute" style="margin-top:0px !important; ">
                <thead>
                    <tr>
                        <th width="10">
                            #
                        </th>
                        <th>
                            Точка старта
                        </th>
                        <th>
                           Точка финиша
                        </th>
                         <th>
                            Целевая ставка
                        </th>
                        <th>
                            Тип транспорта
                        </th>

                        <th>
                            Квота
                        </th>
                        <th>
                            Тариф
                        </th>
                        <th>Место таможенной очистки (DAP/DDP)</th>
                        <th>Код таможенной отчистки</th>
                        <th>Lead-time, количество дней</th>
                        <th>Наименование груза</th>
                        <th>вид упаковки</th>
                        <th>вес груза в каждой упаковке, тонн</th>
                        <th>Объем перевозки ам в месяц</th>
                        <th>Целевой уровень _Otif по доставке КА, % _</th>
                        <th>Срочность %</th>
                         @foreach($rfq_routes[0]->additional_fields as $field)
                            <th>{{ $field->title }}</th>
                        @endforeach
                        @can('rfq_create')
                        <th></th>
                        @endcan
                    </tr>
                </thead>
             @endcannot
                
                @foreach($rfq_routes as $route)
                 @can('rfq_create')
                <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-refqroute" style="margin-top:0px !important; ">
                <thead>
                    <tr>
                        <th width="10">
                            #
                        </th>
                        <th>
                            Точка старта
                        </th>
                        <th>
                           Точка финиша
                        </th>
                         <th>
                            Целевая ставка
                        </th>
                        <th>
                            Тип транспорта
                        </th>
                        <th>
                            Квота
                        </th>
                        <th>
                            Тариф
                        </th>
                        <th>Место таможенной очистки (DAP/DDP)</th>
                        <th>Код таможенной отчистки</th>
                        <th>Lead-time, количество дней</th>
                        <th>Наименование груза</th>
                        <th>вид упаковки</th>
                        <th>вес груза в каждой упаковке, тонн</th>
                        <th>Объем перевозки ам в месяц</th>
                        <th>Целевой уровень _Otif по доставке КА, % _</th>
                        <th>Срочность %</th>
                         @foreach($route->additional_fields as $field)
                            <th>{{ $field->title }}</th>
                        @endforeach
                          @can('rfq_create')
                        <th></th>
                        @endcan
                    </tr>
                </thead>
               
                    <tbody>
                    @endcan   
                      <tr>
                        <td>{{ $route->id }}</td>
                        <td>{{ $route->point_start_info->title }}</td>
                        <td>{{ $route->point_end_info->title }}</td>
                        <td>{{ $route->target_rate }}</td>
                        <td>{{ $cartypes[$route->car_type] }}</td>
                        <td>
                            <div style="position:relative;">
                                    <div style="display:none; background-color:#00264b; padding:5px 10px; font-size:14px; position:absolute; color:#ffffff; bottom:35px; right:0px; border-radius:5px;"></div>
                                    <input type="text" id="quota_{{ $route->id }}" value="0" onchange="change_rfq_route_values({{ $route->id }}, $('#quota_{{ $route->id }}').val(), $('#tarif_{{ $route->id }}').val(), $(this).prev());"  style="padding:7px; width:120px; border:solid 1px #dddddd; background-color:#ffffff; font-size:15px;"/>
                            </div>       
                        </td>
                        <td>
                            <div style="position:relative;">
                                    <div style="display:none; background-color:#00264b; padding:5px 10px; font-size:14px; position:absolute; color:#ffffff; bottom:35px; right:0px; border-radius:5px;"></div>
                                     <input type="text" id="tarif_{{ $route->id }}" value="0" onchange="change_rfq_route_values({{ $route->id }}, $('#quota_{{ $route->id }}').val(), $('#tarif_{{ $route->id }}').val(), $(this).prev());"  style="padding:7px; width:120px; border:solid 1px #dddddd; background-color:#ffffff; font-size:15px;"/>
                            </div>        
                        </td>
                        <td>{{ $route->DAP_DDP }}</td>
                        <td>{{ $route->DAP_DDP_code }}</td>
                        <td>{{ $route->lead_time }}</td>
                        <td>{{ $route->сargo_name }}</td>
                        <td>{{ $route->сargo_package }}</td>
                        <td>{{ $route->сargo_package_weight }}</td>
                        <td>{{ $route->value_per_month }}</td>
                        <td>{{ $route->otif }}</td>
                        <td>{{ $route->urgency }}</td>
                        @foreach($route->additional_fields as $field)
                            <td> 
                                @can('rfq_create')    
                                <div style="position:relative;">
                                    <div style="display:none; background-color:#00264b; padding:5px 10px; font-size:14px; position:absolute; color:#ffffff; bottom:35px; right:0px; border-radius:5px;"></div>
                                    <input type="text" id="additional_field_{{ $field->id }}" value="{{ $field->value }}" onchange="change_rfq_addition_field_values({{ $field->id }}, 'value', $(this).val(), $(this).prev());"  style="padding:7px; width:120px; border:solid 1px #dddddd; background-color:#ffffff; font-size:15px;"/> 
                                </div>
                                @endcan

                                @cannot('rfq_create') 
                                {{ $field->value }}
                                @endcannot

                            </td>
                        @endforeach
                         @can('rfq_create')
                        <td>
                            @can('rfq_create')
                        <button class="btn btn-xs btn-danger" style="font-size:10px; margin-top:5px;" onclick="remove_rfq_route({{ $route->id }});" >
                         удалить
                        </button>
                        @endcan
                         </td>
                         @endcan
                      </tr>
                     @can('rfq_create')
                       </tbody>
            </table>
               </div> 
             <div style="display:none;" id="rfq_route_values_block_{{ $route->id }}" style="margin-bottom:20px; padding-bottom:20px !important;">
                            @can('rfq_create')
                             <script>
                                $(document).ready(function(){
                                    show_route_values({{ $route->id }});
                                });
                             </script>
                             @endcan
                          </div>
                  @endcan
               @endforeach

               @cannot('rfq_create')
                </tbody>
            </table>
               </div> 
               @endcannot

             <div style="margin-top:0px; padding:15px;">
                @can('rfq_create')
              <button class="btn btn-xs btn-primary"  style="font-size:15px; padding:7px 15px;" onclick="$(this).parent().css('display', 'none'); $(this).parent().next().show();">
                     Добавить новый маршрут
                </button>
                @endcan
            </div>
             <div style="display:none;">
             <div style="font-size:16px;padding-left:20px; padding-top:20px; font-weight:bold;">Добавить новый маршрут</div>
            <div class="formPartContiner NewRouteForm" style="padding:20px;">

                <div class="form-group" style=" margin-bottom:10px;">
                    <div><label for="point_start">Начало маршрута</label></div>
                    <select class="formItem form-control select2 {{ $errors->has('contact') ? 'is-invalid' : '' }}" style="width:100%;" name="point_start" id="point_start">
                        @foreach($points as $id => $point)
                            <option value="{{ $point['id'] }}">{{ $point['title'] }}</option>
                        @endforeach
                    </select>
                   
                 
                </div>
                <div class="form-group" style=" margin-bottom:10px;">
                    <div><label for="point_end">Конец маршрута</label></div>
                    <select class="form-control formItem select2 {{ $errors->has('contact') ? 'is-invalid' : '' }}" style="width:100%;" name="point_end" id="point_end">
                        @foreach($points as $id => $point)
                            <option value="{{ $point['id'] }}">{{ $point['title'] }}</option>
                        @endforeach
                    </select>
                   
                 
                </div>

                 <div class="form-group" style=" margin-bottom:10px;">
                    <label for="transport_canweight">Целевая ставка</label>
                    <input class="form-control" oninput="$(this).next().fadeOut(500); type="text"  id="target_rate" require="true" value="">
                     <div class="text-danger" style="display:none;">Ошибка заполнения</div>
                 
                </div>

                 <div class="form-group" style="width:calc(50% - 20px); margin-bottom:10px;">
                    <label for="transport_type_id">Тип ТС</label>
                    <select name="car_type_id"  id="car_type_id" class="formItem">
                        <option  value="0">Тент</option>
                        <option  value="1">Изотерм</option>
                        <option  value="2">Термос</option>
                    </select>    
                     <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>

                <div class="form-group" style=" margin-bottom:10px;">
                    <label for="transport_canweight">Тоннаж ТС, т</label>
                    <input class="form-control" oninput="$(this).next().fadeOut(500);" type="text"  id="car_canweight" require="true" value="">
                     <div class="text-danger" style="display:none;">Ошибка заполнения</div>
                 
                </div>
                 <div class="form-group" style=" margin-bottom:10px;">
                    <label for="gruz_value">Объем ТС, м.кв.</label>
                    <input class="form-control" oninput="$(this).next().fadeOut(500);  type="text"  id="car_value" require="true" value="">
                     <div class="text-danger" style="display:none;">Ошибка заполнения</div>
                 
                </div>
                <div class="form-group" style=" margin-bottom:10px;">
                    <label for="gruz_value">Место таможенной очистки (DAP/DDP)</label>
                    <input class="form-control"  type="text"  id="DAP_DDP" require="true" value="">
                     <div class="text-danger" style="display:none;">Ошибка заполнения</div>
                 
                </div>

                 <div class="form-group" style=" margin-bottom:10px;">
                    <label for="gruz_value">Код таможенной отчистки</label>
                    <input class="form-control" oninput="$(this).next().fadeOut(500);  type="text"  id="DAP_DDP_code" require="true" value="">
                     <div class="text-danger" style="display:none;">Ошибка заполнения</div>
                 
                </div>

                 <div class="form-group" style=" margin-bottom:10px;">
                    <label for="gruz_value">Lead-time, количество дней</label>
                    <input class="form-control" oninput="$(this).next().fadeOut(500);  type="text"  id="lead_time" require="true" value="">
                     <div class="text-danger" style="display:none;">Ошибка заполнения</div>
                 
                </div>


                <div class="form-group" style=" margin-bottom:10px;">
                    <label for="gruz_value">Наименование груза</label>
                    <input class="form-control" oninput="$(this).next().fadeOut(500);  type="text"  id="сargo_name" require="true" value="">
                     <div class="text-danger" style="display:none;">Ошибка заполнения</div>
                 
                </div>

                <div class="form-group" style=" margin-bottom:10px;">
                    <label for="gruz_value">Вид упаковки</label>
                    <input class="form-control" oninput="$(this).next().fadeOut(500);  type="text"  id="сargo_package" require="true" value="">
                     <div class="text-danger" style="display:none;">Ошибка заполнения</div>
                 
                </div>

                <div class="form-group" style=" margin-bottom:10px;">
                    <label for="gruz_value">Вес груза в каждой упаковке, тонн</label>
                    <input class="form-control"  oninput="$(this).next().fadeOut(500); type="text"  id="сargo_package_weight" require="true" value="">
                    <div class="text-danger" style="display:none;">Ошибка заполнения</div>
                 
                </div>

                <div class="form-group" style=" margin-bottom:10px;">
                    <label for="gruz_value">Объем перевозки ам в месяц</label>
                    <input class="form-control" oninput="$(this).next().fadeOut(500);  type="text"  id="value_per_month" require="true" value="">
                     <div class="text-danger" style="display:none;">Ошибка заполнения</div>
                 
                </div>

                <div class="form-group" style=" margin-bottom:10px;">
                    <label for="gruz_value">Целевой уровень _Otif по доставке КА, % _</label>
                    <input class="form-control" oninput="$(this).next().fadeOut(500);  type="text"   id="otif" require="true" value="">
                     <div class="text-danger" style="display:none;">Ошибка заполнения</div>
                 
                </div>

                <div class="form-group" style=" margin-bottom:10px;">
                    <label for="gruz_value">Срочность %</label>
                    <input class="form-control" oninput="$(this).next().fadeOut(500);  type="text"  id="urgency" require="true" value="">
                    <div class="text-danger" style="display:none;">Ошибка заполнения</div>
                 
                </div>



                 <div class="form-group" style="margin-top:20px;" >
                    <button onclick="add_rfq_route( {{ $rfq->id }} , $('#point_start').val(), $('#point_end').val(), $('#car_type_id').val(), $('#car_canweight').val(), $('#car_value').val(), $('#DAP_DDP').val(), $('#DAP_DDP_code').val(), $('#lead_time').val(), $('#сargo_name').val(), $('#сargo_package').val(), $('#сargo_package_weight').val(), $('#value_per_month').val(), $('#otif').val(), $('#urgency').val(), $('#target_rate').val()  );" type="button" class="btn btn-danger"> + Добавить маршрут </button>
                </div>
            </div>
        </div>

        
    </div>

</div>

<!-- The Modal -->
<div class="modal fade" id="RfqFrom">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">RFQ</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="RfqFormContent" style="padding:0px;">
        ---
      </div>

     

    </div>
  </div>
</div>
@can('rfq_create')
<script>
    (function() {
      Dropzone.autoDiscover = false;

     })();

    function add_rfq_route( rfq_id, point_start, point_end, car_type, car_canweight, car_canvalue, DAP_DDP, DAP_DDP_code, lead_time, сargo_name, сargo_package, сargo_package_weight, value_per_month, otif, urgency, target_rate){
            var error_validation = false;
            $('.NewRouteForm input').each(function(index){
                if($(this).val().length < 1){
                    $(this).next().fadeIn(500);
                    error_validation = true;
                }else{
                    $(this).next().fadeOut(500);
                }
            });

            if(error_validation == false){
                $.ajax({
                    type: 'POST',
                    data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'rfq_id':rfq_id, 'point_start':point_start, 'point_end':point_end, 'car_type':car_type, 'car_canweight':car_canweight, 'car_canvalue':car_canvalue, 'DAP_DDP':DAP_DDP, 'DAP_DDP_code':DAP_DDP_code, 'lead_time':lead_time, 'сargo_name':сargo_name, 'сargo_package':сargo_package, 'сargo_package_weight':сargo_package_weight, 'value_per_month':value_per_month, 'otif':otif, 'urgency':urgency, 'target_rate':target_rate  }),
                    url : '{{ route('admin.rfqs.addRfqRoute') }}',
                    async: true,
                    success: function(response){ 
                       if(response == "+"){
                            location.reload();
                       }
                    }
                }); 
            }
    
    } 

function remove_rfq_route(rfqr_id){
   
    $.ajax({
        type: 'POST',
        data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'rfqr_id':rfqr_id }),
        url : '{{ route('admin.rfqs.removeRfqRoute') }}',
        async:  true,
        success: function(response){ 
           if(response == "+"){
                location.reload();
           }
        }
    }); 
    
} 

 function get_rfq_edit(url){
    $('#RfqFormContent').html('---');
    $.ajax({
        type: 'GET',
        data: ({}),
        url : url,
        async: true,
        success: function(response){ 
            $('#RfqFormContent').html(response);

            
            $('.datetime').datetimepicker({
              format: 'DD.MM.YYYY HH:mm:ss',
              locale: 'en',
              icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
              }
            });

             $('.date').datetimepicker({
              format: 'DD.MM.YYYY',
              locale: 'en',
              icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
              }
            });
              var uploadedApplicationsMap = {}
              myDropzone = new Dropzone('div#applications-dropzone', {
                  url: '{{ route('admin.rfqs.storeMedia') }}',
                  maxFilesize: 2, // MB
                  addRemoveLinks: true,
                  headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                  },
                  params: {
                    size: 2
                  },
                  success: function (file, response) {
                    $('form').append('<input type="hidden" name="applications[]" value="' + response.name + '">')
                    uploadedApplicationsMap[file.name] = response.name
                  },
                  removedfile: function (file) {
                    file.previewElement.remove()
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                      name = file.file_name
                    } else {
                      name = uploadedApplicationsMap[file.name]
                    }
                    $('form').find('input[name="applications[]"][value="' + name + '"]').remove()
                  },
                  init: function () {
                    /*  @if(isset($rfq) && $rfq->applications)
                                var files =
                                  {!! json_encode($rfq->applications) !!}
                                    for (var i in files) {
                                    var file = files[i]
                                    this.options.addedfile.call(this, file)
                                    file.previewElement.classList.add('dz-complete')
                                    $('form').append('<input type="hidden" name="applications[]" value="' + file.file_name + '">')
                                  }
                      @endif */
                  },
                   error: function (file, response) {
                       if ($.type(response) === 'string') {
                           var message = response //dropzone sends it's own error messages in string
                       } else {
                           var message = response.errors.file
                       }
                       file.previewElement.classList.add('dz-error')
                       _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                       _results = []
                       for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                           node = _ref[_i]
                           _results.push(node.textContent = message)
                       }

                       return _results
                   }
              });

        }
    }); 
}

function add_visibility(rfq_id, company_id, item_type, user_id, rfq_edit_url="-"){
   
    $.ajax({
        type: 'POST',
        data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'rfq_id':rfq_id, 'company_id':company_id, 'user_id':user_id }),
        url : '{{ route('admin.rfqs.addVisibility') }}',
        async:  true,
        success: function(response){ 
           if(response == "+"){
                if(rfq_edit_url != "-"){
                  get_rfq_edit(rfq_edit_url)
                }else{
                  location.reload();
                }
                
           }
        }
    }); 
    
} 

function delete_visibility(visibility_id){
   
    $.ajax({
        type: 'POST',
        data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'visibility_id':visibility_id }),
        url : '{{ route('admin.rfqs.removeVisibility') }}',
        async:  true,
        success: function(response){ 
           if(response == "+"){
                //location.reload();
           }
        }
    }); 
    
} 


function change_rfq_route_values(rfq_route_id, quota, tarif, result_container){
   result_container.fadeIn(500);
    result_container.html('<img src="/inn/img/loading.gif"/>');
    $.ajax({
        type: 'POST',
        data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'rfq_route_id':rfq_route_id, 'quota':quota, 'tarif':tarif }),
        url : '{{ route('admin.rfqs.saveRouteValue') }}',
        async:  true,
        success: function(response){ 
             if(response == "+"){
                result_container.html('Сохраненно');
                setTimeout(() => {
                  result_container.fadeOut(500);
                }, "3000");
           }else{
                result_container.html('Ошибка при сохранении данных...');
           }
        }
    }); 
    
} 

function change_rfq_addition_field_values(route_field_id, name, value, result_container){
    result_container.fadeIn(500);
    result_container.html('<img src="/inn/img/loading.gif"/>');
    $.ajax({
        type: 'POST',
        data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'route_field_id':route_field_id, 'name':name, 'value':value }),
        url : '{{ route('admin.rfqs.changeRouteAdditionalFields') }}',
        async:  true,
        success: function(response){ 
           if(response == "+"){
                result_container.html('Сохраненно');
                setTimeout(() => {
                  result_container.fadeOut(500);
                }, "3000");
           }else{
                result_container.html('Ошибка при сохранении данных...');
           }
        }
    }); 
}

function show_route_values(rfq_route_id, rfq_sort_type = 0){
    $('#rfq_route_values_block_'+rfq_route_id).fadeIn(500);
    $.ajax({
        type: 'POST',
        data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'rfq_route_id':rfq_route_id, 'rfq_route_sort_type':rfq_sort_type }),
        url : '{{ route('admin.rfqs.showRouteValues') }}',
        async:  true,
        success: function(response){ 
           $('#rfq_route_values_block_'+rfq_route_id).html(response);
        }
    }); 
    
} 

function add_rfq_route_field(rfq_id, title, rfq_edit_url="-"){
    $.ajax({
        type: 'POST',
        data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'rfq_id':rfq_id, 'title':title }),
        url : '{{ route('admin.rfqs.addRouteAdditionalFields') }}',
        async:  true,
        success: function(response){ 
           if(response == "+"){
                if(rfq_edit_url != "-"){
                  get_rfq_edit(rfq_edit_url)
                }else{
                  location.reload();
                }
                
           }
        }
    }); 
}

function delete_rfq_route_field(rfq_route_field_id){
   
    $.ajax({
        type: 'POST',
        data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'rfq_route_field_id':rfq_route_field_id }),
        url : '{{ route('admin.rfqs.removeRouteAdditionalFields') }}',
        async:  true,
        success: function(response){ 
           if(response == "+"){
                //location.reload();
           }
        }
    }); 
    
} 


</script>   
@endcan
@endsection