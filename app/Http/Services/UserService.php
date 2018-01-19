<?php

namespace App\Http\Services;

use App\User;

class UserService
{

    protected $user;
    function __construct(User $user) 
    {
        $this->user = $user;
    }

    public function get($id = null) 
    {
        if ($id) {
            return $this->user->find($id);
        }

        return $this->user->all();
    }

    public function create($data) 
    {
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

    public function update($id, $data)
    {
        $user = $this->get($id);
        $user->name = $data['name'];
        $user->login = $data['login'];
        $user->pass = $data['pass'];
        $status = $user->save();

        if ($status) {
            return response()->json([
                'status' => true,
                'msg' => 'Usuário atualizado com sucesso',
                'id' => $user->id,
                'login' => $user->login,
                'pass' => $user->pass
            ]);
        }

        return response()->json([
            'status' => false,
            'msg' => 'Erro ao atualizar usuário',
            'id' => null,
            'login' => null,
            'pass' => null
        ]);
    }

    public function delete($id) 
    {
        $user = $this->user->find($id);
        $name = $user->name;
        $status = $user->delete();

        if ($status) {
            return response()->json([
                'status' => true,
                'msg' => "Usuário {$name} deletado com sucesso"
            ]);
        }

        return response()->json([
            'status' => false,
            'msg' => "Erro ao deletar o usuário {$name}, tente novamente"
        ]);    
    }

}
