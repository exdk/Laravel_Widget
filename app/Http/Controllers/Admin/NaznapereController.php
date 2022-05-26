<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNaznapereRequest;
use App\Http\Requests\StoreNaznapereRequest;
use App\Http\Requests\UpdateNaznapereRequest;
use App\Models\Naznapere;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NaznapereController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('naznapere_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $naznaperes = Naznapere::all();

        return view('admin.naznaperes.index', compact('naznaperes'));
    }

    public function create()
    {
        abort_if(Gate::denies('naznapere_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.naznaperes.create');
    }

    public function store(StoreNaznapereRequest $request)
    {
        $naznapere = Naznapere::create($request->all());

        return redirect()->route('admin.naznaperes.index');
    }

    public function edit(Naznapere $naznapere)
    {
        abort_if(Gate::denies('naznapere_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.naznaperes.edit', compact('naznapere'));
    }

    public function update(UpdateNaznapereRequest $request, Naznapere $naznapere)
    {
        $naznapere->update($request->all());

        return redirect()->route('admin.naznaperes.index');
    }

    public function show(Naznapere $naznapere)
    {
        abort_if(Gate::denies('naznapere_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.naznaperes.show', compact('naznapere'));
    }

    public function destroy(Naznapere $naznapere)
    {
        abort_if(Gate::denies('naznapere_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $naznapere->delete();

        return back();
    }

    public function massDestroy(MassDestroyNaznapereRequest $request)
    {
        Naznapere::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
