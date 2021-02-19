<?php
namespace App\Controller;
    class Authentification extends AbstractController{

        public function index():void {
        // $this ->render('notfound/index');
        $body = json_decode(file_get_contents('php://input'));
        var_dump($body);
        exit;
            $this->renderJson();
        }

    }
    ?>