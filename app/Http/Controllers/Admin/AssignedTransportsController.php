<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssignedTransportRequest;
use App\Http\Requests\StoreAssignedTransportRequest;
use App\Http\Requests\UpdateAssignedTransportRequest;
use App\Models\AssignedTransport;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssignedTransportsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('assigned_transport_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignedTransports = AssignedTransport::with(['team'])->get();

        return view('admin.assignedTransports.index', compact('assignedTransports'));
    }

    public function create()
    {
        abort_if(Gate::denies('assigned_transport_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assignedTransports.create');
    }

    public function store(StoreAssignedTransportRequest $request)
    {
        $assignedTransport = AssignedTransport::create($request->all());

        return redirect()->route('admin.assigned-transports.index');
    }

    public function edit(AssignedTransport $assignedTransport)
    {
        abort_if(Gate::denies('assigned_transport_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignedTransport->load('team');

        return view('admin.assignedTransports.edit', compact('assignedTransport'));
    }

    public function update(UpdateAssignedTransportRequest $request, AssignedTransport $assignedTransport)
    {
        $assignedTransport->update($request->all());

        return redirect()->route('admin.assigned-transports.index');
    }

    public function show(AssignedTransport $assignedTransport)
    {
        abort_if(Gate::denies('assigned_transport_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignedTransport->load('team');

        return view('admin.assignedTransports.show', compact('assignedTransport'));
    }

    public function destroy(AssignedTransport $assignedTransport)
    {
        abort_if(Gate::denies('assigned_transport_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignedTransport->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssignedTransportRequest $request)
    {
        AssignedTransport::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
