<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\News;

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
        $id = News::find($this->id);
        $id_news = isset($id) ? $id->id : null;
        //dd($id_news);
        $validate = "";
        if($id_news) {
            $validate = $id_news.',id';
            //dd($validate);
        }
// var_dump('required|unique:news,title,' . $validate);exit;
            return [
                'title' => 'required|unique:news,title'.$validate,
                'author' => 'required|max:255',
                'intro' => 'required',
                'content' => 'required',
                'categories' => 'required',
                'update_image' => 'required'.$validate,
            ]; 
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter title.',
            'title.unique' => 'This Title have already exist!',
            // 'title.max' => 'Please enter maximum 255 characters.',
            'author.required' => 'Please enter author.',
            'author.max' => 'Please enter maximum 255 characters',
            'intro.required' => 'Please enter intro.',
            'content.required' => 'Please enter content',
            'update_image.required' => 'Please choose your image.',
            'categories.required' => 'Please enter Category',
        ];
        
    }
}
