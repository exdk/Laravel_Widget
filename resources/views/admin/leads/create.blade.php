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
</style>

<div class="row">
    <div class="col-12">
        <form method="POST" action="{{ route("admin.leads.store") }}" enctype="multipart/form-data" target="_blank">
            @csrf
            <input type="hidden" name="status" value="0"/>

            <div class="formPartBlockTitle">Общее</div>
            <div class="formPartContiner">
                <div class="form-group" >
                    <label for="postavka_id">ID поставки</label>
                    <input class="form-control" type="text" name="postavka_id" id="postavka_id" value="">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                </div>

                <div class="form-group" >
                    <label for="postavka_number">Номер поставки</label>
                    <input class="form-control" type="text" name="postavka_number" id="postavka_number" value="">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                </div>
           
                <div class="form-group" >
                    <label for="perevoz_type">Тип перевозки</label>
                    <select name="perevoz_type" class="formItem"  id="perevoz_type">
                        <option value="0">Межсклад</option>
                        <option value="1">Город</option>
                        <option value="2">Регион</option>
                    </select>
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                </div>
            </div>


            <div class="formPartBlockTitle">Грузоотправитель</div>
            <div class="formPartContiner">
                <div class="form-group">
                    <label for="perevoz_type">Грузоотправитель (компания)</label>
                    <select name="gruz_company_id" class="formItem" id="gruz_company_id">
                         <option value="0">Не выбрано</option>
                         @foreach ($companies as $company)
                        <option value="{{ $company['id'] }}">{{ $company['hortname'] }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                </div>

                <div class="form-group">
                    <label for="gruz_company_dispatcher">Диспетчер грузоотправителя</label>
                    <select name="gruz_company_dispatcher" class="formItem"  id="gruz_company_dispatcher">
                        <option value="0">Не выбрано</option>
                        @foreach ($users as $user)
                        <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>

                
            </div>


            <div class="formPartBlockTitle">Пункт загрузки</div>

             <div class="formPartContiner">
                <div class="form-group">
                    <label for="point_start">Пункт планирования</label>
                    <select name="point_start" class="formItem" id="point_start">
                        @foreach ($pointloads as $point)
                        <option value="{{ $point['id'] }}">{{ $point['title'] }} ({{ $point['gorod'] }} {{ $point['zip'] }})</option>
                        @endforeach
                    </select>
                 
                       
                 
                </div>

                <div class="form-group" >
                   <button type="button" class="btn btn-primary fomrInsideAddButton" onclick="document.location='{{ route('admin.pointloads.create') }}';" > +  Добавить пункт планирования</button>
                 
                </div>
            </div>
            <div class="formPartContiner">
                <div class="form-group" >
                    <label for="date_start">Дата загрузки</label>
                    <input class="form-control"  type="text" name="date_start" id="date_start" value="">
                        <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                </div>
                 <div class="form-group" >
                    <label for="date_start">Время на загрузку</label>
                    <input class="form-control time"  type="text" name="loading_time" id="loading_time" value="">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div> 

                
            </div>

            <div class="formPartBlockTitle">Пункт выгрузки</div>

             <div class="formPartContiner">
                <div class="form-group" >
                    <label for="point_end">Пункт выгрузки</label>
                    <select name="point_end"  id="point_end" class="formItem">
                        @foreach ($pointloads as $point)
                        <option value="{{ $point['id'] }}">{{ $point['title'] }} ({{ $point['gorod'] }} {{ $point['zip'] }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" >
                   <button type="button"  class="btn btn-primary fomrInsideAddButton" onclick="document.location='{{ route('admin.pointloads.create') }}';" > +  Добавить пункт планирования</button>
                 
                </div>
            </div>
             <div class="formPartContiner">
                <div class="form-group">
                    <label for="date_start">Дата выгрузки</label>
                    <input class="form-control"  type="text" name="date_end" id="date_end" value="">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div> 
                  <div class="form-group">
                    <label for="date_start">Время на выгрузку</label>
                    <input class="form-control time"  type="text" name="unloading_time" id="unloading_time" value="">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>  
            </div>



             <div class="formPartBlockTitle">Информация о грузе</div>

             <div class="formPartContiner">
                <div class="form-group" style="margin-bottom:5px;">
                    <label for="gruz_title">Груз</label>
                    <input class="form-control"  type="text" name="gruz_title" id="gruz_title" value="">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>

                <div class="form-group" style=" margin-bottom:5px;">
                    <label for="gruz_package">Тип упаковки</label>
                    <input class="form-control"  type="text" name="gruz_package" id="gruz_package" value="">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>
         
                 <div class="form-group" style=" margin-bottom:5px;">
                    <label for="gruz_weight">Масса груза, т.</label>
                    <input class="form-control"  type="text" name="gruz_weight" id="gruz_weight" value="">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>

                <div class="form-group" style=" margin-bottom:5px;">
                    <label for="gruz_value">Объем груза, т.</label>
                    <input class="form-control" type="text" name="gruz_value" id="gruz_value" value="">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>

                 <div class="form-group" style=" margin-bottom:5px;">
                    <label for="gruz_documents">Файлы к заявке (Товарная накладная, счет-фактура, Товарно-транспортная наклданая)</label>
                    <input class="form-control"  type="text" name="gruz_documents" id="gruz_documents" value="">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>

                
            </div>



             <div class="formPartBlockTitle">Требования к ТС</div>

            <div class="formPartContiner">
                <div class="form-group" >
                    <label for="transport_type_id">Тип ТС</label>
                    <select name="transport_type_id"  id="transport_type_id" class="formItem">
                        <option value="0">Тент</option>
                        <option value="1">Изотерм</option>
                        <option value="2">Термос</option>
                    </select>    
                     <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>

                <div class="form-group" >
                    <label for="transport_canweight">Тоннаж ТС, т</label>
                    <input class="form-control"  type="text" name="transport_canweight" id="transport_canweight" value="">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>


                <div class="form-group" style=" margin-bottom:5px;">
                    <label for="gruz_value">Объем ТС, м.кв.</label>
                    <input class="form-control"  type="text" name="transport_value" id="transport_value" value="">
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>
            </div>

             <div class="formPartBlockTitle">Заметки к перевозке</div>

            <div class="formPartContiner">
                  <div class="form-group" style="width:calc(100%);">
                    <label for="transport_canweight">Заметки</label>
                    <textarea class="form-control" style="border:solid 1px #dddddd; height:100px; min-height: 100px;" type="text" name="comment" id="comment"></textarea>
                    <span class="text-danger" style="display:none;">Ошибка заполнения</span>
                 
                </div>
            </div>

            


           <div class="formSubmitContainer">
               <button type="sbumit"  class="btn btn-primary"> Добавить </button>
           </div>
           



    </form>
</div>
</div>







      
    
    
    
    
    
    
    
    
    
    
    
   
            
            
            
            
            

