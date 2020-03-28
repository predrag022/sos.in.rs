<?php

namespace App\Http\Controllers\Admin;

use App\Dostave;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDostaveRequest;
use App\Http\Requests\StoreDostaveRequest;
use App\Http\Requests\UpdateDostaveAcceptRequest;
use App\Http\Requests\UpdateDostaveRequest;
use App\Mail\KreiranaDostava;
use App\Mail\WelcomeMail;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
            $dostaves = Dostave::where('organization_id', $currentUser->organization_id)->get();
        }

        return view('admin.dostaves.index', compact('dostaves'));
    }

    public function create()
    {
        abort_if(Gate::denies('dostave_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $currentUser = auth()->user();

        $dostavljacs = User::where('organization_id', $currentUser->organization->id)
//            ->where('online_status', 1)
            ->whereHas(
                'roles', function ($q) {
                $q->where('title', 'Volonter');
            }
            )->get();


        $dostavljacs = $dostavljacs->map(function ($dostavljac) {

            $aktivnihDostava = Dostave::where('dostavljac_id', $dostavljac->id)->where('status', 'nova')->count();
            $dostavljac->name = $dostavljac->name . ' (broj trenutnih dostava koje nisu kompletirane:' . $aktivnihDostava . ')';

            return $dostavljac;
        });

        $dostavljacs = $dostavljacs->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dostaves.create', compact('organizations', 'operaters', 'dostavljacs'));
    }

    public function store(StoreDostaveRequest $request)
    {

        $data = $request->all();

        $currentUser = auth()->user();


        $data['operater_id'] = $currentUser->id;
        $data['organization_id'] = $currentUser->organization_id;
        $data['status'] = 'nova';

        $dostava = Dostave::create($data);

        $dostava->text = 'Kreiran vam je volonterski nalog u okviru organizacije:';

        $dostavljac = User::find($request->dostavljac_id);

        $dostava->kreirao = $currentUser;

        Mail::to($dostavljac->email)->send(new KreiranaDostava($dostava));


        return redirect()->route('admin.dostaves.index');

    }

    public function edit(Dostave $dostafe)
    {
        abort_if(Gate::denies('dostave_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $limited = false;
        $dostave = $dostafe;
        $this->checkAccessToDostava($dostafe);


        $currentUser = auth()->user();

        $dostavljacs = User::where('organization_id', $currentUser->organization->id)
//            ->where('online_status', 1)
            ->whereHas(
                'roles', function ($q) {
                $q->where('title', 'Volonter');
            }
            )->get();


        $dostavljacs = $dostavljacs->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dostave->load('dostavljac');


        if ($currentUser->getIsVolonterAttribute()) {
            $limited = true;
        }

        return view('admin.dostaves.edit', compact('dostavljacs', 'dostave', 'limited'));
    }

    public function update(Request $request, Dostave $dostafe)
    {
        $dostave = $dostafe;
        $this->checkAccessToDostava($dostafe);
        $dostave->update($request->all());

        return redirect()->route('admin.dostaves.index');

    }

    public function accept(Dostave $dostafe)
    {
        abort_if(Gate::denies('volonter'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $dostave = $dostafe;
        $this->checkAccessToDostava($dostafe);

        if ($dostave->status == 'nova') {
            $data = ['status' => 'prihvacena'];
            $dostave->update($data);
            return 'Prihvatili ste dostavu. Možete ugasiti ovaj prozor';
        }

        if ($dostave->status == 'prihvacena') {
            return 'Dostava je već prihvaćena. Možete ugasiti ovaj prozor';
        }

        if ($dostave->status == 'dostavljena') {
            return 'Dostava je već dostavljena :). Možete ugasiti ovaj prozor';
        }


    }

    public function delivered(Dostave $dostafe)
    {
        abort_if(Gate::denies('volonter'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dostave = $dostafe;
        $this->checkAccessToDostava($dostafe);

        if ($dostave->status == 'nova') {
            return 'Morate prvo da prihvatite isporuku ove dostave';
        }

        if ($dostave->status == 'prihvacena') {
            $data = ['status' => 'dostavljena'];
            $dostave->update($data);
            return 'Hvala na isporučenoj dostavi !';
        }

        if ($dostave->status == 'dostavljena') {
            return 'Dostava je već dostavljena  :). Možete ugasiti ovaj prozor';
        }


    }

    public function show(Dostave $dostafe)
    {
        abort_if(Gate::denies('dostave_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dostave = $dostafe;

        $this->checkAccessToDostava($dostafe);

        $dostave->load('organization', 'operater', 'dostavljac');

        return view('admin.dostaves.show', compact('dostave'));
    }

    public function destroy(Dostave $dostafe)
    {
        abort_if(Gate::denies('dostave_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $dostave = $dostafe;
        $this->checkAccessToDostava($dostafe);
        $dostave->delete();

        return back();

    }

    public function massDestroy(MassDestroyDostaveRequest $request)
    {
//        Dostave::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function checkAccessToDostava($dostava)
    {

        $currentUser = auth()->user();
        $canSee = false;

        if ($currentUser->getIsAdminAttribute()) {
            $canSee = true;

        } else if ($currentUser->getIsOrganizacijaAttribute() && $dostava->organization_id == $currentUser->id) {
            $canSee = true;
        } else if ($currentUser->getIsVolonterAttribute() && $dostava->dostavljac_id == $currentUser->id) {

            $canSee = true;

        } else if ($currentUser->getIsOperaterAttribute() && $dostava->organization_id == $currentUser->organization->id) {

            $canSee = true;

        }

        if (!$canSee) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');

        }

    }
}
