<?php

namespace App\Models;

use App\Components\Ancestor;
use App\Components\Db;

class News extends Ancestor
{

    const TABLE = 'news';

    public $id;
    public $title;
    public $text;
    public $author_id;

    /**
     * Метод, получающий int $limit последних новостей
     * @param int $limit
     * @return mixed object News
     */
    public static function getThreeLastRecord(int $limit)
    {
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $limit;
        $db = Db::instance();
        return $db->query($sql, static::class);
    }

    /**
     * Метод, возвращающий объект класса Author
     * @return object Author | bool
     * @deprecated
     */
    public function getAuthor()
    {
        if (!empty($this->author_id)) {
            $author = Author::findById($this->author_id);
            return $author;
        } else {
            return false;
        }
    }

    /**
     * Метод - чтение из недоступного свойства
     * @param $name имя недоступного свойства
     * @return object | bool | null
     */
    public function __get($name)
    {
        switch ($name) {
            case 'author':
                return Author::findById($this->author_id);
                break;
            default:
                return null;
        }
    }

    /**
     * Метод - проверка существует ли свойство
     * @param $name имя недоступного свойства
     * @return bool
     */
    public function __isset($name)
    {
        switch ($name) {
            case 'author':
                return !empty($this->author_id);
                break;
            default:
                return false;
        }
    }

    /**
     * Метод - заполняющий модель, данными из формы
     * + реализация MultiException
     * @param array $mass
     * @return $this |
     * @throws \lib\MultiException
     * @throws array
     */
    public function fill(array $mass)
    {
        $e = new \lib\MultiException();
        if (empty($_POST['title']) && empty($_POST['text']) && empty($_POST['author'])) {
            $e[] = new \Exception('Пустые поля');
            throw $e;
        } elseif (empty($_POST['title'])) {
            $e[] = new \Exception('Не заполнено обязательное поле - заголовок');
            throw $e;
        } else {
            switch ($mass['author']) {
                case 'Дроздов Н.Н.':
                case 'Дроздов':
                    $author = 1;
                    break;
                case 'Незнайка':
                    $author = 2;
                    break;
                default:
                    $author = 3;
                    break;
            }
            $this->title = strip_tags($mass['title']);
            $this->text = strip_tags($mass['text']);
            $this->author_id = $author;
            return $this;
        }
    }
}