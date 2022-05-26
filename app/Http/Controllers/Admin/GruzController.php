<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGruzRequest;
use App\Http\Requests\StoreGruzRequest;
use App\Http\Requests\UpdateGruzRequest;
use App\Models\Gruz;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GruzController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gruz_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gruzs = Gruz::all();

        return view('admin.gruzs.index', compact('gruzs'));
    }

    public function create()
    {
        abort_if(Gate::denies('gruz_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gruzs.create');
    }

    public function store(StoreGruzRequest $request)
    {
        $gruz = Gruz::create($request->all());

        return redirect()->route('admin.gruzs.index');
    }

    public function edit(Gruz $gruz)
    {
        abort_if(Gate::denies('gruz_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gruzs.edit', compact('gruz'));
    }

    public function update(UpdateGruzRequest $request, Gruz $gruz)
    {
        $gruz->update($request->all());

        return redirect()->route('admin.gruzs.index');
    }

    public function show(Gruz $gruz)
    {
        abort_if(Gate::denies('gruz_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gruz->load('gruzZakaznagruzs');

        return view('admin.gruzs.show', compact('gruz'));
    }

    public function destroy(Gruz $gruz)
    {
        abort_if(Gate::denies('gruz_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gruz->delete();

        return back();
    }

    public function massDestroy(MassDestroyGruzRequest $request)
    {
        Gruz::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
