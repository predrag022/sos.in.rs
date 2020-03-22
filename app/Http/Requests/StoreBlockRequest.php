<?php

namespace App\Http\Requests;

use App\Block;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreBlockRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('block_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'code' => [
                'required',
                'unique:blocks'],
            'text' => [
                'required'],
        ];

    }
}
