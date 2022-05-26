<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerevozklientRequest;
use App\Http\Requests\StorePerevozklientRequest;
use App\Http\Requests\UpdatePerevozklientRequest;
use App\Models\Perevozklient;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerevozklientController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perevozklient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perevozklients = Perevozklient::with(['team'])->get();

        return view('admin.perevozklients.index', compact('perevozklients'));
    }

    public function create()
    {
        abort_if(Gate::denies('perevozklient_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perevozklients.create');
    }

    public function store(StorePerevozklientRequest $request)
    {
        $perevozklient = Perevozklient::create($request->all());

        return redirect()->route('admin.perevozklients.index');
    }

    public function edit(Perevozklient $perevozklient)
    {
        abort_if(Gate::denies('perevozklient_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perevozklient->load('team');

        return view('admin.perevozklients.edit', compact('perevozklient'));
    }

    public function update(UpdatePerevozklientRequest $request, Perevozklient $perevozklient)
    {
        $perevozklient->update($request->all());

        return redirect()->route('admin.perevozklients.index');
    }

    public function show(Perevozklient $perevozklient)
    {
        abort_if(Gate::denies('perevozklient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perevozklient->load('team');

        return view('admin.perevozklients.show', compact('perevozklient'));
    }

    public function destroy(Perevozklient $perevozklient)
    {
        abort_if(Gate::denies('perevozklient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perevozklient->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerevozklientRequest $request)
    {
        Perevozklient::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
