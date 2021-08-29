<?php

namespace App\Models;

class DB
{
    private $db = [
        'dsn' => 'mysql:dbname=test;host=127.0.0.1',
        'user' => 'root',
        'pwd' => 'root',
    ];

    private $link;

    public function __construct()
    {
        try {
            $this->link = new \PDO(
                $this->db['dsn'],
                $this->db['user'],
                $this->db['pwd']
            );
        } catch (\PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }
    }

    public function selectName($tableName)
    {
        return $this->link->query("SELECT * FROM {$tableName}")
            ->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertName($tableName, $name)
    {
        $this->link->prepare("INSERT INTO `{$tableName}` SET `name` = :name")
            ->execute([
                'name' => htmlspecialchars($name),
            ]);
    }
}