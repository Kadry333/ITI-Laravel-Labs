<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MaxPostsPerUser;
class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','min:3','unique:posts',new MaxPostsPerUser()],
            'description' => 'required|min:10',
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpg,png',
        ];
    }
}
