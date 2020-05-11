<?php

namespace App\controllers;

use App\core\App;
use App\repositories\Repository;
use App\services\renderers\IRenderer;
use App\services\renderers\TwigRenderer;

abstract class Controller
{
    protected $defaultAction = 'all';

    /**
     * @var TwigRenderer
     */
    protected $renderer;
    protected $app;

    public function __construct(IRenderer $renderer, App $app)
    {
        $this->renderer = $renderer;
        $this->app = $app;
    }

    public function run($actionName)
    {
        $action = $this->defaultAction;
        if (!empty($actionName)) {
            $action = $actionName;
            if (!method_exists($this, $action . 'Action')) {
                return $this->render(404);
            }
        }
        $action .= 'Action';
        return $this->$action();
    }

    protected function render($template, $params = [])
    {
        return $this->renderer->render($template, $params);
    }

    protected function getMenu()
    {
        return [
            [
                'name' => 'Пользователи',
                'href' => '/user/all',
            ],
            [
                'name' => 'Товары',
                'href' => '/good/all',
            ],
            [
                'name' => 'Добавить товар',
                'href' => '/good/insert',
            ],
            [
                'name' => 'Корзина',
                'href' => '/basket',
            ],

        ];
    }

    /**
     * @param $repositoryName
     * @return Repository|null
     */
    protected function getRepository($repositoryName)
    {
        return $this->app->db->getRepository($repositoryName);
    }
}