<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNaznaotmRequest;
use App\Http\Requests\StoreNaznaotmRequest;
use App\Http\Requests\UpdateNaznaotmRequest;
use App\Models\Naznaotm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NaznaotmController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('naznaotm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $naznaotms = Naznaotm::all();

        return view('admin.naznaotms.index', compact('naznaotms'));
    }

    public function create()
    {
        abort_if(Gate::denies('naznaotm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.naznaotms.create');
    }

    public function store(StoreNaznaotmRequest $request)
    {
        $naznaotm = Naznaotm::create($request->all());

        return redirect()->route('admin.naznaotms.index');
    }

    public function edit(Naznaotm $naznaotm)
    {
        abort_if(Gate::denies('naznaotm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.naznaotms.edit', compact('naznaotm'));
    }

    public function update(UpdateNaznaotmRequest $request, Naznaotm $naznaotm)
    {
        $naznaotm->update($request->all());

        return redirect()->route('admin.naznaotms.index');
    }

    public function show(Naznaotm $naznaotm)
    {
        abort_if(Gate::denies('naznaotm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.naznaotms.show', compact('naznaotm'));
    }

    public function destroy(Naznaotm $naznaotm)
    {
        abort_if(Gate::denies('naznaotm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $naznaotm->delete();

        return back();
    }

    public function massDestroy(MassDestroyNaznaotmRequest $request)
    {
        Naznaotm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
