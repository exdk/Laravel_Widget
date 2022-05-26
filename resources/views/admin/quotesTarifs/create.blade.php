@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Создание матрицы
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.quotes-tarifs.store") }}" enctype="multipart/form-data">
            <input type="hidden" name="price_currency" value="0"/>
            <input type="hidden" name="status" value="0"/>
            <input type="hidden" name="parrent_id" value="0"/>
            @csrf
            <div class="form-group">
                <label for="date_start">Дата начала</label>
                <input class="form-control {{ $errors->has('date_start') ? 'is-invalid' : '' }}" type="text" name="date_start" id="date_start" value="{{ old('date_start', '') }}">
                @if($errors->has('date_start'))
                    <span class="text-danger">{{ $errors->first('date_start') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="date_start">Дата завершения</label>
                <input class="form-control {{ $errors->has('date_end') ? 'is-invalid' : '' }}" type="text" name="date_end" id="date_end" value="{{ old('date_end', '') }}">
                @if($errors->has('date_end'))
                    <span class="text-danger">{{ $errors->first('date_end') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="date_start">Город старт</label>
                <select name="point_start"  id="point_start" style="border: solid 1px #dddddd; border-radius:5px; font-size:14px; padding:5px 10px; width:100%; display:block; ">
                    @foreach ($pointloads as $point)
                    <option value="{{ $point['id'] }}">{{ $point['title'] }} ({{ $point['gorod'] }} {{ $point['zip'] }})</option>
                    @endforeach
                </select>
                @if($errors->has('point_start'))
                    <span class="text-danger">{{ $errors->first('point_start') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="date_start">Город направление</label>
                <select name="point_end"  id="point_end" style="border: solid 1px #dddddd; border-radius:5px; font-size:14px; padding:5px 10px; width:100%; display:block; ">
                    @foreach ($pointloads as $point)
                    <option value="{{ $point['id'] }}">{{ $point['title'] }} ({{ $point['gorod'] }} {{ $point['zip'] }})</option>
                    @endforeach
                </select>
                @if($errors->has('point_end'))
                    <span class="text-danger">{{ $errors->first('point_end') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="date_start">Тариф</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', '') }}">
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
            </div>
             <div class="form-group">
                <label for="date_start">Квота</label>
                <input class="form-control {{ $errors->has('quota') ? 'is-invalid' : '' }}" type="text" name="quota" id="quota" value="{{ old('quota', '') }}">
                @if($errors->has('quota'))
                    <span class="text-danger">{{ $errors->first('quota') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="date_start">KPI</label>
                <input class="form-control {{ $errors->has('kpi') ? 'is-invalid' : '' }}" type="text" name="kpi" id="kpi" value="{{ old('kpi', '') }}">
                @if($errors->has('kpi'))
                    <span class="text-danger">{{ $errors->first('kpi') }}</span>
                @endif
            </div>
             <div class="form-group">
                <label for="company_id">Копания</label>
                <select name="company_id"  id="company_id" style="border: solid 1px #dddddd; border-radius:5px; font-size:14px; padding:5px 10px; width:100%; display:block; ">
                    @foreach ($companies as $company)
                    <option value="{{ $company['id'] }}">{{ $company['hortname'] }}</option>
                    @endforeach
                </select>
                @if($errors->has('point_end'))
                    <span class="text-danger">{{ $errors->first('point_end') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection