<?php
namespace App\Controller;
 class HomePage extends AbstractController{

    
    public function index():void {
        $this ->render('homepage/index');
    }

 }