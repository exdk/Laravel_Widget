<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPerevozExpRequest;
use App\Http\Requests\StorePerevozExpRequest;
use App\Http\Requests\UpdatePerevozExpRequest;
use App\Models\PerevozExp;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerevozExpController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('perevoz_exp_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perevozExps = PerevozExp::with(['team'])->get();

        return view('admin.perevozExps.index', compact('perevozExps'));
    }

    public function create()
    {
        abort_if(Gate::denies('perevoz_exp_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perevozExps.create');
    }

    public function store(StorePerevozExpRequest $request)
    {
        $perevozExp = PerevozExp::create($request->all());

        return redirect()->route('admin.perevoz-exps.index');
    }

    public function edit(PerevozExp $perevozExp)
    {
        abort_if(Gate::denies('perevoz_exp_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perevozExp->load('team');

        return view('admin.perevozExps.edit', compact('perevozExp'));
    }

    public function update(UpdatePerevozExpRequest $request, PerevozExp $perevozExp)
    {
        $perevozExp->update($request->all());

        return redirect()->route('admin.perevoz-exps.index');
    }

    public function show(PerevozExp $perevozExp)
    {
        abort_if(Gate::denies('perevoz_exp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perevozExp->load('team');

        return view('admin.perevozExps.show', compact('perevozExp'));
    }

    public function destroy(PerevozExp $perevozExp)
    {
        abort_if(Gate::denies('perevoz_exp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perevozExp->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerevozExpRequest $request)
    {
        PerevozExp::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
