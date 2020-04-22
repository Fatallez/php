<?php

class Autoloader
{
    private $dirs = [
        'models', 'services'
    ];

    public function loadClass($className)
    {
        foreach ($this->dirs as $dir) {
            $trimClassName = stristr(ltrim($className, 'App' . chr(92)), chr(92));
            $file = dirname(__DIR__) . '/' . $dir . $trimClassName . '.php';
            if (file_exists($file)) {
                include $file;
                break;
            }
        }
    }
}