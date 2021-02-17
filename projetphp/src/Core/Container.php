<?php

namespace App\Core;


//permet de retrouver URL/route

class Container {

    static public function getInstance(String $namespace){
        $instance = [
            'App\Controller\NotFound' => function ()
            { 
                return new \App\Controller\NotFound(); 
            },
            'App\Controller\HomePage' => function () {
                return new \App\Controller\HomePage();
            },
            'App\Core\Routing' => function () {
                return new \App\Core\Routing();
            },
        ];
        return $instance[$namespace]();
    }
}