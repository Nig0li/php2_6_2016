<?php
namespace App\Components;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class Logger implements LoggerInterface
{
    use LoggerTrait;

    const FILE = 'logs.txt';

    protected $data = [];

    /**
     * Метод - Подготовка сообщения для записи в log.txt
     * @param object $errors
     * @return string
     */
    public function record($errors)
    {
        $this->data = [
            'date' => date('Y-d-m H:i:s'),
            'file' => $errors->getFile(),
            'line' => $errors->getLine(),
            'message' => $errors->getMessage(),
            'count' => count($errors->getTrace()),
        ];

        $mass = [];
        foreach ($this->data as $key => $value) {
            $mass[] = ' {' . $key . '}: ' . $value;
        }

        return $str = implode("\n", $mass);
    }

    /**
     * Запись в log.txt
     * @param $level
     * @param $message
     * @param array $context
     */
    public function log($level, $message, array $context = array())
    {
        $err = $this->record($context['exception']);
        $str = ' | ' . $level . ' || ' . $message . ' |' . "\n" . $err . "\n";

        file_put_contents(__DIR__ . '/../error_log/' . self::FILE, $str, FILE_APPEND);
    }

}