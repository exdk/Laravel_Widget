@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.forms.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.forms.update", [$form->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.forms.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $form->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.forms.fields.title_helper') }}</span>
            </div>
          
            <div style="font-size:17px; margin-top:15px; margin-bottom:10px; font-weight:bold;">Содержание анкеты</div>   
            @isset($formItems[0])  
                @foreach($formItems[0] as $key => $item)
                    @include('admin.formsItems.container', [$formItems, $item])
                @endforeach
            @endisset
            <div id="newParts">
            </div>
           
            <div onclick="add_formsItem('Новый раздел', 0, 0, 0, $('#newParts'));" style="padding:5px 15px; margin-bottom:20px; margin-top:10px; display:inline-block; background-color:#dddddd; font-size:14px; cursor:pointer; border-radius: 10px;">+ Добавить раздел</div>

              <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function add_formsItem(placeholder, parent_id, item_type, points, contenerResult, update_conteiner = false){
    $.ajax({
        type: 'POST',
        data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'form_id':'{{ $form->id }}', 'placeholder':placeholder, 'parrent_id':parent_id, 'item_type':item_type, 'points':points }),
        url : "{{ route('admin.formsItems.store') }}",
        async: true,
        success: function(response){ 
            if(update_conteiner == true){  
                contenerResult.html(response);
            }else{

                contenerResult.append(response);
            }
        }
    }); 
}


function update_formsItem(url, name, value){
    $.ajax({
        type: 'PUT',
        data: ({'_token':'{{ csrf_token() }}', '_method':'PUT', 'name':name, 'value':value }),
        url : url,
        async: true,
        success: function(response){ 
          console.log('Success changes!');
        }
    }); 
}

function delete_form_item(url){
    $.ajax({
        type: 'DELETE',
        data: ({'_token':'{{ csrf_token() }}', '_method':'DELETE' }),
        url : url,
        async: true,
        success: function(response){ 
          console.log(response);
        }
    }); 
}

</script>

@endsection


