<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
            'password' => $this->passwordRules(),
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'integer'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'region' => ['required', 'string'],
            'country' => ['required', 'string']
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'date_of_birth' => $input['date_of_birth'],
            'gender' => $input['gender'],
            'address' => $input['address'],
            'city' => $input['city'],
            'region' => $input['region'],
            'country' => $input['country']
        ]);

        Log::channel('custom')->info('New user has been registered', [
            'new_registered_user_id' => $user->id
        ]);

        return $user;
    }
}
