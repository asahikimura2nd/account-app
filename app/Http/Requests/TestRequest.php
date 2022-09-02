<?php

namespace App\Http\Requests;

use App\Rules\TelRule;
use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
        
        return 
        [
            'user_company' =>'required|max:20',
            'user_name'=>'required|max:20',
            'user_tel' => ['required', new TelRule], 
            'user_email'=> 'required|email',
            'user_birth_date'=>'required',
            'user_gender'=> 'required',
            'user_job' => 'required',
            'user_content' => 'required',
        ];
    }


}
