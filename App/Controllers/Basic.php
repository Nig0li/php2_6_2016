<?php
namespace App\Controllers;

use App\Components\View;

abstract class Basic
{

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        $methodName = 'action' . $action;
        $this->beforeAction();
        return $this->$methodName();
    }

    public function beforeAction()
    {
    }
}