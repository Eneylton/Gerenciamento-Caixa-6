<?php

$list = '';

$resultados = '';

$contador = 0;
$total1 = 0;
$total2 = 0;
$total = 0;

foreach ($listar as $item) {

   $contador += 1;

   $total1 += ($item->valor1);
   $total2 += ($item->valor2);

   $resultados .= '<tr>
                      <td>' . $contador . '</td>
                      <td>' . date('d/m/Y à\s H:i:s ', strtotime($item->data1)) . '</td>
                      <td>' . number_format($item->valor1, "2", ",", ".") . '</td>
                      <td>' . number_format($item->valor2, "2", ",", ".") . '</td>
                    
                      <td style="text-align: center;">
                        
                      
                      <button type="submit" class="btn btn-success editbtn" > <i class="fas fa-paint-brush"></i> </button>
                      &nbsp;

                       <a href="cargo-delete.php?id=' . $item->id . '">
                       <button type="button" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                       </a>


                      </td>
                      </tr>

                      ';
}

$total = ($total1 + $total2);

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                     <td colspan="5" class="text-center" > Nenhum alinhamento encontrado !!!!! </td>
                                                     </tr>';


unset($_GET['status']);
unset($_GET['pagina']);
$gets = http_build_query($_GET);

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
                           <button type="submit" class="btn btn-warning" name="">
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
                           <td colspan="5">
                           <button style="margin-right:50px; font-weight:600; font-size:x-large" type="submit" class="btn btn-default float-right" data-toggle="modal" data-target="#modal-data"> <i class="fas fa-print"></i> &nbsp; IMPRIMIR RELATÓRIOS</button>
                           </td>
                        </tr>
                        <tr>
                           <th style="text-align: left; width:80px"> Nº</th>
                           <th> DATA </th>
                           <th style="width:200px"> LOJA </th>
                           <th style="width:200px"> MECÂNICO </th>

                           <th style="text-align: center; width:200px"> AÇÃO </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?= $resultados ?>
                     </tbody>

                     <tr>
                        <td colspan="2" style="text-align: right;">
                           <span style="font-size: 20px; font-weight:600"> TOTAL</span>
                        </td>


                        <td colspan="1" style="text-align: left">
                           <span style="font-size: 20px; font-weight:100; color:#93fff0">R$ <?= number_format($total1, "2", ",", ".") ?></span>
                        </td>

                        <td colspan="2" style="text-align: left">
                           <span style="font-size: 20px; font-weight:100; color:#ffbebe">R$ <?= number_format($total2, "2", ",", ".") ?></span>
                        </td>

                     </tr>
                     <tr>
                        <td colspan="2" style="text-align: center;">
                           <span style="font-size: 20px; font-weight:600"> TOTAL GERAL</span>
                        </td>


                        <td colspan="2" style="text-align:center">
                           <span style="font-size: 30px; font-weight:200; color:#8dffa0">R$ <?= number_format($total, "2", ",", ".") ?></span>
                        </td>
                        <td colspan="1" style="text-align:center">
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


<div class="modal fade" id="modal-default">
   <div class="modal-dialog">
      <div class="modal-content bg-light">
         <form action="./cargo-insert.php" method="post">

            <div class="modal-header">
               <h4 class="modal-title">Novo usuário
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label>Cargo</label>
                  <input type="text" class="form-control" name="descricao" required>
               </div>

            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
               <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

         </form>

      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

<!-- EDITAR -->

<div class="modal fade" id="editmodal">
   <div class="modal-dialog">
      <form action="./cargo-edit.php" method="get">
         <div class="modal-content bg-light">
            <div class="modal-header">
               <h4 class="modal-title">Editar
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="hidden" name="id" id="id">
               <div class="form-group">
                  <label>Cargo</label>
                  <input type="text" class="form-control" name="descricao" id="descricao" required>
               </div>

            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
               <button type="submit" class="btn btn-primary">Salvar
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

                     <div class="col-lg-6 col-6">
                        <input class="form-control" type="date" value="<?php echo date('Y-m-d') ?>" name="dataInicio">
                     </div>


                     <div class="col-lg-6 col-6">
                        <input class="form-control" type="date" value="<?php echo date('Y-m-d') ?>" name="dataFim">
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
