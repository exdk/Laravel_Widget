<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFavouritelRequest;
use App\Http\Requests\StoreFavouritelRequest;
use App\Http\Requests\UpdateFavouritelRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FavouritelController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('favouritel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.favouritels.index');
    }

    public function create()
    {
        abort_if(Gate::denies('favouritel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.favouritels.create');
    }

    public function store(StoreFavouritelRequest $request)
    {
        $favouritel = Favouritel::create($request->all());

        return redirect()->route('admin.favouritels.index');
    }

    public function edit(Favouritel $favouritel)
    {
        abort_if(Gate::denies('favouritel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.favouritels.edit', compact('favouritel'));
    }

    public function update(UpdateFavouritelRequest $request, Favouritel $favouritel)
    {
        $favouritel->update($request->all());

        return redirect()->route('admin.favouritels.index');
    }

    public function show(Favouritel $favouritel)
    {
        abort_if(Gate::denies('favouritel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.favouritels.show', compact('favouritel'));
    }

    public function destroy(Favouritel $favouritel)
    {
        abort_if(Gate::denies('favouritel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $favouritel->delete();

        return back();
    }

    public function massDestroy(MassDestroyFavouritelRequest $request)
    {
        Favouritel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
