<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMarkaRequest;
use App\Http\Requests\StoreMarkaRequest;
use App\Http\Requests\UpdateMarkaRequest;
use App\Models\Country;
use App\Models\Marka;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MarkaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('marka_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $markas = Marka::with(['country'])->get();

        return view('admin.markas.index', compact('markas'));
    }

    public function create()
    {
        abort_if(Gate::denies('marka_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.markas.create', compact('countries'));
    }

    public function store(StoreMarkaRequest $request)
    {
        $marka = Marka::create($request->all());

        return redirect()->route('admin.markas.index');
    }

    public function edit(Marka $marka)
    {
        abort_if(Gate::denies('marka_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $marka->load('country');

        return view('admin.markas.edit', compact('countries', 'marka'));
    }

    public function update(UpdateMarkaRequest $request, Marka $marka)
    {
        $marka->update($request->all());

        return redirect()->route('admin.markas.index');
    }

    public function show(Marka $marka)
    {
        abort_if(Gate::denies('marka_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $marka->load('country');

        return view('admin.markas.show', compact('marka'));
    }

    public function destroy(Marka $marka)
    {
        abort_if(Gate::denies('marka_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $marka->delete();

        return back();
    }

    public function massDestroy(MassDestroyMarkaRequest $request)
    {
        Marka::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
