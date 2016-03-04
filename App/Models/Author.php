<?php

namespace App\Models;

use App\Components\Ancestor;

class Author extends Ancestor
{
    /**
     * @param const Имя таблицы в БД
     */
    const TABLE = 'authors';

    /**
     * @param string Имя автора
     */
    public $name;
}