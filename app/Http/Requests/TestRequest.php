<?php

namespace App\Http\Requests;

use App\Rules\TelCheck;
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
        // dd(request()->all());
        // dd(request()->job);
        return 
        [
            'company' =>'required|max:20',
            'name'=>'required|max:20',
            'tel' => ['required', new TelCheck], 
            'email'=> 'required|email',
            'birth_date'=>'required',
            'gender'=> 'required',
            'job' => 'required',
            'content' => 'required',
        ];
    }


}
