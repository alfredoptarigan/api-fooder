<?php

namespace App\Http\Services;

use App\Http\Repositories\AuthenticationRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthenticationService
{
    protected $repository;

    public function __construct(AuthenticationRepository $repository)
    {
        $this->repository = $repository;
    }

    private function validator($data) {
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);

        return $validator;
    }

    public function register($data)
    {
        $validate = $this->validator($data);

        if($validate->fails()) {
            throw new \InvalidArgumentException($validate->errors()->first());
        }

        DB::beginTransaction();
        try {
            $result = $this->repository->register($data);
        } catch(\Exception $e) {
            DB::rollback();
            throw new \InvalidArgumentException($e->getMessage());
        }
        DB::commit();

        return $result;
    }

}