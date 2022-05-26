<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDraftRequest;
use App\Http\Requests\StoreDraftRequest;
use App\Http\Requests\UpdateDraftRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DraftController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('draft_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.drafts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('draft_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.drafts.create');
    }

    public function store(StoreDraftRequest $request)
    {
        $draft = Draft::create($request->all());

        return redirect()->route('admin.drafts.index');
    }

    public function edit(Draft $draft)
    {
        abort_if(Gate::denies('draft_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.drafts.edit', compact('draft'));
    }

    public function update(UpdateDraftRequest $request, Draft $draft)
    {
        $draft->update($request->all());

        return redirect()->route('admin.drafts.index');
    }

    public function show(Draft $draft)
    {
        abort_if(Gate::denies('draft_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.drafts.show', compact('draft'));
    }

    public function destroy(Draft $draft)
    {
        abort_if(Gate::denies('draft_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $draft->delete();

        return back();
    }

    public function massDestroy(MassDestroyDraftRequest $request)
    {
        Draft::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
