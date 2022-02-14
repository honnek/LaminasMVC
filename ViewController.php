<?php

namespace home\src\Controller;

/**
 * Класс для работы с шаблонами страниц
 */
class ViewController
{
    /** @var string В этой строке будет храниться путь до папки с вьюхами */
    protected string $path;
    /** @var array|null массив для хранения данных */
    protected array|null $data;


    /**
     * Устанавливаем значение пути
     */
    public function __construct()
    {
        $this->path = __DIR__ . '/../' . '/View/';
    }

    /**
     * Устанавливаем набор данных для отображения в шаблоне
     * @param array|null $newData - Устанавливаем значение свойства $data
     * @return void
     */
    public function setData(?array $newData): void
    {
        $this->data = $newData;
    }

    /**
     * Возврат массива из свойства дата
     * @return array|null
     */
    public function getData(): array|null
    {
        return $this->data;
    }

    /**
     * метод для отображения шаблона
     * @param string $template - имя шаблона
     * @return void
     */
    public function display(string $template): void
    {
        if (file_exists($this->path . $template . '.php')) {
            include($this->path . $template . '.php');
        }
    }


















    /**
     * метод для возврата шаблона для отображения
     * @param string $template - имя шаблона
     * @return string
     */
    public function render(string $template): string
    {
        if (file_exists($this->path . $template . '.php')) {
            return ($this->path . $template . '.php');
        }
    }

    /**
     * сохраняем данные с именем $name и значением $value в шаблон
     * @param string $name - Ключ по которому сохраняем в свойство
     * @param string $value - Значение
     * @return void
     */
    public function assign(string $name, string $value): void
    {
        $this->data[$name] = [$value];
    }

}
