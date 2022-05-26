@extends('layouts.admin')
@section('content')

@can('rfq_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
             <div style="display:flex; align-items:center; justify-content: space-between;">
                   <div style="font-size:24px; font-weight:400; margin-left:20px;">{{ trans('cruds.rfq.title_singular') }} {{ trans('global.list') }}</div>    
                   <div>
                        <button type="button" style="padding-left:20px; padding-right:20px; margin-right:10px;" onclick="get_rfq_create();" class="btn btn-primary" data-toggle="modal" data-target="#RfqFrom"> +  Добавить </button>
                        <!--a class="btn btn-success" href="{{ route('admin.rfqs.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.rfq.title_singular') }}
                        </a-->
                        <button style="margin-right:15px;" class="btn btn-default" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Rfq', 'route' => 'admin.rfqs.parseCsvImport'])
                    </div>
            </div>  
            
        </div>
    </div>
@endcan
<div class="card">

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Rfq">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.rfq.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.rfq.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.rfq.fields.typetr') }}
                        </th>
                        <th>
                            {{ trans('cruds.rfq.fields.title') }}
                        </th>
                        <th>
                            Клиент
                        </th>
                        <th>
                            {{ trans('cruds.rfq.fields.finish') }}
                        </th>
          
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Rfq::STATUS_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($transports as $key => $item)
                                    <option value="{{ $item->type }}">{{ $item->type }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                             &nbsp;
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rfqs as $key => $rfq)
                       @cannot('rfq_edit')
                          @if($rfq->status == 0) 
                            @continue;
                          @endif  
                       @endcannot
                        <tr data-entry-id="{{ $rfq->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $rfq->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Rfq::STATUS_SELECT[$rfq->status] ?? '' }}
                            </td>
                            <td>
                                @foreach($rfq->typetrs as $key => $item)
                                    {{ $item->type }}
                                @endforeach
                            </td>
                            <td>
                               
                                    <a href="{{ route('admin.rfqs.edit', $rfq->id) }}">
                                         {{ $rfq->title ?? '' }}
                                    </a>
                      
                               
                            </td>
                            <td>
                                @php
$uid = $rfq->team_id;
    $role = \DB::table('mycompans')
        ->where('mycompans.team_id','=',$uid)
        ->first();
		if(isset($role->hortname))
		{
			echo $role->hortname;
		}
@endphp
                            </td>
                            <td>
                                {{ $rfq->finish ?? '' }}
                            </td>
                            

                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.rfqs.show', $rfq->id) }}">
                                        {{ trans('global.view') }}
                                </a>
                                @can('rfq_edit')
                                <button class="btn btn-xs btn-primary"  data-toggle="modal" onclick="get_rfq_edit('{{ route('admin.rfqs.edit', $rfq->id) }}');" data-target="#RfqFrom">
                                        Редактировать
                                    </button>
                                 @endcan 
                                 @can('rfq_edit')  
                                 <form action="{{ route('admin.rfqs.destroy', $rfq->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block; margin-top:5px;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                 @endcan   
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="RfqFrom">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">RFQ</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="RfqFormContent" style="padding:0px;">
        ---
      </div>

     

    </div>
  </div>
</div>
<script>
  (function() {
      Dropzone.autoDiscover = false;

  })();
  
  function get_rfq_create(){
    $('#RfqFormContent').html('---');
             
    $.ajax({
        type: 'GET',
        data: ({}),
        url : "{{ route('admin.rfqs.create') }}",
        async: true,
        success: function(response){ 
            $('#RfqFormContent').html(response);
            
           
           $('.datetime').datetimepicker({
              format: 'DD.MM.YYYY HH:mm:ss',
              locale: 'en',
              sideBySide: true,
              icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
              }
            });

             $('.date').datetimepicker({
              format: 'DD.MM.YYYY',
              locale: 'en',
              icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
              }
            });

             var uploadedApplicationsMap = {}
              myDropzone = new Dropzone('div#applications-dropzone', {
                  url: '{{ route('admin.rfqs.storeMedia') }}',
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
                    /*  @if(isset($rfq) && $rfq->applications)
                                var files =
                                  {!! json_encode($rfq->applications) !!}
                                    for (var i in files) {
                                    var file = files[i]
                                    this.options.addedfile.call(this, file)
                                    file.previewElement.classList.add('dz-complete')
                                    $('form').append('<input type="hidden" name="applications[]" value="' + file.file_name + '">')
                                  }
                      @endif */
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
              });

            

            
        }
    }); 
}

  function get_rfq_edit(url){
    $('#RfqFormContent').html('---');
    $.ajax({
        type: 'GET',
        data: ({}),
        url : url,
        async: true,
        success: function(response){ 
            $('#RfqFormContent').html(response);

            $('.datetime').datetimepicker({
              format: 'DD.MM.YYYY HH:mm:ss',
              locale: 'en',
              sideBySide: true,
              icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
              }
            });
           

             $('.date').datetimepicker({
              format: 'DD.MM.YYYY',
              locale: 'en',
              icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
              }
            });
             
              var uploadedApplicationsMap = {}
              myDropzone = new Dropzone('div#applications-dropzone', {
                  url: '{{ route('admin.rfqs.storeMedia') }}',
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
                    /*  @if(isset($rfq) && $rfq->applications)
                                var files =
                                  {!! json_encode($rfq->applications) !!}
                                    for (var i in files) {
                                    var file = files[i]
                                    this.options.addedfile.call(this, file)
                                    file.previewElement.classList.add('dz-complete')
                                    $('form').append('<input type="hidden" name="applications[]" value="' + file.file_name + '">')
                                  }
                      @endif */
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
              });

        }
    }); 
}



function add_visibility(rfq_id, company_id, item_type, user_id, rfq_edit_url="-"){
   
    $.ajax({
        type: 'POST',
        data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'rfq_id':rfq_id, 'company_id':company_id, 'user_id':user_id }),
        url : '{{ route('admin.rfqs.addVisibility') }}',
        async:  true,
        success: function(response){ 
           if(response == "+"){
                if(rfq_edit_url != "-"){
                  get_rfq_edit(rfq_edit_url)
                }else{
                  location.reload();
                }
                
           }
        }
    }); 
    
} 

function delete_visibility(visibility_id){
   
    $.ajax({
        type: 'POST',
        data: ({'_token':'{{ csrf_token() }}', '_method':'POST', 'visibility_id':visibility_id }),
        url : '{{ route('admin.rfqs.removeVisibility') }}',
        async:  true,
        success: function(response){ 
           if(response == "+"){
                //location.reload();
           }
        }
    }); 
    
} 


 
</script>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('rfq_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rfqs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Rfq:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection