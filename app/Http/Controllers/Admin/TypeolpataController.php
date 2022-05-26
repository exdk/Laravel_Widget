<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTypeolpatumRequest;
use App\Http\Requests\StoreTypeolpatumRequest;
use App\Http\Requests\UpdateTypeolpatumRequest;
use App\Models\Typeolpatum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeolpataController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('typeolpatum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeolpata = Typeolpatum::all();

        return view('admin.typeolpata.index', compact('typeolpata'));
    }

    public function create()
    {
        abort_if(Gate::denies('typeolpatum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeolpata.create');
    }

    public function store(StoreTypeolpatumRequest $request)
    {
        $typeolpatum = Typeolpatum::create($request->all());

        return redirect()->route('admin.typeolpata.index');
    }

    public function edit(Typeolpatum $typeolpatum)
    {
        abort_if(Gate::denies('typeolpatum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeolpata.edit', compact('typeolpatum'));
    }

    public function update(UpdateTypeolpatumRequest $request, Typeolpatum $typeolpatum)
    {
        $typeolpatum->update($request->all());

        return redirect()->route('admin.typeolpata.index');
    }

    public function show(Typeolpatum $typeolpatum)
    {
        abort_if(Gate::denies('typeolpatum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeolpata.show', compact('typeolpatum'));
    }

    public function destroy(Typeolpatum $typeolpatum)
    {
        abort_if(Gate::denies('typeolpatum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeolpatum->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypeolpatumRequest $request)
    {
        Typeolpatum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
