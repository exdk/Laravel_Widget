<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCondpayRequest;
use App\Http\Requests\StoreCondpayRequest;
use App\Http\Requests\UpdateCondpayRequest;
use App\Models\Condpay;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CondpayController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('condpay_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $condpays = Condpay::all();

        return view('admin.condpays.index', compact('condpays'));
    }

    public function create()
    {
        abort_if(Gate::denies('condpay_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.condpays.create');
    }

    public function store(StoreCondpayRequest $request)
    {
        $condpay = Condpay::create($request->all());

        return redirect()->route('admin.condpays.index');
    }

    public function edit(Condpay $condpay)
    {
        abort_if(Gate::denies('condpay_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.condpays.edit', compact('condpay'));
    }

    public function update(UpdateCondpayRequest $request, Condpay $condpay)
    {
        $condpay->update($request->all());

        return redirect()->route('admin.condpays.index');
    }

    public function show(Condpay $condpay)
    {
        abort_if(Gate::denies('condpay_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.condpays.show', compact('condpay'));
    }

    public function destroy(Condpay $condpay)
    {
        abort_if(Gate::denies('condpay_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $condpay->delete();

        return back();
    }

    public function massDestroy(MassDestroyCondpayRequest $request)
    {
        Condpay::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
