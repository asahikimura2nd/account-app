<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\postcode_check;
use App\Rules\tel_check;
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
            'tel'=>['required', new tel_check],
            'postcode'=>['required', new postcode_check],
            'prefectures'=>'required',
            'city'=>'required|max:30',
            'address_and_building'=>'required|max:50',
            'content'=> 'required|max:255',
        ];
    }
}
