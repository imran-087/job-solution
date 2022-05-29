<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExamRequest extends FormRequest
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
            'category' => 'required',
            'name' => 'required',
            'examinee_type' => 'required',
            'exam_mode' => 'required',
            'number_of_question' => 'required',
            'exam_starting_time' => 'required',
            'exam_status' => 'required',
        ];
    }
}
