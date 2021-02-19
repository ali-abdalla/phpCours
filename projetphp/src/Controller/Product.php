<?php
namespace App\Controller;
 class Product extends AbstractController{


    public function index(): void
    {
        // $this->renderJson("aller", $this->ProdcutQuery->getAll(), 200);
        //curl -d '{"login":"admin", "password":"admin"}' "Content-Type:application/json" -X POST http://localhost:8000/auth

        // appel curl vers la route de l'api (api/product)

        
        $this->render("product/index");
    }

 }