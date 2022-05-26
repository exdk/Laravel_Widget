<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMycompanRequest;
use App\Http\Requests\StoreMycompanRequest;
use App\Http\Requests\UpdateMycompanRequest;
use App\Models\Country;
use App\Models\Mycompan;
use App\Models\Typecompany;
use App\Models\Typeperevoz;
use Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MycompanController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('mycompan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mycompans = Mycompan::with(['main', 'typecomps', 'typeperevozs', 'megdus', 'team', 'media'])->get();

        return view('admin.mycompans.index', compact('mycompans'));
    }

    public function create()
    {
        abort_if(Gate::denies('mycompan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       
        $mains = Mycompan::pluck('hortname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $typecomps = Typecompany::pluck('title', 'id');

        $typeperevozs = Typeperevoz::pluck('title', 'id');

        $megdus = Country::pluck('name', 'id');

        return view('admin.mycompans.create', compact('mains', 'typecomps', 'typeperevozs', 'megdus'));
    }

    public function store(StoreMycompanRequest $request, $company_role = null)
    {
        $all_values = $request->all();
		if(is_null($company_role))
		{
			$user_type = DB::table('role_user')->where('user_id',auth()->user()->id)->first()->role_id;
		}
		else
		{
			$user_type = $company_role;
		}
        $all_values['company_role'] = $user_type;

        $mycompan = Mycompan::create($all_values);
        $mycompan->typecomps()->sync($request->input('typecomps', []));
        $mycompan->typeperevozs()->sync($request->input('typeperevozs', []));
        $mycompan->megdus()->sync($request->input('megdus', []));
        if ($request->input('logo', false)) {
            $mycompan->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('utav', false)) {
            $mycompan->addMedia(storage_path('tmp/uploads/' . basename($request->input('utav'))))->toMediaCollection('utav');
        }

        if ($request->input('doveren', false)) {
            $mycompan->addMedia(storage_path('tmp/uploads/' . basename($request->input('doveren'))))->toMediaCollection('doveren');
        }

        if ($request->input('filedog', false)) {
            $mycompan->addMedia(storage_path('tmp/uploads/' . basename($request->input('filedog'))))->toMediaCollection('filedog');
        }

        if ($request->input('newfil', false)) {
            $mycompan->addMedia(storage_path('tmp/uploads/' . basename($request->input('newfil'))))->toMediaCollection('newfil');
        }

        if ($request->input('newfill', false)) {
            $mycompan->addMedia(storage_path('tmp/uploads/' . basename($request->input('newfill'))))->toMediaCollection('newfill');
        }

        foreach ($request->input('newfilll', []) as $file) {
            $mycompan->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('newfilll');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $mycompan->id]);
        }

        return redirect()->route('admin.mycompans.index');
    }

    public function edit(Mycompan $mycompan)
    {
        abort_if(Gate::denies('mycompan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mains = Mycompan::pluck('hortname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $typecomps = Typecompany::pluck('title', 'id');

        $typeperevozs = Typeperevoz::pluck('title', 'id');

        $megdus = Country::pluck('name', 'id');

        $mycompan->load('main', 'typecomps', 'typeperevozs', 'megdus', 'team');

        return view('admin.mycompans.edit', compact('mains', 'typecomps', 'typeperevozs', 'megdus', 'mycompan'));
    }

    public function update(UpdateMycompanRequest $request, Mycompan $mycompan)
    {
        $mycompan->update($request->all());
        $mycompan->typecomps()->sync($request->input('typecomps', []));
        $mycompan->typeperevozs()->sync($request->input('typeperevozs', []));
        $mycompan->megdus()->sync($request->input('megdus', []));
        if ($request->input('logo', false)) {
            if (!$mycompan->logo || $request->input('logo') !== $mycompan->logo->file_name) {
                if ($mycompan->logo) {
                    $mycompan->logo->delete();
                }
                $mycompan->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($mycompan->logo) {
            $mycompan->logo->delete();
        }

        if ($request->input('utav', false)) {
            if (!$mycompan->utav || $request->input('utav') !== $mycompan->utav->file_name) {
                if ($mycompan->utav) {
                    $mycompan->utav->delete();
                }
                $mycompan->addMedia(storage_path('tmp/uploads/' . basename($request->input('utav'))))->toMediaCollection('utav');
            }
        } elseif ($mycompan->utav) {
            $mycompan->utav->delete();
        }

        if ($request->input('doveren', false)) {
            if (!$mycompan->doveren || $request->input('doveren') !== $mycompan->doveren->file_name) {
                if ($mycompan->doveren) {
                    $mycompan->doveren->delete();
                }
                $mycompan->addMedia(storage_path('tmp/uploads/' . basename($request->input('doveren'))))->toMediaCollection('doveren');
            }
        } elseif ($mycompan->doveren) {
            $mycompan->doveren->delete();
        }

        if ($request->input('filedog', false)) {
            if (!$mycompan->filedog || $request->input('filedog') !== $mycompan->filedog->file_name) {
                if ($mycompan->filedog) {
                    $mycompan->filedog->delete();
                }
                $mycompan->addMedia(storage_path('tmp/uploads/' . basename($request->input('filedog'))))->toMediaCollection('filedog');
            }
        } elseif ($mycompan->filedog) {
            $mycompan->filedog->delete();
        }

        if ($request->input('newfil', false)) {
            if (!$mycompan->newfil || $request->input('newfil') !== $mycompan->newfil->file_name) {
                if ($mycompan->newfil) {
                    $mycompan->newfil->delete();
                }
                $mycompan->addMedia(storage_path('tmp/uploads/' . basename($request->input('newfil'))))->toMediaCollection('newfil');
            }
        } elseif ($mycompan->newfil) {
            $mycompan->newfil->delete();
        }

        if ($request->input('newfill', false)) {
            if (!$mycompan->newfill || $request->input('newfill') !== $mycompan->newfill->file_name) {
                if ($mycompan->newfill) {
                    $mycompan->newfill->delete();
                }
                $mycompan->addMedia(storage_path('tmp/uploads/' . basename($request->input('newfill'))))->toMediaCollection('newfill');
            }
        } elseif ($mycompan->newfill) {
            $mycompan->newfill->delete();
        }

        if (count($mycompan->newfilll) > 0) {
            foreach ($mycompan->newfilll as $media) {
                if (!in_array($media->file_name, $request->input('newfilll', []))) {
                    $media->delete();
                }
            }
        }
        $media = $mycompan->newfilll->pluck('file_name')->toArray();
        foreach ($request->input('newfilll', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $mycompan->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('newfilll');
            }
        }

        return redirect()->route('admin.mycompans.index');
    }

    public function show(Mycompan $mycompan)
    {
        abort_if(Gate::denies('mycompan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mycompan->load('main', 'typecomps', 'typeperevozs', 'megdus', 'team');

        return view('admin.mycompans.show', compact('mycompan'));
    }

    public function destroy(Mycompan $mycompan)
    {
        abort_if(Gate::denies('mycompan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mycompan->delete();

        return back();
    }

    public function massDestroy(MassDestroyMycompanRequest $request)
    {
        Mycompan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('mycompan_create') && Gate::denies('mycompan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Mycompan();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
