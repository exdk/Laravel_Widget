@extends('layouts.admin')
@section('content')
@can('control_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.controls.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.control.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.control.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Control">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.control.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.i_dgruza') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.load_reference_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.voditeli') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.statys_otobrazheniay') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.data_i_vremay_nachala') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.adres_otpravleniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.adres_mesta_naznacheniay') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.poslednee_sobitie') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.nazvanie_pynkta_naznacheniay') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.tip_oborydovaniay_treiler') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.nomer_tyagacha') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.data_vremya_zaversheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.identifikator_reisa') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.kolichestvo_edinich') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.kolichestvo_osnovnih_ostanovok') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.ves_kg') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.kontaktnoe_lico') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.nomer_zakaza_postavshika_sirya_i_mat') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.nomer_posledovatelnosti_reisov') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.klient') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.nomer_treilera') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.obem_cu_m') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.ostanovki_v_tranzite') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.poddoni_dlya_perevozki_gryzov') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.primechanie') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.rassoyanie_km') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.imya_klienta') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.gorod_otpravleniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.gorod_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.identifikator_bronirovaniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.opisanie_tipa_transporta_treiler') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.stoimost_zakaza_rub') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.nomer_otslezhivaniya_gryza') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.phakticheskaya_data_nachala_pogryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.load_reference_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.identifikator_pynkta_otpravleniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.identifikator_pynkta_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.tovar') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.registracionnii_kod_18') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.auction') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.load_reference_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.pod_load_group') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.pod_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.sap_shipment_document_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.adres_mesta_otpravleniya_sydna') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.adres_mesta_pribitiya_sydna') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.adres_svyazannogo_mesta_otpravleniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.vklychit_v_cislo_ispolzovanii_resyrsa') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.vladelec_treilera') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.vladelec_tyagacha') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.vnytrennii_n_zakaza_perevozchika') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.vigryzka_bez_voditelya') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.data_i_vremya_obnovleniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.data_i_vremya_sozdaniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.data_vremya_konteinernogo_sklada') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.datetimestartship') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.datetimearriveship') }}
                        </th>
                        <th>
                            {{ trans('cruds.control.fields.data_vremya_ocenki') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($controls as $key => $control)
                        <tr data-entry-id="{{ $control->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $control->id ?? '' }}
                            </td>
                            <td>
                                {{ $control->i_dgruza ?? '' }}
                            </td>
                            <td>
                                {{ $control->load_reference_3 ?? '' }}
                            </td>
                            <td>
                                {{ $control->voditeli ?? '' }}
                            </td>
                            <td>
                                {{ $control->statys_otobrazheniay ?? '' }}
                            </td>
                            <td>
                                {{ $control->data_i_vremay_nachala ?? '' }}
                            </td>
                            <td>
                                {{ $control->adres_otpravleniya ?? '' }}
                            </td>
                            <td>
                                {{ $control->adres_mesta_naznacheniay ?? '' }}
                            </td>
                            <td>
                                {{ $control->poslednee_sobitie ?? '' }}
                            </td>
                            <td>
                                {{ $control->nazvanie_pynkta_naznacheniay ?? '' }}
                            </td>
                            <td>
                                {{ $control->tip_oborydovaniay_treiler ?? '' }}
                            </td>
                            <td>
                                {{ $control->nomer_tyagacha ?? '' }}
                            </td>
                            <td>
                                {{ $control->data_vremya_zaversheniya ?? '' }}
                            </td>
                            <td>
                                {{ $control->identifikator_reisa ?? '' }}
                            </td>
                            <td>
                                {{ $control->kolichestvo_edinich ?? '' }}
                            </td>
                            <td>
                                {{ $control->kolichestvo_osnovnih_ostanovok ?? '' }}
                            </td>
                            <td>
                                {{ $control->ves_kg ?? '' }}
                            </td>
                            <td>
                                {{ $control->kontaktnoe_lico ?? '' }}
                            </td>
                            <td>
                                {{ $control->nomer_zakaza_postavshika_sirya_i_mat ?? '' }}
                            </td>
                            <td>
                                {{ $control->nomer_posledovatelnosti_reisov ?? '' }}
                            </td>
                            <td>
                                {{ $control->klient ?? '' }}
                            </td>
                            <td>
                                {{ $control->nomer_treilera ?? '' }}
                            </td>
                            <td>
                                {{ $control->obem_cu_m ?? '' }}
                            </td>
                            <td>
                                {{ $control->ostanovki_v_tranzite ?? '' }}
                            </td>
                            <td>
                                {{ $control->poddoni_dlya_perevozki_gryzov ?? '' }}
                            </td>
                            <td>
                                {{ $control->primechanie ?? '' }}
                            </td>
                            <td>
                                {{ $control->rassoyanie_km ?? '' }}
                            </td>
                            <td>
                                {{ $control->imya_klienta ?? '' }}
                            </td>
                            <td>
                                {{ $control->gorod_otpravleniya ?? '' }}
                            </td>
                            <td>
                                {{ $control->gorod_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $control->identifikator_bronirovaniya ?? '' }}
                            </td>
                            <td>
                                {{ $control->opisanie_tipa_transporta_treiler ?? '' }}
                            </td>
                            <td>
                                {{ $control->stoimost_zakaza_rub ?? '' }}
                            </td>
                            <td>
                                {{ $control->nomer_otslezhivaniya_gryza ?? '' }}
                            </td>
                            <td>
                                {{ $control->phakticheskaya_data_nachala_pogryzki ?? '' }}
                            </td>
                            <td>
                                {{ $control->load_reference_1 ?? '' }}
                            </td>
                            <td>
                                {{ $control->identifikator_pynkta_otpravleniya ?? '' }}
                            </td>
                            <td>
                                {{ $control->identifikator_pynkta_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $control->tovar ?? '' }}
                            </td>
                            <td>
                                {{ $control->registracionnii_kod_18 ?? '' }}
                            </td>
                            <td>
                                {{ $control->auction ?? '' }}
                            </td>
                            <td>
                                {{ $control->load_reference_2 ?? '' }}
                            </td>
                            <td>
                                {{ $control->pod_load_group ?? '' }}
                            </td>
                            <td>
                                {{ $control->pod_status ?? '' }}
                            </td>
                            <td>
                                {{ $control->sap_shipment_document_number ?? '' }}
                            </td>
                            <td>
                                {{ $control->adres_mesta_otpravleniya_sydna ?? '' }}
                            </td>
                            <td>
                                {{ $control->adres_mesta_pribitiya_sydna ?? '' }}
                            </td>
                            <td>
                                {{ $control->adres_svyazannogo_mesta_otpravleniya ?? '' }}
                            </td>
                            <td>
                                {{ $control->vklychit_v_cislo_ispolzovanii_resyrsa ?? '' }}
                            </td>
                            <td>
                                {{ $control->vladelec_treilera ?? '' }}
                            </td>
                            <td>
                                {{ $control->vladelec_tyagacha ?? '' }}
                            </td>
                            <td>
                                {{ $control->vnytrennii_n_zakaza_perevozchika ?? '' }}
                            </td>
                            <td>
                                {{ $control->vigryzka_bez_voditelya ?? '' }}
                            </td>
                            <td>
                                {{ $control->data_i_vremya_obnovleniya ?? '' }}
                            </td>
                            <td>
                                {{ $control->data_i_vremya_sozdaniya ?? '' }}
                            </td>
                            <td>
                                {{ $control->data_vremya_konteinernogo_sklada ?? '' }}
                            </td>
                            <td>
                                {{ $control->datetimestartship ?? '' }}
                            </td>
                            <td>
                                {{ $control->datetimearriveship ?? '' }}
                            </td>
                            <td>
                                {{ $control->data_vremya_ocenki ?? '' }}
                            </td>
                            <td>
                                @can('control_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.controls.show', $control->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('control_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.controls.edit', $control->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('control_delete')
                                    <form action="{{ route('admin.controls.destroy', $control->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('control_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.controls.massDestroy') }}",
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
  let table = $('.datatable-Control:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection