<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseJson;
use App\Http\Services\AuthenticationService;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    private $request = [
        'name',
        'email',
        'password',
    ];
<<<<<<< HEAD
    private $login = [
        'email',
        'password',
    ];
=======

    private $requestLogin = [
        'email',
        'password',
    ];

>>>>>>> main
    private $service;

    public function __construct(AuthenticationService $service)
    {
        $this->service = $service;
    }

    public function login(Request $request)
    {
        $data = $request->only($this->request);

        try {
            $response = $this->service->login($data);
<<<<<<< HEAD
            return ResponseJson::success($response);
        } catch (\Exception $e) {
            return ResponseJson::error($e->getMessage());
        }
=======
        } catch (\Exception $e) {
            return ResponseJson::error($e->getMessage());
        }

>>>>>>> main
        return $response;
    }

    public function register(Request $request)
    {
        $data = $request->only($this->request);

        try {
            $result = $this->service->register($data);
        } catch (\Exception $e) {
            return ResponseJson::error($e->getMessage());
        }

        return ResponseJson::success($result, 'User created successfully');
    }

    public function profile(Request $request)
    {
        try {
            $result = $this->service->profile();
        } catch (\Exception $e) {
            return ResponseJson::error($e->getMessage());
        }

        return ResponseJson::success($result, "User's profile");
    }
}
