<?php

namespace App\Http\Requests\Products;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends BaseRequest
{
    /**
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
        $rules =[
            'name' => 'required|unique:products,name,'.$this->route('id').",id",
            'code' => 'required|unique:products,code,'.$this->route('id').",id",
            'cate_id' => 'required|exists:categories,id',
            'short_des' => 'nullable',
            'intro' => 'nullable',
            'body' => 'nullable',
            'base_price' => 'nullable|integer',
            'price' => 'nullable|integer',
            'status' =>'required|in:0,1',
//            'state' =>'required|in:1,2',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:3000',
            'image_back' => 'nullable|file|mimes:jpg,jpeg,png|max:3000',
            'galleries' => 'nullable|array|min:1|max:20',
            'galleries.*.image' => 'required_without:galleries.*.id|file|mimes:png,jpg,jpeg',

            'attrs' => 'nullable|array',
            'attrs.*.values.*.value' => 'required',
        ];

        return $rules;
    }

}
