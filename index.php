<?php

declare(strict_types=1);

use home\src\Core\Router;

require __DIR__ . '/vendor/autoload.php';

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals($_SERVER,$_GET,$_POST,$_COOKIE,$_FILES);
//Здесь мы запускаем роутер и передаем в него необходимые параметры. Заполняем свойства из URI. Из свойств роутера берем запрашиваемый контроллер и экшн и далее запускаем их.
try {
    $router = new Router($request);
    $ctr = $router->getController();
    $action = $router->getAction();
    $params = $router->getParams();
    $ctr->$action($params);

} catch (Throwable $exception) {
    echo $exception->getMessage();
    die();
}
