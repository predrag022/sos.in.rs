<?php

namespace App\Http\Requests;

use App\Block;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateBlockRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('block_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'code' => [
                'required',
                'unique:blocks,code,' . request()->route('block')->id],
            'text' => [
                'required'],
        ];

    }
}
