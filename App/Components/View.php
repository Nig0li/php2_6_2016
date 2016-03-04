<?php
namespace App\Components;

class View implements \Countable
{
    use TMagic;

    /**
     * Метод - готовит к показу шаблон
     * @param $template путь до шаблона
     * @return string
     */
    public function render($template)
    {
        ob_start();
        foreach ($this->data as $prop => $value) {
            $$prop = $value;
        }
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * Метод - показать обработанный шаблон
     * @param $template путь до шаблона
     */
    public function display($template)
    {
        echo $this->render($template);
    }

    /**
     * Метод - готовит к показу шаблон с помощью Twig
     * @param $template - имя шаблона
     * @param array $params
     * @return string
     */
    public function renderTwig($template, $params = [])
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../Templates/');
        $twig = new \Twig_Environment($loader);
        $content = $twig->render($template, $params);
        return $content;
    }

    /**
     * Метод - показать обработанный шаблон c помощью Twig
     * @param $template - имя шаблона
     * @param array $params
     */
    public function displayTwig($template, $params = [])
    {
        echo $this->renderTwig($template, $params);
    }

    /**
     * Метод - счетчик количества элементов в объекте
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }
}