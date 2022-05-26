@extends('layouts.admin')
@section('content')

 <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
             <div style="display:flex; align-items:center; justify-content: space-between;">
                    <div style="font-size:24px; font-weight:400; margin-left:20px;">{{ $form['title'] }} <span style="padding-left:20px; font-size:16px;">[ Результат заполненно балов: {{ $result_points }}  ]</span> </div> 
                  
            </div>  
            
        </div>
    </div>

<div class="card">
    <div class="card-body" id="form_container">
            <form action="{{ route("admin.formsValues.save") }}" method="POST" enctype="multipart/form-data">    
                <input type="hidden" name="form_id" value="{{ $form['id'] }}">
                <input type="hidden" name="rfi_id" value="{{ $rfi_id }}">
                @method('POST')
                @csrf
                @isset($formItems[0])  
                    @foreach($formItems[0] as $key => $item)
                        @include('admin.formsValues.container', [$formItems, $item])
                    @endforeach
                @endisset
                
                <div class="form-group" style="margin-top:20px;">
                    <button class="btn btn-danger">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>

    </div>
</div>


@endsection


