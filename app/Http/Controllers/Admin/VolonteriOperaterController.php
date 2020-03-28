<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreOperaterRequest;
use App\Http\Requests\StoreOperaterVolonterRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateOperaterRequest;
use App\Http\Requests\UpdateOperaterVolonterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class VolonteriOperaterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('operater'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = auth()->user();

        $users = User::where('organization_id', $user->organization_id)
            ->whereHas(
                'roles', function ($q) {
                $q->where('title', 'Volonter');
            }
            )->get();

        return view('admin.volonterioperater.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('operater'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.volonterioperater.create');
    }

    public function store(StoreOperaterVolonterRequest $request)
    {

        $user = auth()->user();

        $data = $request->all();

        $data['organization_id'] = $user->organization_id;

        $user = User::create($data);
        $user->roles()->sync([4]);

        $user->password_real = $data['password'];
        $user->text = 'Kreiran vam je volonterski nalog u okviru organizacije: ' . $user->organization->name;

        Mail::to($data['email'])->send(new WelcomeMail($user));

        return redirect()->route('admin.volonterioperater.index');

    }

    public function edit(User $volonterioperater)
    {
        abort_if(Gate::denies('operater'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = $volonterioperater;

        $user->load('organization');

        $this->checkOrganization($user);

        return view('admin.volonterioperater.edit', compact('user'));
    }

    public function update(UpdateOperaterVolonterRequest $request, User $volonterioperater)
    {

        $user = $volonterioperater;

        $user->load('organization');

        $this->checkOrganization($user);

        $user->update($request->all());
//        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.volonterioperater.index');

    }

    public function show(User $volonterioperater)
    {

        abort_if(Gate::denies('operater'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = $volonterioperater;
        $user->load('organization');
        $this->checkOrganization($user);

        return view('admin.volonterioperater.show', compact('user'));
    }

    public function destroy(User $operateri)
    {
        abort_if(Gate::denies('organizacija'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = $operateri;

        $user->load('organization');

        $this->checkOrganization($user);

        $user->delete();

        return back();

    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
//        User::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);

    }


    public function checkOrganization($checkUser)
    {

        $currentUser = auth()->user();

        $checkUser->load('organization');

        if (!$checkUser->organization || $currentUser->organization->id != $checkUser->organization->id) {

            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');

        }


    }
}
