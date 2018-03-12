<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rezervasyonEkleRequest extends FormRequest
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
            'tarih' => 'required',
            'tur' => 'required',
            'yetiskinPax' => 'required',
            'cocukPac' => 'required',
            'bebekPax' => 'required',
            'ucretPax' => 'required',
            'isim' => 'required',
            'biletNo' => 'required',
            'otel_id' => 'required',
            'asb' => 'required',
            'odaNo' => 'required',
            'telNo' => 'required',
            'rehber' => 'required',
            'toplamSatis' => 'required',
            'toplamSatisD' => 'required',
            'kapora' => 'required',
            'kaporaD' => 'required',
            'rest' => 'required',
            'restD' => 'required'
        ];
    }

}
