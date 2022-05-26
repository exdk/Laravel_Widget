<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDocTtnRequest;
use App\Http\Requests\StoreDocTtnRequest;
use App\Http\Requests\UpdateDocTtnRequest;
use App\Models\DocTtn;
use App\Models\Listproduct;
use App\Models\Mycompan;
use App\Models\Zakazchikklient;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocTtnController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('doc_ttn_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $docTtns = DocTtn::with(['id_list_product', 'otpravitel', 'poluchatel'])->get();

        return view('admin.docTtns.index', compact('docTtns'));
    }

    public function create()
    {
        abort_if(Gate::denies('doc_ttn_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_list_products = Listproduct::pluck('id_vnutr', 'id')->prepend(trans('global.pleaseSelect'), '');

        $otpravitels = Mycompan::pluck('hortname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $poluchatels = Zakazchikklient::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.docTtns.create', compact('id_list_products', 'otpravitels', 'poluchatels'));
    }

    public function store(StoreDocTtnRequest $request)
    {
        $docTtn = DocTtn::create($request->all());

        return redirect()->route('admin.doc-ttns.index');
    }

    public function edit(DocTtn $docTtn)
    {
        abort_if(Gate::denies('doc_ttn_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_list_products = Listproduct::pluck('id_vnutr', 'id')->prepend(trans('global.pleaseSelect'), '');

        $otpravitels = Mycompan::pluck('hortname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $poluchatels = Zakazchikklient::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $docTtn->load('id_list_product', 'otpravitel', 'poluchatel');

        return view('admin.docTtns.edit', compact('id_list_products', 'otpravitels', 'poluchatels', 'docTtn'));
    }

    public function update(UpdateDocTtnRequest $request, DocTtn $docTtn)
    {
        $docTtn->update($request->all());

        return redirect()->route('admin.doc-ttns.index');
    }

    public function show(DocTtn $docTtn)
    {
        abort_if(Gate::denies('doc_ttn_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $docTtn->load('id_list_product', 'otpravitel', 'poluchatel');

        return view('admin.docTtns.show', compact('docTtn'));
    }

    public function destroy(DocTtn $docTtn)
    {
        abort_if(Gate::denies('doc_ttn_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $docTtn->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocTtnRequest $request)
    {
        DocTtn::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
