<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRequest extends FormRequest
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
          'title'=> 'required',
          'desc'=> 'required',
          'rooms'=> 'required',
          'beds'=> 'required',
          'toilettes'=> 'required',
          'square_meters'=> 'required',
          'address'=> 'required',
          'img'=> 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048'
          // 'lat'=> 'required',
          // 'long'=> 'required'
        ];
    }
}
