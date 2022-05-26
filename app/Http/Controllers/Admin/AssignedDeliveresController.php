<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssignedDelivereRequest;
use App\Http\Requests\StoreAssignedDelivereRequest;
use App\Http\Requests\UpdateAssignedDelivereRequest;
use App\Models\AssignedDelivere;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssignedDeliveresController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('assigned_delivere_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignedDeliveres = AssignedDelivere::with(['team'])->get();

        return view('admin.assignedDeliveres.index', compact('assignedDeliveres'));
    }

    public function create()
    {
        abort_if(Gate::denies('assigned_delivere_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assignedDeliveres.create');
    }

    public function store(StoreAssignedDelivereRequest $request)
    {
        $assignedDelivere = AssignedDelivere::create($request->all());

        return redirect()->route('admin.assigned-deliveres.index');
    }

    public function edit(AssignedDelivere $assignedDelivere)
    {
        abort_if(Gate::denies('assigned_delivere_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignedDelivere->load('team');

        return view('admin.assignedDeliveres.edit', compact('assignedDelivere'));
    }

    public function update(UpdateAssignedDelivereRequest $request, AssignedDelivere $assignedDelivere)
    {
        $assignedDelivere->update($request->all());

        return redirect()->route('admin.assigned-deliveres.index');
    }

    public function show(AssignedDelivere $assignedDelivere)
    {
        abort_if(Gate::denies('assigned_delivere_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignedDelivere->load('team');

        return view('admin.assignedDeliveres.show', compact('assignedDelivere'));
    }

    public function destroy(AssignedDelivere $assignedDelivere)
    {
        abort_if(Gate::denies('assigned_delivere_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignedDelivere->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssignedDelivereRequest $request)
    {
        AssignedDelivere::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
