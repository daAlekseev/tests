<?php

require 'vendor/autoload.php';

use App\Handler;

$obj = new Handler();
$obj->showForm("templates/form.html");

