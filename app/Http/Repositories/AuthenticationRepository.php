<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticationRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login($data)
    {
        if (Auth::attempt($data)) {
            $user = Auth::user();

            $login['user'] = new UserResource($user);
            $login['token'] = Auth::user()->createToken('Food Court')->accessToken;

            return $login;
        }

        throw new \Exception('Failed Login');
    }

    public function register($data)
    {
        $user = $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return new UserResource($user);
    }

    public function profile()
    {
        $user = Auth::user();


        return new UserResource($user);
    }
}
