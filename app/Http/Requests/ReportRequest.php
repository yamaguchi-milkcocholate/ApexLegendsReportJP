<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'your-id' => '',
            'your-first-name' => 'required',
            'your-last-name' => '',
            'your-email' => 'required|email',
            'hacker-id' => 'required',
        ];
    }

    /**
     * 定義済みバリデーションルールのエラーメッセージ取得
     *
     * @return array
     */
    public function messages()
    {
        return [
            'your-first-name.required' => 'A title is required',
            'your-email.required'  => 'A message is required',
            'your-email.email' => '',
        ];
    }
}
