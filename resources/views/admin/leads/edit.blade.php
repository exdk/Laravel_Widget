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
</style> 
<div class="row">
    <div class="col-12">
        <form method="POST" action="{{ route("admin.leads.update", $lead['id']) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="{{ $lead['status'] ?? '' }}"/>
                <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); }else{ $(this).next().slideUp(500); }" class="formPartBlockTitle">Общее</div>
                <div class="formPartContiner BlockClosed">
                    <div class="form-group">
                        <label for="postavka_id">ID поставки</label>
                        <input class="form-control" type="text" name="postavka_id" id="postavka_id" value="{{ $lead['postavka_id'] ?? '' }}">
                        <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                     
                    </div>

                    <div class="form-group">
                        <label for="postavka_number">Номер поставки</label>
                        <input class="form-control"  type="text" name="postavka_number" id="postavka_number" value="{{ $lead['postavka_number'] ?? '' }}">
                     
                            <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                     
                    </div>
                    <div class="form-group">
                        <label for="perevoz_type">Тип перевозки</label>
                        <select name="perevoz_type"  id="perevoz_type" class="formItem" >
                            <option @if ($lead['perevoz_type'] == 0) selected="selected" @endif value="0">Межсклад</option>
                            <option @if ($lead['perevoz_type'] == 1) selected="selected" @endif value="1">Город</option>
                            <option @if ($lead['perevoz_type'] == 2) selected="selected" @endif value="2">Регион</option>
                        </select>
                     
                            <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                     
                    </div>
                </div>

                            
           

            <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); }else{ $(this).next().slideUp(500); }" class="formPartBlockTitle">Грузоотправитель</div>

            <div class="formPartContiner BlockClosed">
                <div class="form-group" >
                    <label for="gruz_company_id">Грузоотправитель (компания)</label>
                    <select name="gruz_company_id"  id="gruz_company_id" class="formItem">
                         <option @if ($lead['gruz_company_id'] == 0) selected="selected" @endif value="0">Не выбрано</option>
                         @foreach ($companies as $company)
                        <option @if ($lead['gruz_company_id'] == $company['id']) selected="selected" @endif value="{{ $company['id'] }}">{{ $company['hortname'] }}</option>
                        @endforeach
                    </select>
                 
                        <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>
                <div class="form-group" >
                    <label for="gruz_company_dispatcher">Диспетчер грузоотправителя</label>
                    <select name="gruz_company_dispatcher"  id="gruz_company_dispatcher" class="formItem">
                        <option @if ($lead['gruz_company_dispatcher'] == 0) selected="selected" @endif value="0">Не выбрано</option>
                        @foreach ($users as $user)
                        <option @if ($lead['gruz_company_dispatcher'] == $user['id']) selected="selected" @endif value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                        @endforeach
                    </select>
                 
                        <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>

                
            </div>


            <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); }else{ $(this).next().slideUp(500); }" class="formPartBlockTitle">Пункт загрузки</div>

             <div class="formPartContiner BlockClosed">
                <div class="form-group" >
                    <label for="point_start">Пункт планирования</label>
                    <select name="point_start"  id="point_start" class="formItem">
                        @foreach ($pointloads as $point)
                        <option @if ($lead['point_start'] == $point['id']) selected="selected" @endif value="{{ $point['id'] }}">{{ $point['title'] }} ({{ $point['gorod'] }} {{ $point['zip'] }})</option>
                        @endforeach
                    </select>
                 
                       
                 
                </div>

                <div class="form-group" style="width:calc(50% - 20px);">
                   <button type="button"  class="btn btn-primary fomrInsideAddButton" onclick="document.location='{{ route('admin.pointloads.create') }}';" > +  Добавить пункт планирования</button>
                 
                </div>
           
                <div class="form-group" style="width:calc(50% - 20px);">
                    <label for="date_start">Дата загрузки</label>
                    <input class="form-control" style="border:solid 1px #dddddd;" type="text" name="date_start" id="date_start" value="{{ $lead['date_start'] ?? '' }}">
                        <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                </div>
                 <div class="form-group" style="width:calc(50% - 20px);">
                    <label for="date_start">Время на загрузку</label>
                    <input class="form-control time" style="border:solid 1px #dddddd;" type="text" name="loading_time" id="loading_time" value="{{ $lead['loading_time'] ?? '' }}">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div> 

                
            </div>

            <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); }else{ $(this).next().slideUp(500); }" class="formPartBlockTitle">Пункт выгрузки</div>

             <div class="formPartContiner BlockClosed">
                <div class="form-group" >
                    <label for="point_end">Пункт выгрузки</label>
                    <select name="point_end"  id="point_end" class="formItem">
                        @foreach ($pointloads as $point)
                        <option @if ($lead['point_end'] == $point['id']) selected="selected" @endif value="{{ $point['id'] }}">{{ $point['title'] }} ({{ $point['gorod'] }} {{ $point['zip'] }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" >
                   <button type="button" class="btn btn-primary fomrInsideAddButton" onclick="document.location='{{ route('admin.pointloads.create') }}';" > +  Добавить пункт планирования</button>
                 
                </div>
            
                <div class="form-group" >
                    <label for="date_start">Дата выгрузки</label>
                    <input class="form-control" type="text" name="date_end" id="date_end" value="{{ $lead['date_end'] ?? '' }}">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>  
                <div class="form-group" >
                    <label for="date_start">Время на выгрузку</label>
                    <input class="form-control time"  type="text" name="unloading_time" id="unloading_time" value="{{ $lead['unloading_time'] ?? '' }}">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div> 
            </div>



             <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); }else{ $(this).next().slideUp(500); }" class="formPartBlockTitle">Информация о грузе</div>

             <div class="formPartContiner BlockClosed">
                <div class="form-group" style="margin-bottom:5px;">
                    <label for="gruz_title">Груз</label>
                    <input class="form-control"  type="text" name="gruz_title" id="gruz_title" value="{{ $lead['gruz_title'] ?? '' }}">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>

                <div class="form-group" style=" margin-bottom:5px;">
                    <label for="gruz_package">Тип упаковки</label>
                    <input class="form-control"  type="text" name="gruz_package" id="gruz_package" value="{{ $lead['gruz_package'] ?? '' }}">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>
         
                 <div class="form-group" style=" margin-bottom:5px;">
                    <label for="gruz_weight">Масса груза, т.</label>
                    <input class="form-control"  type="text" name="gruz_weight" id="gruz_weight" value="{{ $lead['gruz_weight'] ?? '' }}">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>

                <div class="form-group" style=" margin-bottom:5px;">
                    <label for="gruz_value">Объем груза, т.</label>
                    <input class="form-control"  type="text" name="gruz_value" id="gruz_value" value="{{ $lead['gruz_value'] ?? '' }}">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>

                 <div class="form-group" style=" margin-bottom:5px;">
                    <label for="gruz_documents">Файлы к заявке (Товарная накладная, счет-фактура, Товарно-транспортная наклданая)</label>
                    <input class="form-control"  type="text" name="gruz_documents" id="gruz_documents" value="{{ $lead['gruz_documents'] ?? '' }}">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>

                
            </div>



            <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500, function(){ $(this).next().css('display', 'flex') }); }else{ $(this).next().slideUp(500); }" class="formPartBlockTitle">Требования к ТС</div>

            <div class="formPartContiner BlockClosed">
                <div class="form-group" style="width:calc(50% - 20px);">
                    <label for="transport_type_id">Тип ТС</label>
                    <select name="transport_type_id"  id="transport_type_id" class="formItem">
                        <option @if ($lead['transport_type_id'] == 0) selected="selected" @endif value="0">Тент</option>
                        <option @if ($lead['transport_type_id'] == 1) selected="selected" @endif value="1">Изотерм</option>
                        <option @if ($lead['transport_type_id'] == 2) selected="selected" @endif value="2">Термос</option>
                    </select>    
                     <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>

                <div class="form-group" >
                    <label for="transport_canweight">Тоннаж ТС, т</label>
                    <input class="form-control" type="text" name="transport_canweight" id="transport_canweight" value="{{ $lead['transport_canweight'] ?? '' }}">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>
            </div>

             <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); }else{ $(this).next().slideUp(500); }" class="formPartBlockTitle">Заметки к перевозке</div>

            <div style="display:flex; display:none; align-items: flex-start; justify-content: space-between; padding-bottom:0px; border-bottom:solid 1px #dddddd; padding:20px; padding-bottom:5px; padding-top:10px;">
                  <div class="form-group">
                    <label for="transport_canweight">Заметки</label>
                    <textarea class="form-control" style="border:solid 1px #dddddd; height:100px; min-height: 100px;" type="text" name="comment" id="comment">{{ $lead['comment'] ?? '' }}</textarea>
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>
            </div>


             <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500, function(){ $(this).next().css('display', 'flex') }); }else{ $(this).next().slideUp(500); }" class="formPartBlockTitle" style="@if ($lead['status'] == 0) background-color:#ff5050; color:#ffffff; border-bottom:solid 1px #ff5050; @endif ">Транспортная компания</div>
             <div style="display:flex; flex-wrap:wrap; @if ($lead['status'] > 1) display:none;  @endif  align-items: flex-start; justify-content: space-between; padding-bottom:0px; border-bottom:solid 1px #dddddd; @if ($lead['status'] == 0) border-bottom:solid 2px #ff5050; @endif padding:20px; padding-bottom:5px; padding-top:10px;">
             <div class="form-group" style="width:calc(50% - 20px);">
                    <label for="transport_company_id">Транспортная компания</label>
                    <select name="transport_company_id"  id="transport_company_id" style="border: solid 1px #dddddd; @if ($lead['status'] == 0) border:solid 2px #ff5050; @endif border-radius:5px; font-size:14px; padding:5px 10px; width:100%; display:block; ">
                         <option @if ($lead['transport_company_id'] == 0) selected="selected" @endif value="0">Не выбрано</option>
                         @foreach ($companies as $company)
                        <option @if ($lead['transport_company_id'] == $company['id']) selected="selected" @endif value="{{ $company['id'] }}">{{ $company['hortname'] }}</option>
                        @endforeach
                    </select>
                 </div>  
                 @if(($user_type == 3)||($user_type == 1))
                 <div class="form-group">  
                    <label for="driver_id">Водитель</label>
                    <select name="driver_id"  id="driver_id" style="border: solid 1px #dddddd; @if ($lead['status'] == 0) border:solid 2px #ff5050; @endif border-radius:5px; font-size:14px; padding:5px 10px; width:100%; display:block; ">
                         <option @if ($lead['driver_id'] == 0) selected="selected" @endif value="0">Не выбрано</option>
                         @foreach ($drivers as $driver)
                        <option @if ($lead['driver_id'] == $driver['id']) selected="selected" @endif value="{{ $driver['id'] }}">{{$driver['name'] }}</option>
                        @endforeach
                    </select>
                    </div>
                     @else
                    <div class="form-group">  
                        <label for="avto_id">Транспортное средство</label>
                        <div style="font-weight:bold;">#{{ $lead['driver_id'] }}</div>
                    </div>
                    @endif

                    @if(($user_type == 3)||($user_type == 1))
                    <div class="form-group">  
                        <label for="avto_id">Транспортное средство</label>
                        <select name="avto_id"  id="avto_id" style="border: solid 1px #dddddd; @if ($lead['status'] == 0) border:solid 2px #ff5050; @endif border-radius:5px; font-size:14px; padding:5px 10px; width:100%; display:block; ">
                             <option @if ($lead['avto_id'] == 0) selected="selected" @endif value="0">Не выбрано</option>
                             @foreach ($autos as $avto)
                            <option @if ($lead['avto_id'] == $avto['id']) selected="selected" @endif value="{{ $avto['id'] }}">{{ $avto['govnomer'] }} {{ $avto['type_kuzov'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    @else
                    <div class="form-group">  
                        <label for="avto_id">Транспортное средство</label>
                        <div style="font-weight:bold;">#{{ $lead['avto_id'] }}</div>
                    </div>
                    @endif
                    
                    
                    @if ($lead['status'] == 1) 
                    <div style="font-size:16px; color:#ff5050; padding:15px; padding-left:0px; font-weight:bold;">
                        Транспортная компания не подтверждена грузовладельцем...<br/>
                        @if(($user_type == 3)||($user_type == 1))
                        <button onclick="change_quote_status({{ $lead['id'] }}, 2);" type="button"  class="btn btn-danger AcceptButton"> Утвердить перевозчика </button>

                        <button onclick="cancel_transport_company({{ $lead['id'] }});" type="button"  class="btn btn-default AcceptButton"> Отказать перевозчику </button>
                        @endif
                    </div>

                    @elseif ($lead['status'] == 0)  
                    <div id="transport_attach_error" style="font-size:13px; color:#ff5050; margin-top:10px; "></div>

                        <button onclick="attach_transport_company({{ $lead['id'] }}, $('#transport_company_id').val(), $('#driver_id').val(), $('#avto_id').val());" type="button"  class="btn btn-danger AcceptButton"> Сохранить изменения</button>
                   
                     @endif
                     
               
               
            </div>
             @if($lead['status'] > 1)
                 <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500, function(){ $(this).next().css('display', 'flex') }); }else{ $(this).next().slideUp(500); }" class="formPartBlockTitle">Этапы перевозки</div>
                 <div style=" padding-bottom:0px; border-bottom:solid 1px #dddddd; @if ($lead['status'] == 0) border-bottom:solid 2px #ff5050; @endif padding:20px; padding-bottom:5px; padding-top:10px;">
                        <div style="font-size:13px;">Текущий статус</div>
                      @if($lead['status'] == 2) 
                        <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Назначена Транспортная</div>
                        <button onclick="change_quote_status({{ $lead['id'] }}, 3);" type="button" class="btn btn-primary buttonStatusChange"> + Въезд на погрузки </button>
                      @elseif($lead['status'] == 3) 
                        <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Въезд на территорию погрузки</div>
                        <button onclick="change_quote_status({{ $lead['id'] }}, 4);" type="button" class="btn btn-primary buttonStatusChange"> + Загрузка </button>
                      @elseif($lead['status'] == 4) 
                        <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Загрузка</div>
                        <button onclick="change_quote_status({{ $lead['id'] }}, 5);" type="button" class="btn btn-primary buttonStatusChange"> + Выезд с погрузки </button>
                      @elseif($lead['status'] == 5) 
                        <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Покинул территорию погрузки</div>
                        <button onclick="change_quote_status({{ $lead['id'] }}, 6);" type="button" class="btn btn-primary buttonStatusChange"> + В пути </button>
                      @elseif($lead['status'] == 6) 
                        <div style="margin-bottom:5px; line-height:1; font-weight:bold;">В пути</div>
                        <button onclick="change_quote_status({{ $lead['id'] }}, 7);" type="button" class="btn btn-primary buttonStatusChange"> + Въезд на загрузку </button>

                      @elseif($lead['status'] == 7) 
                        <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Въезд на территорию выгрузки</div>
                        <button onclick="change_quote_status({{ $lead['id'] }}, 8);" type="button" class="btn btn-primary buttonStatusChange"> + Выгрузка  </button>

                      @elseif($lead['status'] == 8) 
                      <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Выгрузка</div>
                        <button onclick="change_quote_status({{ $lead['id'] }}, 9);" type="button" class="btn btn-primary buttonStatusChange"> + Выезд с погрузки </button>

                      @elseif($lead['status'] == 9) 
                      <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Покинул территорию выгрузки </div>
                        <button onclick="change_quote_status({{ $lead['id'] }}, 10);" type="button" class="btn btn-primary buttonStatusChange"> + Документы получены </button>

                      @elseif($lead['status'] == 10) 
                      <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Документы получены</div>
                        <button onclick="change_quote_status({{ $lead['id'] }}, 11);" type="button" class="btn btn-primary buttonStatusChange"> + Заявка оплачена </button>

                      @elseif($lead['status'] == 11) 
                        <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Заявка оплачена</div>
                       
              
                      @elseif($lead['status'] == 11) 
                        <div style="margin-bottom:5px; line-height:1; font-weight:bold;">Отмененно</div>
                       
                      @endif
                 </div>

             @endif  
         

            <div class="formSubmitEditButtonContainer">
           @if($lead['status'] != 12)      
           <div class="formSubmitContainer">
               <button type="submit"  class="btn btn-primary"> Сохранить изменения </button>
           </div>
           @endif
       </div>
           



    </form>
</div>
</div>

<script>
function cancel_transport_company(lead_id){
    $.ajax({
            type: 'POST',
            data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'lead_id':lead_id, 'transport_company_id':0, 'driver_id':0, 'avto_id':0 }),
            url : "{{ route('admin.leads.attachTransportCompany') }}",
            async: true,
            success: function(response){ 
                location.reload();
            }
        }); 
}

