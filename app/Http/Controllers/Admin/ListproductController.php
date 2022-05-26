<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyListproductRequest;
use App\Http\Requests\StoreListproductRequest;
use App\Http\Requests\UpdateListproductRequest;
use App\Models\Listproduct;
use App\Models\Product;
use App\Models\Typepack;
use App\Models\TypePalet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListproductController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('listproduct_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listproducts = Listproduct::with(['title', 'type_pack_tr', 'type_pal'])->get();

        return view('admin.listproducts.index', compact('listproducts'));
    }

    public function create()
    {
        abort_if(Gate::denies('listproduct_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titles = Product::pluck('product_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $type_pack_trs = Typepack::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $type_pals = TypePalet::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.listproducts.create', compact('titles', 'type_pack_trs', 'type_pals'));
    }

    public function store(StoreListproductRequest $request)
    {
        $listproduct = Listproduct::create($request->all());

        return redirect()->route('admin.listproducts.index');
    }

    public function edit(Listproduct $listproduct)
    {
        abort_if(Gate::denies('listproduct_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $titles = Product::pluck('product_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $type_pack_trs = Typepack::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $type_pals = TypePalet::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listproduct->load('title', 'type_pack_tr', 'type_pal');

        return view('admin.listproducts.edit', compact('titles', 'type_pack_trs', 'type_pals', 'listproduct'));
    }

    public function update(UpdateListproductRequest $request, Listproduct $listproduct)
    {
        $listproduct->update($request->all());

        return redirect()->route('admin.listproducts.index');
    }

    public function show(Listproduct $listproduct)
    {
        abort_if(Gate::denies('listproduct_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listproduct->load('title', 'type_pack_tr', 'type_pal');

        return view('admin.listproducts.show', compact('listproduct'));
    }

    public function destroy(Listproduct $listproduct)
    {
        abort_if(Gate::denies('listproduct_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listproduct->delete();

        return back();
    }

    public function massDestroy(MassDestroyListproductRequest $request)
    {
        Listproduct::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
