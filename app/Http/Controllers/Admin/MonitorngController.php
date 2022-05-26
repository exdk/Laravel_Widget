<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMonitorngRequest;
use App\Http\Requests\StoreMonitorngRequest;
use App\Http\Requests\UpdateMonitorngRequest;
use App\Models\Driver;
use App\Models\Monitorng;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MonitorngController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('monitorng_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $monitorngs = Monitorng::with(['driver'])->get();

        return view('admin.monitorngs.index', compact('monitorngs'));
    }

    public function create()
    {
        abort_if(Gate::denies('monitorng_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Driver::pluck('fam', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.monitorngs.create', compact('drivers'));
    }

    public function store(StoreMonitorngRequest $request)
    {
        $monitorng = Monitorng::create($request->all());

        return redirect()->route('admin.monitorngs.index');
    }

    public function edit(Monitorng $monitorng)
    {
        abort_if(Gate::denies('monitorng_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Driver::pluck('fam', 'id')->prepend(trans('global.pleaseSelect'), '');

        $monitorng->load('driver');

        return view('admin.monitorngs.edit', compact('drivers', 'monitorng'));
    }

    public function update(UpdateMonitorngRequest $request, Monitorng $monitorng)
    {
        $monitorng->update($request->all());

        return redirect()->route('admin.monitorngs.index');
    }

    public function show(Monitorng $monitorng)
    {
        abort_if(Gate::denies('monitorng_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $monitorng->load('driver');

        return view('admin.monitorngs.show', compact('monitorng'));
    }

    public function destroy(Monitorng $monitorng)
    {
        abort_if(Gate::denies('monitorng_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $monitorng->delete();

        return back();
    }

    public function massDestroy(MassDestroyMonitorngRequest $request)
    {
        Monitorng::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
