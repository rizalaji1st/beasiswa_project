<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenawaranUploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'id_jenis_file' => 'required',
            'id_penawaran' => 'required',
            'nama_upload' => 'required',
            'path_file' => 'required',
            'nama_file' => 'required',
            'ekstensi' => 'required',
            'size' => 'required', 
        ];
    }
}
