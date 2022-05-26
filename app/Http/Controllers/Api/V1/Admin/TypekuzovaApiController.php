<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypekuzovaRequest;
use App\Http\Requests\UpdateTypekuzovaRequest;
use App\Http\Resources\Admin\TypekuzovaResource;
use App\Models\Typekuzova;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypekuzovaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('typekuzova_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TypekuzovaResource(Typekuzova::all());
    }

    public function store(StoreTypekuzovaRequest $request)
    {
        $typekuzova = Typekuzova::create($request->all());

        return (new TypekuzovaResource($typekuzova))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Typekuzova $typekuzova)
    {
        abort_if(Gate::denies('typekuzova_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TypekuzovaResource($typekuzova);
    }

    public function update(UpdateTypekuzovaRequest $request, Typekuzova $typekuzova)
    {
        $typekuzova->update($request->all());

        return (new TypekuzovaResource($typekuzova))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Typekuzova $typekuzova)
    {
        abort_if(Gate::denies('typekuzova_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typekuzova->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
