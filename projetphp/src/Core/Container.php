<?php

namespace App\Core;

use App\Controller\Authentification;
use App\Controller\NotFound;
use App\Model\User;
use App\Controller\HomePage;
use App\Controller\Product as ControllerProduct;
use App\Controller\Produit\Produit;
use App\Model\Product;
use App\Query\ProductQuery;
use App\Query\UserQuery;
use App\Service\Jwt;
use App\Controller\API\Product as APIProduct;

//permet de retrouver URL/route

class Container {

    static public function getInstance(String $namespace){
        $instance = [
            NotFound::class => function () {
                return new \App\Controller\NotFound();
            },
            ControllerProduct::class => function () {
                return new \App\Controller\Product();
            },
            APIProduct::class => function () {
                return new \App\Controller\API\Product(
                    self::getInstance(ProductQuery::class),
                );
            },
            Authentification::class => function ()
            { 
                return new \App\Controller\Authentification(
                    self::getInstance(UserQuery::class),
                    self::getInstance(Jwt::class)
                ); 
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
            Product::class=> function(){
                return new \App\Model\Product();
            },
            UserQuery::class => function () {
                return new \App\Query\UserQuery(
                    self::getInstance(Database::class)
                );
            },
            ProductQuery::class => function () {
                return new \App\Query\ProductQuery(
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