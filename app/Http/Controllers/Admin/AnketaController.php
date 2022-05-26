<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAnketumRequest;
use App\Http\Requests\StoreAnketumRequest;
use App\Http\Requests\UpdateAnketumRequest;
use App\Models\Anketum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnketaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('anketum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anketa = Anketum::with(['team'])->get();

        return view('admin.anketa.index', compact('anketa'));
    }

    public function create()
    {
        abort_if(Gate::denies('anketum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.anketa.create');
    }

    public function store(StoreAnketumRequest $request)
    {
        $anketum = Anketum::create($request->all());

        return redirect()->route('admin.anketa.index');
    }

    public function edit(Anketum $anketum)
    {
        abort_if(Gate::denies('anketum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anketum->load('team');

        return view('admin.anketa.edit', compact('anketum'));
    }

    public function update(UpdateAnketumRequest $request, Anketum $anketum)
    {
        $anketum->update($request->all());

        return redirect()->route('admin.anketa.index');
    }

    public function show(Anketum $anketum)
    {
        abort_if(Gate::denies('anketum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anketum->load('team');

        return view('admin.anketa.show', compact('anketum'));
    }

    public function destroy(Anketum $anketum)
    {
        abort_if(Gate::denies('anketum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anketum->delete();

        return back();
    }

    public function massDestroy(MassDestroyAnketumRequest $request)
    {
        Anketum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
