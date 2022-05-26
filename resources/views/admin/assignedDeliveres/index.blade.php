@extends('layouts.admin')
@section('content')
@can('assigned_delivere_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.assigned-deliveres.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.assignedDelivere.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.assignedDelivere.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AssignedDelivere">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.deliveryid') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.statusi_razmestit_otslezhivanie_gryza') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.n_postavki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.id_postavki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.n_perevozki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.data_naznacheniya_yroven_perevozki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.gryzootpravitel') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.eta') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.statys_eta') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.raznitsa_s_eta') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.eta_tip') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.nazvanie_kompanii_mesto_zagryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.dopolnitelnie_dannie_adresa_mesto_zagryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.ylitsa_i_nom_doma_mesto_zagryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.pochtoviy_indeks_mesto_zagryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.gorod_mesto_zagryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.region_mesto_zagryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.strana_mesto_zagryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.nomer_telefona_dlya_avizo_mesto_zagryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.kommentariy_mesto_zagryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.data_zagryzki_ot') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.data_zagryzki_do') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.nazvanie_kompanii_mesto_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.dopolnitelnie_dannie_adesa_mesto_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.ylitsa_i_nom_doma_mesto_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.pochtoviy_indeks_mesto_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.gorod_mesto_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.region_mesto_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.nomer_telefona_dlya_avizo_mesto_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.kommentariy_mesto_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.data_razgryzki_ot') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.data_razgryzki_do') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.inkotermsi') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.inkoterms_gorod') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.ves') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.obem') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.edinitsa_vesa') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.edinitsa_obema') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.dlina') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.edinitsa_dlini') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.pozichii') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.transportnoe_sredstvo_trebovanie') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.registratsionniy_n') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.transportnie_edinitsi') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.transpostnaya_edinitsa') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.klass_opasnih_gryzov_opasnie_gryzi_n') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.kommentariy_k_postavke') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.statys_yroven_postavki_otslezhivanie_gryza') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.statys_statys_data_yroven_postavki_otslezhivanie_gryza') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.statys_kommentariy_yroven_postavki_otslezhivanie_gryza') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.vlozheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.poslednie_izmeneniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.transporeon_id_yroven_perevozki') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignedDeliveres as $key => $assignedDelivere)
                        <tr data-entry-id="{{ $assignedDelivere->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $assignedDelivere->id ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->deliveryid ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->statusi_razmestit_otslezhivanie_gryza ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->n_postavki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->id_postavki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->n_perevozki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->data_naznacheniya_yroven_perevozki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->gryzootpravitel ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->eta ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->statys_eta ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->raznitsa_s_eta ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->eta_tip ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->nazvanie_kompanii_mesto_zagryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->dopolnitelnie_dannie_adresa_mesto_zagryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->ylitsa_i_nom_doma_mesto_zagryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->pochtoviy_indeks_mesto_zagryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->gorod_mesto_zagryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->region_mesto_zagryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->strana_mesto_zagryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->nomer_telefona_dlya_avizo_mesto_zagryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->kommentariy_mesto_zagryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->data_zagryzki_ot ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->data_zagryzki_do ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->nazvanie_kompanii_mesto_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->dopolnitelnie_dannie_adesa_mesto_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->ylitsa_i_nom_doma_mesto_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->pochtoviy_indeks_mesto_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->gorod_mesto_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->region_mesto_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->nomer_telefona_dlya_avizo_mesto_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->kommentariy_mesto_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->data_razgryzki_ot ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->data_razgryzki_do ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->inkotermsi ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->inkoterms_gorod ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->ves ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->obem ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->edinitsa_vesa ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->edinitsa_obema ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->dlina ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->edinitsa_dlini ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->pozichii ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->transportnoe_sredstvo_trebovanie ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->registratsionniy_n ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->transportnie_edinitsi ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->transpostnaya_edinitsa ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->klass_opasnih_gryzov_opasnie_gryzi_n ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->kommentariy_k_postavke ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->statys_yroven_postavki_otslezhivanie_gryza ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->statys_statys_data_yroven_postavki_otslezhivanie_gryza ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->statys_kommentariy_yroven_postavki_otslezhivanie_gryza ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->vlozheniya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->poslednie_izmeneniya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedDelivere->transporeon_id_yroven_perevozki ?? '' }}
                            </td>
                            <td>
                                @can('assigned_delivere_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.assigned-deliveres.show', $assignedDelivere->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('assigned_delivere_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.assigned-deliveres.edit', $assignedDelivere->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('assigned_delivere_delete')
                                    <form action="{{ route('admin.assigned-deliveres.destroy', $assignedDelivere->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('assigned_delivere_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.assigned-deliveres.massDestroy') }}",
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
  let table = $('.datatable-AssignedDelivere:not(.ajaxTable)').DataTable({ buttons: dtButtons, colReorder: true })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection