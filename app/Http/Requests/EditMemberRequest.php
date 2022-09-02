<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\postcode_check;
use App\Rules\tel_check;
use Illuminate\Validation\Rule;

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
        $memberId = request()->route()->parameter('member_id');
        
        return [
        //メンバー登録フォーム
        'member_company'=>'required|max:30',
        'member_name_katakana'=>'required|max:30',
        //重複なし→自分以外のメールアドレス以外→なぜか失敗
        'member_email'=> ['required', Rule::unique('users')->ignore($memberId, 'member_id')],
        'member_password'=>'required|min:8',

        'member_tel'=>['required', new tel_check],
        'member_postcode'=>['required', new postcode_check],
        
        'member_prefectures'=>'required',
        'member_city'=>'required|max:30',
        'member_address_and_building'=>'required|max:50',
        'member_content'=> 'required|max:255',
        ];
    }
}
