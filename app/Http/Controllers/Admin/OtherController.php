<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOtherRequest;
use App\Http\Requests\StoreOtherRequest;
use App\Http\Requests\UpdateOtherRequest;
use App\Models\Other;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OtherController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('other_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $others = Other::all();

        return view('admin.others.index', compact('others'));
    }

    public function create()
    {
        abort_if(Gate::denies('other_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.others.create');
    }

    public function store(StoreOtherRequest $request)
    {
        $other = Other::create($request->all());

        return redirect()->route('admin.others.index');
    }

    public function edit(Other $other)
    {
        abort_if(Gate::denies('other_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.others.edit', compact('other'));
    }

    public function update(UpdateOtherRequest $request, Other $other)
    {
        $other->update($request->all());

        return redirect()->route('admin.others.index');
    }

    public function show(Other $other)
    {
        abort_if(Gate::denies('other_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.others.show', compact('other'));
    }

    public function destroy(Other $other)
    {
        abort_if(Gate::denies('other_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $other->delete();

        return back();
    }

    public function massDestroy(MassDestroyOtherRequest $request)
    {
        Other::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
