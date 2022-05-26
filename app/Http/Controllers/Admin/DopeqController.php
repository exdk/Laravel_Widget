<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDopeqRequest;
use App\Http\Requests\StoreDopeqRequest;
use App\Http\Requests\UpdateDopeqRequest;
use App\Models\Dopeq;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DopeqController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dopeq_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dopeqs = Dopeq::all();

        return view('admin.dopeqs.index', compact('dopeqs'));
    }

    public function create()
    {
        abort_if(Gate::denies('dopeq_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dopeqs.create');
    }

    public function store(StoreDopeqRequest $request)
    {
        $dopeq = Dopeq::create($request->all());

        return redirect()->route('admin.dopeqs.index');
    }

    public function edit(Dopeq $dopeq)
    {
        abort_if(Gate::denies('dopeq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dopeqs.edit', compact('dopeq'));
    }

    public function update(UpdateDopeqRequest $request, Dopeq $dopeq)
    {
        $dopeq->update($request->all());

        return redirect()->route('admin.dopeqs.index');
    }

    public function show(Dopeq $dopeq)
    {
        abort_if(Gate::denies('dopeq_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dopeqs.show', compact('dopeq'));
    }

    public function destroy(Dopeq $dopeq)
    {
        abort_if(Gate::denies('dopeq_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dopeq->delete();

        return back();
    }

    public function massDestroy(MassDestroyDopeqRequest $request)
    {
        Dopeq::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
