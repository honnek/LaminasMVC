<?php

namespace home\src\Core;


use home\src\Controller\ErrorController;

/**
 * Класс Роутер принимает введеный Uri и передаваемые get-параметры, в конструкторе разбивает на свойства и далее работает с ними. По сути, маршрутизирует все запросы от клиента.
 */
class Router
{
    /** @var string $controllerName - имя контроллера который приходит от пользователя */
    protected string $controllerName;

    /** @var string $action - имя экшна который приходит от пользователя */
    protected string $action;

    /** @var null|array $params - массив с get-параметрами который мы получили от пользователя */
    protected null|array $params;

    /** @var object $controller - созданый объект контроллера */
    protected object $controller;


    /**
     * Заполняет свойства $controllerName, $action и $params массив (если есть get-парметры)
     */
    public function __construct(object $request)
    {

        $query = $request->getUri()->getQuery();
        $path = $request->getUri()->getPath();
        $arrayPath = explode("/", $path);
        $this->controllerName = ucfirst($arrayPath[count($arrayPath) - 2]) . 'Controller';
        $this->action = 'action' . ucfirst($arrayPath[count($arrayPath) - 1]);

        if (!empty($query)) {
            $this->params = explode("&", $query);
        } else {
            $this->params = null;
        }
    }

    /**
     * Создает объект вызываемого контроллера, при выбрасывании ошибки создает объект класса ErrorController, и вызовет его экшн - actionError
     * @return object - возвращает объект вызываемого контроллера
     */
    public function getController(): object
    {
        $arrayOfPath = explode("\\", __NAMESPACE__);
        unset($arrayOfPath[count($arrayOfPath) - 1]);
        try {
            $this->controller = new (implode("\\", $arrayOfPath) . '\\Controller' . '\\' . $this->controllerName);
        } catch (\Throwable $error) {
            $this->controller = new ErrorController();
            $this->action = 'actionError';
        }

        return $this->controller;
    }

    /**
     * Функция возвращает экшн указанный в URI вызываемого контроллера, если в вызываемом контроллере данного экшона нет, вернет 'actionEmpty'
     * @return string - возвращает имя запрашиваемого экшна
     */
    public function getAction(): string
    {
        if (method_exists($this->controller, $this->action)) {
            return $this->action;
        }
        return 'actionEmpty';
    }

    /**
     * Функция возвращает get-параметры переданные в URI в массиве или null(если их нет)
     * @return array|null - возвращает параметры
     */
    public function getParams(): array|null
    {
        return $this->params;
    }
}
