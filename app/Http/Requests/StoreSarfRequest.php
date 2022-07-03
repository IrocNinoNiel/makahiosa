<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSarfRequest extends FormRequest
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
            'dateOfApplication'=>'required',
            'organization_id'=>'required',
            'nameOfRepresentative'=>'required',
            'titleOfTheEvent'=>'required',
            'generalObjective'=>'required',
            'dateOfEvent'=>'required',
            'endDateOfTheEvent'=>'required',
            'hoursDuration'=>'required',
            'startOfEvent'=>'required',
            'endOfEvent'=>'required',
            'numOfParticipant'=>'required',
            'venueOfEvent'=>'required',
            'amountAllocated'=>'required',
            'sourceOfFunds'=>'required',
            'files'=>'required',
            'objectives'=>'required'
        ];
    }
}
