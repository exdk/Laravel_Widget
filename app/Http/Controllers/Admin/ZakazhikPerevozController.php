<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyZakazhikPerevozRequest;
use App\Http\Requests\StoreZakazhikPerevozRequest;
use App\Http\Requests\UpdateZakazhikPerevozRequest;
use App\Models\ZakazhikPerevoz;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ZakazhikPerevozController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('zakazhik_perevoz_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakazhikPerevozs = ZakazhikPerevoz::with(['team'])->get();

        return view('admin.zakazhikPerevozs.index', compact('zakazhikPerevozs'));
    }

    public function create()
    {
        abort_if(Gate::denies('zakazhik_perevoz_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.zakazhikPerevozs.create');
    }

    public function store(StoreZakazhikPerevozRequest $request)
    {
        $zakazhikPerevoz = ZakazhikPerevoz::create($request->all());

        return redirect()->route('admin.zakazhik-perevozs.index');
    }

    public function edit(ZakazhikPerevoz $zakazhikPerevoz)
    {
        abort_if(Gate::denies('zakazhik_perevoz_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakazhikPerevoz->load('team');

        return view('admin.zakazhikPerevozs.edit', compact('zakazhikPerevoz'));
    }

    public function update(UpdateZakazhikPerevozRequest $request, ZakazhikPerevoz $zakazhikPerevoz)
    {
        $zakazhikPerevoz->update($request->all());

        return redirect()->route('admin.zakazhik-perevozs.index');
    }

    public function show(ZakazhikPerevoz $zakazhikPerevoz)
    {
        abort_if(Gate::denies('zakazhik_perevoz_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakazhikPerevoz->load('team');

        return view('admin.zakazhikPerevozs.show', compact('zakazhikPerevoz'));
    }

    public function destroy(ZakazhikPerevoz $zakazhikPerevoz)
    {
        abort_if(Gate::denies('zakazhik_perevoz_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakazhikPerevoz->delete();

        return back();
    }

    public function massDestroy(MassDestroyZakazhikPerevozRequest $request)
    {
        ZakazhikPerevoz::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
