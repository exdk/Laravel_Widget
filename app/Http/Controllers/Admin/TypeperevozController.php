<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTypeperevozRequest;
use App\Http\Requests\StoreTypeperevozRequest;
use App\Http\Requests\UpdateTypeperevozRequest;
use App\Models\Typeperevoz;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeperevozController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('typeperevoz_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeperevozs = Typeperevoz::all();

        return view('admin.typeperevozs.index', compact('typeperevozs'));
    }

    public function create()
    {
        abort_if(Gate::denies('typeperevoz_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeperevozs.create');
    }

    public function store(StoreTypeperevozRequest $request)
    {
        $typeperevoz = Typeperevoz::create($request->all());

        return redirect()->route('admin.typeperevozs.index');
    }

    public function edit(Typeperevoz $typeperevoz)
    {
        abort_if(Gate::denies('typeperevoz_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeperevozs.edit', compact('typeperevoz'));
    }

    public function update(UpdateTypeperevozRequest $request, Typeperevoz $typeperevoz)
    {
        $typeperevoz->update($request->all());

        return redirect()->route('admin.typeperevozs.index');
    }

    public function show(Typeperevoz $typeperevoz)
    {
        abort_if(Gate::denies('typeperevoz_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeperevozs.show', compact('typeperevoz'));
    }

    public function destroy(Typeperevoz $typeperevoz)
    {
        abort_if(Gate::denies('typeperevoz_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeperevoz->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypeperevozRequest $request)
    {
        Typeperevoz::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
