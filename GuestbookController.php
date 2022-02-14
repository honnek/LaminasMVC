<?php

namespace home\src\Controller;

use home\src\Controller\ViewController;

/**
 * Контроллер Гостевая книга
 */
class GuestbookController
{
    /**
     * Метод вызывается при неверно переданном имени экшна, просто выводит в окно браузера строку
     * @return void - выводит строку
     */
    public function actionEmpty(): void
    {
        $view = new ViewController();
        $view->display('errorTemplate');
    }

    /**
     * Метод выводит название класса, текущий экшн, и get-параметры (если они не null)
     * @param array|null $params - массив с get-параметрами или null
     * @return void - выводит в браузер
     */
    public function actionList(?array $params): void
    {

        $view = new ViewController();
        $view->setData($params);
        $view->display('informTemplate');
    }
}
