<?php

namespace Qihucms\UserAddress\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'uri' => ['required', 'max:55'],
            'name' => ['required', 'max:55'],
            'phone' => ['required', 'max:55'],
            'address' => ['required', 'max:255'],
        ];
    }

    public function attributes()
    {
        return trans('user-address::address');
    }
}