<?php
require __DIR__ . '../../../vendor/autoload.php';

use App\Entidy\Caixa;
use App\Entidy\Comissao;
use App\Entidy\Servico;
use App\Session\Login;

define('TITLE','Esatísticas');
define('BRAND','Financeiro');

Login::requireLogin();

$total_comissao  = 0;
$total_servicos  = 0;

if(isset($_GET['id'])){

    $idcaixa = $_GET['id'];

    $result = Caixa :: getID('*','caixa',$idcaixa,null,null);
 
}


$comissao = Comissao :: getList(' c.data1 as data,m.nome as mecanicos, sum(c.valor) as total','comissao AS c
INNER JOIN
mecanicos AS m ON (m.id = c.mecanicos_id) where month(c.data) = MONTH(CURRENT_DATE()) group by m.nome',null,null);

foreach ($comissao as $item) {

    $total_comissao  += $item->total;

}


$servicos = Servico :: getList(' c.data1 as data,m.nome as mecanicos, sum(c.valor) as total','servicos AS c
INNER JOIN
mecanicos AS m ON (m.id = c.mecanicos_id) where month(c.data) = MONTH(CURRENT_DATE()) group by m.nome',null,null);

foreach ($servicos as $item) {

    $total_servicos  += $item->total;

}

include __DIR__ . '../../../includes/layout/header.php';
include __DIR__ . '../../../includes/layout/top.php';
include __DIR__ . '../../../includes/layout/menu.php';
include __DIR__ . '../../../includes/layout/content.php';
include __DIR__ . '../../../includes/comissao/detalhe-form-list.php';
include __DIR__ . '../../../includes/layout/footer.php';

?>
 

<script type="text/javascript">
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [

            <?php
           
            foreach ($comissao as $item) {
           
                echo "'".$item->mecanicos."',";
            }
             
            ?>
        ]
        ,
        datasets: [{
            label: '• PRODUÇÃO DIÁRIA MECÂNICOS •',
            data: [
                <?php
            foreach ($comissao as $item) {
                echo "'".$item->total."',";
            }
             
            ?>
            ],
            backgroundColor: [
                '#4f05c5',
                '#0c74df',
                '#0cdf9b',
                '#19df0c',
                '#df8b0c',
                '#df0ccf',
                '#100e81',
                '#55d990',
                '#bbc700',
                '#e70b0b',
                '#0be7be',
                '#e70b5c',
                '#6fe633a8',
                '#4f05c5',
                '#0c74df',
                '#0cdf9b',
                '#19df0c',
                '#df8b0c',
                '#df0ccf',
                '#100e81',
                '#55d990',
                '#bbc700',
                '#e70b0b',
                '#0be7be',
                '#e70b5c',
             
            ],
            borderColor: [
                '#4f05c5',
                '#0c74df',
                '#0cdf9b',
                '#19df0c',
                '#df8b0c',
                '#df0ccf',
                '#100e81',
                '#55d990',
                '#bbc700',
                '#e70b0b',
                '#0be7be',
                '#e70b5c',
                '#6fe633a8',
                '#4f05c5',
                '#0c74df',
                '#0cdf9b',
                '#19df0c',
                '#df8b0c',
                '#df0ccf',
                '#100e81',
                '#55d990',
                '#bbc700',
                '#e70b0b',
                '#0be7be',
                '#e70b5c',
                '#6fe633a8'
             
            ],
            borderWidth: 1
        }
        
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>



<script type="text/javascript">
var ctx = document.getElementById('myChart2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [

            <?php
           
            foreach ($servicos as $item) {
           
                echo "'".$item->mecanicos."',";
            }
             
            ?>
        ]
        ,
        datasets: [{
            label: '• PRODUÇÃO DIÁRIA MECÂNICOS •',
            data: [
                <?php
            foreach ($servicos as $item) {
                echo "'".$item->total."',";
            }
             
            ?>
            ],
            backgroundColor: [
                
                '#ffe004',
                '#55d990',
                '#bbc700',
                '#e70b0b',
                '#4f05c5',
                '#0c74df',
                '#0cdf9b',
                '#19df0c',
                '#df8b0c',
                '#df0ccf',
                '#100e81',
                '#55d990',
                '#bbc700',
                '#e70b0b',
                '#0be7be',
                '#ffe004',
                '#6fe633a8'
        
             
            ],
            borderColor: [
                
                '#ffe004',
                '#55d990',
                '#bbc700',
                '#e70b0b',
                '#4f05c5',
                '#0c74df',
                '#0cdf9b',
                '#19df0c',
                '#df8b0c',
                '#df0ccf',
                '#100e81',
                '#55d990',
                '#bbc700',
                '#e70b0b',
                '#0be7be',
                '#ffe004',
                '#6fe633a8'
             
            ],
            borderWidth: 1
        }
        
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
