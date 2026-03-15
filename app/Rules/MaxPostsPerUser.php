<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class MaxPostsPerUser implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $userId = request()->input('user_id');
       

        $postsCount = Post::where('user_id', $userId)->count();

        if ($postsCount >= 3) {
            $fail('You are allowed to create only 3 posts.');
        }
    }
}
