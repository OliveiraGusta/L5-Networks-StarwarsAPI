<?php

require_once __DIR__ . '/core/Core.php';
require_once __DIR__ . '/router/rotas.php';

spl_autoload_register(function($arquivo) {
    if (file_exists(__DIR__ . "/utils/$arquivo.php")) {
        require_once __DIR__ . "/utils/$arquivo.php";
    } elseif (file_exists(__DIR__ . "/models/$arquivo.php")) {
        require_once __DIR__ . "/models/$arquivo.php";
    } elseif (file_exists(__DIR__ . "/controllers/$arquivo.php")) {
        require_once __DIR__ . "/controllers/$arquivo.php";
    } elseif (file_exists(__DIR__ . "/core/$arquivo.php")) {
        require_once __DIR__ . "/core/$arquivo.php";
    }
});

$core = new Core($rotas);
$core->run(); 

?>