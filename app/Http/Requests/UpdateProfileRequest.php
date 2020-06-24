<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       
        return [
               'employeedate' =>'required|date',
               'nationality' =>'required|string|min:5|max:255',
               'city' =>'required|string|min:5|max:255',
               'phonenumber' => 'required',
               'spousename' =>'sometimes|string|max:255',
               'email' => 'required|e-mail',
               'maritalstatus' =>'required|string|max:255',
               'childname' =>'sometimes',
               'childdate' =>'sometimes',
               'town' =>'required|string|max:255',
               'street' =>'required|string|max:255',
               'zone' =>'required|string|max:255',
               'landmarks' =>'required|string|max:255',
               'homedistrict' =>'required|string|max:255',
               'hometown' =>'required|string|max:255',
               'landmarks' =>'required|string|max:255',
               'startdate' =>'required|date',
               'salary' =>'required|integer',
               'jobstatus' =>'required|string|max:255',
               'cv' =>'required|string|max:255',
               'contactname' =>'required|string|max:255',
               'jobposition' =>'required|string|max:255',
               'relationshiptype' =>'required|string|max:255',
               'phoneno' => 'required',
               'bachelors' =>'required',
               'masters' =>'required',
               'diploma' =>'required',
               'certificate' =>'required',
               'academicdocument' =>'required',
               'bankname'=>'required|string|max:255',
               'bankbranch'=>'required|string|max:255',
               'bankaccount'=>'required|integer',
               'nssfnumber'=>'required|integer',
               'localtax'=>'required|integer',
               'signature' =>'required',
               'signaturedate' =>'required|date',
               
        ];
    }
    
    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
     //   $user=Auth::user();
        return [
        'employeedate.required' => 'employee date of birth is required',
        'email.unique' => 'A user with this email address already exists.'
        ];
    }
}
