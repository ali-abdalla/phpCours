<?php

namespace App\Core;

//permet de retrouver URL/route

class routing {

    private array $routes = [
        '/' => [
            'controller' => 'HomePage',
            'method'=>'index'
        ],
        // pour les expressions rationelles : https://regex101.com/
        
        '/(?<id>\d+)' => [
            'controller' => 'HomePage',
            'method' => 'index'
        ]
    ];

    public function getRouteInfo():array
    {
        $uri = $_SERVER['REQUEST_URI'];
        $result= [
            'controller'=>'NotFound',
            'method'=>'index',
            'vars'=>[]
        ];

        foreach ($this->routes as $regex => $info) {
            if (preg_match("#^$regex$#",$uri,$groupe))
            {
                $result = $info;
                $result['vars'] = $groupe;

                break;
            }
        }

        foreach ($result['vars'] as $key => $value) {
            if(is_int($key)){
                unset($result['vars'][$key]);
            }
        }

        // if(array_key_exists($uri, $this->routes)){
        //     $result =$this->routes[$uri];
        // }
        return $result;
    }
}