<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class PeriodRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = new User();
        if($user->isAdmin()){
            return true;
        }

        else return redirect()->to('/');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start' => 'required|date',
            'end' => 'required|date'
        ];
    }
}
