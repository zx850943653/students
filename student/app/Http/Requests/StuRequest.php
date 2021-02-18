<?php

namespace App\Http\Requests;

use http\Env\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StuRequest extends FormRequest
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
            'name' => 'required',
            'age' => 'required|max:100|numeric'
        ];
    }

    public function messages()
    {
        $message = [
            'name.required' => '名字不能为空',
            'age.required' => '年龄不能为空',
            'age.max' => '年龄不能超过100',
            'age.numeric' => '年龄必须为数字',
        ];
        return $message; // TODO: Change the autogenerated stub
    }

    protected function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->all();
        throw new HttpResponseException(response()->json(['msg' => 'error', 'code' => '500', 'data' => $error[0]], 200));
    }
}