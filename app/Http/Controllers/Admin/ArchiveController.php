<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyArchiveRequest;
use App\Http\Requests\StoreArchiveRequest;
use App\Http\Requests\UpdateArchiveRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArchiveController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('archive_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.archives.index');
    }

    public function create()
    {
        abort_if(Gate::denies('archive_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.archives.create');
    }

    public function store(StoreArchiveRequest $request)
    {
        $archive = Archive::create($request->all());

        return redirect()->route('admin.archives.index');
    }

    public function edit(Archive $archive)
    {
        abort_if(Gate::denies('archive_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.archives.edit', compact('archive'));
    }

    public function update(UpdateArchiveRequest $request, Archive $archive)
    {
        $archive->update($request->all());

        return redirect()->route('admin.archives.index');
    }

    public function show(Archive $archive)
    {
        abort_if(Gate::denies('archive_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.archives.show', compact('archive'));
    }

    public function destroy(Archive $archive)
    {
        abort_if(Gate::denies('archive_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $archive->delete();

        return back();
    }

    public function massDestroy(MassDestroyArchiveRequest $request)
    {
        Archive::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
