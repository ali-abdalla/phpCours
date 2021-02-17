<?php
namespace App\Controller;
 class HomePage extends AbstractController{


    public function index(int $id): void
    {
        $this->render("homepage/index", [
            "message" => $id,
        ]);
    }

 }