<?php

namespace src\Routes;

class LoginRoutes{

    protected $app=null;
    function __contruct($app){
        $this->app = $app;
    }

    function setRoutes($app){
        $app->post('/login', 'LoginController:setLogin')->setName('logins.login');
        $app->get('/logout', 'LoginController:destroyLogin')->setName('logins.logout');
    }
}