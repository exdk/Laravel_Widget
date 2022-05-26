<style>
    .formPartBlockTitle{
        font-size:17px; 
        padding-left:20px; 
        padding-top:10px; 
        padding-bottom:10px; 
        background-color:#eeeeee; 
        border-bottom:solid 1px #dddddd;
        display:flex;
        align-items: center;
        justify-content: flex-start;
        cursor:pointer;
        box-shadow: 0px 0px 7px rgba(0,0,0,0.2);
    }

    .formPartBlockTitle.opened .formPartBlockArrow i{
        transform: rotate(90deg);
        
    }

    .dropzone{
        border:solid 1px #dddddd;
        border-radius:10px;
    }

    .formPartBlockArrow i{
        margin-right:7px;
        margin-left:-5px;
        transform: rotate(-90deg);
        font-size:17px;
        color:#000000;
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
        <form method="POST" style="margin-bottom:0px;" action="{{ route("admin.rfqs.update", [$rfq->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
             <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); $(this).addClass('opened'); }else{ $(this).next().slideUp(500); $(this).removeClass('opened'); }" class="formPartBlockTitle">
                <div class="formPartBlockArrow"><i class="right fa fa-fw fa-angle-left nav-icon"></i></div>
                <div> Общее </div>
            </div>

            <div class="formPartContiner BlockClosed">
                <div class="form-group">
                    <label>{{ trans('cruds.rfq.fields.status') }}</label>
                    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                        <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Rfq::STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('status', $rfq->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.rfq.fields.status_helper') }}</span>
                </div>
            </div>

            <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); $(this).addClass('opened'); }else{ $(this).next().slideUp(500); $(this).removeClass('opened'); }" class="formPartBlockTitle">
                <div class="formPartBlockArrow"><i class="right fa fa-fw fa-angle-left nav-icon"></i></div>
                <div> Навзание </div>
            </div>
              
            <div class="formPartContiner BlockClosed">
            
                <div class="form-group">
                    <label for="title">{{ trans('cruds.rfq.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $rfq->title) }}">
                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.rfq.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="typetrs">{{ trans('cruds.rfq.fields.typetr') }}</label>
                    <!--div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div-->
                    <select class="form-control select2 {{ $errors->has('typetrs') ? 'is-invalid' : '' }}" style="height:120px !important;" name="typetrs[]" id="typetrs" multiple>
                        @foreach($typetrs as $id => $typetr)
                            <option value="{{ $id }}" {{ (in_array($id, old('typetrs', [])) || $rfq->typetrs->contains($id)) ? 'selected' : '' }}>{{ $typetr }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('typetrs'))
                        <span class="text-danger">{{ $errors->first('typetrs') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.rfq.fields.typetr_helper') }}</span>
                </div>
            </div>

            <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); $(this).addClass('opened'); }else{ $(this).next().slideUp(500); $(this).removeClass('opened'); }" class="formPartBlockTitle">
                <div class="formPartBlockArrow"><i class="right fa fa-fw fa-angle-left nav-icon"></i></div>
                <div> Дата начала и завершения </div>
            </div>

            <div class="formPartContiner BlockClosed">   
                <div class="form-group">
                    <label for="start">{{ trans('cruds.rfq.fields.start') }}</label>
                    <input class="form-control datetime {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start', $rfq->start) }}">
                    @if($errors->has('start'))
                        <span class="text-danger">{{ $errors->first('start') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.rfq.fields.start_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="finish">{{ trans('cruds.rfq.fields.finish') }}</label>
                    <input class="form-control datetime {{ $errors->has('finish') ? 'is-invalid' : '' }}" type="text" name="finish" id="finish" value="{{ old('finish', $rfq->finish) }}">
                    @if($errors->has('finish'))
                        <span class="text-danger">{{ $errors->first('finish') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.rfq.fields.finish_helper') }}</span>
                </div>
            </div>

            <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); $(this).addClass('opened'); }else{ $(this).next().slideUp(500); $(this).removeClass('opened'); }" class="formPartBlockTitle">
                <div class="formPartBlockArrow"><i class="right fa fa-fw fa-angle-left nav-icon"></i></div>
                <div> Тип </div>
            </div>
           
            <div class="formPartContiner BlockClosed"> 
                <div class="form-group">
                    <label>{{ trans('cruds.rfq.fields.type') }}</label>
                    @foreach(App\Models\Rfq::TYPE_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('type') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="type_{{ $key }}" name="type" value="{{ $key }}" {{ old('type', $rfq->type) === (string) $key ? 'checked' : '' }}>
                            <label class="form-check-label" for="type_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('type'))
                        <span class="text-danger">{{ $errors->first('type') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.rfq.fields.type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="limited">{{ trans('cruds.rfq.fields.limited') }}</label>
                    <input class="form-control {{ $errors->has('limited') ? 'is-invalid' : '' }}" type="text" name="limited" id="limited" value="{{ old('limited', $rfq->limited) }}">
                    @if($errors->has('limited'))
                        <span class="text-danger">{{ $errors->first('limited') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.rfq.fields.limited_helper') }}</span>
                </div>
            </div>

            <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); $(this).addClass('opened'); }else{ $(this).next().slideUp(500); $(this).removeClass('opened'); }" class="formPartBlockTitle">
                <div class="formPartBlockArrow"><i class="right fa fa-fw fa-angle-left nav-icon"></i></div>
                <div> Срок начала и заврешения </div>
            </div>
            <div class="formPartContiner BlockClosed">
                <div class="form-group">
                    <label for="datestartdogovor">{{ trans('cruds.rfq.fields.datestartdogovor') }}</label>
                    <input class="form-control date {{ $errors->has('datestartdogovor') ? 'is-invalid' : '' }}" type="text" name="datestartdogovor" id="datestartdogovor" value="{{ old('datestartdogovor', $rfq->datestartdogovor) }}">
                    @if($errors->has('datestartdogovor'))
                        <span class="text-danger">{{ $errors->first('datestartdogovor') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.rfq.fields.datestartdogovor_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="dateenddogovor">{{ trans('cruds.rfq.fields.dateenddogovor') }}</label>
                    <input class="form-control date {{ $errors->has('dateenddogovor') ? 'is-invalid' : '' }}" type="text" name="dateenddogovor" id="dateenddogovor" value="{{ old('dateenddogovor', $rfq->dateenddogovor) }}">
                    @if($errors->has('dateenddogovor'))
                        <span class="text-danger">{{ $errors->first('dateenddogovor') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.rfq.fields.dateenddogovor_helper') }}</span>
                </div>
            </div>

            <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); $(this).addClass('opened'); }else{ $(this).next().slideUp(500); $(this).removeClass('opened'); }" class="formPartBlockTitle">
                <div class="formPartBlockArrow"><i class="right fa fa-fw fa-angle-left nav-icon"></i></div>
                <div> Документы </div>
            </div>
            <div class="formPartContiner BlockClosed">
                <div class="form-group" style="width:100%;">
                    <label for="applications">{{ trans('cruds.rfq.fields.applications') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('applications') ? 'is-invalid' : '' }}" id="applications-dropzone">
                    </div>
                    @if($errors->has('applications'))
                        <span class="text-danger">{{ $errors->first('applications') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.rfq.fields.applications_helper') }}</span>
                </div>
            </div>


            <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); $(this).addClass('opened'); }else{ $(this).next().slideUp(500); $(this).removeClass('opened'); }" class="formPartBlockTitle">
                <div class="formPartBlockArrow"><i class="right fa fa-fw fa-angle-left nav-icon"></i></div>
                <div> Контактные данные </div>
            </div>
            <div class="formPartContiner BlockClosed">
                <div class="form-group">
                    <label for="contact_id">{{ trans('cruds.rfq.fields.contact') }}</label>
                    <select class="form-control select2 {{ $errors->has('contact') ? 'is-invalid' : '' }}" name="contact_id" id="contact_id">
                        @foreach($contacts as $id => $entry)
                            <option value="{{ $id }}" {{ (old('contact_id') ? old('contact_id') : $rfq->contact->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('contact'))
                        <span class="text-danger">{{ $errors->first('contact') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.rfq.fields.contact_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="contact_2_id">{{ trans('cruds.rfq.fields.contact_2') }}</label>
                    <select class="form-control select2 {{ $errors->has('contact_2') ? 'is-invalid' : '' }}" name="contact_2_id" id="contact_2_id">
                        @foreach($contact_2s as $id => $entry)
                            <option value="{{ $id }}" {{ (old('contact_2_id') ? old('contact_2_id') : $rfq->contact_2->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('contact_2'))
                        <span class="text-danger">{{ $errors->first('contact_2') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.rfq.fields.contact_2_helper') }}</span>
                </div>
            </div>

            <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); $(this).addClass('opened'); }else{ $(this).next().slideUp(500); $(this).removeClass('opened'); }" class="formPartBlockTitle">
                <div class="formPartBlockArrow"><i class="right fa fa-fw fa-angle-left nav-icon"></i></div>
                <div> Комментарий </div>
            </div>
            <div class="formPartContiner BlockClosed">
                <div class="form-group" style="width:100%;">
                    <label for="desc">{{ trans('cruds.rfq.fields.desc') }}</label>
                    <textarea class="form-control {{ $errors->has('desc') ? 'is-invalid' : '' }}" name="desc" id="desc">{{ old('desc', $rfq->desc) }}</textarea>
                    @if($errors->has('desc'))
                        <span class="text-danger">{{ $errors->first('desc') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.rfq.fields.desc_helper') }}</span>
                </div>
            </div>

            
            <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); $(this).addClass('opened'); }else{ $(this).next().slideUp(500); $(this).removeClass('opened'); }" class="formPartBlockTitle">
                <div class="formPartBlockArrow"><i class="right fa fa-fw fa-angle-left nav-icon"></i></div>
                <div> Приглашение участников </div>
            </div>

            <div>
           <div style="padding:20px; font-size:16px; padding-bottom:10px;">
            Доступно для просмотра
           </div>
          
           <div class="formPartContiner">
             <div class="form-group" style="border-right:solid 1px #dddddd;">
                 <div style="font-size:12px; font-weight:bold; font-style:italic; padding:0px; margin:0px; margin-bottom:5px; line-height:1.2;">
                    Компаниям
                 </div>
                 @foreach($rfq->rfqVisiblility as $item)
                    @if ($item->company_id == 0)
                        @continue;
                    @endif
                    <div style="display:inline-block; margin-top:5px; padding:5px 10px; border-radius:5px; background-color:#eeeeee; border:#dddddd; margin-right:10px; font-size:14px; font-weight:bold;">
                        {{ $item->company_name }} 
                        <button type="button" style="font-size:10px;  margin-left:10px;" onclick="delete_visibility({{ $item->id }}); $(this).parent().css('display', 'none');"  class="btn btn-danger">X</button>
                    </div>
                 @endforeach
             </div>
             <div class="form-group">
                 <div style="font-size:12px; font-weight:bold; font-style:italic; padding:0px; margin:0px; margin-bottom:5px; line-height:1.2;">
                    Пользоватеям
                 </div>
                 <?php  $owner_id = 0; ?>
                 @foreach($rfq->rfqVisiblility as $item)
                    @if ($item->company_id != 0)
                        @continue;
                    @endif
                     <div style="display:inline-block; margin-top:5px; padding:5px 10px; border-radius:5px; background-color:#eeeeee; border:#dddddd; margin-right:10px; font-size:14px; font-weight:bold;">
                        {{ $item->user_surname }} {{ $item->user_name }} {{ $item->user_oth }} 
                        @if($item->vtype == 1)
                            <?php  $owner_id = $item->user_id; ?>
            
                            <button type="button" style="font-size:10px; margin-left:10px;"  class="btn btn-primary">Владелец</button>
                        @else
                        <button type="button" style="font-size:10px; margin-left:10px;" onclick="delete_visibility({{ $item->id }}); $(this).parent().css('display', 'none');"  class="btn btn-danger">X</button>
                        @endif
                    </div>
                    
                 @endforeach
             </div>
           </div>

           <div style="font-size:16px; margin-top:10px; padding-left:20px;">
            Приглашение других участников
           </div>
           <div class="formPartContiner">
                <div class="form-group">
                    <label for="contact_id">Компания</label>
                    <select class="form-control select2"  id="visibility_comapany_id">
                        @foreach($visibility_companies as $id => $company)
                            <option value="{{ $id }}" >{{ $company }}</option>
                        @endforeach
                    </select>
                
                    <span class="help-block">{{ trans('cruds.rfq.fields.contact_helper') }}</span>
                    <button type="button" style="font-size:13px;" onclick="add_visibility({{ $rfq->id }}, $('#visibility_comapany_id').val(), '0', '0', '{{ route('admin.rfqs.edit', $rfq->id) }}');"  class="btn btn-primary">  Добавить </button>
                </div>
                @if (Auth::user()->id == $owner_id)
                <div class="form-group">
                    <label for="contact_2_id">Пользователь</label>
                    <select class="form-control select2"  id="visibility_user_id">
                        @foreach($visibility_users as $user)
                            <option value="{{ $user['id'] }}">{{ $user['surname'] }} {{ $user['name'] }} {{ $user['oth'] }}</option>
                        @endforeach
                    </select>
                  
                    <span class="help-block">{{ trans('cruds.rfq.fields.contact_2_helper') }}</span>
                    <button type="button" style="font-size:13px;" onclick="add_visibility({{ $rfq->id }}, '0', '0', $('#visibility_user_id').val(), '{{ route('admin.rfqs.edit', $rfq->id) }}');"  class="btn btn-primary">  Добавить </button>
                </div>
                @endif
            </div>
            </div>


            <div onclick="if($(this).next().is(':hidden')){ $(this).next().slideDown(500); $(this).addClass('opened'); }else{ $(this).next().slideUp(500); $(this).removeClass('opened'); }" class="formPartBlockTitle opened">
                <div class="formPartBlockArrow"><i class="right fa fa-fw fa-angle-left nav-icon"></i></div>
                <div> Добавочные поля для маршрутов </div>
            </div>

            <div>
          
           <div class="formPartContiner">
             <div class="form-group" style="width:100%;">
                
                 @foreach($rfq->routes_additional_fields as $item)
                  
                    <div style="display:inline-block; margin-top:5px; padding:5px 10px; border-radius:5px; background-color:#eeeeee; border:#dddddd; margin-right:10px; font-size:14px; font-weight:bold;">
                        {{ $item->title }} 
                        <button type="button" style="font-size:10px;  margin-left:10px;" onclick="delete_rfq_route_field({{ $item->id }}); $(this).parent().css('display', 'none');"  class="btn btn-danger">X</button>
                    </div>
                 @endforeach
             </div>
             
           </div>

           <div style="font-size:16px; margin-top:10px; padding-left:20px;">
            Добавлени поля
           </div>
           <div class="formPartContiner">
                <div class="form-group">
                    <label for="contact_id">Название поля</label>
                    <input class="form-control" type="text"  id="rfq_route_field_name" value="">
                    <button type="button" style="font-size:13px;" onclick="add_rfq_route_field({{ $rfq->id }}, $('#rfq_route_field_name').val(), '{{ route('admin.rfqs.edit', $rfq->id) }}');"  class="btn btn-primary">  Добавить </button>
                </div>
              
            </div>
            </div>



            <div class="formSubmitEditButtonContainer">
         
                   <div class="formSubmitContainer">
                       <button type="submit"  class="btn btn-primary">  {{ trans('global.save') }} </button>
                   </div>
                  
            </div>
        </form>
  
