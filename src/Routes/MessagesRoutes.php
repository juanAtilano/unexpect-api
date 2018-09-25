<?php

namespace src\Routes;

class MessagesRoutes
{

    protected $app=null;

    function __contruct($app){
        $this->app = $app;
    }

    public function setRoutes($app){

        $app->get('/messages/list/{pagination}', 'MessagesController:getMessagesPagination')->setName('messages.pagination');
        $app->get('/messages/search-date/{from}/{to}/{pagination}', 'MessagesController:getMessagesByDate')->setName('messages.saarchdate');
        $app->get('/messages/search/{text}/{pagination}', 'MessagesController:searchMessages')->setName('messages.saarchtext');
        $app->post('/messages', 'MessagesController:postMessages')->setName('messages.post');
        $app->put('/messages/{id}', 'MessagesController:putMessages')->setName('messages.put');
        $app->put('/messages/{id}/counter', 'MessagesController:countCopy')->setName('messages.counter');

    }
}