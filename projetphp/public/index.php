<?php
    require_once '../vendor/autoload.php';

    use App\Core\Container;
    use App\Core\Database;
    use App\Core\DoteEnv;
    use App\Core\Routing;
use App\Query\UserQuery;

DoteEnv::load();
    $db =new Database();
    // echo '<pre>'; var_dump($db->connect());echo '</pre>';

    // echo '<pre>'; var_dump($_ENV);echo '</pre>';
    $userQuery = Container::getInstance(UserQuery::class);

    echo '<pre>'; var_dump($userQuery->checkUser('adminx','admin') );echo '</pre>';exit;

    // $routing = new Routing();
    $routing= Container::getInstance(Routing::class);
    $routeInfo = $routing -> getRouteInfo();
    
    $controlleName= "App\Controller\\{$routeInfo['controller']}";
    
    
    // echo '<pre>'; var_dump($routeInfo);echo '</pre>';exit;

    // $controller = new $controlleName();
    $controller = Container::getInstance($controlleName);

    $controller -> {$routeInfo['method']}( ...$routeInfo['vars']);
?>