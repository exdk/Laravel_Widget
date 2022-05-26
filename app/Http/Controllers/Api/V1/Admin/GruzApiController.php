<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGruzRequest;
use App\Http\Requests\UpdateGruzRequest;
use App\Http\Resources\Admin\GruzResource;
use App\Models\Gruz;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GruzApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gruz_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GruzResource(Gruz::all());
    }

    public function store(StoreGruzRequest $request)
    {
        $gruz = Gruz::create($request->all());

        return (new GruzResource($gruz))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Gruz $gruz)
    {
        abort_if(Gate::denies('gruz_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GruzResource($gruz);
    }

    public function update(UpdateGruzRequest $request, Gruz $gruz)
    {
        $gruz->update($request->all());

        return (new GruzResource($gruz))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Gruz $gruz)
    {
        abort_if(Gate::denies('gruz_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gruz->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
