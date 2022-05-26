@extends('layouts.admin')
@section('content')
@can('offering_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.offerings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.offering.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.offering.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Offering">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.date_first_load') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.transporeonid') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.neobhodimie_perevozki') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.procent_kvoti_vipolneno') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.poslednie_izmeneniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.opredelennie_mesta_zagryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.poctoviy_indeks_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.region_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.strana_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.kommentariy_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.opredelennie_mesta_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.poctoviy_indeks_mesto_naznaceniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.strana_mesto_naznaceniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.kommentariy_mesto_naznaceniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.predlozheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.predlozhenie') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.tip_predlozheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.deystvitelno_do') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.kommentarii_k_predlozheniyu') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.transportnoe_sredstvo_trebovanie') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.ves') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.obem') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.dlina') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.pozicii') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.vnutrenniy_kommentariy_k_perevozke') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.id_gryppi_perevozok') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.dopolnitelnie_nomera_gryzootpravitelya') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.sposob_naznaceniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.dopolnitelniy_n_gryzootpravitelya_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.dopolnitelniy_n_gryzootpravitelya_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.rassoyanie') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.otdel_planirovaniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.period_zagruzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.period_razgruzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.kolonka') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.start') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.mesto_naznaceniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.sostoyanie_chteniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.sostoyanie_pechati') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.data_pogruzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.data_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.krainiy_srok') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.gorod_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.nazvanie_kompanii_mesto_naznaceniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.spravochnaya_cena_perevozki') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.distetcher_gryzootpravitelya') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.kategorii') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.region_mesto_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.dispetcher_perevozchika') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.gryzootpravitel') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.postavki') }}
                        </th>
                        <th>
                            {{ trans('cruds.offering.fields.naznachennie_perevozki') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($offerings as $key => $offering)
                        <tr data-entry-id="{{ $offering->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $offering->id ?? '' }}
                            </td>
                            <td>
                                {{ $offering->date_first_load ?? '' }}
                            </td>
                            <td>
                                {{ $offering->transporeonid ?? '' }}
                            </td>
                            <td>
                                {{ $offering->neobhodimie_perevozki ?? '' }}
                            </td>
                            <td>
                                {{ $offering->procent_kvoti_vipolneno ?? '' }}
                            </td>
                            <td>
                                {{ $offering->poslednie_izmeneniya ?? '' }}
                            </td>
                            <td>
                                {{ $offering->opredelennie_mesta_zagryzki ?? '' }}
                            </td>
                            <td>
                                {{ $offering->poctoviy_indeks_start ?? '' }}
                            </td>
                            <td>
                                {{ $offering->region_start ?? '' }}
                            </td>
                            <td>
                                {{ $offering->strana_start ?? '' }}
                            </td>
                            <td>
                                {{ $offering->kommentariy_start ?? '' }}
                            </td>
                            <td>
                                {{ $offering->opredelennie_mesta_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $offering->poctoviy_indeks_mesto_naznaceniya ?? '' }}
                            </td>
                            <td>
                                {{ $offering->strana_mesto_naznaceniya ?? '' }}
                            </td>
                            <td>
                                {{ $offering->kommentariy_mesto_naznaceniya ?? '' }}
                            </td>
                            <td>
                                {{ $offering->predlozheniya ?? '' }}
                            </td>
                            <td>
                                {{ $offering->predlozhenie ?? '' }}
                            </td>
                            <td>
                                {{ $offering->tip_predlozheniya ?? '' }}
                            </td>
                            <td>
                                {{ $offering->deystvitelno_do ?? '' }}
                            </td>
                            <td>
                                {{ $offering->kommentarii_k_predlozheniyu ?? '' }}
                            </td>
                            <td>
                                {{ $offering->transportnoe_sredstvo_trebovanie ?? '' }}
                            </td>
                            <td>
                                {{ $offering->ves ?? '' }}
                            </td>
                            <td>
                                {{ $offering->obem ?? '' }}
                            </td>
                            <td>
                                {{ $offering->dlina ?? '' }}
                            </td>
                            <td>
                                {{ $offering->pozicii ?? '' }}
                            </td>
                            <td>
                                {{ $offering->vnutrenniy_kommentariy_k_perevozke ?? '' }}
                            </td>
                            <td>
                                {{ $offering->id_gryppi_perevozok ?? '' }}
                            </td>
                            <td>
                                {{ $offering->dopolnitelnie_nomera_gryzootpravitelya ?? '' }}
                            </td>
                            <td>
                                {{ $offering->sposob_naznaceniya ?? '' }}
                            </td>
                            <td>
                                {{ $offering->dopolnitelniy_n_gryzootpravitelya_2 ?? '' }}
                            </td>
                            <td>
                                {{ $offering->dopolnitelniy_n_gryzootpravitelya_3 ?? '' }}
                            </td>
                            <td>
                                {{ $offering->rassoyanie ?? '' }}
                            </td>
                            <td>
                                {{ $offering->otdel_planirovaniya ?? '' }}
                            </td>
                            <td>
                                {{ $offering->period_zagruzki ?? '' }}
                            </td>
                            <td>
                                {{ $offering->period_razgruzki ?? '' }}
                            </td>
                            <td>
                                {{ $offering->kolonka ?? '' }}
                            </td>
                            <td>
                                {{ $offering->start ?? '' }}
                            </td>
                            <td>
                                {{ $offering->mesto_naznaceniya ?? '' }}
                            </td>
                            <td>
                                {{ $offering->sostoyanie_chteniya ?? '' }}
                            </td>
                            <td>
                                {{ $offering->sostoyanie_pechati ?? '' }}
                            </td>
                            <td>
                                {{ $offering->data_pogruzki ?? '' }}
                            </td>
                            <td>
                                {{ $offering->data_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $offering->krainiy_srok ?? '' }}
                            </td>
                            <td>
                                {{ $offering->gorod_start ?? '' }}
                            </td>
                            <td>
                                {{ $offering->nazvanie_kompanii_mesto_naznaceniya ?? '' }}
                            </td>
                            <td>
                                {{ $offering->spravochnaya_cena_perevozki ?? '' }}
                            </td>
                            <td>
                                {{ $offering->distetcher_gryzootpravitelya ?? '' }}
                            </td>
                            <td>
                                {{ $offering->kategorii ?? '' }}
                            </td>
                            <td>
                                {{ $offering->region_mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $offering->dispetcher_perevozchika ?? '' }}
                            </td>
                            <td>
                                {{ $offering->gryzootpravitel ?? '' }}
                            </td>
                            <td>
                                {{ $offering->postavki ?? '' }}
                            </td>
                            <td>
                                {{ $offering->naznachennie_perevozki ?? '' }}
                            </td>
                            <td>
                                @can('offering_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.offerings.show', $offering->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('offering_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.offerings.edit', $offering->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('offering_delete')
                                    <form action="{{ route('admin.offerings.destroy', $offering->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('offering_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.offerings.massDestroy') }}",
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
  let table = $('.datatable-Offering:not(.ajaxTable)').DataTable({ buttons: dtButtons, colReorder: true })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection