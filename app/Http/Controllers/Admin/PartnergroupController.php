<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPartnergroupRequest;
use App\Http\Requests\StorePartnergroupRequest;
use App\Http\Requests\UpdatePartnergroupRequest;
use App\Models\PartnerBb;
use App\Models\Partnergroup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartnergroupController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('partnergroup_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnergroups = Partnergroup::with(['partners', 'team'])->get();

        return view('admin.partnergroups.index', compact('partnergroups'));
    }

    public function create()
    {
        abort_if(Gate::denies('partnergroup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = PartnerBb::pluck('partner_id', 'id');

        return view('admin.partnergroups.create', compact('partners'));
    }

    public function store(StorePartnergroupRequest $request)
    {
        $partnergroup = Partnergroup::create($request->all());
        $partnergroup->partners()->sync($request->input('partners', []));

        return redirect()->route('admin.partnergroups.index');
    }

    public function edit(Partnergroup $partnergroup)
    {
        abort_if(Gate::denies('partnergroup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = PartnerBb::pluck('partner_id', 'id');

        $partnergroup->load('partners', 'team');

        return view('admin.partnergroups.edit', compact('partnergroup', 'partners'));
    }

    public function update(UpdatePartnergroupRequest $request, Partnergroup $partnergroup)
    {
        $partnergroup->update($request->all());
        $partnergroup->partners()->sync($request->input('partners', []));

        return redirect()->route('admin.partnergroups.index');
    }

    public function show(Partnergroup $partnergroup)
    {
        abort_if(Gate::denies('partnergroup_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnergroup->load('partners', 'team');
		
        return view('admin.partnergroups.show', compact('partnergroup'));
    }

    public function destroy(Partnergroup $partnergroup)
    {
        abort_if(Gate::denies('partnergroup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnergroup->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartnergroupRequest $request)
    {
        Partnergroup::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
	
	public function getPartners()
	{
		$partners = PartnerBb::pluck('partner_id', 'id');
		return $partners;
	}
}
