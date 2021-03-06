<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:256',
            'phone' => 'required|max:11',
            'title' => 'required|max:256',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Не заполнено поле Имя',
            'phone.required'  => 'Не заполнено поле Телефон',
            'phone.max'  => 'Поле телефон - максимально 11 символов',
            'title.required'  => 'Не заполнено поле Название заявки',
        ];
    }
}
