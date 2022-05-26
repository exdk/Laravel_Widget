<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTypeloaddestRequest;
use App\Http\Requests\StoreTypeloaddestRequest;
use App\Http\Requests\UpdateTypeloaddestRequest;
use App\Models\Typeloaddest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeloaddestController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('typeloaddest_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeloaddests = Typeloaddest::all();

        return view('admin.typeloaddests.index', compact('typeloaddests'));
    }

    public function create()
    {
        abort_if(Gate::denies('typeloaddest_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeloaddests.create');
    }

    public function store(StoreTypeloaddestRequest $request)
    {
        $typeloaddest = Typeloaddest::create($request->all());

        return redirect()->route('admin.typeloaddests.index');
    }

    public function edit(Typeloaddest $typeloaddest)
    {
        abort_if(Gate::denies('typeloaddest_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeloaddests.edit', compact('typeloaddest'));
    }

    public function update(UpdateTypeloaddestRequest $request, Typeloaddest $typeloaddest)
    {
        $typeloaddest->update($request->all());

        return redirect()->route('admin.typeloaddests.index');
    }

    public function show(Typeloaddest $typeloaddest)
    {
        abort_if(Gate::denies('typeloaddest_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeloaddests.show', compact('typeloaddest'));
    }

    public function destroy(Typeloaddest $typeloaddest)
    {
        abort_if(Gate::denies('typeloaddest_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeloaddest->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypeloaddestRequest $request)
    {
        Typeloaddest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
