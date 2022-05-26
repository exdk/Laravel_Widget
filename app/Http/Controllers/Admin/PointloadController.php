<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPointloadRequest;
use App\Http\Requests\StorePointloadRequest;
use App\Http\Requests\UpdatePointloadRequest;
use App\Models\Country;
use App\Models\Holiday;
use App\Models\Perevozklient;
use App\Models\Pointload;
use App\Models\Zakazchikklient;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PointloadController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('pointload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$pointloads = Pointload::with(['country', 'komuperevozklient', 'komuzakazklient', 'holidaylis', 'media'])->get();
        
        $pointloads = Pointload::with(['country', 'komuperevozklient', 'komuzakazklient', 'holidaylis', 'media', 'team'])->where('team_id', '=', auth()->user()->team_id)->get();

        return view('admin.pointloads.index', compact('pointloads'));
    }

    public function create()
    {
        abort_if(Gate::denies('pointload_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $komuperevozklients = Perevozklient::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $komuzakazklients = Zakazchikklient::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $holidaylis = Holiday::pluck('date', 'id');

        return view('admin.pointloads.create', compact('countries', 'komuperevozklients', 'komuzakazklients', 'holidaylis'));
    }

    public function store(StorePointloadRequest $request)
    {
        $pointload = Pointload::create($request->all());
        $pointload->holidaylis()->sync($request->input('holidaylis', []));
        foreach ($request->input('hemaproezda', []) as $file) {
            $pointload->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('hemaproezda');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $pointload->id]);
        }

        return redirect()->route('admin.pointloads.index');
    }

    public function edit(Pointload $pointload)
    {
        abort_if(Gate::denies('pointload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $komuperevozklients = Perevozklient::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $komuzakazklients = Zakazchikklient::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $holidaylis = Holiday::pluck('date', 'id');

        $pointload->load('country', 'komuperevozklient', 'komuzakazklient', 'holidaylis', 'team');

        return view('admin.pointloads.edit', compact('countries', 'komuperevozklients', 'komuzakazklients', 'holidaylis', 'pointload'));
    }

    public function update(UpdatePointloadRequest $request, Pointload $pointload)
    {
        $pointload->update($request->all());
        $pointload->holidaylis()->sync($request->input('holidaylis', []));
        if (count($pointload->hemaproezda) > 0) {
            foreach ($pointload->hemaproezda as $media) {
                if (!in_array($media->file_name, $request->input('hemaproezda', []))) {
                    $media->delete();
                }
            }
        }
        $media = $pointload->hemaproezda->pluck('file_name')->toArray();
        foreach ($request->input('hemaproezda', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $pointload->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('hemaproezda');
            }
        }

        return redirect()->route('admin.pointloads.index');
    }

    public function show(Pointload $pointload)
    {
        abort_if(Gate::denies('pointload_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pointload->load('country', 'komuperevozklient', 'komuzakazklient', 'holidaylis', 'pointloadZakaznagruzs', 'cloadZakaznagruzs', 'team');

        return view('admin.pointloads.show', compact('pointload'));
    }

    public function destroy(Pointload $pointload)
    {
        abort_if(Gate::denies('pointload_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pointload->delete();

        return back();
    }

    public function massDestroy(MassDestroyPointloadRequest $request)
    {
        Pointload::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('pointload_create') && Gate::denies('pointload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Pointload();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
