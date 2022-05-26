<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLtlftlRequest;
use App\Http\Requests\StoreLtlftlRequest;
use App\Http\Requests\UpdateLtlftlRequest;
use App\Models\Ltlftl;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LtlftlController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ltlftl_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ltlftls = Ltlftl::all();

        return view('admin.ltlftls.index', compact('ltlftls'));
    }

    public function create()
    {
        abort_if(Gate::denies('ltlftl_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ltlftls.create');
    }

    public function store(StoreLtlftlRequest $request)
    {
        $ltlftl = Ltlftl::create($request->all());

        return redirect()->route('admin.ltlftls.index');
    }

    public function edit(Ltlftl $ltlftl)
    {
        abort_if(Gate::denies('ltlftl_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ltlftls.edit', compact('ltlftl'));
    }

    public function update(UpdateLtlftlRequest $request, Ltlftl $ltlftl)
    {
        $ltlftl->update($request->all());

        return redirect()->route('admin.ltlftls.index');
    }

    public function show(Ltlftl $ltlftl)
    {
        abort_if(Gate::denies('ltlftl_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ltlftls.show', compact('ltlftl'));
    }

    public function destroy(Ltlftl $ltlftl)
    {
        abort_if(Gate::denies('ltlftl_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ltlftl->delete();

        return back();
    }

    public function massDestroy(MassDestroyLtlftlRequest $request)
    {
        Ltlftl::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
