<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerevozchikPerevozRequest;
use App\Http\Requests\StorePerevozchikPerevozRequest;
use App\Http\Requests\UpdatePerevozchikPerevozRequest;
use App\Models\PerevozchikPerevoz;
use App\Models\PerevozExp;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerevozchikPerevozController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perevozchik_perevoz_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perevozchikPerevozs = PerevozchikPerevoz::with(['perevozperevozs', 'team'])->get();

        return view('admin.perevozchikPerevozs.index', compact('perevozchikPerevozs'));
    }

    public function create()
    {
        abort_if(Gate::denies('perevozchik_perevoz_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perevozperevozs = PerevozExp::pluck('title', 'id');

        return view('admin.perevozchikPerevozs.create', compact('perevozperevozs'));
    }

    public function store(StorePerevozchikPerevozRequest $request)
    {
        $perevozchikPerevoz = PerevozchikPerevoz::create($request->all());
        $perevozchikPerevoz->perevozperevozs()->sync($request->input('perevozperevozs', []));

        return redirect()->route('admin.perevozchik-perevozs.index');
    }

    public function edit(PerevozchikPerevoz $perevozchikPerevoz)
    {
        abort_if(Gate::denies('perevozchik_perevoz_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perevozperevozs = PerevozExp::pluck('title', 'id');

        $perevozchikPerevoz->load('perevozperevozs', 'team');

        return view('admin.perevozchikPerevozs.edit', compact('perevozperevozs', 'perevozchikPerevoz'));
    }

    public function update(UpdatePerevozchikPerevozRequest $request, PerevozchikPerevoz $perevozchikPerevoz)
    {
        $perevozchikPerevoz->update($request->all());
        $perevozchikPerevoz->perevozperevozs()->sync($request->input('perevozperevozs', []));

        return redirect()->route('admin.perevozchik-perevozs.index');
    }

    public function show(PerevozchikPerevoz $perevozchikPerevoz)
    {
        abort_if(Gate::denies('perevozchik_perevoz_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perevozchikPerevoz->load('perevozperevozs', 'team');

        return view('admin.perevozchikPerevozs.show', compact('perevozchikPerevoz'));
    }

    public function destroy(PerevozchikPerevoz $perevozchikPerevoz)
    {
        abort_if(Gate::denies('perevozchik_perevoz_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perevozchikPerevoz->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerevozchikPerevozRequest $request)
    {
        PerevozchikPerevoz::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
