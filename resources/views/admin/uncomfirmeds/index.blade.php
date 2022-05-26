@extends('layouts.admin')
@section('content')
@can('uncomfirmed_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.uncomfirmeds.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.uncomfirmed.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.uncomfirmed.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Uncomfirmed">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.transpareon') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.kolonka') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.transportnoe_sredstvo_trebovanie') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.ves') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.obem') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.dlina') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.pozicii') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.strana_mesto_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.vnutrenniy_kommentariy_k_perevozke') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.id_gryppi_perevozok') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.dopolnitelnie_nomera_gryzootpravitelya') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.dopolnitelniy_n_gryzootpravitelya_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.pochtoviy_indeks_mesto_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.dopolnitelniy_n_gryzootpravitelya_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.kategorii') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.dispetcher_gryzootpravitelya') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.pochtoviy_indeks_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.region_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.strana_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.kommentariy_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.otdel_planirovaniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.period_zagryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.period_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.start') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.mesto_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.krainiy_srok') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.rassoyanie') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.sostoyanie_chteniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.sostoyanie_pechati') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.transporeonid') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.gryzootpravitel') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.postavki') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.data_pogryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.data_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.poslednie_izmeneniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.opredelennie_mesta_zagryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.nazvanie_kompanii_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.gorod_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.opredelennie_mesta_razgryzki') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.nazvanie_kompanii_mesto_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.gorod_mesto_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.spravochnaya_cena_perevozki') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.region_mesto_naznacheniya') }}
                        </th>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.kommentariy_mesto_naznacheniya') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($uncomfirmeds as $key => $uncomfirmed)
                        <tr data-entry-id="{{ $uncomfirmed->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $uncomfirmed->id ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->transpareon ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->kolonka ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->transportnoe_sredstvo_trebovanie ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->ves ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->obem ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->dlina ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->pozicii ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->strana_mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->vnutrenniy_kommentariy_k_perevozke ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->id_gryppi_perevozok ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->dopolnitelnie_nomera_gryzootpravitelya ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->dopolnitelniy_n_gryzootpravitelya_2 ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->pochtoviy_indeks_mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->dopolnitelniy_n_gryzootpravitelya_3 ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->kategorii ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->dispetcher_gryzootpravitelya ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->pochtoviy_indeks_start ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->region_start ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->strana_start ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->kommentariy_start ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->otdel_planirovaniya ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->period_zagryzki ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->period_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->start ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->krainiy_srok ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->rassoyanie ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->sostoyanie_chteniya ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->sostoyanie_pechati ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->transporeonid ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->gryzootpravitel ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->postavki ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->data_pogryzki ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->data_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->poslednie_izmeneniya ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->opredelennie_mesta_zagryzki ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->nazvanie_kompanii_start ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->gorod_start ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->opredelennie_mesta_razgryzki ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->nazvanie_kompanii_mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->gorod_mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->spravochnaya_cena_perevozki ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->region_mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                {{ $uncomfirmed->kommentariy_mesto_naznacheniya ?? '' }}
                            </td>
                            <td>
                                @can('uncomfirmed_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.uncomfirmeds.show', $uncomfirmed->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('uncomfirmed_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.uncomfirmeds.edit', $uncomfirmed->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('uncomfirmed_delete')
                                    <form action="{{ route('admin.uncomfirmeds.destroy', $uncomfirmed->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('uncomfirmed_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.uncomfirmeds.massDestroy') }}",
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
  let table = $('.datatable-Uncomfirmed:not(.ajaxTable)').DataTable({ buttons: dtButtons, colReorder: true })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection