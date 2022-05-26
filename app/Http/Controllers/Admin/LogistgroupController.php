<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyLogistgroupRequest;
use App\Http\Requests\StoreLogistgroupRequest;
use App\Http\Requests\UpdateLogistgroupRequest;
use App\Models\Logistgroup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogistgroupController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('logistgroup_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $logistgroups = Logistgroup::all();

        return view('admin.logistgroups.index', compact('logistgroups'));
    }

    public function create()
    {
        abort_if(Gate::denies('logistgroup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.logistgroups.create');
    }

    public function store(StoreLogistgroupRequest $request)
    {
        $logistgroup = Logistgroup::create($request->all());

        return redirect()->route('admin.logistgroups.index');
    }

    public function edit(Logistgroup $logistgroup)
    {
        abort_if(Gate::denies('logistgroup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.logistgroups.edit', compact('logistgroup'));
    }

    public function update(UpdateLogistgroupRequest $request, Logistgroup $logistgroup)
    {
        $logistgroup->update($request->all());

        return redirect()->route('admin.logistgroups.index');
    }

    public function show(Logistgroup $logistgroup)
    {
        abort_if(Gate::denies('logistgroup_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.logistgroups.show', compact('logistgroup'));
    }

    public function destroy(Logistgroup $logistgroup)
    {
        abort_if(Gate::denies('logistgroup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $logistgroup->delete();

        return back();
    }

    public function massDestroy(MassDestroyLogistgroupRequest $request)
    {
        Logistgroup::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
