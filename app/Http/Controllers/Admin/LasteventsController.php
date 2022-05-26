<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyLasteventRequest;
use App\Http\Requests\StoreLasteventRequest;
use App\Http\Requests\UpdateLasteventRequest;
use App\Models\Lastevent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LasteventsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('lastevent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lastevents = Lastevent::all();

        return view('admin.lastevents.index', compact('lastevents'));
    }

    public function create()
    {
        abort_if(Gate::denies('lastevent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lastevents.create');
    }

    public function store(StoreLasteventRequest $request)
    {
        $lastevent = Lastevent::create($request->all());

        return redirect()->route('admin.lastevents.index');
    }

    public function edit(Lastevent $lastevent)
    {
        abort_if(Gate::denies('lastevent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lastevents.edit', compact('lastevent'));
    }

    public function update(UpdateLasteventRequest $request, Lastevent $lastevent)
    {
        $lastevent->update($request->all());

        return redirect()->route('admin.lastevents.index');
    }

    public function show(Lastevent $lastevent)
    {
        abort_if(Gate::denies('lastevent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lastevents.show', compact('lastevent'));
    }

    public function destroy(Lastevent $lastevent)
    {
        abort_if(Gate::denies('lastevent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lastevent->delete();

        return back();
    }

    public function massDestroy(MassDestroyLasteventRequest $request)
    {
        Lastevent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
