<?php
namespace App\Controller;
    class NotFound extends AbstractController{

        public function index():void {
            $this ->render('notfound/index');
        }

    }