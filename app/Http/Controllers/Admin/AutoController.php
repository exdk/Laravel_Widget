<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAutoRequest;
use App\Http\Requests\StoreAutoRequest;
use App\Http\Requests\UpdateAutoRequest;
use App\Models\Adr;
use App\Models\Auto;
use App\Models\Typeload;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AutoController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('auto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $autos = Auto::with(['typeloads', 'adrs', 'media'])->get();

        return view('admin.autos.index', compact('autos'));
    }

    public function create()
    {
        abort_if(Gate::denies('auto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeloads = Typeload::pluck('title', 'id');

        $adrs = Adr::pluck('title', 'id');

        return view('admin.autos.create', compact('typeloads', 'adrs'));
    }

    public function store(StoreAutoRequest $request)
    {
        $auto = Auto::create($request->all());
        $auto->typeloads()->sync($request->input('typeloads', []));
        $auto->adrs()->sync($request->input('adrs', []));
        if ($request->input('pt_perv', false)) {
            $auto->addMedia(storage_path('tmp/uploads/' . basename($request->input('pt_perv'))))->toMediaCollection('pt_perv');
        }

        if ($request->input('pt_vtor', false)) {
            $auto->addMedia(storage_path('tmp/uploads/' . basename($request->input('pt_vtor'))))->toMediaCollection('pt_vtor');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $auto->id]);
        }

        return redirect()->route('admin.autos.index');
    }

    public function edit(Auto $auto)
    {
        abort_if(Gate::denies('auto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeloads = Typeload::pluck('title', 'id');

        $adrs = Adr::pluck('title', 'id');

        $auto->load('typeloads', 'adrs');

        return view('admin.autos.edit', compact('typeloads', 'adrs', 'auto'));
    }

    public function update(UpdateAutoRequest $request, Auto $auto)
    {
        $auto->update($request->all());
        $auto->typeloads()->sync($request->input('typeloads', []));
        $auto->adrs()->sync($request->input('adrs', []));
        if ($request->input('pt_perv', false)) {
            if (!$auto->pt_perv || $request->input('pt_perv') !== $auto->pt_perv->file_name) {
                if ($auto->pt_perv) {
                    $auto->pt_perv->delete();
                }
                $auto->addMedia(storage_path('tmp/uploads/' . basename($request->input('pt_perv'))))->toMediaCollection('pt_perv');
            }
        } elseif ($auto->pt_perv) {
            $auto->pt_perv->delete();
        }

        if ($request->input('pt_vtor', false)) {
            if (!$auto->pt_vtor || $request->input('pt_vtor') !== $auto->pt_vtor->file_name) {
                if ($auto->pt_vtor) {
                    $auto->pt_vtor->delete();
                }
                $auto->addMedia(storage_path('tmp/uploads/' . basename($request->input('pt_vtor'))))->toMediaCollection('pt_vtor');
            }
        } elseif ($auto->pt_vtor) {
            $auto->pt_vtor->delete();
        }

        return redirect()->route('admin.autos.index');
    }

    public function show(Auto $auto)
    {
        abort_if(Gate::denies('auto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $auto->load('typeloads', 'adrs');

        return view('admin.autos.show', compact('auto'));
    }

    public function destroy(Auto $auto)
    {
        abort_if(Gate::denies('auto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $auto->delete();

        return back();
    }

    public function massDestroy(MassDestroyAutoRequest $request)
    {
        Auto::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('auto_create') && Gate::denies('auto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Auto();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
