<?php

require 'vendor/autoload.php';

use App\Handler;

$obj = new Handler();

if (!empty($_POST['userName'])) {
    $obj->insertData("names", $_POST['userName']);
    $obj->selectData("names");
} else {
    echo '<br>Введите имя!';
}