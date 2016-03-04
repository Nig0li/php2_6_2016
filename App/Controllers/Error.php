<?php
namespace App\Controllers;

use App\Components\View;
use App\Components\Logger;

class Error
{

    protected $view;
    protected $logfile;

    public function __construct()
    {
        $this->view = new View();
        $this->logfile = new Logger();
    }

    /**
     * action - Запись в лог инф. об ошибках
     * + выдача пользователю страницы с сообщением об ошибке - Db
     * @param \Exception $e
     */
    public function actionDbError(\Exception $e)
    {
        $this->logfile->critical('DbError', ['exception' =>$e]);
        $this->view->error = $e->getMessage();
        $this->view->display(__DIR__ . '/../Templates/error.php');
    }

    /**
     * action - Запись в лог инф. об ошибках
     * + выдача пользователю страницы с сообщением об ошибке - E404
     * @param \Exception $e
     */
    public function actionE404(\Exception $e)
    {
        $this->logfile->error('E404', ['exception' =>$e]);
        $this->view->error = $e->getMessage();
        $this->view->display(__DIR__ . '/../Templates/e404.php');
    }

}