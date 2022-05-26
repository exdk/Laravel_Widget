@extends('layouts.admin')
@section('content')
@can('assigned_transport_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.assigned-transports.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.assignedTransport.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.assignedTransport.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AssignedTransport">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.first_date_loading') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.statys_vtoroe_bronirovanie') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.tip_pogryzki_vtoroe_bronirovanie') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.bronirovanie_zabronirovano') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.status_yroven_perevozki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.statys_kem_razmeshcheno_yroven_perevozki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.status_yroven_postavki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.status_kem_razmeshcheno_yroven_postavki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.id_gryppi_perevozok') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.tip') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.dopolnitelnie_novera_gryzootpravitelya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.dopolnitelniy_n_gryzootpravitelay_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.dopolnitelniy_n_gryzootpravitelya_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.kolonka') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.start') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.mesto_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.transportnoe_sredstvo_trebovanie') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.vibrosi_co_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.ves') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.obem') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.dlina') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.pozicii') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.registracionniy_n') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.vnytrenniy_kommentariy_k_perevozke') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.statys') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.pribitie') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.otbitie') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.tip_pogryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.statysi_razmestit_otslezhivanie_gryza') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.nazvanie_kompanii_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.gorod_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.gorod_mesto_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.nazvanie_kompanii_mesto_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.spravochnaya_tsena_perevozki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.valyuta_ogovorennoy_tseni_perevozki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.n_perevozki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.transporeonid') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.nomera_postavki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.id_postavki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.kategorii') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.gryzootpravitel') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.otdel_planirovaniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.dispetcher_gryzootpravitelya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.dispetcher_perevozchika') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.statys_eta') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.eta_tip') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.raznitsa_s_eta') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.postavki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.vlozheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.data_pogryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.period_zagryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.data_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.period_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.poslednie_izmeneniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.krayniy_srok') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.otslezhivanie') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.opredelennie_mesta_zagryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.pochtoviy_indeks_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.region_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.strana_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.kommentariy_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.dta_statysa_vtoroe_bronirovanie') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.statys_data_statysa_yroven_perevozki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.data_statysa') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.opredelennie_mesta_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.pochtoviy_indeks_mesto_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.region_mesto_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.zabronirovano_s_vtoroe_bronirovanie') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.data_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.strana_mesto_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.pribitie_vtoroe_bronirovanie') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.zabronirovano_s') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.otbitie_vtoroe_bronirovanie') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.kommentariy_mesto_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.tip_predlozheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.predlozhenie') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignedTransports as $key => $assignedTransport)
                        <tr data-entry-id="{{ $assignedTransport->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $assignedTransport->id ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->first_date_loading ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->statys_vtoroe_bronirovanie ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->tip_pogryzki_vtoroe_bronirovanie ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->bronirovanie_zabronirovano ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->status_yroven_perevozki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->statys_kem_razmeshcheno_yroven_perevozki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->status_yroven_postavki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->status_kem_razmeshcheno_yroven_postavki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->id_gryppi_perevozok ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->tip ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->dopolnitelnie_novera_gryzootpravitelya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->dopolnitelniy_n_gryzootpravitelay_2 ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->dopolnitelniy_n_gryzootpravitelya_3 ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->kolonka ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->start ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->transportnoe_sredstvo_trebovanie ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->vibrosi_co_2 ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->ves ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->obem ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->dlina ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->pozicii ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->registracionniy_n ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->vnytrenniy_kommentariy_k_perevozke ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->statys ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->pribitie ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->otbitie ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->tip_pogryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->statysi_razmestit_otslezhivanie_gryza ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->nazvanie_kompanii_start ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->gorod_start ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->gorod_mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->nazvanie_kompanii_mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->spravochnaya_tsena_perevozki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->valyuta_ogovorennoy_tseni_perevozki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->n_perevozki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->transporeonid ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->nomera_postavki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->id_postavki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->kategorii ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->gryzootpravitel ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->otdel_planirovaniya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->dispetcher_gryzootpravitelya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->dispetcher_perevozchika ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->statys_eta ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->eta_tip ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->raznitsa_s_eta ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->postavki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->vlozheniya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->data_pogryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->period_zagryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->data_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->period_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->poslednie_izmeneniya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->krayniy_srok ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->otslezhivanie ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->opredelennie_mesta_zagryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->pochtoviy_indeks_start ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->region_start ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->strana_start ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->kommentariy_start ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->dta_statysa_vtoroe_bronirovanie ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->statys_data_statysa_yroven_perevozki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->data_statysa ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->opredelennie_mesta_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->pochtoviy_indeks_mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->region_mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->zabronirovano_s_vtoroe_bronirovanie ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->data_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->strana_mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->pribitie_vtoroe_bronirovanie ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->zabronirovano_s ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->otbitie_vtoroe_bronirovanie ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->kommentariy_mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->tip_predlozheniya ?? '' }}
                            </td>
                            <td>
                                {{ $assignedTransport->predlozhenie ?? '' }}
                            </td>
                            <td>
                                @can('assigned_transport_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.assigned-transports.show', $assignedTransport->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('assigned_transport_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.assigned-transports.edit', $assignedTransport->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('assigned_transport_delete')
                                    <form action="{{ route('admin.assigned-transports.destroy', $assignedTransport->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('assigned_transport_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.assigned-transports.massDestroy') }}",
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
  let table = $('.datatable-AssignedTransport:not(.ajaxTable)').DataTable({ buttons: dtButtons, colReorder: true })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection