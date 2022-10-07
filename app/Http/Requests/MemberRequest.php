<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\postcode_check;
use App\Rules\tel_check;


class MemberRequest extends FormRequest
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
        //メンバー登録フォーム
        'company'=>'required|max:30',
        'name_katakana'=>'required|max:30',
        //重複なし
        'email'=>'required|unique:users,email',
        'password'=>'required|min:8',
        'tel'=>['required', new tel_check],
        'postcode'=>['required', new postcode_check],
        'prefectures'=>'required',
        'city'=>'required|max:30',
        'address_and_building'=>'required|max:50',
        'content'=> 'required|max:255',
        ];
    }
}
