<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyZakazgrupRequest;
use App\Http\Requests\StoreZakazgrupRequest;
use App\Http\Requests\UpdateZakazgrupRequest;
use App\Models\Zakazgrup;
use App\Models\ZakazhikPerevoz;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ZakazgrupController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('zakazgrup_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakazgrups = Zakazgrup::with(['zakazperevozs', 'team'])->get();

        return view('admin.zakazgrups.index', compact('zakazgrups'));
    }

    public function create()
    {
        abort_if(Gate::denies('zakazgrup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakazperevozs = ZakazhikPerevoz::pluck('title', 'id');

        return view('admin.zakazgrups.create', compact('zakazperevozs'));
    }

    public function store(StoreZakazgrupRequest $request)
    {
        $zakazgrup = Zakazgrup::create($request->all());
        $zakazgrup->zakazperevozs()->sync($request->input('zakazperevozs', []));

        return redirect()->route('admin.zakazgrups.index');
    }

    public function edit(Zakazgrup $zakazgrup)
    {
        abort_if(Gate::denies('zakazgrup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakazperevozs = ZakazhikPerevoz::pluck('title', 'id');

        $zakazgrup->load('zakazperevozs', 'team');

        return view('admin.zakazgrups.edit', compact('zakazperevozs', 'zakazgrup'));
    }

    public function update(UpdateZakazgrupRequest $request, Zakazgrup $zakazgrup)
    {
        $zakazgrup->update($request->all());
        $zakazgrup->zakazperevozs()->sync($request->input('zakazperevozs', []));

        return redirect()->route('admin.zakazgrups.index');
    }

    public function show(Zakazgrup $zakazgrup)
    {
        abort_if(Gate::denies('zakazgrup_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakazgrup->load('zakazperevozs', 'team');

        return view('admin.zakazgrups.show', compact('zakazgrup'));
    }

    public function destroy(Zakazgrup $zakazgrup)
    {
        abort_if(Gate::denies('zakazgrup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakazgrup->delete();

        return back();
    }

    public function massDestroy(MassDestroyZakazgrupRequest $request)
    {
        Zakazgrup::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
