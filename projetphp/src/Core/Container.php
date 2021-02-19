<?php

namespace App\Core;

use App\Controller\Authentification;
use App\Controller\NotFound;
use App\Model\User;
use App\Controller\HomePage;
use App\Query\UserQuery;
use App\Service\Jwt;

//permet de retrouver URL/route

class Container {

    static public function getInstance(String $namespace){
        $instance = [
            Authentification::class => function ()
            { 
                return new \App\Controller\Authentification(); 
            },
            HomePage::class => function () {
                return new \App\Controller\HomePage();
            },
            Routing::class => function () {
                return new \App\Core\Routing();
            },
            Database::class => function () {
                return new \App\Core\Database();
            },
            DoteEnv::class => function () {
                return new \App\Core\DoteEnv();
            },
            User::class => function () {
                return new \App\Model\User();
            },
            UserQuery::class => function () {
                return new \App\Query\UserQuery(
                    self::getInstance(Database::class)
                );
            },
            Jwt::class => function () {
                return new \App\Service\Jwt();
            },
        ];
        return $instance[$namespace]();
    }
}