<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyValutandRequest;
use App\Http\Requests\StoreValutandRequest;
use App\Http\Requests\UpdateValutandRequest;
use App\Models\Valutand;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValutandController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('valutand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $valutands = Valutand::all();

        return view('admin.valutands.index', compact('valutands'));
    }

    public function create()
    {
        abort_if(Gate::denies('valutand_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.valutands.create');
    }

    public function store(StoreValutandRequest $request)
    {
        $valutand = Valutand::create($request->all());

        return redirect()->route('admin.valutands.index');
    }

    public function edit(Valutand $valutand)
    {
        abort_if(Gate::denies('valutand_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.valutands.edit', compact('valutand'));
    }

    public function update(UpdateValutandRequest $request, Valutand $valutand)
    {
        $valutand->update($request->all());

        return redirect()->route('admin.valutands.index');
    }

    public function show(Valutand $valutand)
    {
        abort_if(Gate::denies('valutand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.valutands.show', compact('valutand'));
    }

    public function destroy(Valutand $valutand)
    {
        abort_if(Gate::denies('valutand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $valutand->delete();

        return back();
    }

    public function massDestroy(MassDestroyValutandRequest $request)
    {
        Valutand::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
