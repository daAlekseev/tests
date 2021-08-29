<?php

namespace App;

use App\Models\DB;

class Handler
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function showForm($form)
    {
        require "$form";
    }

    public function selectData($tableName)
    {
        print_r($this->db->selectName($tableName));
    }

    public function insertData($tableName, $name)
    {
        $this->db->insertName($tableName, $name);
    }
}