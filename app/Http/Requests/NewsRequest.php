<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|unique:news,title|max:255',
            'author' => 'required|max:255',
            'intro' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter title.',
            'title.unique' => 'This Title have already exist!',
            'title.max' => 'Please enter maximum 255 characters.',
            'author.required' => 'Please enter author.',
            'author.max' => 'Please enter maximum 255 characters',
            'intro.required' => 'Please enter intro.',
            'content.required' => 'Please enter content',
            'image.required' => 'Please choose your image.',
            'category_id.required' => 'Please enter Category',
        ];
        
    }
}
