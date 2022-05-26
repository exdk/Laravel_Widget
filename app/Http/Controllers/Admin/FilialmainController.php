<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFilialmainRequest;
use App\Http\Requests\StoreFilialmainRequest;
use App\Http\Requests\UpdateFilialmainRequest;
use App\Models\Filialmain;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilialmainController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('filialmain_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $filialmains = Filialmain::all();

        return view('admin.filialmains.index', compact('filialmains'));
    }

    public function create()
    {
        abort_if(Gate::denies('filialmain_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.filialmains.create');
    }

    public function store(StoreFilialmainRequest $request)
    {
        $filialmain = Filialmain::create($request->all());

        return redirect()->route('admin.filialmains.index');
    }

    public function edit(Filialmain $filialmain)
    {
        abort_if(Gate::denies('filialmain_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.filialmains.edit', compact('filialmain'));
    }

    public function update(UpdateFilialmainRequest $request, Filialmain $filialmain)
    {
        $filialmain->update($request->all());

        return redirect()->route('admin.filialmains.index');
    }

    public function show(Filialmain $filialmain)
    {
        abort_if(Gate::denies('filialmain_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.filialmains.show', compact('filialmain'));
    }

    public function destroy(Filialmain $filialmain)
    {
        abort_if(Gate::denies('filialmain_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $filialmain->delete();

        return back();
    }

    public function massDestroy(MassDestroyFilialmainRequest $request)
    {
        Filialmain::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
