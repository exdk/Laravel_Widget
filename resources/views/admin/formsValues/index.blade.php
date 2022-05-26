@extends('layouts.admin')
@section('content')
 <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
             <div style="display:flex; align-items:center; justify-content: space-between;">
                   <div style="font-size:24px; font-weight:400; margin-left:20px;">Результаты анкеты (#{{ $form_id }})</div>    
                  
            </div>  
            
        </div>
    </div>

<div class="card">


    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Adr">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                           {{ trans('cruds.forms.fields.title') }} 
                        </th>
                        <th>
                            
                            Пользователь
                        </th>
						<th>
							Сумма баллов
						</th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($forms as $key => $form)
                        <tr data-entry-id="{{ $form['id'] }}" data-company-id="{{$form['company_id']}}">
                            <td>

                            </td>
                            <td>
                              {{ $form['title'] ?? '' }}
                              
                            </td>
                            <td>
                               {{ $form['company_name'] ?? '' }} 
                            </td>
							<td>
                               {{ $form['result_points'] ?? '' }} 
                            </td>
                            <td>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.formsValues.showResult', ['form_id'=>$form['id'], 'user_id'=>$form['user_id']]) }}">
                                     Смотреть результаты
                                </a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('adr_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.adrs.massDestroy') }}",
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
  
  let addPartnersButtonTrans = '{{trans("global.datatables.addPartners")}}'
  let addPartnersButton = {
	  text: addPartnersButtonTrans,
	  url: "{{route('admin.formsValues.addPartners')}}",
	  className: 'btn-success',
	  action: function(e, dt, node, config){
		  var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
			  return $(entry).data('company-id')
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
			  data: { ids: ids }})
			  .done(function (data) {
				  if(data.status == "ok")
				  {
					  alert('{{trans("global.datatables.addPartnersSuccess")}}');
					  return;
				  }
				  //location.reload() 
				})
		  }
		  
	  }
  }
  dtButtons.push(addPartnersButton)
  
  
  let addPartnersGroupButtonTrans = '{{trans("global.datatables.addPartnersGroup")}}';
  let addPartnersGroupButton = {
	  text: addPartnersGroupButtonTrans,
	  url: "{{route('admin.formsValues.addPartnersGroup')}}",
	  className: 'btn-success',
	  action: function (e, dt, node, config){
		  var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
			  return $(entry).data('company-id')
		  });

		  if (ids.length === 0) {
			alert('{{ trans('global.datatables.zero_selected') }}')
			return
		  }
		  
		  if (confirm('{{ trans('global.areYouSure') }}')) {
			  let groupName = prompt('{{trans("global.datatables.inputPartnersGroupName")}}', '{{trans("global.datatables.inputPartnersGroupDefault")}}');
			  if(groupName == null)
			  {
				  alert('{{trans("global.datatables.inputPartnersGroupNameErrorEmpty")}}');
				  return;
			  }
			  $.ajax({
			  headers: {'x-csrf-token': _token},
			  method: 'POST',
			  url: "{{route('admin.formsValues.addPartners')}}",
			  data: { ids: ids }})
			  .done(function (data) {
				  if(data.status == "ok")
				  {
					$.ajax({
					  headers: {'x-csrf-token': _token},
					  method: 'POST',
					  url: config.url,
					  data: { ids: ids, groupName: groupName }})
					  .done(function (data) {
						  if(data.status == "ok")
						  {
							alert('{{trans("global.datatables.addPartnersGroupSuccess")}}');
							return;
						  } 
					})
				  } 
				})
		  }
	  }
  }
  dtButtons.push(addPartnersGroupButton)


  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Adr:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection