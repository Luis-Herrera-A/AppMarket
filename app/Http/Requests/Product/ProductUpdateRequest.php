<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function __construct(Route $route)
  {
      $this->route= $route;
  }


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
          'name' => 'required|min:3|unique:products,name,'.$this->route->parameter('product'),
          'price'=> 'required',
          'marks_id'=> 'required|not_in:0',
                      //
        ];

    }
    public function messages(){

      return [

          'marks_id.not_in'=>'El campo marca debe ser llenado'

      ];
    }
}
