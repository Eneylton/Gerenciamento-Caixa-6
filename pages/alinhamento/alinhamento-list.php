<?php
require __DIR__ . '../../../vendor/autoload.php';

use  \App\Db\Pagination;
use App\Entidy\Alinhamento;
use App\Entidy\Mecanico;
use   \App\Session\Login;

define('TITLE','Alinhamento');
define('BRAND','Financeiro');


Login::requireLogin();


$buscar = filter_input(INPUT_GET, 'buscar', FILTER_SANITIZE_STRING);

$condicoes = [
    strlen($buscar) ? 'id LIKE "%'.str_replace(' ','%',$buscar).'%" or 
                       al.valor1 LIKE "%'.str_replace(' ','%',$buscar).'%"' : null
];

$condicoes = array_filter($condicoes);

$where = implode(' AND ', $condicoes);

$qtd = Alinhamento:: getQtd($where);

$pagination = new Pagination($qtd, $_GET['pagina'] ?? 1, 5);

$listar = Alinhamento::getList('al.id as id,
al.data1,
al.valor1 as valor1,
al.valor2 as valor2,
m.nome as mecanico','alinhamento AS al
INNER JOIN
mecanicos AS m ON (al.mecanicos_id = m.id)',$where, 'al.id desc',$pagination->getLimit());

$acessos = Mecanico :: getList('*','mecanicos');


include __DIR__ . '../../../includes/layout/header.php';
include __DIR__ . '../../../includes/layout/top.php';
include __DIR__ . '../../../includes/layout/menu.php';
include __DIR__ . '../../../includes/layout/content.php';
include __DIR__ . '../../../includes/alinhamento/alinhamento-form-list.php';
include __DIR__ . '../../../includes/layout/footer.php';

?>

<script>
$(document).ready(function(){
    $('.editbtn').on('click', function(){
        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        $('#descricao').val(data[1]);
       
    });
});
</script>
