<?php
use App\services\renderers\TwigRenderer;

require_once dirname(__DIR__) . '/vendor/autoload.php';
$request = new \App\services\Request();

$controllerName = $request->getControllerName();
$actionName = $request->getActionName();

$controllerClass = '\\App\\controllers\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    /**
     * @var \App\controllers\Controller $controller
     */

    $renderer = new TwigRenderer();
    $controller = new $controllerClass($renderer);
    echo $controller->run($actionName);
}