<?php

namespace App\Http\Repositories;

use App\Models\User;

class AuthenticationRepository
{
    private $user;

    public function __construct (User $user)
    {
        $this->user = $user;
    }

    public function register($data) {
        $user = $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return new UserResource($user);
    }
}
