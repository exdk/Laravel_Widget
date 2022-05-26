<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNoofferRequest;
use App\Http\Requests\StoreNoofferRequest;
use App\Http\Requests\UpdateNoofferRequest;
use App\Models\Nooffer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoofferController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('nooffer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nooffers = Nooffer::all();

        return view('admin.nooffers.index', compact('nooffers'));
    }

    public function create()
    {
        abort_if(Gate::denies('nooffer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nooffers.create');
    }

    public function store(StoreNoofferRequest $request)
    {
        $nooffer = Nooffer::create($request->all());

        return redirect()->route('admin.nooffers.index');
    }

    public function edit(Nooffer $nooffer)
    {
        abort_if(Gate::denies('nooffer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nooffers.edit', compact('nooffer'));
    }

    public function update(UpdateNoofferRequest $request, Nooffer $nooffer)
    {
        $nooffer->update($request->all());

        return redirect()->route('admin.nooffers.index');
    }

    public function show(Nooffer $nooffer)
    {
        abort_if(Gate::denies('nooffer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nooffers.show', compact('nooffer'));
    }

    public function destroy(Nooffer $nooffer)
    {
        abort_if(Gate::denies('nooffer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nooffer->delete();

        return back();
    }

    public function massDestroy(MassDestroyNoofferRequest $request)
    {
        Nooffer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
