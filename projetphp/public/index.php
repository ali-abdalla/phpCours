<?php
    require_once '../vendor/autoload.php';
    use App\Core\Routing;

    $routing = new Routing();
    $routeInfo = $routing -> getRouteInfo();
    
    $controlleName= "App\Controller\\{$routeInfo['controller']}";
    
    
    echo '<pre>'; var_dump($routeInfo);echo '</pre>';exit;

    $controller = new $controlleName();

    $controller -> {$routeInfo['method']}();
?>