 <div style="border-bottom:solid 1px #eeeeee; padding-bottom:10px; padding-top:10px; display:flex; align-items: flex-start; justify-content: flex-start;">
    <div style="width:50%;">{{ $form_item['placeholder'] }}</div>

    @isset($formItems[$form_item['id']]) 
        @foreach($formItems[$form_item['id']] as $key => $form_value)
            @include('admin.formsValues.value')
            @break
        @endforeach
    @endisset

    
</div>