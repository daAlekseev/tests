<?php

namespace App;

final class Item
{
    /**
     * @var bool
     */
    private static bool $isCalled = false;
    /**
     * @var int
     */
    private int $id;
    /**
     * @var string
     */
    private string $name;
    /**
     * @var int
     */
    private int $status;
    /**
     * @var bool
     */
    public bool $changed = false;

    /**
     * Item constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Получает данные и заполняет их в свойства экземляра
     * в случае одноразового вызова
     *
     * @param string $name
     * @param int $status
     */
    private function init(string $name, int $status)
    {
        if (!self::$isCalled) {
            self::$isCalled = true;
            $this->name = $name;
            $this->status = $status;
        }
    }

    /**
     * Магический метод для вызова приватного метода init
     *
     * @param $method
     * @param $args
     */
    public function __call($method, $args)
    {
        $this->$method($args[0], $args[1]);
    }

    /**
     * Магический метод получения свойств
     *
     * @param $prop
     * @return mixed
     */
    public function __get($prop)
    {
        return $this->$prop;
    }

    /**
     * Магический метод задания свойств
     *
     * @param string $prop
     * @param string $value
     */
    public function __set(string $prop, string $value)
    {
        if (!empty($value) && $prop != "id") {
            $this->$prop = strip_tags($value);
            $this->changed = "true";
        }
    }

    /**
     * Проверяет изменены ли данные, в случае изменения сохрвняет их.
     * Если бы была полноценная реализация с бд метод имел бы смысл, занося обновленные
     * данные.
     *
     * @param string $name
     * @param int $status
     * @return false
     */
    public function save(string $name, int $status)
    {
        if ($this->changed) {
            $this->name = $name;
            $this->status = $status;
        }
        return $this->changed = false;
    }

    /**
     * Метод отображения формы
     *
     * @param $path
     */
    public function showForm($path)
    {
        require "$path";
    }
}
