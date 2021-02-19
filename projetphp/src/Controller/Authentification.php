<?php
namespace App\Controller;

use App\Query\UserQuery;
use App\Service\Jwt;

class Authentification extends AbstractController{
        private UserQuery $userQuery;
        private Jwt $jwt;

        public function __construct(UserQuery $userQuery, Jwt $jwt)
        {
            $this->userQuery =$userQuery;
            $this->jwt = $jwt;
            
        }
        public function index():void {
        // $this ->render('notfound/index');
        $body = json_decode(file_get_contents('php://input'));
        // var_dump($body);
        // exit;
            $authentification =false;
            if($body){
                $authentification =$this->userQuery->checkUser(
                    $body->login,
                    $body->password
                );
                var_dump($authentification);
            }else{
                $this->renderJson('bad request',[],400);
            }

            if($authentification){
                $this->renderJson('Authentification succes',['acces_token'=>$this->jwt->generate()],200);
            }else{
                $this->renderJson('Unautortise',[],401);
            }

        }
            // $this->renderJson('coucou',['bonjour'=>'bonsoir'],201);
}