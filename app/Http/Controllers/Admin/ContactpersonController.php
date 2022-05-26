<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactpersonRequest;
use App\Http\Requests\StoreContactpersonRequest;
use App\Http\Requests\UpdateContactpersonRequest;
use App\Models\Contactperson;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactpersonController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contactperson_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactpeople = Contactperson::with(['team'])->get();

        return view('admin.contactpeople.index', compact('contactpeople'));
    }

    public function create()
    {
        abort_if(Gate::denies('contactperson_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactpeople.create');
    }

    public function store(StoreContactpersonRequest $request)
    {
        $contactperson = Contactperson::create($request->all());

        return redirect()->route('admin.contactpeople.index');
    }

    public function edit(Contactperson $contactperson)
    {
        abort_if(Gate::denies('contactperson_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactperson->load('team');

        return view('admin.contactpeople.edit', compact('contactperson'));
    }

    public function update(UpdateContactpersonRequest $request, Contactperson $contactperson)
    {
        $contactperson->update($request->all());

        return redirect()->route('admin.contactpeople.index');
    }

    public function show(Contactperson $contactperson)
    {
        abort_if(Gate::denies('contactperson_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactperson->load('team');

        return view('admin.contactpeople.show', compact('contactperson'));
    }

    public function destroy(Contactperson $contactperson)
    {
        abort_if(Gate::denies('contactperson_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactperson->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactpersonRequest $request)
    {
        Contactperson::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
