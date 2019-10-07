<?php

namespace App\Http\Requests;

use App\Employee;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeCreateRequest extends FormRequest
{
    /**
     * Can user do this.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create', new Employee);
    }

    /**
     * Validation Rules Go here.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name'  => 'required',
            'company_id' => 'required|numeric|exists:companies,id',
            'email'      => 'nullable|email',
            'phone'      => 'nullable',
        ];
    }
}
