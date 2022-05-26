<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDriverRequest;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Models\Driver;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DriverController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('driver_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Driver::with(['media'])->get();

        return view('admin.drivers.index', compact('drivers'));
    }

    public function create()
    {
        abort_if(Gate::denies('driver_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.drivers.create');
    }

    public function store(StoreDriverRequest $request)
    {
        $driver = Driver::create($request->all());

        if ($request->input('photodriver', false)) {
            $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('photodriver'))))->toMediaCollection('photodriver');
        }

        if ($request->input('pa_perv', false)) {
            $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('pa_perv'))))->toMediaCollection('pa_perv');
        }

        if ($request->input('pa_vtor', false)) {
            $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('pa_vtor'))))->toMediaCollection('pa_vtor');
        }

        if ($request->input('vu_perv', false)) {
            $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('vu_perv'))))->toMediaCollection('vu_perv');
        }

        if ($request->input('vu_vtor', false)) {
            $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('vu_vtor'))))->toMediaCollection('vu_vtor');
        }

        if ($request->input('inn_photo', false)) {
            $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('inn_photo'))))->toMediaCollection('inn_photo');
        }

        if ($request->input('pfr_perv', false)) {
            $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('pfr_perv'))))->toMediaCollection('pfr_perv');
        }

        foreach ($request->input('medb_perv', []) as $file) {
            $driver->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('medb_perv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $driver->id]);
        }

        return redirect()->route('admin.drivers.index');
    }

    public function edit(Driver $driver)
    {
        abort_if(Gate::denies('driver_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.drivers.edit', compact('driver'));
    }

    public function update(UpdateDriverRequest $request, Driver $driver)
    {
        $driver->update($request->all());

        if ($request->input('photodriver', false)) {
            if (!$driver->photodriver || $request->input('photodriver') !== $driver->photodriver->file_name) {
                if ($driver->photodriver) {
                    $driver->photodriver->delete();
                }
                $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('photodriver'))))->toMediaCollection('photodriver');
            }
        } elseif ($driver->photodriver) {
            $driver->photodriver->delete();
        }

        if ($request->input('pa_perv', false)) {
            if (!$driver->pa_perv || $request->input('pa_perv') !== $driver->pa_perv->file_name) {
                if ($driver->pa_perv) {
                    $driver->pa_perv->delete();
                }
                $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('pa_perv'))))->toMediaCollection('pa_perv');
            }
        } elseif ($driver->pa_perv) {
            $driver->pa_perv->delete();
        }

        if ($request->input('pa_vtor', false)) {
            if (!$driver->pa_vtor || $request->input('pa_vtor') !== $driver->pa_vtor->file_name) {
                if ($driver->pa_vtor) {
                    $driver->pa_vtor->delete();
                }
                $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('pa_vtor'))))->toMediaCollection('pa_vtor');
            }
        } elseif ($driver->pa_vtor) {
            $driver->pa_vtor->delete();
        }

        if ($request->input('vu_perv', false)) {
            if (!$driver->vu_perv || $request->input('vu_perv') !== $driver->vu_perv->file_name) {
                if ($driver->vu_perv) {
                    $driver->vu_perv->delete();
                }
                $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('vu_perv'))))->toMediaCollection('vu_perv');
            }
        } elseif ($driver->vu_perv) {
            $driver->vu_perv->delete();
        }

        if ($request->input('vu_vtor', false)) {
            if (!$driver->vu_vtor || $request->input('vu_vtor') !== $driver->vu_vtor->file_name) {
                if ($driver->vu_vtor) {
                    $driver->vu_vtor->delete();
                }
                $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('vu_vtor'))))->toMediaCollection('vu_vtor');
            }
        } elseif ($driver->vu_vtor) {
            $driver->vu_vtor->delete();
        }

        if ($request->input('inn_photo', false)) {
            if (!$driver->inn_photo || $request->input('inn_photo') !== $driver->inn_photo->file_name) {
                if ($driver->inn_photo) {
                    $driver->inn_photo->delete();
                }
                $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('inn_photo'))))->toMediaCollection('inn_photo');
            }
        } elseif ($driver->inn_photo) {
            $driver->inn_photo->delete();
        }

        if ($request->input('pfr_perv', false)) {
            if (!$driver->pfr_perv || $request->input('pfr_perv') !== $driver->pfr_perv->file_name) {
                if ($driver->pfr_perv) {
                    $driver->pfr_perv->delete();
                }
                $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('pfr_perv'))))->toMediaCollection('pfr_perv');
            }
        } elseif ($driver->pfr_perv) {
            $driver->pfr_perv->delete();
        }

        if (count($driver->medb_perv) > 0) {
            foreach ($driver->medb_perv as $media) {
                if (!in_array($media->file_name, $request->input('medb_perv', []))) {
                    $media->delete();
                }
            }
        }
        $media = $driver->medb_perv->pluck('file_name')->toArray();
        foreach ($request->input('medb_perv', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $driver->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('medb_perv');
            }
        }

        return redirect()->route('admin.drivers.index');
    }

    public function show(Driver $driver)
    {
        abort_if(Gate::denies('driver_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.drivers.show', compact('driver'));
    }

    public function destroy(Driver $driver)
    {
        abort_if(Gate::denies('driver_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driver->delete();

        return back();
    }

    public function massDestroy(MassDestroyDriverRequest $request)
    {
        Driver::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('driver_create') && Gate::denies('driver_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Driver();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
