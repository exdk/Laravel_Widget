<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPartnermRequest;
use App\Http\Requests\StorePartnermRequest;
use App\Http\Requests\UpdatePartnermRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartnermController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('partnerm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerms.index');
    }

    public function create()
    {
        abort_if(Gate::denies('partnerm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerms.create');
    }

    public function store(StorePartnermRequest $request)
    {
        $partnerm = Partnerm::create($request->all());

        return redirect()->route('admin.partnerms.index');
    }

    public function edit(Partnerm $partnerm)
    {
        abort_if(Gate::denies('partnerm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerms.edit', compact('partnerm'));
    }

    public function update(UpdatePartnermRequest $request, Partnerm $partnerm)
    {
        $partnerm->update($request->all());

        return redirect()->route('admin.partnerms.index');
    }

    public function show(Partnerm $partnerm)
    {
        abort_if(Gate::denies('partnerm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerms.show', compact('partnerm'));
    }

    public function destroy(Partnerm $partnerm)
    {
        abort_if(Gate::denies('partnerm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerm->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartnermRequest $request)
    {
        Partnerm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
