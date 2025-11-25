<?php

namespace App\Actions\Fortify;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'type' => [
                'required',
                'string', 
                Rule::enum(UserTypeEnum::class)
                ],
            'password' => $this->passwordRules(),
        ])->validate();

        return
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'type' => $input['type'],
            'password' => $input['password'],
        ]);
    }
}
