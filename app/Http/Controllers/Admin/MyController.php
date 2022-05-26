<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMyRequest;
use App\Http\Requests\StoreMyRequest;
use App\Http\Requests\UpdateMyRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('my_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('my_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mies.create');
    }

    public function store(StoreMyRequest $request)
    {
        $my = My::create($request->all());

        return redirect()->route('admin.mies.index');
    }

    public function edit(My $my)
    {
        abort_if(Gate::denies('my_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mies.edit', compact('my'));
    }

    public function update(UpdateMyRequest $request, My $my)
    {
        $my->update($request->all());

        return redirect()->route('admin.mies.index');
    }

    public function show(My $my)
    {
        abort_if(Gate::denies('my_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mies.show', compact('my'));
    }

    public function destroy(My $my)
    {
        abort_if(Gate::denies('my_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $my->delete();

        return back();
    }

    public function massDestroy(MassDestroyMyRequest $request)
    {
        My::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
