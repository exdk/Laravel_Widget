<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySourcegoodRequest;
use App\Http\Requests\StoreSourcegoodRequest;
use App\Http\Requests\UpdateSourcegoodRequest;
use App\Models\Sourcegood;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SourcegoodController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sourcegood_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sourcegoods = Sourcegood::all();

        return view('admin.sourcegoods.index', compact('sourcegoods'));
    }

    public function create()
    {
        abort_if(Gate::denies('sourcegood_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sourcegoods.create');
    }

    public function store(StoreSourcegoodRequest $request)
    {
        $sourcegood = Sourcegood::create($request->all());

        return redirect()->route('admin.sourcegoods.index');
    }

    public function edit(Sourcegood $sourcegood)
    {
        abort_if(Gate::denies('sourcegood_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sourcegoods.edit', compact('sourcegood'));
    }

    public function update(UpdateSourcegoodRequest $request, Sourcegood $sourcegood)
    {
        $sourcegood->update($request->all());

        return redirect()->route('admin.sourcegoods.index');
    }

    public function show(Sourcegood $sourcegood)
    {
        abort_if(Gate::denies('sourcegood_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sourcegoods.show', compact('sourcegood'));
    }

    public function destroy(Sourcegood $sourcegood)
    {
        abort_if(Gate::denies('sourcegood_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sourcegood->delete();

        return back();
    }

    public function massDestroy(MassDestroySourcegoodRequest $request)
    {
        Sourcegood::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
