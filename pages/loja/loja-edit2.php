<?php

require __DIR__ . '../../../vendor/autoload.php';

use App\Entidy\Loja;
use App\Session\Login;

Login::requireLogin();

if (!isset($_GET['id2']) or !is_numeric($_GET['id2'])) {

    header('location: index.php?status=error');

    exit;
}

$value = Loja:: getID('*','loja',$_GET['id2'],null,null);


if (!$value instanceof Loja) {
    header('location: index.php?status=error');

    exit;
}


if (isset($_GET['id2'])) {
    date_default_timezone_set('America/Sao_Paulo');
    $agora = date('Y-m-d H:i');


    $value->data = $agora;
    $value->valor = $_GET['valor2'];
    $value->mecanicos_id = $_GET['mecanico_id2'];
    $value->status = 0;
    $value->atualizar();

    header('location: loja-list.php?');

    exit;
}
