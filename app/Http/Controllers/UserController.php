<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userService;
    protected $request;

    function __construct(UserService $userService, Request $request) 
    {
        $this->userService = $userService;
        $this->request = $request;
    }

    public function get($id = null) 
    {
        $isValid = $this->isValidId($id);
        if (!$isValid[0]) {
            return $isValid[1];
        }
        return $this->userService->get($id);
    }

    public function create() 
    {        
        $data = $this->request->all();
        $rules = $this->fieldsRules();
        if ($this->validation($data, $rules)) {
            $response = $this->userService->create($data);
            return $response;
        }
    }

    public function update($id = null) 
    {
        $isValid = $this->isValidId($id);
        if (!$isValid[0]) {
            return $isValid[1];
        }

        $data = $this->request->all();
        $rules = $this->fieldsRules();
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $response = $this->userService->update($id, $data);
        return $response;
    }

    public function delete($id)
    {
        $isValid = $this->isValidId($id);
        if (!$isValid[0]) {
            return $isValid[1];
        }        
        return $this->userService->delete($id);
    }

    private function isValidId($id)
    {
        $validator = Validator::make(['id' => $id], ['id' => 'exists:users|required']);
        if ($validator->fails()) {
            return [false, $this->showValidationError($validator)];
        }

        return [true];
    }

    private function showValidationError($validator)
    {
        return response()->json($validator->messages(), 400);
    }

    private function fieldsRules() 
    {
        return [
            'name' => 'required|max:255|min:3',
            'login' => 'required|unique:users|max:35|min:3',
            'pass' => 'required|max:255|min:3'
        ];
    }
    
    
    
}
