<div style="font-size:16px; margin-top:20px; padding-left:0px; font-weight:bold;">
	{{ $item['placeholder'] }}
</div>       
<div style="border:solid 1px #dddddd; padding:0px 15px; font-size:15px; border-radius:10px;">
	@isset($formItems[$item['id']]) 
		@foreach($formItems[$item['id']] as $key => $form_item)
			@include('admin.formsValues.item')
		@endforeach
	@endisset	
</div>
       