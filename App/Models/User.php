<?php

namespace App\Models;

use App\Components\Ancestor;

class User extends Ancestor implements HasEmail
{
    const TABLE = 'users';

    public $email;
    public $name;

    /**
     * Метод, возвращающий адрес e-mail
     * @return string Адрес электронной почты
     */
    public function getEmail()
    {
        return $this->email;
    }
}