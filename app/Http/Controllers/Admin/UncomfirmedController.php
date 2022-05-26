<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUncomfirmedRequest;
use App\Http\Requests\StoreUncomfirmedRequest;
use App\Http\Requests\UpdateUncomfirmedRequest;
use App\Models\Uncomfirmed;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UncomfirmedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('uncomfirmed_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uncomfirmeds = Uncomfirmed::with(['team'])->get();

        return view('admin.uncomfirmeds.index', compact('uncomfirmeds'));
    }

    public function create()
    {
        abort_if(Gate::denies('uncomfirmed_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.uncomfirmeds.create');
    }

    public function store(StoreUncomfirmedRequest $request)
    {
        $uncomfirmed = Uncomfirmed::create($request->all());

        return redirect()->route('admin.uncomfirmeds.index');
    }

    public function edit(Uncomfirmed $uncomfirmed)
    {
        abort_if(Gate::denies('uncomfirmed_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uncomfirmed->load('team');

        return view('admin.uncomfirmeds.edit', compact('uncomfirmed'));
    }

    public function update(UpdateUncomfirmedRequest $request, Uncomfirmed $uncomfirmed)
    {
        $uncomfirmed->update($request->all());

        return redirect()->route('admin.uncomfirmeds.index');
    }

    public function show(Uncomfirmed $uncomfirmed)
    {
        abort_if(Gate::denies('uncomfirmed_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uncomfirmed->load('team');

        return view('admin.uncomfirmeds.show', compact('uncomfirmed'));
    }

    public function destroy(Uncomfirmed $uncomfirmed)
    {
        abort_if(Gate::denies('uncomfirmed_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uncomfirmed->delete();

        return back();
    }

    public function massDestroy(MassDestroyUncomfirmedRequest $request)
    {
        Uncomfirmed::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
