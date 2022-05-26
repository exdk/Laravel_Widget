<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTitilegruzRequest;
use App\Http\Requests\StoreTitilegruzRequest;
use App\Http\Requests\UpdateTitilegruzRequest;
use App\Models\Titilegruz;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TitilegruzController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('titilegruz_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titilegruzs = Titilegruz::all();

        return view('admin.titilegruzs.index', compact('titilegruzs'));
    }

    public function create()
    {
        abort_if(Gate::denies('titilegruz_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.titilegruzs.create');
    }

    public function store(StoreTitilegruzRequest $request)
    {
        $titilegruz = Titilegruz::create($request->all());

        return redirect()->route('admin.titilegruzs.index');
    }

    public function edit(Titilegruz $titilegruz)
    {
        abort_if(Gate::denies('titilegruz_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.titilegruzs.edit', compact('titilegruz'));
    }

    public function update(UpdateTitilegruzRequest $request, Titilegruz $titilegruz)
    {
        $titilegruz->update($request->all());

        return redirect()->route('admin.titilegruzs.index');
    }

    public function show(Titilegruz $titilegruz)
    {
        abort_if(Gate::denies('titilegruz_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.titilegruzs.show', compact('titilegruz'));
    }

    public function destroy(Titilegruz $titilegruz)
    {
        abort_if(Gate::denies('titilegruz_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titilegruz->delete();

        return back();
    }

    public function massDestroy(MassDestroyTitilegruzRequest $request)
    {
        Titilegruz::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
