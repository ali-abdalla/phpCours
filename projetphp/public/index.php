<?php
    require_once '../vendor/autoload.php';

    use App\Core\Container;
    use App\Core\Routing;

    // $routing = new Routing();
    $routing= Container::getInstance(Routing::class);
    $routeInfo = $routing -> getRouteInfo();
    
    $controlleName= "App\Controller\\{$routeInfo['controller']}";
    
    
    // echo '<pre>'; var_dump($routeInfo);echo '</pre>';exit;

    // $controller = new $controlleName();
    $controller = Container::getInstance($controlleName);

    $controller -> {$routeInfo['method']}( ...$routeInfo['vars']);
?>