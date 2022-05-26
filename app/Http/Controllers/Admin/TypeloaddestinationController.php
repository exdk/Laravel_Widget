<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTypeloaddestinationRequest;
use App\Http\Requests\StoreTypeloaddestinationRequest;
use App\Http\Requests\UpdateTypeloaddestinationRequest;
use App\Models\Typeloaddestination;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeloaddestinationController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('typeloaddestination_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeloaddestinations = Typeloaddestination::with(['team'])->get();

        return view('admin.typeloaddestinations.index', compact('typeloaddestinations'));
    }

    public function create()
    {
        abort_if(Gate::denies('typeloaddestination_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeloaddestinations.create');
    }

    public function store(StoreTypeloaddestinationRequest $request)
    {
        $typeloaddestination = Typeloaddestination::create($request->all());

        return redirect()->route('admin.typeloaddestinations.index');
    }

    public function edit(Typeloaddestination $typeloaddestination)
    {
        abort_if(Gate::denies('typeloaddestination_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeloaddestination->load('team');

        return view('admin.typeloaddestinations.edit', compact('typeloaddestination'));
    }

    public function update(UpdateTypeloaddestinationRequest $request, Typeloaddestination $typeloaddestination)
    {
        $typeloaddestination->update($request->all());

        return redirect()->route('admin.typeloaddestinations.index');
    }

    public function show(Typeloaddestination $typeloaddestination)
    {
        abort_if(Gate::denies('typeloaddestination_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeloaddestination->load('team');

        return view('admin.typeloaddestinations.show', compact('typeloaddestination'));
    }

    public function destroy(Typeloaddestination $typeloaddestination)
    {
        abort_if(Gate::denies('typeloaddestination_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeloaddestination->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypeloaddestinationRequest $request)
    {
        Typeloaddestination::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
