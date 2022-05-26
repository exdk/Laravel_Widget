@if ($form_value['item_type'] == 2)
       <div style="display:flex; align-items:center; justify-content:space-between; ">
            <div>
                <div style="font-size:12px;">Содержимое</div>
                 <input onchange="update_formsItem('{{ route("admin.formsItems.update", [$form_value['id']]) }}', 'placeholder', $(this).val());" type="text" value="{{ $form_value['placeholder'] }}"  />
            </div>

            <div style="margin-left:20px;">
                <div style="font-size:12px;">Балы</div>
                <input onchange="update_formsItem('{{ route("admin.formsItems.update", [$form_value['id']]) }}', 'points', $(this).val());" type="text" value="{{ $form_value['points'] }}" style="text-align:center; width:70px;" />
            </div>
            <div onclick="delete_form_item('{{ route('admin.formsItems.destroy', $form_value['id']) }}'); $(this).parent().fadeOut(500);" style="padding:5px 10px;  margin-top:0px; margin-bottom:0px; display:inline-block; background-color:#ff5050; color:#ffffff; font-size:10px; margin-left:20px; cursor:pointer; margin-top:15px; border-radius: 10px;">Удалить</div>
        </div>
    @endif

    @if ($form_value['item_type'] == 3)
        <div style="display:flex; align-items:center; justify-content:space-between; ">
            <div>
                <div style="font-size:12px;">Содержимое</div>
                 <input onchange="update_formsItem('{{ route("admin.formsItems.update", [$form_value['id']]) }}', 'placeholder', $(this).val());" type="text" value="{{ $form_value['placeholder'] }}"  />
            </div>

            <div style="margin-left:20px;">
                <div style="font-size:12px;">Балы</div>
                <input onchange="update_formsItem('{{ route("admin.formsItems.update", [$form_value['id']]) }}', 'points', $(this).val());" type="text" value="{{ $form_value['points'] }}" style="text-align:center; width:70px;" />
            </div>
            <div onclick="delete_form_item('{{ route('admin.formsItems.destroy', $form_value['id']) }}'); $(this).parent().fadeOut(500);" style="padding:5px 10px;  margin-top:0px; margin-bottom:0px; display:inline-block; background-color:#ff5050; color:#ffffff; font-size:10px; margin-left:20px; cursor:pointer; margin-top:15px; border-radius: 10px;">Удалить</div>
        </div>
    @endif

     @if ($form_value['item_type'] == 4)
        <div style="display:flex; align-items: flex-start; justify-content: flex-start; flex-direction: column;">
            
          
            @isset($formItems[$form_value['parrent_id']])
   
             @foreach ($formItems[$form_value['parrent_id']] as $key => $value_item)
                
              
              
              <div style="display:flex; align-items:center; justify-content:space-between; margin-top:5px;">
                <div>
                     @if ($key == 0)<div style="font-size:12px;">Содержимое</div> @endif   
                     <input type="text" onchange="update_formsItem('{{ route("admin.formsItems.update", [$value_item['id']]) }}', 'placeholder', $(this).val());" type="text" value="{{ $value_item['placeholder'] }}"  />
                </div>

                <div style="margin-left:20px;">
                   @if ($key == 0) <div style="font-size:12px;">Балы</div>@endif  
                    <input onchange="update_formsItem('{{ route("admin.formsItems.update", [$value_item['id']]) }}', 'points', $(this).val());" type="text" value="{{ $value_item['points'] }}" style="text-align:center; width:70px;" />
                </div>

                
                <div onclick="delete_form_item('{{ route('admin.formsItems.destroy', $value_item['id']) }}'); $(this).parent().fadeOut(500);" style="padding:5px 10px;  margin-top:0px; margin-bottom:0px; display:inline-block; background-color:#ff5050; color:#ffffff; font-size:10px; margin-left:20px; cursor:pointer; margin-top:5px; border-radius: 10px;">Удалить</div>

                @if ($key == 0)<div onclick="add_formsItem('Введите значение', {{ $form_value['parrent_id'] }}, {{ $form_value['item_type'] }}, 0, $('.items_to_{{ $form_value['parrent_id'] }}'), true);  $(this).parent().parent().fadeOut(500);" style="padding:5px 10px;  margin-top:0px; margin-bottom:10px; display:inline-block; background-color:#dddddd; font-size:10px; margin-left:20px; cursor:pointer; margin-top:5px; border-radius: 10px;">+ Добавить значение</div>  @endif   
               
            </div>
            @endforeach

            @endisset
        </div>
    @endif

    @if ($form_value['item_type'] == 5)
        <div style="display:flex; align-items: flex-start; justify-content: flex-start; flex-direction: column;">
           
           
            @isset($formItems[$form_value['parrent_id']])
   
             @foreach ($formItems[$form_value['parrent_id']] as $key => $value_item)
                
              
              
              <div style="display:flex; align-items:center; justify-content:space-between; margin-top:5px;">
                <div>
                     @if ($key == 0)<div style="font-size:12px;">Содержимое</div> @endif   
                     <input type="text" onchange="update_formsItem('{{ route("admin.formsItems.update", [$value_item['id']]) }}', 'placeholder', $(this).val());" type="text" value="{{ $value_item['placeholder'] }}"  />
                </div>

                <div style="margin-left:20px;">
                   @if ($key == 0) <div style="font-size:12px;">Балы</div>@endif  
                    <input onchange="update_formsItem('{{ route("admin.formsItems.update", [$value_item['id']]) }}', 'points', $(this).val());" type="text" value="{{ $value_item['points'] }}" style="text-align:center; width:70px;" />
                </div>

                
                <div onclick="delete_form_item('{{ route('admin.formsItems.destroy', $value_item['id']) }}'); $(this).parent().fadeOut(500);" style="padding:5px 10px;  margin-top:0px; margin-bottom:0px; display:inline-block; background-color:#ff5050; color:#ffffff; font-size:10px; margin-left:20px; cursor:pointer; margin-top:5px; border-radius: 10px;">Удалить</div>

                @if ($key == 0)<div onclick="add_formsItem('Введите значение', {{ $form_value['parrent_id'] }}, {{ $form_value['item_type'] }}, 0, $('.items_to_{{ $form_value['parrent_id'] }}'), true);  $(this).parent().parent().fadeOut(500);" style="padding:5px 10px;  margin-top:0px; margin-bottom:10px; display:inline-block; background-color:#dddddd; font-size:10px; margin-left:20px; cursor:pointer; margin-top:5px; border-radius: 10px;">+ Добавить значение</div>  @endif   
               
            </div>
            @endforeach

            @endisset
        </div>
    @endif

    @if ($form_value['item_type'] == 6)
       <div style="display:flex; align-items:center; justify-content:space-between; ">
            <div>
                <div style="font-size:12px;">Содержимое</div>
                 <input onchange="update_formsItem('{{ route("admin.formsItems.update", [$form_value['id']]) }}', 'placeholder', $(this).val());" type="text" value="{{ $form_value['placeholder'] }}"  />
            </div>

            <div style="margin-left:20px;">
                <div style="font-size:12px;">Балы</div>
                <input onchange="update_formsItem('{{ route("admin.formsItems.update", [$form_value['id']]) }}', 'points', $(this).val());" type="text" value="{{ $form_value['points'] }}" style="text-align:center; width:70px;" />
            </div>
        </div>
    @endif