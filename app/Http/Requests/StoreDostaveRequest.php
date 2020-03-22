<?php

namespace App\Http\Requests;

use App\Dostave;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDostaveRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dostave_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'name'          => [
                'required'],
            'address'       => [
                'required'],
            'operater_id'   => [
                'required',
                'integer'],
            'dostavljac_id' => [
                'required',
                'integer'],
        ];

    }
}
