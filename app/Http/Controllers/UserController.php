<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userService;
    protected $request;

    function __construct(UserService $userService, Request $request) {
        $this->userService = $userService;
        $this->request = $request;
    }

    public function get($id = null) {
        return $this->userService->get($id);
    }

    public function create() {
        
        $data = $this->request->all();
        $rules = [
            'name' => 'required|max:255|min:3',
            'login' => 'required|unique:users|max:35|min:3',
            'pass' => 'required|max:255|min:3'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $response = $this->userService->create($data);

        return $response;
    }
}
