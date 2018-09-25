<?php
namespace src\Controllers;

use \src\Models\User as User;

class UsersController
{
    public function getUsers ( $request,  $response, $args) {

        $users = User::all();

        return $response->withJson($users);

    }


    public function postUser ( $request,  $response, $args) {

        $getContent = $request->getParsedBody();

        $passEncripted = password_hash($getContent['password'], PASSWORD_DEFAULT);

        $createUser = array(
            'email' => $getContent['email'], 
            'password' => $passEncripted
        );

        $user = User::create($createUser);

        if($user == null){
             return  $response->withJson('No se ha subido el User', 404);
        }

        return  $response->withJson($user, 201);

    }

    public function putUser ( $request,  $response, $args) {

        if ($args['id'] !== '1') {
            return  $response->withJson('El usuario no existe',404);
        }

        $getContent = $request->getParsedBody();

        if(empty($getContent['numero_default'])){
            return  $response->withJson('Sin contenido', 404);
        }

        $user = User::find($args['id']);

        if($user == null){
            return  $response->withJson('No se registraron cambios', 404);
        }

        $user->numero_default = $getContent['numero_default'];

        $user->save();
        
        if(empty($user)) {
            return $response->withJson($user, 404);
        }

        return $response->withJson($user);

    }

}
