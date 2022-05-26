<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTypekuzovaRequest;
use App\Http\Requests\StoreTypekuzovaRequest;
use App\Http\Requests\UpdateTypekuzovaRequest;
use App\Models\Typekuzova;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypekuzovaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('typekuzova_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typekuzovas = Typekuzova::all();

        return view('admin.typekuzovas.index', compact('typekuzovas'));
    }

    public function create()
    {
        abort_if(Gate::denies('typekuzova_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typekuzovas.create');
    }

    public function store(StoreTypekuzovaRequest $request)
    {
        $typekuzova = Typekuzova::create($request->all());

        return redirect()->route('admin.typekuzovas.index');
    }

    public function edit(Typekuzova $typekuzova)
    {
        abort_if(Gate::denies('typekuzova_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typekuzovas.edit', compact('typekuzova'));
    }

    public function update(UpdateTypekuzovaRequest $request, Typekuzova $typekuzova)
    {
        $typekuzova->update($request->all());

        return redirect()->route('admin.typekuzovas.index');
    }

    public function show(Typekuzova $typekuzova)
    {
        abort_if(Gate::denies('typekuzova_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typekuzovas.show', compact('typekuzova'));
    }

    public function destroy(Typekuzova $typekuzova)
    {
        abort_if(Gate::denies('typekuzova_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typekuzova->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypekuzovaRequest $request)
    {
        Typekuzova::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
