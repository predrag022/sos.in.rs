<?php

namespace App\Http\Controllers\Admin;

use App\Dostave;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDostaveRequest;
use App\Http\Requests\StoreDostaveRequest;
use App\Http\Requests\UpdateDostaveRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DostaveController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dostave_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currentUser = auth()->user();
        $dostaves = [];


        if ($currentUser->getIsAdminAttribute()) {
            $dostaves = Dostave::all();
        } else if ($currentUser->getIsOrganizacijaAttribute()) {
            $dostaves = Dostave::where('organization_id', $currentUser->id)->get();
        } else if ($currentUser->getIsVolonterAttribute()) {
            $dostaves = Dostave::where('dostavljac_id', $currentUser->id)->get();
        } else if ($currentUser->getIsOperaterAttribute()) {
            $dostaves = Dostave::where('dostavljac_id', $currentUser->id)->get();
        }

        return view('admin.dostaves.index', compact('dostaves'));
    }

    public function create()
    {
        abort_if(Gate::denies('dostave_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizations = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $operaters = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dostavljacs = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dostaves.create', compact('organizations', 'operaters', 'dostavljacs'));
    }

    public function store(StoreDostaveRequest $request)
    {
        $dostave = Dostave::create($request->all());

        return redirect()->route('admin.dostaves.index');

    }

    public function edit(Dostave $dostafe)
    {
        abort_if(Gate::denies('dostave_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dostave = $dostafe;

        $organizations = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $operaters = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dostavljacs = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dostave->load('organization', 'operater', 'dostavljac');

        return view('admin.dostaves.edit', compact('organizations', 'operaters', 'dostavljacs', 'dostave'));
    }

    public function update(UpdateDostaveRequest $request, Dostave $dostafe)
    {
        $dostave = $dostafe;
        $dostave->update($request->all());

        return redirect()->route('admin.dostaves.index');

    }

    public function show(Dostave $dostafe)
    {
        abort_if(Gate::denies('dostave_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dostave = $dostafe;
        $dostave->load('organization', 'operater', 'dostavljac');

        return view('admin.dostaves.show', compact('dostave'));
    }

    public function destroy(Dostave $dostafe)
    {
        abort_if(Gate::denies('dostave_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $dostave = $dostafe;
        $dostave->delete();

        return back();

    }

    public function massDestroy(MassDestroyDostaveRequest $request)
    {
//        Dostave::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function checkAccessToDostava()
    {


        $currentUser = auth()->user();
        $dostaves = [];

        if ($currentUser->getIsAdminAttribute()) {
            $dostaves = Dostave::all();
        } else if ($currentUser->getIsOrganizacijaAttribute()) {
            $dostaves = Dostave::where('organization_id', $currentUser->id)->get();
        } else if ($currentUser->getIsVolonterAttribute()) {
            $dostaves = Dostave::where('organization_id', $currentUser->organization_id)->get();
        } else if ($currentUser->getIsOperaterAttribute()) {
            $dostaves = Dostave::where('dostavljac_id', $currentUser->id)->get();
        }

    }
}
