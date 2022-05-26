<div style="font-size:16px; margin-top:20px; padding-left:20px;">
	<input type="text" onchange="update_formsItem('{{ route("admin.formsItems.update", [$item['id']]) }}', 'placeholder', $(this).val());" value="{{ $item['placeholder'] }}" style="border:none; font-size:16px;"/> 
	<div onclick="delete_form_item('{{ route('admin.formsItems.destroy', $item['id']) }}'); $(this).parent().fadeOut(500); $(this).parent().next().fadeOut(500);" style="padding:3px 10px;  display:inline-block; background-color:#ff5050; color:#ffffff; font-size:10px; cursor:pointer; border-radius: 10px; margin-bottom:5px;">Удалить раздел</div>
</div>       
<div style="border:solid 1px #dddddd; padding:0px 15px; font-size:15px; border-radius:10px;">
	<div>
		@isset($formItems[$item['id']]) 
			@foreach($formItems[$item['id']] as $key => $form_item)
				@include('admin.formsItems.item')
			@endforeach
		@endisset
	</div>
	<div>
	</div>
	<div onclick="add_formsItem('Новое поле', {{ $item['id'] }}, 1, 0, $(this).prev(), false);" style="padding:5px 10px; margin-top:10px; margin-bottom:10px; display:inline-block; background-color:#dddddd; font-size:12px; margin-left:10px; cursor:pointer; border-radius: 10px; border:none;">+ Добавить поле</div>
</div>
       