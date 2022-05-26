<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTypepackRequest;
use App\Http\Requests\StoreTypepackRequest;
use App\Http\Requests\UpdateTypepackRequest;
use App\Models\Typepack;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypepackController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('typepack_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typepacks = Typepack::all();

        return view('admin.typepacks.index', compact('typepacks'));
    }

    public function create()
    {
        abort_if(Gate::denies('typepack_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typepacks.create');
    }

    public function store(StoreTypepackRequest $request)
    {
        $typepack = Typepack::create($request->all());

        return redirect()->route('admin.typepacks.index');
    }

    public function edit(Typepack $typepack)
    {
        abort_if(Gate::denies('typepack_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typepacks.edit', compact('typepack'));
    }

    public function update(UpdateTypepackRequest $request, Typepack $typepack)
    {
        $typepack->update($request->all());

        return redirect()->route('admin.typepacks.index');
    }

    public function show(Typepack $typepack)
    {
        abort_if(Gate::denies('typepack_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typepacks.show', compact('typepack'));
    }

    public function destroy(Typepack $typepack)
    {
        abort_if(Gate::denies('typepack_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typepack->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypepackRequest $request)
    {
        Typepack::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
