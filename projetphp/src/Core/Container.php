<?php

namespace App\Core;

use App\Controller\NotFound;
use App\Model\User;
use App\Controller\HomePage;
use App\Query\UserQuery;

//permet de retrouver URL/route

class Container {

    static public function getInstance(String $namespace){
        $instance = [
            NotFound::class => function ()
            { 
                return new \App\Controller\NotFound(); 
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
        ];
        return $instance[$namespace]();
    }
}