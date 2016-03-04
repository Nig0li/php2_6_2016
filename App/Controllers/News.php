<?php
namespace App\Controllers;

use App\Exceptions\E404;

class News extends Basic
{

    /**
     * action - Получение массива новостей
     */
    protected function actionIndex()
    {
        $news = \App\Models\News::findAll();
        $this->view->displayTwig('index.php', ['news' => $news]);
    }

    /**
     * action - Получение конкретной новости по id
     */
    protected function actionArt()
    {
        $article = \App\Models\News::findById($_GET['id']);
        if (false !== $article) {
            $this->view->displayTwig('article.php', ['article' => $article]);
        } else {
            throw new E404('ошибка 404');
        }
    }
}