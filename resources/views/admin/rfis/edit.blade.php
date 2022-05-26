@extends('layouts.admin')
@section('content')
<style>
    .select-all, .deselect-all {
 display:none;   
}
</style>

 <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
             <div style="display:flex; align-items:center; justify-content: space-between;">
                   <div style="font-size:24px; font-weight:400; margin-left:20px;">{{ trans('global.edit') }} {{ trans('cruds.rfi.title_singular') }}</div>    
                   <div>
                        <!--div class="col-lg-12">
                            <a class="btn btn-success" href="{{ route('admin.rfis.create') }}">
                                {{ trans('global.add') }} {{ trans('cruds.rfi.title_singular') }}
                            </a>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                                {{ trans('global.app_csvImport') }}
                            </button>
                            @include('csvImport.modal', ['model' => 'Rfi', 'route' => 'admin.rfis.parseCsvImport'])
                        </div-->
                    </div>
            </div>  
            
        </div>
    </div>
<div class="card">

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rfis.update", [$rfi->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-4">
                    
                    <div class="form-group">
                <label for="title">{{ trans('cruds.rfi.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $rfi->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfi.fields.title_helper') }}</span>
            </div>
                </div>
            <div class="col-2">
                <div class="form-group">
                <label for="start">{{ trans('cruds.rfi.fields.start') }}</label>
                <input class="form-control datetime {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start', $rfi->start) }}">
                @if($errors->has('start'))
                    <span class="text-danger">{{ $errors->first('start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfi.fields.start_helper') }}</span>
            </div>
                </div>                
                <div class="col-2">
                    <div class="form-group">
                <label for="finish">{{ trans('cruds.rfi.fields.finish') }}</label>
                <input class="form-control datetime {{ $errors->has('finish') ? 'is-invalid' : '' }}" type="text" name="finish" id="finish" value="{{ old('finish', $rfi->finish) }}">
                @if($errors->has('finish'))
                    <span class="text-danger">{{ $errors->first('finish') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfi.fields.finish_helper') }}</span>
            </div>
                    
                </div>
                
                <div class="col-4">
            <div class="form-group">
                <label for="typetrans">{{ trans('cruds.rfi.fields.typetran') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('typetrans') ? 'is-invalid' : '' }}" name="typetrans[]" id="typetrans" multiple>
                    @foreach($typetrans as $id => $typetran)
                        <option value="{{ $id }}" {{ (in_array($id, old('typetrans', [])) || $rfi->typetrans->contains($id)) ? 'selected' : '' }}>{{ $typetran }}</option>
                    @endforeach
                </select>
                @if($errors->has('typetrans'))
                    <span class="text-danger">{{ $errors->first('typetrans') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfi.fields.typetran_helper') }}</span>
            </div>
                    
                </div>
            </div>
          <!--  <div class="form-group">
                <label>{{ trans('cruds.rfi.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Rfi::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $rfi->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfi.fields.status_helper') }}</span>
            </div>-->

            
            
            <div class="form-group">
                <label for="letter">{{ trans('cruds.rfi.fields.letter') }}</label>
                <textarea class="form-control {{ $errors->has('letter') ? 'is-invalid' : '' }}" name="letter" id="letter">{{ old('letter', $rfi->letter) }}</textarea>
                @if($errors->has('letter'))
                    <span class="text-danger">{{ $errors->first('letter') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfi.fields.letter_helper') }}</span>
            </div>
             <div class="row">
                <div class="col-8">
                    <div class="form-group">
                <label for="limited">{{ trans('cruds.rfi.fields.limited') }}</label>
                <input class="form-control {{ $errors->has('limited') ? 'is-invalid' : '' }}" type="text" name="limited" id="limited" value="{{ old('limited', $rfi->limited) }}">
                @if($errors->has('limited'))
                    <span class="text-danger">{{ $errors->first('limited') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfi.fields.limited_helper') }}</span>
            </div>
                <div class="row">
                    <div class="col-6">
                         <div class="form-group">
                <label for="contact_id">{{ trans('cruds.rfi.fields.contact') }}</label>
                <select class="form-control select2 {{ $errors->has('contact') ? 'is-invalid' : '' }}" name="contact_id" id="contact_id">
                    @foreach($contacts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('contact_id') ? old('contact_id') : $rfi->contact->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('contact'))
                    <span class="text-danger">{{ $errors->first('contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfi.fields.contact_helper') }}</span>
            </div>
                    </div>
                    <div class="col-6">
                    
                                <div class="form-group">
                <label for="contact_2_id">{{ trans('cruds.rfi.fields.contact_2') }}</label>
                <select class="form-control select2 {{ $errors->has('contact_2') ? 'is-invalid' : '' }}" name="contact_2_id" id="contact_2_id">
                    @foreach($contact_2s as $id => $entry)
                        <option value="{{ $id }}" {{ (old('contact_2_id') ? old('contact_2_id') : $rfi->contact_2->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('contact_2'))
                    <span class="text-danger">{{ $errors->first('contact_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfi.fields.contact_2_helper') }}</span>
            </div>
                    </div>
                    
                    
                    
                    
                    
                    
                </div>  
                    
                </div>
                <div class="col-4">
                    <div class="form-group">
                <label for="applications">{{ trans('cruds.rfi.fields.applications') }}</label>
                <div class="needsclick dropzone {{ $errors->has('applications') ? 'is-invalid' : '' }}" id="applications-dropzone">
                </div>
                @if($errors->has('applications'))
                    <span class="text-danger">{{ $errors->first('applications') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfi.fields.applications_helper') }}</span>
            </div>
                    
                    
                </div>
            </div>

            <div style="width:100%; border-top:solid 1px #dddddd; border-bottom:solid 1px #dddddd; padding-top:10px; padding-bottom: 10px; margin-top:10px; margin-bottom:10px;">
                <div style="font-size:15px; margin-bottom:10px;">Доступ для заполнения</div>
                <div style="display:flex; align-items: flex-start; justify-content: space-between;">
                    <div class="form-group" style="width:calc(50% - 20px);">
                        <label for="groups_transports">Группы перевозчиков</label>
                     
                        <select class="form-control select2 {{ $errors->has('groups_transports') ? 'is-invalid' : '' }}" name="groups_transports[]" id="groups_transports" multiple>
                            @foreach($groups_transports as $id => $groups_transport)
                                <option value="{{ $groups_transport->id }}" @if(in_array($groups_transport->id, $access_companies)) selected="selected" @endif >{{ $groups_transport->title }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('groups_transports'))
                            <span class="text-danger">{{ $errors->first('groups_transports') }}</span>
                        @endif
                       
                    </div>
                    <div class="form-group" style="width:calc(50% - 20px);">
                        <label for="transporters">Конкретный перевозчик</label>
                      
                        <select class="form-control select2 {{ $errors->has('transporters') ? 'is-invalid' : '' }}" name="transporters[]" id="transporters" multiple>
                            @foreach($transporters as $id => $transporter)
                                <option value="{{ $transporter->id }}" @if(in_array($transporter->id, $access_users)) selected="selected" @endif >{{ $transporter->hortname }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('transporters'))
                            <span class="text-danger">{{ $errors->first('transporters') }}</span>
                        @endif
                       
                    </div>
            </div>
             
            </div>
            
            
           <div style="display:flex; align-items: flex-start; justify-content: flex-start;">
                <div class="form-group" style="width:50%;">
                    <label for="id_1_id">Выберите акнкету</label>
                    <select onchange="$('#submitEditForm').click();" class="form-control select2 {{ $errors->has('id_1') ? 'is-invalid' : '' }}" name="id_1_id" id="id_1_id">
                        @foreach($id_1s as $id => $entry)
                            <option value="{{ $id }}" {{ (old('id_1_id') ? old('id_1_id') : $rfi->id_1->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('id_1'))
                        <span class="text-danger">{{ $errors->first('id_1') }}</span>
                    @endif
                
                </div>
                <div style="margin-left:20px;">
                    <a style="font-size: 17px; margin-top: 22px;" class="btn btn-xs btn-primary" href="{{ route('admin.forms.create') }}">
                        Создать новую анкету
                    </a>

                </div>
            </div>
            @isset($rfi->id_1->id)
            <div style="margin-bottom:20px; padding-bottom:10px; border-bottom:solid 1px #dddddd;"> 
                @isset($formItems[0])  
                    @foreach($formItems[0] as $key => $item)
                        @include('admin.formsItems.container', [$formItems, $item])
                    @endforeach
                @endisset
                <div id="newParts">
                </div>
               
                <div onclick="add_formsItem('Новый раздел', 0, 0, 0, $('#newParts'));" style="padding:5px 15px; margin-bottom:20px; margin-top:10px; display:inline-block; background-color:#dddddd; font-size:14px; cursor:pointer; border-radius: 10px;">+ Добавить раздел</div>
            </div>
            @endisset
            <div class="form-group">
                <button class="btn btn-danger" id="submitEditForm" type="submit">
                    {{ trans('global.save') }}
                 </button>
            </div>
        </form>
    </div>
</div>
@isset($rfi->id_1->id)
<script>
function add_formsItem(placeholder, parent_id, item_type, points, contenerResult, update_conteiner = false){
    $.ajax({
        type: 'POST',
        data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'form_id':'{{ $rfi->id_1->id }}', 'placeholder':placeholder, 'parrent_id':parent_id, 'item_type':item_type, 'points':points }),
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
@endisset


@endsection

@section('scripts')
<script>
    var uploadedApplicationsMap = {}
Dropzone.options.applicationsDropzone = {
    url: '{{ route('admin.rfis.storeMedia') }}',
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
@if(isset($rfi) && $rfi->applications)
          var files =
            {!! json_encode($rfi->applications) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="applications[]" value="' + file.file_name + '">')
            }
@endif
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
}
</script>
@endsection