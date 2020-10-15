<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenawaranRequest extends FormRequest
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
            'nama_penawaran' => 'required|max:255',
            'jml_kuota'=> 'required',
            'tgl_awal_penawaran'=>'required|date',
            'tgl_akhir_penawaran'=>'required|date|after:tgl_awal_penawaran',
            'tgl_awal_pendaftaran'=>'required|date|after:tgl_awal_penawaran',
            'tgl_akhir_pendaftaran'=>'required|date|after:tgl_awal_pendaftaran',
            'tgl_awal_verifikasi'=>'required|date|after:tgl_awal_pendaftaran',
            'tgl_akhir_verifikasi'=>'required|date|after:tgl_verifikasi_awal|after:tgl_akhir_pendaftaran',
            'tgl_awal_penetapan'=>'required|date|after:tgl_akhir_verifikasi',
            'tgl_akhir_penetapan'=>'required|date|after:tgl_awal_penetapan',
            'tgl_pengumuman'=>'required|date|after:tgl_akhir_penetapan',
            'ips'=>'required|min:1|max:4',
            'ipk'=>'required|min:1|max:4',
            'min_semester'=>'required|integer|min:1|max:8',
            'max_semester'=>'required|integer|min:1|max:8|gt:min_semester',
            'max_penghasilan'=>'required',
            'deskripsi' => 'required',
            'id_jenis_beasiswa'=>"required|not_in:0"
        ];
    }
}
