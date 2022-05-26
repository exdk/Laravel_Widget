<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFavouriteaRequest;
use App\Http\Requests\StoreFavouriteaRequest;
use App\Http\Requests\UpdateFavouriteaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FavouriteaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('favouritea_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.favouriteas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('favouritea_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.favouriteas.create');
    }

    public function store(StoreFavouriteaRequest $request)
    {
        $favouritea = Favouritea::create($request->all());

        return redirect()->route('admin.favouriteas.index');
    }

    public function edit(Favouritea $favouritea)
    {
        abort_if(Gate::denies('favouritea_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.favouriteas.edit', compact('favouritea'));
    }

    public function update(UpdateFavouriteaRequest $request, Favouritea $favouritea)
    {
        $favouritea->update($request->all());

        return redirect()->route('admin.favouriteas.index');
    }

    public function show(Favouritea $favouritea)
    {
        abort_if(Gate::denies('favouritea_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.favouriteas.show', compact('favouritea'));
    }

    public function destroy(Favouritea $favouritea)
    {
        abort_if(Gate::denies('favouritea_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $favouritea->delete();

        return back();
    }

    public function massDestroy(MassDestroyFavouriteaRequest $request)
    {
        Favouritea::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
