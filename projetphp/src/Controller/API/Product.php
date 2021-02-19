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
        return $this->renderJson("aller", $this->productQuery->getAll(),200);
    }
}

//fonction ProdcutQuery->getall
//permet de retrouver URL/route


// get
// requête pour recupérer tous les produits

// affiche en json