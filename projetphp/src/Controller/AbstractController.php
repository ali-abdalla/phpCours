<?php 
namespace App\Controller;
abstract class AbstractController {
    protected function render(String $view, array $data = [], String $title ="Api"): void
    {
        extract($data);
        require_once  __DIR__ . "../../../template/$view.php";
    }
}