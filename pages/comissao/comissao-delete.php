<?php 

require __DIR__.'../../../vendor/autoload.php';

use App\Entidy\Comissao;
use App\Session\Login;


Login::requireLogin();



if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$value = Comissao::getID('*','comissao',$_GET['id'],null,null);

if(!$value instanceof Comissao){
    header('location: index.php?status=error');

    exit;
}



if(!isset($_POST['excluir'])){
    
 
    $value->excluir();

    header('location: comissao-list.php?status=del');

    exit;
}

