<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateOperaterVolonterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('operater'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'name' => [
                'required'],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('volonterioperater')->id]
        ];

    }
}
