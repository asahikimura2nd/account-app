<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PostcodeCheck;
use App\Rules\TelCheck;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\RequiredIf;
use Symfony\Contracts\Service\Attribute\Required;

class EditMemberRequest extends FormRequest
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
        $id = request('id');
        return [
            //メンバー登録フォーム
            'company' => 'required|max:30',
            'name_katakana' => 'required|max:30|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'email' => ['required', Rule::unique('users')->ignore($id, 'id')],
            'password' => ['required_if:id,null','nullable','min:8'],
            'tel'=>['required', new TelCheck],
            'postcode'=>['required', new PostcodeCheck],
            'prefectures'=>'required',
            'city'=>'required|max:30',
            'address_and_building'=>'max:50'
        ];
    }

    public function messages(){
        return [
            'required_if' => 'パスワードを指定してください。'
        ];
    }
}
