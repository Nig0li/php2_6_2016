<?php
namespace App\Components;

class Router
{

    /**
     * Метод - выбор нужного контроллера и экшна
     * @param array $url
     * @return array
     */
    public function process(array $url)
    {
        $name = '\App\Controllers\\' . ($url['ctrl'] ?: 'News');

        switch ($name) {
            case '\App\Controllers\News':
                $action = $url['action'] ?: 'Index';
                break;
            case '\App\Controllers\AdminPanel':
                $action = $url['action'] ?: 'NewsAll';
                break;
        }

        $mass = [
            'controller' => $name,
            'action' => $action,
        ];

        return $mass;
    }
}