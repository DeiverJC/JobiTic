<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompantyInfoRequest extends FormRequest
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
            'business_name'     => 'required|max:255|string',
            'legal_repre'       => 'required|strign|max:255',
            'economic_activity' =>  'required|strign',
            'num_workers'       =>  'required|numeric',

            'country'           =>  'required|string',

        ];
    }
}

'country', 'departament', 'municipality', 'address',
        'phone_indic', 'phone_num', 'phone_ext',
        'phone2_indic', 'phone2_num', 'phone2_ext',
        'celphone', 'website'

