<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhatwedoRequest extends FormRequest
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
            'title_ar' => 'required',
            'body_ar' => 'required',
            'title_en' => 'required',
            'body_en' => 'required',
            'Date' => 'required',
            'type' => 'required',
        ];
    }
}
