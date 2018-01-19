<?php

namespace App\Http\Services;

use App\User;

class UserService
{

    protected $user;
    function __construct(User $user) {
        $this->user = $user;
    }

    public function get($id = null) 
    {
        if ($id) {
            return $this->user->find($id);
        }

        return $this->user->all();
    }

    public function create($data) {
        $user = new User();
        $user->name = $data['name'];
        $user->login = $data['login'];
        $user->pass = $data['pass'];
        $status = $user->save();

        if ($status) {
            return response()->json([
                'status' => true,
                'msg' => 'Usuário cadastrado com sucesso',
                'id' => $user->id
            ]);
        }

        return response()->json([
            'status' => false,
            'msg' => 'Erro ao cadastrar usuário',
            'id' => null
        ]);
    }

}
