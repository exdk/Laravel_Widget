 <div style="border-bottom:solid 1px #eeeeee; padding-bottom:10px; padding-top:10px; display:flex; align-items: flex-start; justify-content: space-between;">
    <div><input onchange="update_formsItem('{{ route("admin.formsItems.update", [$form_item['id']]) }}', 'placeholder', $(this).val());" type="text" value="{{ $form_item['placeholder'] }}" style="border:none;"/></div>
    <div>
        <div style="font-size:12px;">Тип поля</div>
        <select onchange="update_formsItem('{{ route("admin.formsItems.update", [$form_item['id']]) }}', 'item_type', $(this).val()); if(parseInt($(this).val()) >= 2){  $(this).parent().parent().find('.addItemValue').fadeIn(500); }else{ $(this).parent().parent().find('.addItemValue').fadeOut(500); } ">
            <option @if ($form_item['item_type'] < 2) selected="selected" @endif value="-1">Не выбрано</option>
            <option @if ($form_item['item_type'] == 2) selected="selected" @endif value="2">Текстовое поле</option>
            <option @if ($form_item['item_type'] == 3) selected="selected" @endif value="3">Числовое поле</option>
            <option @if ($form_item['item_type'] == 4) selected="selected" @endif value="4">Выбор (только 1 шт.)</option>
            <option @if ($form_item['item_type'] == 5) selected="selected" @endif value="5">Мн-нный выбор</option>
            <option @if ($form_item['item_type'] == 6) selected="selected" @endif value="6">Дата</option>
        </select>
    </div>
    <div class="items_to_{{ $form_item['id'] }}">
    @isset($formItems[$form_item['id']]) 
        @foreach($formItems[$form_item['id']] as $key => $form_value)
            @include('admin.formsItems.value')
            @break
        @endforeach
    @endisset
    </div>


    <div class="addItemValue" onclick="add_formsItem('Введите значение', {{ $form_item['id'] }}, $(this).parent().find('select').val(), 0, $('.items_to_{{ $form_item['id'] }}')); $(this).fadeOut(500);" style="padding:5px 10px;   margin-top:10px; margin-bottom:10px; display:inline-block; background-color:#dddddd; font-size:10px; margin-left:20px; cursor:pointer; margin-top:0px; border-radius: 10px; @isset($formItems[$form_item['id']]) display:none; @endisset  @if ($form_item['item_type'] < 2) display:none; @endif">+ Добавить значение</div>

    <div onclick="delete_form_item('{{ route('admin.formsItems.destroy', $form_item['id']) }}'); $(this).parent().fadeOut(500);" style="padding:5px 10px;  display:inline-block; background-color:#ff5050; color:#ffffff; font-size:11px; cursor:pointer; border-radius: 10px;">Удалить поле</div>
</div>