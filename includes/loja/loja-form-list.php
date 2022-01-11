<?php

$total = 0;
$contador = 0;


$resultados = '';
$veiculo = '';


foreach ($listar as $item) {

   $contador += 1;

   if ($item->status != 1) {

      $total += $item->valor;
   }

   if (empty($item->veiculo)) {

      $veiculo = '<span style="color:#5f6368"> Nenhum !!!! </span>';
   } else {
      $veiculo = $item->veiculo;
   }

   if (empty($item->decricao)) {

      $descricao = '<span style="color:#dddddd"> Nenhum comentário !!!! </span>';
   } else {
      $descricao = $item->veiculo;
   }

   switch ($item->status) {
      case '1':
         $pago = "disabled";
         break;

      default:
         $pago = "";
         break;
   }

   switch ($item->status) {
      case '1':
         $val = '<span style="color:#01ff70">R$ ' . number_format($item->valor, "2", ",", ".") . ' </span>';
         break;

      default:
         $val = '<span style="color:#ff3333">R$ ' . number_format($item->valor, "2", ",", ".") . ' </span>';
         break;
   }


   $resultados .= '<tr>
                      <td style="display:none">' . $item->id . '</td>
                      <td style="display:none">' . $item->mecanico_id . '</td>
                      <td style="display:none">' . $item->valor . '</td>
                      <td style="display:none">' . $item->data1 . '</td>
                      <td style="display:none">' . $item->descricao . '</td>
                      <td style="display:none">' . $item->tipo . '</td>
                      <td style="display:none">' . $item->status . '</td>
                      <td style="display:none">' . $item->categoria . '</td>
                      <td style="display:none">' . $item->veiculo . '</td>
                      <td style="display:none">' . $item->placa . '</td>
                      <td style="display:none">' . $item->mecanico . '</td>
                      
                      <td>' . $contador . '</td>
                      <td>

                     <span style="color:' . ($item->status <= 0 ? '#ff2121' : '#00ff00') . '"> 
                     <i class="fa fa-circle" aria-hidden="true"></i> 
                     </span>

                     </td>
                     <td style="width:150px">
                      
                      <span style="color:' . ($item->status <= 0 ? '#ff2121' : '#00ff00') . '">
                      ' . ($item->status <= 0 ? 'EM ABERTO' : 'PAGO') . '
                      </span>
                      
                      </td>

                    
                    
                      <td>' . date('d/m/Y à\s H:i:s ', strtotime($item->data1)) . '</td>

                      <td style="text-transform: uppercase; font-weight: 600; width:500px">' . $veiculo . ' / <span style="color:#ffc266"> ' . $item->placa . ' </span></td>
                      <td style="text-transform: uppercase; font-weight: 100; width:500px">' . $item->categoria . '</td>
                      <td style="text-transform: uppercase; font-weight: 600; width:500px">' . $item->mecanico . '</td>
                      <td style="text-transform: uppercase; font-weight: 100; width:500px;font-size:14px">' . $descricao . '</td>

                      <td style="text-transform: uppercase;font-weight: 600; ">
                      <span style="color:' . ($item->tipo <= 0 ? '#ff2121 ' : '#fff ') . '">
                      ' . $val . '
                      </span>
                      
                      </td>
                    
                      <td style="text-align: center;">
                     
                      <button type="submit" class="btn btn-success editbtn2" ' . $pago . ' > <i class="fas fa-dollar-sign" style="font-size:22px"></i> &nbsp; &nbsp; PAGAR</button>
                      &nbsp;
                      &nbsp;
                      &nbsp;

                      <button type="submit" class="btn btn-warning editbtn" > <i class="fas fa-paint-brush"></i> </button>
                      
                      &nbsp;
                       <a href="loja-delete.php?id=' . $item->id . '">
                       <button type="button" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                       </a>
                      
                      </td>
                      </tr>

                      ';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                     <td colspan="12" class="text-center" > Nenhuma movimentação até agora !!!!! </td>
                                                     </tr>';


//PAGINAÇÂO

$paginacao = '';
$paginas = $pagination->getPages();

foreach ($paginas as $key => $pagina) {
   $class = $pagina['atual'] ? 'btn-primary' : 'btn-secondary';
   $paginacao .= '<a href="?pagina=' . $pagina['pagina'] . '&' . $gets . '">

                  <button type="button" class="btn ' . $class . '">' . $pagina['pagina'] . '</button>
                  </a>';
}

?>

<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card card-purple">
               <div class="card-header">

                  <form method="get">
                     <div class="row ">
                        <div class="col-4">

                           <label>Buscar por Nome</label>
                           <input type="text" class="form-control" name="buscar" value="<?= $buscar ?>">

                        </div>


                        <div class="col d-flex align-items-end">
                           <button type="submit" class="btn btn-warning">
                              <i class="fas fa-search"></i>

                              Pesquisar

                           </button>

                        </div>


                     </div>

                  </form>
               </div>

               <div class="table-responsive">

                  <table class="table table-bordered table-dark table-bordered table-hover table-striped">
                     <thead>
                        <tr>
                           <td colspan="12">


                              <button style="margin-right:50px; font-weight:600; font-size:x-large" type="submit" class="btn btn-default float-right" data-toggle="modal" data-target="#modal-data"> <i class="fas fa-print"></i> &nbsp; IMPRIMIR RELATÓRIOS</button>
                           </td>
                        </tr>
                        <tr>
                           <th style="text-align: center; width:50px">Nª </th>
                           <th style="text-align: center; width:50px"> <i class="fa fa-align-justify" aria-hidden="true"></i> </th>

                           <th style="text-align: center;"> STATUS </th>
                           <th style="text-align: left;width:280px"> DATA </th>
                           <th style="text-align: left;"> VEÍCULO / PLACA </th>
                           <th style="text-align: left;"> CATEGORIA </th>
                           <th style="text-align: left;width:180px"> MECÂNICO </th>
                           <th style="text-align: left;width:180px"> DESCRIÇÃO </th>
                           <th style="text-align: left;width:180px"> COMISSÃO </th>
                           <th style="text-align: center;width:400px"> AÇÃO </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?= $resultados ?>
                     </tbody>

                     <tr>
                        <td colspan="8" style="text-align: right;">
                           <span style="font-size: 20px; font-weight:600"> TOTAL</span>
                        </td>


                        <td colspan="2" style="text-align: left">
                           <span style="font-size: 20px; font-weight:600; color:#79d7ad">R$ <?= number_format($total, "2", ",", ".") ?></span>
                        </td>

                     </tr>

                  </table>

               </div>


            </div>

         </div>

      </div>

   </div>

</section>

<?= $paginacao ?>


<div class="modal fade" id="editmodal2">
   <div class="modal-dialog">
      <form action="./loja-edit.php" method="get">
         <div class="modal-content bg-light">
            <div class="modal-header">
               <h4 class="modal-title">Ajustes
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="hidden" name="id" id="id">
               <div class="form-group">
                  <label>PAGAR COMISSÃO</label>
                  <input type="text" class="form-control" name="valor" id="valor" required>
               </div>

            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
               <button type="submit" class="btn btn-primary">Pagar
               </button>
            </div>
         </div>
      </form>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-data">
   <div class="modal-dialog modal-lg">
      <div class="modal-content ">
         <form action="./gerar-data2-pdf.php" method="GET" enctype="multipart/form-data">
            <input type="hidden" name="id_caixa" value="<?= $id_caixa ?>">
            <div class="modal-header">
               <h4 class="modal-title">Relatórios
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="card-body">

               <div class="form-group">

                  <div class="row">

                     <div class="col-lg-4 col-4">
                        <input class="form-control" type="date" value="<?php echo date('Y-m-d') ?>" name="dataInicio">
                     </div>


                     <div class="col-lg-4 col-4">
                        <input class="form-control" type="date" value="<?php echo date('Y-m-d') ?>" name="dataFim">
                     </div>


                     <div class="col-lg-4 col-4">

                        <select class="form-control select" name="mecanicos_id">
                           <option value="">Mecânico </option>
                           <?php

                           foreach ($mecanicos as $item) {
                              echo '<option value="' . $item->id . '">' . $item->nome . '</option>';
                           }
                           ?>

                        </select>

                     </div>

                  </div>
               </div>

            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
               <button type="submit" class="btn btn-primary">Gerar relatório</button>
            </div>

         </form>

      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="editmodal">
   <div class="modal-dialog">
      <form action="./loja-edit2.php" method="get">
         <div class="modal-content bg-light">
            <div class="modal-header">
               <h4 class="modal-title">Atualizar
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="hidden" name="id2" id="id2">
               <div class="form-group">
                  <label>Mecânico</label>
                  <select class="form-control select" name="mecanico_id2" id="mecanico_id2">
                           <option value="">Selecione Mecânico </option>
                           <?php

                           foreach ($mecanicos as $item) {
                              echo '<option value="' . $item->id . '">' . $item->nome . '</option>';
                           }
                           ?>

                        </select>
               </div>
               <div class="form-group">
                  <label>Valor</label>
                  <input type="text" class="form-control" name="valor2" id="valor2" required >
               </div>
       
            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
               <button type="submit" class="btn btn-primary">Atualizar
               </button>
            </div>
         </div>
      </form>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>