<?php
namespace src\Controllers;

use \src\Models\Message as Message;
use \src\Models\User as User;

class MessagesController
{

    public function searchMessages ( $request,  $response, $args) {

        $search = $args['text'];
        $pagination = $args['pagination'];

        if (empty($search) || empty($pagination)) {
            return $response->withJson('Sin contenido a buscar', 404);
        }

        $skip = 5;
        $initPagination = ($pagination - 1) * $skip;

        $count = Message::where('msg', 'like', '%' . $search . '%')->count();
        $totalPage = $count / $skip;
        $busqueda = Message::where('msg', 'like', '%' . $search . '%')->skip($initPagination)->take($skip)->get();

        return $response->withJson(
            array(
                'N_Page' => ceil($totalPage),
                'Pagination' => $busqueda 
            )
        );

    }

    public function getMessagesPagination ( $request,  $response, $args) {

        if (empty($args['pagination'])) {

            return $response->withJson('Ingresa una busqueda', 404);

        }

        $pagination = $args['pagination'];
        $skip = 5;
        $initPagination = ($pagination - 1) * $skip;

        $count = Message::count();
        $totalPage = $count / $skip;
        $busqueda = Message::where('users_id', '=', 1)->skip($initPagination)->take($skip)->get();

        return $response->withJson(
            array(
                'N_Page' => ceil($totalPage),
                'Pagination' => $busqueda 
            )
        );

    }

    public function getMessagesByDate ( $request,  $response, $args) {

        $from = $args['from'] . ' 00:00:00';
        $to = $args['to'] . ' 11:59:59';
        $pagination = $args['pagination'];

        if (empty($from) || empty($to) || empty($pagination)) {
            return $response->withJson('No están las fechas completas', 404);
        }

        $skip = 5;
        $initPagination = ($pagination - 1) * $skip;

        $count = Message::whereBetween('created_at', [$from, $to])->count();
        $totalPage = $count / $skip;
        $busqueda = Message::where('users_id', '=', 1)->whereBetween('created_at', [$from, $to])->skip($initPagination)->take($skip)->get();

        return $response->withJson(
            array(
                'N_Page' => ceil($totalPage),
                'Pagination' => $busqueda 
            )
        );

    }

    public function postMessages ( $request,  $response, $args) {

        $getContent = $request->getParsedBody();

        if(empty($getContent['link']) || empty($getContent['number']) || empty($getContent['msg'])) {
            return  $response->withJson('Los datos son incompletos', 404);
        }

        $createMsg = array(
            'msg' => $getContent['msg'],
            'link' => $getContent['link'],
            'numero' => $getContent['number'],
            'users_id' => 1,
            'counter' => 0
        );

        $msg = Message::create($createMsg);

        if($msg == null){
             return  $response->withJson('No se ha subido el User', 404);
        }

        return  $response->withJson($msg, 201);

    }

    public function countCopy ( $request,  $response, $args) {

        if (empty($args['id'])) {

            return  $response->withJson('Faltan parámetros',404);
        }

        $msg = Message::find($args['id']);

        if($msg == null){

             return  $response->withJson('No se registraron cambios', 404);
        }

        $newCount = $msg['counter'] + 1;

        $msg->counter = $newCount;

        $msg->save();

        return $response->withJson($msg);

    }

    public function putMessages ( $request,  $response, $args) {

        $getContent = $request->getParsedBody();

        if (empty($args['id']) || empty($getContent['number']) || empty($getContent['msg']) || empty($getContent['link'])) {
            return  $response->withJson('Faltan parámetros',404);
        }

        $msg = Message::find($args['id']);

        if($msg == null){
             return  $response->withJson('No se registraron cambios', 404);
        }

        $msg->numero = $getContent['number'];
        $msg->msg = $getContent['msg'];
        $msg->link = $getContent['link'];

        $msg->save();

        return $response->withJson($msg);

    }

}
