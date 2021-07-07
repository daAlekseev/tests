<?php

require 'vendor/autoload.php';

use App\Item;

$obj = new Item(1);
$obj->init("Andrew", 1);
$obj->showForm("templates/index.html");

if (isset($_POST['update'])) {
    $obj->name = $_POST['newName'];
    $obj->status = $_POST['newStatus'];
    $obj->save($obj->name, $obj->status);
    echo 'Имя: ' . $obj->name . "</br>" . 'Статус: ' . $obj->status;
}
