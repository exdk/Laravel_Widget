<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyValutumRequest;
use App\Http\Requests\StoreValutumRequest;
use App\Http\Requests\UpdateValutumRequest;
use App\Models\Valutum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValutaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('valutum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $valuta = Valutum::all();

        return view('admin.valuta.index', compact('valuta'));
    }

    public function create()
    {
        abort_if(Gate::denies('valutum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.valuta.create');
    }

    public function store(StoreValutumRequest $request)
    {
        $valutum = Valutum::create($request->all());

        return redirect()->route('admin.valuta.index');
    }

    public function edit(Valutum $valutum)
    {
        abort_if(Gate::denies('valutum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.valuta.edit', compact('valutum'));
    }

    public function update(UpdateValutumRequest $request, Valutum $valutum)
    {
        $valutum->update($request->all());

        return redirect()->route('admin.valuta.index');
    }

    public function show(Valutum $valutum)
    {
        abort_if(Gate::denies('valutum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.valuta.show', compact('valutum'));
    }

    public function destroy(Valutum $valutum)
    {
        abort_if(Gate::denies('valutum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $valutum->delete();

        return back();
    }

    public function massDestroy(MassDestroyValutumRequest $request)
    {
        Valutum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