function attach_transport_company(lead_id, transport_company_id, driver_id, avto_id){
    var validation_errors = false;
    
    $('#transport_attach_error').css('display', 'none');
    $('#transport_attach_error').html('');
    if(transport_company_id == 0) {
        $('#transport_attach_error').append('<div>Невозможно закрепить команию: Компания не выбрана.</div>');
        validation_errors = true;

    }

    if(driver_id == 0) {
        $('#transport_attach_error').append('<div>Невозможно закрепить команию: Водитель не выбран.</div>');
        validation_errors = true;

    }

    if(avto_id == 0) {
        $('#transport_attach_error').append('<div>Невозможно закрепить команию: Транспортное средство не выбрано.</div>');
        validation_errors = true;

    }

    if(validation_errors == true){
        $('#transport_attach_error').fadeIn(500);
    }else{
        $.ajax({
            type: 'POST',
            data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'lead_id':lead_id, 'transport_company_id':transport_company_id, 'driver_id':driver_id, 'avto_id':avto_id }),
            url : "{{ route('admin.leads.attachTransportCompany') }}",
            async: true,
            success: function(response){ 
               if(response == "+"){
                    location.reload();
               }else{
                    $('#transport_attach_error').fadeIn(500);
                    $('#transport_attach_error').html('Возникла ошибка при закрелении транспортной компании...');
               }
            }
        }); 
    }
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
</script>






      
    
    
    
    
    
    
    
    
    
    
    
   
            
            
            
            
            

