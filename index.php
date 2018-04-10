<?php

//Start Session!
session_start();
// Include Config
require('config.php');

foreach (glob("classes/*.php") as $filename) {
    require $filename;
}
foreach (glob("controllers/*.php") as $filename) {
    require $filename;
}
foreach (glob("models/*.php") as $filename) {
    require $filename;
}

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();

if ($controller) {
    $controller->executeAction();
}

