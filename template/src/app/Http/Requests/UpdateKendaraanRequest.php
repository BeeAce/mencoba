<?php

namespace App\Http\Requests;

use App\Models\Kendaraan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKendaraanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kendaraan_edit');
    }

    public function rules()
    {
        return [
            'kendaraanname' => [
                'string',
                'required',
            ],
            'nim' => [
                'string',
                'required',
            ],
            'jenis_kelamin' => [
                'string',
                'required',
            ],
            'jurusan' => [
                'string',
                'required',
            ],
            'fakultas' => [
                'string',
                'required',
            ],
            'jalur' => [
                'string',
                'required',
            ],
        ];
    }
}
