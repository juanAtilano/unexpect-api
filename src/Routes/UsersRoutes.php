<?php

namespace src\Routes;

class UsersRoutes
{

    protected $app=null;

    function __contruct($app){
        $this->app = $app;
    }

    public function setRoutes($app){

        $app->get('/usuarios', 'UsersController:getUsers')->setName('users.getAll');
        $app->post('/usuarios', 'UsersController:postUser')->setName('users.post');
        $app->put('/usuarios/{id}',  'UsersController:putUser')->setName('users.put');

    }
}