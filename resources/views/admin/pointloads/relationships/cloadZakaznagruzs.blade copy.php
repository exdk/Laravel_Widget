<div class="m-3">
    @can('zakaznagruz_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.zakaznagruzs.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.zakaznagruz.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.zakaznagruz.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-cloadZakaznagruzs">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.bookmark') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.draft') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.sapid') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.gruz') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.tonnag') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.unit') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.kubatura') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.pointload') }}
                            </th>
                            <th>
                                {{ trans('cruds.pointload.fields.gorod') }}
                            </th>
                            <th>
                                {{ trans('cruds.pointload.fields.ulitca') }}
                            </th>
                            <th>
                                {{ trans('cruds.pointload.fields.dom') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.dateload') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.timeloada') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.timeloadado') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.a_24') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.dopinfoload') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.cload') }}
                            </th>
                            <th>
                                {{ trans('cruds.pointload.fields.gorod') }}
                            </th>
                            <th>
                                {{ trans('cruds.pointload.fields.ulitca') }}
                            </th>
                            <th>
                                {{ trans('cruds.pointload.fields.dom') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.cdate') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.ctime') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.ctimedo') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.с_24') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.typekuzov') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.typeload') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.type_unload') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.ltlftl') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.treb') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.trandoc') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.adr') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.tempot') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.tempdo') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.typeoplata') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.uoviaoplati') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.typetorgov') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.tekprice') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.tart_tena') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.valuta') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.bankday') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.tart_nd') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.valnd') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.bank_daynd') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.nal') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.naldn') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.nalcard') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.hagponig') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.max') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.dopinfoplata') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.kurator_1') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.kontaktprim') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.ktomoget') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.kromezakaz') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.perevozkrome') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.nahalo') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.nahalodate') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.nahalotime') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.finita') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.finitadate') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.hour') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.finitatime') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.min') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.look') }}
                            </th>
                            <th>
                                {{ trans('cruds.zakaznagruz.fields.kolo') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($zakaznagruzs as $key => $zakaznagruz)
                            <tr data-entry-id="{{ $zakaznagruz->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $zakaznagruz->id ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $zakaznagruz->bookmark ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $zakaznagruz->bookmark ? 'checked' : '' }}>
                                </td>
                                <td>
                                    {{ App\Models\Zakaznagruz::DRAFT_RADIO[$zakaznagruz->draft] ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->sapid ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->gruz->gruz ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->tonnag ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->unit->titleru ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->kubatura ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->pointload->title ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->pointload->gorod ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->pointload->ulitca ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->pointload->dom ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->dateload ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->timeloada ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->timeloadado ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $zakaznagruz->a_24 ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $zakaznagruz->a_24 ? 'checked' : '' }}>
                                </td>
                                <td>
                                    {{ $zakaznagruz->dopinfoload ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->cload->title ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->cload->gorod ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->cload->ulitca ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->cload->dom ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->cdate ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->ctime ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->ctimedo ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $zakaznagruz->с_24 ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $zakaznagruz->с_24 ? 'checked' : '' }}>
                                </td>
                                <td>
                                    @foreach($zakaznagruz->typekuzovs as $key => $item)
                                        <span class="badge badge-info">{{ $item->korot }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($zakaznagruz->typeloads as $key => $item)
                                        <span class="badge badge-info">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($zakaznagruz->type_unloads as $key => $item)
                                        <span class="badge badge-info">{{ $item->kor }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $zakaznagruz->ltlftl->title ?? '' }}
                                </td>
                                <td>
                                    @foreach($zakaznagruz->trebs as $key => $item)
                                        <span class="badge badge-info">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($zakaznagruz->trandocs as $key => $item)
                                        <span class="badge badge-info">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $zakaznagruz->adr->title ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->tempot ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->tempdo ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Zakaznagruz::TYPEOPLATA_RADIO[$zakaznagruz->typeoplata] ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->uoviaoplati ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Zakaznagruz::TYPETORGOV_RADIO[$zakaznagruz->typetorgov] ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->tekprice ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->tart_tena ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Zakaznagruz::VALUTA_SELECT[$zakaznagruz->valuta] ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->bankday ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->tart_nd ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->valnd->code ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->bank_daynd ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->nal ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->naldn ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $zakaznagruz->nalcard ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $zakaznagruz->nalcard ? 'checked' : '' }}>
                                </td>
                                <td>
                                    {{ $zakaznagruz->hagponig ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->max ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->dopinfoplata ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->kurator_1->surname ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->kurator_1->name ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->kontaktprim ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Zakaznagruz::KTOMOGET_RADIO[$zakaznagruz->ktomoget] ?? '' }}
                                </td>
                                <td>
                                    @foreach($zakaznagruz->kromezakazs as $key => $item)
                                        <span class="badge badge-info">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($zakaznagruz->perevozkromes as $key => $item)
                                        <span class="badge badge-info">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ App\Models\Zakaznagruz::NAHALO_SELECT[$zakaznagruz->nahalo] ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->nahalodate ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->nahalotime ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Zakaznagruz::FINITA_SELECT[$zakaznagruz->finita] ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->finitadate ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Zakaznagruz::HOUR_SELECT[$zakaznagruz->hour] ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->finitatime ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Zakaznagruz::MIN_SELECT[$zakaznagruz->min] ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->look ?? '' }}
                                </td>
                                <td>
                                    {{ $zakaznagruz->kolo ?? '' }}
                                </td>
                                <td>
                                    @can('zakaznagruz_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.zakaznagruzs.show', $zakaznagruz->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('zakaznagruz_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.zakaznagruzs.edit', $zakaznagruz->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('zakaznagruz_delete')
                                        <form action="{{ route('admin.zakaznagruzs.destroy', $zakaznagruz->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('zakaznagruz_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.zakaznagruzs.massDestroy') }}",
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
  let table = $('.datatable-cloadZakaznagruzs:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection