<?php

require __DIR__ . '../../../vendor/autoload.php';


use App\Entidy\Alinhamento;
use \App\Session\Login;

$usuariologado = Login::getUsuarioLogado();

$usuarios_nome = $usuariologado['nome'];
$usuarios_email = $usuariologado['email'];

$total = 0;
$total_sub = 0;
$total_qtd = 0;
$total_disp = 0;

Login::requireLogin();

$dataInicio;
$dataFim;

$consulta = "al.data1 between ' " . $dataInicio . " ' AND ' " . $dataFim . " ' ";

$subtotal1 = 0;
$subtotal2 = 0;
$geral = 0;

$res = "";

$listar = Alinhamento::getList(
    'al.id as id,
    al.data1,
    al.valor1 as valor1,
    al.valor2 as valor2,
    m.nome as mecanico',
    'alinhamento AS al
    INNER JOIN
    mecanicos AS m ON (al.mecanicos_id = m.id)',
    $consulta,
    'm.nome ASC',
    null
);



$contador = 0;

foreach ($listar as $item) {

    if (empty($item->descricao)) {

        $coment = '<span style="color:#99063c">Nenhum comentário</span>';
    } else {
        $coment = $item->descricao;
    }

    $contador += 1;

    $subtotal1 += $item->valor1;
    $subtotal2 += $item->valor2;

    $res .= '   <tr>

                        <td style="text-align:left;width:0px">' . $contador . '</td>
                        
                        <td style="text-align:left;width:0px">' . date('d/m/Y à\s H:i:s ', strtotime($item->data1))  . '</td>
                        <td style="text-align:left">' . $item->mecanico . '</td>
                        <td style="text-align:center;font-size:9px">R$ ' . number_format($item->valor1 , "2", ",", "."). '</td>
                        <td style="text-align:center">R$' . number_format($item->valor2 , "2", ",", "."). '</td>
                        
                        
                </tr>
                ';
}

$geral = ($subtotal1 + $subtotal2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        @page {
            margin: 70px 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Open Sans", sans-serif;
        }

        .header {
            position: fixed;
            top: -70px;
            left: 0;
            right: 0;
            width: 100%;
            text-align: center;
            background-color: #555555;
            padding: 10px;
        }

        .header img {
            width: 160px;
        }

        .footer {
            bottom: -27px;
            left: 0;
            width: 100%;
            padding: 5px 10px 10px 10px;
            text-align: center;
            background: #555555;
            color: #fff;
        }

        .footer .page:after {
            content: counter(page);

        }

        table {
            width: 100%;
            border: 1px solid #555555;
            margin: 0;
            padding: 0;
        }

        th {
            text-transform: uppercase;
        }

        table,
        th,
        td {
            font-size: xx-small;
            border: 1px solid #555555;
            border-collapse: collapse;
            text-align: center;
            padding: 5px;

        }

        tr:nth-child(2n+0) {
            background: #eeeeee;
        }

        p {
            color: #888888;
            margin: 0;
            text-align: center;
        }

        h2 {
            text-align: center;

        }
    </style>

    <title>Receber itens</title>
</head>

<body>

    <table style="margin-top: -40px;">
        <tbody>
            <tr style="background-color: #fff; color:#000">

                <td style="text-align: left; width:260px; border:1px solid #fff; ">
                    <span style="margin-left:110px; margin-top: -50px; font-size:small">Lojao do carro</span><br>
                    <span style="margin-left:110px; margin-top: -30px; font-size:xx-small ">Email:&nbsp; <?= $usuarios_email  ?> </span><br>
                    <span style="margin-left:110px; margin-top: -30px; font-size:xx-small">Atendente:&nbsp; <?= $usuarios_nome  ?> </span><br>
                    <img style="width:108px; height:40px; float:left;margin-top:-50px; padding:10px; margin-left:-12px;" src="../../01.png">
                    <br />
                    <br />

                </td>
                <td style="text-align:center; font-weight:600; font-size:16px; border:1px solid #fff;">• ALINHAMENTO / BALANCIAMENTO •</td>
                <td style="text-align:right; border:1px solid #fff;margin-left:-10">
                    <?php echo "Data: " . date('d/m/Y', strtotime($dataInicio));
                    echo " á " . date('d/m/Y', strtotime($dataFim))  ?><br></td>

            </tr>
        </tbody>
    </table>


    <table>
        <tbody>
            <tr style="background-color:#117a1e; color:#fff">
                <td style="text-align: center; text-transform:uppercase" colspan="5">LISTA</td>
            </tr>

            <tr style="background-color: #000; color:#fff">

                <td style="text-align:left"> Nº </td>
                <td style="text-align:left;width:100px""> DATA </td>
                <td style="text-align:left;width:100px"> MECÂNICO </td>
                <td style=" text-align:left;width:100px"> LOJA </td>
                <td style="text-align:left;width:100px"> OFICINA</td>
               
               


            </tr>

            <?= $res ?>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <span>PARCIAL</span>
                </td>
                <td style="font-size:16px;text-align:center" colspan="1">

                    <span>R$ <?= number_format($subtotal1, "2", ",", ".") ?> </span>

                </td>
                <td style="font-size:16px;text-align:center" colspan="1">

                    <span>R$ <?= number_format($subtotal2, "2", ",", ".") ?> </span>

                </td>
            </tr>

            <tr>
                <td colspan="3" style="text-align: center;">
                    <span>TOTAL GERAL</span>
                </td>
                <td style="font-size:16px;text-align:center" colspan="2">

                    <span>R$ <?= number_format($geral, "2", ",", ".") ?> </span>

                </td>
            </tr>


        </tbody>
    </table>

</body>

</html>