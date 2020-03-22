<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Dostave;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDostaveRequest;
use App\Http\Requests\UpdateDostaveRequest;
use App\Http\Resources\Admin\DostaveResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DostaveApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dostave_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DostaveResource(Dostave::with(['organization', 'operater', 'dostavljac'])->get());

    }

    public function store(StoreDostaveRequest $request)
    {
        $dostave = Dostave::create($request->all());

        return (new DostaveResource($dostave))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Dostave $dostave)
    {
        abort_if(Gate::denies('dostave_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DostaveResource($dostave->load(['organization', 'operater', 'dostavljac']));

    }

    public function update(UpdateDostaveRequest $request, Dostave $dostave)
    {
        $dostave->update($request->all());

        return (new DostaveResource($dostave))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Dostave $dostave)
    {
        abort_if(Gate::denies('dostave_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dostave->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
