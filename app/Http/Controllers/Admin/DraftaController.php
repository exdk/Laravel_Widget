<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDraftumRequest;
use App\Http\Requests\StoreDraftumRequest;
use App\Http\Requests\UpdateDraftumRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DraftaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('draftum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.drafta.index');
    }

    public function create()
    {
        abort_if(Gate::denies('draftum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.drafta.create');
    }

    public function store(StoreDraftumRequest $request)
    {
        $draftum = Draftum::create($request->all());

        return redirect()->route('admin.drafta.index');
    }

    public function edit(Draftum $draftum)
    {
        abort_if(Gate::denies('draftum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.drafta.edit', compact('draftum'));
    }

    public function update(UpdateDraftumRequest $request, Draftum $draftum)
    {
        $draftum->update($request->all());

        return redirect()->route('admin.drafta.index');
    }

    public function show(Draftum $draftum)
    {
        abort_if(Gate::denies('draftum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.drafta.show', compact('draftum'));
    }

    public function destroy(Draftum $draftum)
    {
        abort_if(Gate::denies('draftum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $draftum->delete();

        return back();
    }

    public function massDestroy(MassDestroyDraftumRequest $request)
    {
        Draftum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
