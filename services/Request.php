<?php

namespace App\services;

class Request
{
    private $queryString;
    private $controllerName;
    private $actionName;
    private $params;
    private $id;

    public function __construct()
    {
        $this->queryString = $_SERVER['REQUEST_URI'];
        $this->prepareRequest();


    }

    protected function prepareRequest()
    {
        $this->params = [
            'post' => $_POST,
            'get' => $_GET,
        ];

        $this->controllerName = 'user';

        $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
        if (preg_match_all($pattern, $this->queryString, $matches)) {
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
        }

        if (!empty($_GET['id'])) {
            $this->id = (int)$_GET['id'];
        }
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
