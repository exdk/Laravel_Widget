@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.perevozchikPerevoz.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.perevozchik-perevozs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozchikPerevoz.fields.id') }}
                        </th>
                        <td>
                            {{ $perevozchikPerevoz->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozchikPerevoz.fields.title') }}
                        </th>
                        <td>
                            {{ $perevozchikPerevoz->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.perevozchikPerevoz.fields.perevozperevoz') }}
                        </th>
                        <td>
                            @foreach($perevozchikPerevoz->perevozperevozs as $key => $perevozperevoz)
                                <span class="label label-info">{{ $perevozperevoz->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.perevozchik-perevozs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection