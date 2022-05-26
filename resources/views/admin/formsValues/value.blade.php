@if ($form_value['item_type'] == 2)

       <div style="display:flex; align-items:center; justify-content:space-between; ">
            <div>
                <div style="font-size:12px;">Введите значение</div>
                 <input type="text" name="item_{{ $form_value['id'] }}" placeholder="{{ $form_value['placeholder'] }}" value="@isset($answers[$form_value['id']]) {{ $answers[$form_value['id']]}}@endisset"  />
            </div>

           
        </div>
    @endif

    @if ($form_value['item_type'] == 3)
         <div style="display:flex; align-items:center; justify-content:space-between; ">
            <div>
                <div style="font-size:12px;">Введите значение</div>
                 <input name="item_{{ $form_value['id'] }}" type="text" placeholder="{{ $form_value['placeholder'] }}" value="@isset($answers[$form_value['id']]) {{ $answers[$form_value['id']]}}@endisset"  />
            </div>

           
        </div>
    @endif

     @if ($form_value['item_type'] == 4)
        <div style="display:flex; align-items: flex-start; justify-content: flex-start; flex-direction: column;">
            <div style="display:flex; align-items: flex-start; justify-content: flex-start;"> 
                <div style="margin-top:3px; margin-right:5px;"><input name="radio_{{ $form_value['parrent_id'] }}" @isset($answers[$form_value['id']]) checked="checked" @endisset value="item_{{ $form_value['id'] }}" type="radio"></div>
                <label>{{ $form_value['placeholder'] }}</label>
            </div>
            @isset($formItems[$form_value['parrent_id']])
            @if (count($formItems[$form_value['parrent_id']]) > 1)
             @foreach ($formItems[$form_value['parrent_id']] as $key => $value_item)
                @if ($key == 0)
                    @continue;
               @endif
               <div style="display:flex; align-items: flex-start; justify-content: flex-start;"> 
                <div style="margin-top:3px; margin-right:5px;"><input name="radio_{{ $form_value['parrent_id'] }}" @isset($answers[$value_item['id']]) checked="checked" @endisset value="item_{{ $value_item['id'] }}" type="radio"></div>
                <label>{{ $value_item['placeholder'] }}</label>
            </div>
            @endforeach
            @endif
            @endisset
        </div>
    @endif

    @if ($form_value['item_type'] == 5)
        <div style="display:flex; align-items: flex-start; justify-content: flex-start; flex-direction: column;">
            <div style="display:flex; align-items: flex-start; justify-content: flex-start;"> 
                <div style="margin-top:3px; margin-right:5px;"><input name="item_{{ $form_value['id'] }}" @isset($answers[$form_value['id']]) checked="checked" @endisset type="checkbox" /></div>
                <label>{{ $form_value['placeholder'] }}</label>
            </div>
            @isset($formItems[$form_value['parrent_id']])
            @if (count($formItems[$form_value['parrent_id']]) > 1)
             @foreach ($formItems[$form_value['parrent_id']] as $key => $value_item)
                @if ($key == 0)
                    @continue;
               @endif
               <div style="display:flex; align-items: flex-start; justify-content: flex-start;"> 
                <div style="margin-top:3px; margin-right:5px;"><input name="item_{{ $value_item['id'] }}" @isset($answers[$value_item['id']]) checked="checked" @endisset  type="checkbox" /></div>
                <label>{{ $value_item['placeholder'] }}</label>
            </div>
            @endforeach
            @endif
            @endisset
        </div>
    @endif

    @if ($form_value['item_type'] == 6)
       <div style="display:flex; align-items:center; justify-content:space-between; ">
            <div>
                <div style="font-size:12px;">Введите значение</div>
                 <input type="text" placeholder="{{ $form_value['placeholder'] }}" value="@isset($answers[$form_value['id']]) {{ $answers[$form_value['id']]}}@endisset"  />
            </div>

           
        </div>
    @endif