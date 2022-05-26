<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTypecompanyRequest;
use App\Http\Requests\StoreTypecompanyRequest;
use App\Http\Requests\UpdateTypecompanyRequest;
use App\Models\Typecompany;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypecompanyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('typecompany_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typecompanies = Typecompany::all();

        return view('admin.typecompanies.index', compact('typecompanies'));
    }

    public function create()
    {
        abort_if(Gate::denies('typecompany_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typecompanies.create');
    }

    public function store(StoreTypecompanyRequest $request)
    {
        $typecompany = Typecompany::create($request->all());

        return redirect()->route('admin.typecompanies.index');
    }

    public function edit(Typecompany $typecompany)
    {
        abort_if(Gate::denies('typecompany_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typecompanies.edit', compact('typecompany'));
    }

    public function update(UpdateTypecompanyRequest $request, Typecompany $typecompany)
    {
        $typecompany->update($request->all());

        return redirect()->route('admin.typecompanies.index');
    }

    public function show(Typecompany $typecompany)
    {
        abort_if(Gate::denies('typecompany_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typecompanies.show', compact('typecompany'));
    }

    public function destroy(Typecompany $typecompany)
    {
        abort_if(Gate::denies('typecompany_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typecompany->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypecompanyRequest $request)
    {
        Typecompany::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
