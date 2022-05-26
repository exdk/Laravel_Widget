<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCompanyinfoRequest;
use App\Http\Requests\StoreCompanyinfoRequest;
use App\Http\Requests\UpdateCompanyinfoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyinfoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('companyinfo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyinfos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('companyinfo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyinfos.create');
    }

    public function store(StoreCompanyinfoRequest $request)
    {
        $companyinfo = Companyinfo::create($request->all());

        return redirect()->route('admin.companyinfos.index');
    }

    public function edit(Companyinfo $companyinfo)
    {
        abort_if(Gate::denies('companyinfo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyinfos.edit', compact('companyinfo'));
    }

    public function update(UpdateCompanyinfoRequest $request, Companyinfo $companyinfo)
    {
        $companyinfo->update($request->all());

        return redirect()->route('admin.companyinfos.index');
    }

    public function show(Companyinfo $companyinfo)
    {
        abort_if(Gate::denies('companyinfo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyinfos.show', compact('companyinfo'));
    }

    public function destroy(Companyinfo $companyinfo)
    {
        abort_if(Gate::denies('companyinfo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyinfo->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompanyinfoRequest $request)
    {
        Companyinfo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
