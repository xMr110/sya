<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OurteamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()){
            case 'GET':
            case 'DELETE':
                return [];
                break;
            case 'POST':
                return [
                    'image_path' => 'required',
                     'name' => 'required',
                     'job_title' => 'required'
                ];
                break;
            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'required',
                    'job_title' => 'required'
                ];
                break;
            default:
                return [];
        }
    }
}
