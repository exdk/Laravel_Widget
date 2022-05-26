@extends('layouts.admin')
@section('content')
 <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
             <div style="display:flex; align-items:center; justify-content: space-between;">
                   <div style="font-size:24px; font-weight:400; margin-left:20px;"> {{ trans('global.show') }} Результат анкеты "{{ $form_name }}" (пользователя #{{ $user_id }}) набрано {{ $result_points }} балов</div>    
                  
            </div>  
            
        </div>
    </div>


<div class="card">
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    @foreach($answers as $answer)
                    <tr>
                        <th style="width:50%;">
                           {{ $answer['question'] }}
                        </th>
                        <td>
                            {{ $answer['value'] }}
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection