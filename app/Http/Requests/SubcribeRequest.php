<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\ToSweetAlert;

class SubcribeRequest extends FormRequest
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
            'email' => 'required|email|unique:subcribers'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('required'),
            'email.email' => trans('email'),
            'email.unique' => trans('unique'),
        ];
    }
}
