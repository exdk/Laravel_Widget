<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPartnerBbRequest;
use App\Http\Requests\StorePartnerBbRequest;
use App\Http\Requests\UpdatePartnerBbRequest;
use App\Models\Mycompanall;
use App\Models\Mycompan;
use App\Models\PartnerBb;
use App\Models\Valutum;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PartnerBbController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('partner_bb_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerBbs = PartnerBb::with(['partner', 'valuta', 'team', 'media'])->get();

        return view('admin.partnerBbs.index', compact('partnerBbs'));
    }

    public function create()
    {
        abort_if(Gate::denies('partner_bb_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = Mycompanall::pluck('hortname', 'id')->prepend(trans('global.pleaseSelect'), '');
        //$partners = Mycompan::pluck(['main', 'typecomps', 'typeperevozs', 'megdus', 'team', 'media'])->get();

        $valutas = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.partnerBbs.create', compact('partners', 'valutas'));
    }

    public function store(StorePartnerBbRequest $request)
    {
		$is_isset = PartnerBb::where("partner_id", intval($request->partner_id))->first();
		if(!$is_isset)
		{
			$partnerBb = PartnerBb::create($request->all());

			if ($request->input('dogovor_copy', false)) {
				$partnerBb->addMedia(storage_path('tmp/uploads/' . basename($request->input('dogovor_copy'))))->toMediaCollection('dogovor_copy');
			}

			if ($media = $request->input('ck-media', false)) {
				Media::whereIn('id', $media)->update(['model_id' => $partnerBb->id]);
			}
		}

        return redirect()->route('admin.partner-bbs.index');
    }

    public function edit(PartnerBb $partnerBb)
    {
        abort_if(Gate::denies('partner_bb_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$partners = Mycompanall::pluck('hortname', 'id')->prepend(trans('global.pleaseSelect'), '');
        $partners = Mycompan::pluck('hortname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $valutas = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partnerBb->load('partner', 'valuta', 'team');

        return view('admin.partnerBbs.edit', compact('partnerBb', 'partners', 'valutas'));
    }

    public function update(UpdatePartnerBbRequest $request, PartnerBb $partnerBb)
    {
        $partnerBb->update($request->all());

        if ($request->input('dogovor_copy', false)) {
            if (!$partnerBb->dogovor_copy || $request->input('dogovor_copy') !== $partnerBb->dogovor_copy->file_name) {
                if ($partnerBb->dogovor_copy) {
                    $partnerBb->dogovor_copy->delete();
                }
                $partnerBb->addMedia(storage_path('tmp/uploads/' . basename($request->input('dogovor_copy'))))->toMediaCollection('dogovor_copy');
            }
        } elseif ($partnerBb->dogovor_copy) {
            $partnerBb->dogovor_copy->delete();
        }

        return redirect()->route('admin.partner-bbs.index');
    }

    public function show(PartnerBb $partnerBb)
    {
        abort_if(Gate::denies('partner_bb_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerBb->load('partner', 'valuta', 'team');

        return view('admin.partnerBbs.show', compact('partnerBb'));
    }

    public function destroy(PartnerBb $partnerBb)
    {
        abort_if(Gate::denies('partner_bb_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerBb->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartnerBbRequest $request)
    {
        PartnerBb::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('partner_bb_create') && Gate::denies('partner_bb_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PartnerBb();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
