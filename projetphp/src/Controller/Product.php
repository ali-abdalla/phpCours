<?php
namespace App\Controller;
 class Product extends AbstractController{


    public function index(): void
    {
        $params=['id'=>Null,'name'=>'xiaomie'];
        $ch = curl_init();

        // fixe l'URL et les autres options appropriées
        //methode Get 
        // $options = array(
        //         CURLOPT_URL => 'http://localhost:8001/api/product',
        //         CURLOPT_RETURNTRANSFER=>true,
        //     );
        //Methode Post
        $options = array(
            CURLOPT_URL => 'http://localhost:8001/api/product',
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS=>"id=null&name=xiamie",
            CURLOPT_RETURNTRANSFER=>true
        );
        curl_setopt_array($ch, $options);

        // attrape l'URL et la passe au navigateur
        $getproduc=curl_exec($ch);
        curl_close($ch);
            var_dump($getproduc);
        // ferme la ressource cURL et libère les ressources systèmes
        
        // $this->renderJson("aller", $this->ProdcutQuery->getAll(), 200);
        //curl -d '{"login":"admin", "password":"admin"}' "Content-Type:application/json" -X POST http://localhost:8000/auth

        // appel curl vers la route de l'api (api/product)

        
        $this->render("product/index");
    }

 }