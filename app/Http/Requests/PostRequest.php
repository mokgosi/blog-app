<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\DataTransferObjects\PostDTO;
use Illuminate\Support\Facades\Gate;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return Gate::allows('create-post', User::class);
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048'
        ];
    }

    /**
     * Build and return a DTO.
     *
     * @return PostDTO
     */
    public function toDTO(): PostDTO
    {
        $newImageName= '';
        if($this->image) {
            $newImageName = uniqid() . '-' . $this->title . '.' . $this->image->extension();
        }
        
        return new PostDTO(
            title: $this->title,
            description: $this->description,
            image_path: $newImageName,
        );
    } 
}
