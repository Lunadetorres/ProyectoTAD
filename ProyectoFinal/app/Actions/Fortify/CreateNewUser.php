<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
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
            'nombreUsuario' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $user =  User::create([
            'name' => $input['nombreUsuario'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        Usuario::create([
            'id' => $user->id,
            'nombreUsuario' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'direccion' => $input['direccion'],
            'nombre' => $input['nombre'],
            'apellidos' => $input['apellidos'],
            'telefono' => $input['telefono'],
            'fechaNacimiento' => $user->created_at,
            'isAdmin' => false
        ]);

        return $user;
    }
}
