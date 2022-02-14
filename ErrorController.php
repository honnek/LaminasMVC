<?php

namespace home\src\Controller;

use home\src\Controller\ViewController;

/**
 * Класс ErrorController занимается ошибками.
 */
class ErrorController
{
    /**
     * Метод вызывается при неверно переданном запросе в URI, просто выводит в окно браузера строку
     * @return void - выводит строку
     */
    public function actionError(): void
    {
$view = new ViewController();
        $view->display('errorTemplate');
    }
}