<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyInfoRequest extends FormRequest
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
            'business_name'     => 'required|string|max:255',
            'legal_repre'       => 'required|string|max:255',
            'num_workers'       => 'required|integer',
            'economic_activity' => 'required|string|min:6|max:255',

            'city_id'           => 'required|integer',
            'phone_num'         => 'required|integer',

            'name'              => 'required|string|max:100',
            'surnames'          => 'required|string|max:100',
            'position'          => 'required',
            'email'             => 'required|string|email|max:255',
            'phone_num_hr'      => 'required|integer',
        ];
    }
}
