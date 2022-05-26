<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTypedolgnostiRequest;
use App\Http\Requests\StoreTypedolgnostiRequest;
use App\Http\Requests\UpdateTypedolgnostiRequest;
use App\Models\Role;
use App\Models\Typedolgnosti;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypedolgnostiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('typedolgnosti_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typedolgnostis = Typedolgnosti::with(['roles'])->get();

        return view('admin.typedolgnostis.index', compact('typedolgnostis'));
    }

    public function create()
    {
        abort_if(Gate::denies('typedolgnosti_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('admin.typedolgnostis.create', compact('roles'));
    }

    public function store(StoreTypedolgnostiRequest $request)
    {
        $typedolgnosti = Typedolgnosti::create($request->all());
        $typedolgnosti->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.typedolgnostis.index');
    }

    public function edit(Typedolgnosti $typedolgnosti)
    {
        abort_if(Gate::denies('typedolgnosti_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $typedolgnosti->load('roles');

        return view('admin.typedolgnostis.edit', compact('roles', 'typedolgnosti'));
    }

    public function update(UpdateTypedolgnostiRequest $request, Typedolgnosti $typedolgnosti)
    {
        $typedolgnosti->update($request->all());
        $typedolgnosti->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.typedolgnostis.index');
    }

    public function show(Typedolgnosti $typedolgnosti)
    {
        abort_if(Gate::denies('typedolgnosti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typedolgnosti->load('roles');

        return view('admin.typedolgnostis.show', compact('typedolgnosti'));
    }

    public function destroy(Typedolgnosti $typedolgnosti)
    {
        abort_if(Gate::denies('typedolgnosti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typedolgnosti->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypedolgnostiRequest $request)
    {
        Typedolgnosti::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
