<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOfferingRequest;
use App\Http\Requests\StoreOfferingRequest;
use App\Http\Requests\UpdateOfferingRequest;
use App\Models\Offering;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OfferingsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('offering_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offerings = Offering::with(['team'])->get();

        return view('admin.offerings.index', compact('offerings'));
    }

    public function create()
    {
        abort_if(Gate::denies('offering_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.offerings.create');
    }

    public function store(StoreOfferingRequest $request)
    {
        $offering = Offering::create($request->all());

        return redirect()->route('admin.offerings.index');
    }

    public function edit(Offering $offering)
    {
        abort_if(Gate::denies('offering_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offering->load('team');

        return view('admin.offerings.edit', compact('offering'));
    }

    public function update(UpdateOfferingRequest $request, Offering $offering)
    {
        $offering->update($request->all());

        return redirect()->route('admin.offerings.index');
    }

    public function show(Offering $offering)
    {
        abort_if(Gate::denies('offering_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offering->load('team');

        return view('admin.offerings.show', compact('offering'));
    }

    public function destroy(Offering $offering)
    {
        abort_if(Gate::denies('offering_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offering->delete();

        return back();
    }

    public function massDestroy(MassDestroyOfferingRequest $request)
    {
        Offering::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
