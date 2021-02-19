<?php 
namespace App\Controller;
abstract class AbstractController {
    protected function render(String $view, array $data = [], String $title ="Api"): void
    {
        extract($data);
        require_once  __DIR__ . "../../../template/$view.php";
    }

    protected function renderJson(string $message,array $data=[],int $statusCode =200):void{
       
        http_response_code($statusCode);
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        
        echo json_encode(
            [
                'message'=>$message,
                'data'=>$data
            ]
            );
    }
}