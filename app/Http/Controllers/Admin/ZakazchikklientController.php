<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyZakazchikklientRequest;
use App\Http\Requests\StoreZakazchikklientRequest;
use App\Http\Requests\UpdateZakazchikklientRequest;
use App\Models\Zakazchikklient;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ZakazchikklientController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('zakazchikklient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakazchikklients = Zakazchikklient::with(['team'])->get();

        return view('admin.zakazchikklients.index', compact('zakazchikklients'));
    }

    public function create()
    {
        abort_if(Gate::denies('zakazchikklient_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.zakazchikklients.create');
    }

    public function store(StoreZakazchikklientRequest $request)
    {
        $zakazchikklient = Zakazchikklient::create($request->all());

        return redirect()->route('admin.zakazchikklients.index');
    }

    public function edit(Zakazchikklient $zakazchikklient)
    {
        abort_if(Gate::denies('zakazchikklient_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakazchikklient->load('team');

        return view('admin.zakazchikklients.edit', compact('zakazchikklient'));
    }

    public function update(UpdateZakazchikklientRequest $request, Zakazchikklient $zakazchikklient)
    {
        $zakazchikklient->update($request->all());

        return redirect()->route('admin.zakazchikklients.index');
    }

    public function show(Zakazchikklient $zakazchikklient)
    {
        abort_if(Gate::denies('zakazchikklient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakazchikklient->load('team');

        return view('admin.zakazchikklients.show', compact('zakazchikklient'));
    }

    public function destroy(Zakazchikklient $zakazchikklient)
    {
        abort_if(Gate::denies('zakazchikklient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakazchikklient->delete();

        return back();
    }

    public function massDestroy(MassDestroyZakazchikklientRequest $request)
    {
        Zakazchikklient::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
