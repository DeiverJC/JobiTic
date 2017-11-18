<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobOfferRequest extends FormRequest
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
            'title'         => 'required|string|max:125',
            'type_offer'    => 'required|min:1',
            'offer_country' => 'required',
            'offer_city'    => 'required',
            'remote'        => 'required|min:1',
            'salary_from'   => 'required|integer',
            'salary_until'  => 'required|integer',
            'cunrrency'     => 'required',
            'type_salary'   => 'required|min:1',
            'description'   => 'required',
            'restrictions'  => 'required',
        ];
    }
}
