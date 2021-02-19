<?php
namespace App\Controller\API;

use App\Controller\AbstractController;
use App\Query\ProductQuery;

class Product extends AbstractController{

    private ProductQuery $productQuery;
    
    public function __construct(ProductQuery $productQuery)
    {
        $this->productQuery = $productQuery;
    }


    public function productquery()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === 'GET'){
            return $this->renderJson("aller", $this->productQuery->getAll(),200);
        }elseif ($method === 'POST') {
            $body = json_decode(file_get_contents('php://input'));
            $this->productQuery->insert($body);

            $this->renderJson('produit créé', [], 201);
        }
    }
}

//fonction ProdcutQuery->getall
//permet de retrouver URL/route


// get
// requête pour recupérer tous les produits

// affiche en json