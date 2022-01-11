<?php

require __DIR__ . '../../../vendor/autoload.php';


use App\Entidy\Comissao;
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


if ($mecanicos_id == "") {

    $var1 = "";
} else {

    $var1 =  "AND c.mecanicos_id =" . $mecanicos_id . "";
}


$consulta = "c.data1 between ' " . $dataInicio . " ' AND ' " . $dataFim . " ' " . $var1 . "";

$subtotal = 0;

$res = "";

$listar = Comissao::getList(
    'c.id AS id,
c.data AS data,
c.data1 AS data1,
c.tipo AS tipo,
c.status as status,
m.id AS mecanico_id,
c.placa AS placa,
c.veiculo AS veiculo,
m.nome AS mecanico,
cd.nome AS categoria,
c.descricao AS descricao,
c.valor as valor',
    'comissao AS c
    INNER JOIN
    mecanicos AS m ON (c.mecanicos_id = m.id)
    INNER JOIN
    catdespesas AS cd ON (c.catdespesas_id = cd.id)',
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

    $subtotal += $item->valor;

    $res .= '   <tr>

                        <td style="text-align:left;width:0px">' . $contador . '</td>
                        <td style="width:80px;text-align:left">

                        <span style="color:' . ($item->status <= 0 ? '#cd0b0b' : '#00ff00') . '">
                        ' . ($item->status <= 0 ? 'EM ABERTO' : 'PAGO') . '
                        </span>

                        </td>
                        <td style="text-align:left;width:0px">' . date('d/m/Y à\s H:i:s ', strtotime($item->data1))  . '</td>
                        <td style="text-align:left;font-size:9px">' . $item->placa . '/ ' . $item->veiculo . '</td>
                        <td style="text-align:left">' . $item->categoria . '</td>
                        <td style="text-align:left">' . $item->mecanico . '</td>
                        <td style="text-align:left; width:100px">' . $coment . '</td>
                        <td style="text-align:left">R$ ' . number_format($item->valor, "2", ",", ".") . '</td>
                        
                </tr>
                ';
}

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
                <td style="text-align:center; font-weight:600; font-size:16px; border:1px solid #fff;">• LISTA DE COMISSÕES•</td>
                <td style="text-align:right; border:1px solid #fff;margin-left:-10">
                    <?php echo "Data: " . date('d/m/Y', strtotime($dataInicio));
                    echo " á " . date('d/m/Y', strtotime($dataFim))  ?><br></td>

            </tr>
        </tbody>
    </table>


    <table>
        <tbody>
            <tr style="background-color:#117a1e; color:#fff">
                <td style="text-align: center; text-transform:uppercase" colspan="8">LISTA DE COMISSÃO</td>
            </tr>

            <tr style="background-color: #000; color:#fff">

                <td style="text-align:left"> Nº </td>
                <td style="text-align:left"> STATUS </td>
                <td style="text-align:left;width:100px""> DATA </td>
                <td style=" text-align:left;width:100px"> PLACA / VEÍCULO </td>
                <td style="text-align:left;width:100px"> CATEGARIA </td>
                <td style="text-align:left;width:100px"> MECÂNICO </td>
                <td style="text-align:left; width:0px"> DESCRIÇÃO </td>
                <td style="text-align:left"> VALOR </td>


            </tr>

            <?= $res ?>


            <tr>
                <td colspan="7" style="text-align: right;">
                    <span>TOTAL</span>
                </td>
                <td style="font-size:16px;text-align:left">

                    <span>R$ <?= number_format($subtotal, "2", ",", ".") ?> </span>

                </td>
            </tr>


        </tbody>
    </table>

</body>

</html>