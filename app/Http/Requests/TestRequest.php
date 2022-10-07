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
            'company' =>'required|max:20',
            'name'=>'required|max:20',
            'tel' => ['required', new TelRule], 
            'email'=> 'required|email',
            'birth_date'=>'required',
            'gender'=> 'required',
            'job' => 'required',
            'content' => 'required',
        ];
    }


}
