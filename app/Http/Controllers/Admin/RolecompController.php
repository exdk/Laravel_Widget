<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRolecompRequest;
use App\Http\Requests\StoreRolecompRequest;
use App\Http\Requests\UpdateRolecompRequest;
use App\Models\Rolecomp;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolecompController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rolecomp_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rolecomps = Rolecomp::all();

        return view('admin.rolecomps.index', compact('rolecomps'));
    }

    public function create()
    {
        abort_if(Gate::denies('rolecomp_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rolecomps.create');
    }

    public function store(StoreRolecompRequest $request)
    {
        $rolecomp = Rolecomp::create($request->all());

        return redirect()->route('admin.rolecomps.index');
    }

    public function edit(Rolecomp $rolecomp)
    {
        abort_if(Gate::denies('rolecomp_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rolecomps.edit', compact('rolecomp'));
    }

    public function update(UpdateRolecompRequest $request, Rolecomp $rolecomp)
    {
        $rolecomp->update($request->all());

        return redirect()->route('admin.rolecomps.index');
    }

    public function show(Rolecomp $rolecomp)
    {
        abort_if(Gate::denies('rolecomp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rolecomps.show', compact('rolecomp'));
    }

    public function destroy(Rolecomp $rolecomp)
    {
        abort_if(Gate::denies('rolecomp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rolecomp->delete();

        return back();
    }

    public function massDestroy(MassDestroyRolecompRequest $request)
    {
        Rolecomp::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
