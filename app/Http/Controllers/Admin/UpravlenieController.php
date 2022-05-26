<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyUpravlenieRequest;
use App\Http\Requests\StoreUpravlenieRequest;
use App\Http\Requests\UpdateUpravlenieRequest;
use App\Models\Auto;
use App\Models\Driver;
use App\Models\Upravlenie;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpravlenieController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('upravlenie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $upravlenies = Upravlenie::with(['mainauto', 'prizep', 'driver', 'driver_2', 'team'])->get();

        return view('admin.upravlenies.index', compact('upravlenies'));
    }

    public function create()
    {
        abort_if(Gate::denies('upravlenie_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainautos = Auto::pluck('govnomer', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prizeps = Auto::pluck('govnomer', 'id')->prepend(trans('global.pleaseSelect'), '');

        $drivers = Driver::pluck('fam', 'id')->prepend(trans('global.pleaseSelect'), '');

        $driver_2s = Driver::pluck('fam', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.upravlenies.create', compact('mainautos', 'prizeps', 'drivers', 'driver_2s'));
    }

    public function store(StoreUpravlenieRequest $request)
    {
        $upravlenie = Upravlenie::create($request->all());

        return redirect()->route('admin.upravlenies.index');
    }

    public function edit(Upravlenie $upravlenie)
    {
        abort_if(Gate::denies('upravlenie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainautos = Auto::pluck('govnomer', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prizeps = Auto::pluck('govnomer', 'id')->prepend(trans('global.pleaseSelect'), '');

        $drivers = Driver::pluck('fam', 'id')->prepend(trans('global.pleaseSelect'), '');

        $driver_2s = Driver::pluck('fam', 'id')->prepend(trans('global.pleaseSelect'), '');

        $upravlenie->load('mainauto', 'prizep', 'driver', 'driver_2', 'team');

        return view('admin.upravlenies.edit', compact('mainautos', 'prizeps', 'drivers', 'driver_2s', 'upravlenie'));
    }

    public function update(UpdateUpravlenieRequest $request, Upravlenie $upravlenie)
    {
        $upravlenie->update($request->all());

        return redirect()->route('admin.upravlenies.index');
    }

    public function show(Upravlenie $upravlenie)
    {
        abort_if(Gate::denies('upravlenie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $upravlenie->load('mainauto', 'prizep', 'driver', 'driver_2', 'team');

        return view('admin.upravlenies.show', compact('upravlenie'));
    }

    public function destroy(Upravlenie $upravlenie)
    {
        abort_if(Gate::denies('upravlenie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $upravlenie->delete();

        return back();
    }

    public function massDestroy(MassDestroyUpravlenieRequest $request)
    {
        Upravlenie::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
