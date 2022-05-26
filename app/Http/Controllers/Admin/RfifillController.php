<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRfifillRequest;
use App\Http\Requests\StoreRfifillRequest;
use App\Http\Requests\UpdateRfifillRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RfifillController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rfifill_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rfifills.index');
    }

    public function create()
    {
        abort_if(Gate::denies('rfifill_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rfifills.create');
    }

    public function store(StoreRfifillRequest $request)
    {
        $rfifill = Rfifill::create($request->all());

        return redirect()->route('admin.rfifills.index');
    }

    public function edit(Rfifill $rfifill)
    {
        abort_if(Gate::denies('rfifill_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rfifills.edit', compact('rfifill'));
    }

    public function update(UpdateRfifillRequest $request, Rfifill $rfifill)
    {
        $rfifill->update($request->all());

        return redirect()->route('admin.rfifills.index');
    }

    public function show(Rfifill $rfifill)
    {
        abort_if(Gate::denies('rfifill_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rfifills.show', compact('rfifill'));
    }

    public function destroy(Rfifill $rfifill)
    {
        abort_if(Gate::denies('rfifill_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rfifill->delete();

        return back();
    }

    public function massDestroy(MassDestroyRfifillRequest $request)
    {
        Rfifill::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
