<?php
namespace src\Controllers;

use \src\Models\User as User;
use \Firebase\JWT\JWT;

use \Exception as Exception;

class LoginController
{

    public function setLogin ( $request,  $response, $args) {

        $objeto = $request->getParsedBody();
        
        if(empty($objeto['email']) || empty($objeto['password'])) {
            return $response->withJson('Datos incompletos', 404);
        }

        $resultado = [];
    	$userEmail = $objeto['email'];
    	$userPdw = $objeto['password'];
    	$userDB = User::where('email', $userEmail)->first();

        if ($userDB == null) {
            return $response->withJson('Credenciales invalidas', 404);
        }

    	$hash = $userDB['password'];

    	if (password_verify($userPdw, $hash)) {

            $key = "secret";
            $time = time();
            $nextWeek = time() + (7 * 24 * 60 * 60);
            $expireTime = date('Y-m-d', $nextWeek);
            $token = array(
                "email" => $userDB['email'],
                "id" => $userDB['id'],
                "iat" => $time,
                "exp" => $expireTime
            );

            $jwt = JWT::encode($token, $key);

            $userDB->token = $jwt;
            $userDB->save();

            return $response->withJson($userDB);

		} else {
             return $response->withJson('Credenciales invalidas', 404);
		};

    }

    public function destroyLogin ( $request,  $response, $args) {

        try {
            $user = User::find(1);
        } catch(\Exception $e) {
            return $response->withJson($e->getMessage(), 404);
        }

        $user->token = null;
        $user->save();

        return $response->withJson('Sesion cerrada');
    }
}