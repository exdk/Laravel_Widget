<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCustomRequest;
use App\Http\Requests\StoreCustomRequest;
use App\Http\Requests\UpdateCustomRequest;
use App\Models\Custom;
use App\Models\Typeperevoz;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('custom_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customs = Custom::with(['types'])->get();

        return view('admin.customs.index', compact('customs'));
    }

    public function create()
    {
        abort_if(Gate::denies('custom_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = Typeperevoz::pluck('title', 'id');

        return view('admin.customs.create', compact('types'));
    }

    public function store(StoreCustomRequest $request)
    {
        $custom = Custom::create($request->all());
        $custom->types()->sync($request->input('types', []));

        return redirect()->route('admin.customs.index');
    }

    public function edit(Custom $custom)
    {
        abort_if(Gate::denies('custom_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = Typeperevoz::pluck('title', 'id');

        $custom->load('types');

        return view('admin.customs.edit', compact('types', 'custom'));
    }

    public function update(UpdateCustomRequest $request, Custom $custom)
    {
        $custom->update($request->all());
        $custom->types()->sync($request->input('types', []));

        return redirect()->route('admin.customs.index');
    }

    public function show(Custom $custom)
    {
        abort_if(Gate::denies('custom_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $custom->load('types');

        return view('admin.customs.show', compact('custom'));
    }

    public function destroy(Custom $custom)
    {
        abort_if(Gate::denies('custom_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $custom->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomRequest $request)
    {
        Custom::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
