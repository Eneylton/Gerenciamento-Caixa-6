<?php
$resultados = "";
$resultados1 = "";
$contador = 0;
$contador1 = 0;

foreach ($comissao as $item) {

   $contador += 1;

   $resultados .= '<tr>

   
                      <td style="text-transform:uppercase; text-align:left"> <h5><span class="badge badge-pill badge-dark"> ' . $contador . '</span></h5> </td>
                      <td style="text-transform:uppercase; text-align:left"> <h5><span class="badge badge-pill badge-primary"> ' . date('d/m/Y à\s H:i:s ', strtotime($item->data)). '</span></h5> </td>
                      <td style="text-transform:uppercase; text-align:left"> <h5><span class="badge badge-pill badge-danger"> ' . $item->mecanicos. '</span></h5> </td>
                      <td style="text-transform:uppercase; text-align:center"> <h5><span class="badge badge-pill badge-dark">R$  '.    number_format($item->total,"2",",",".").'</span></h5> </td>

                      </tr>

                      ';
}

foreach ($servicos as $item) {

   $contador1 += 1;

   $resultados1 .= '<tr>

   
                      <td style="text-transform:uppercase; text-align:left"> <h5><span class="badge badge-pill badge-dark"> ' . $contador1 . '</span></h5> </td>
                      <td style="text-transform:uppercase; text-align:left"> <h5><span class="badge badge-pill badge-success"> ' . date('d/m/Y à\s H:i:s ', strtotime($item->data)). '</span></h5> </td>
                      <td style="text-transform:uppercase; text-align:left"> <h5><span class="badge badge-pill badge-danger"> ' . $item->mecanicos. '</span></h5> </td>
                      <td style="text-transform:uppercase; text-align:center"> <h5><span class="badge badge-pill badge-dark">R$  '.    number_format($item->total,"2",",",".").'</span></h5> </td>

                      </tr>

                      ';
}


?>

<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-6">

            <div class="card">
               <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                     <h3 class="card-title">
                        <P>PRODUÇÃO DIÁRIA MECÂNICOS</P>
                     </h3>
                     <div class="card-tools">
                        <h2 style="color:#ff0000">R$ <?= number_format($total_comissao, "2", ",", ".") ?></h2>
                     </div>
                  </div>
               </div>
               <div class="card-body">

                  <!-- /.d-flex -->

                  <div class="card-body">

                     <canvas id="myChart" width="400" height="130"></canvas>

                  </div>

                  <div class="d-flex flex-row justify-content-end">
                     <span class="mr-2">
                        <i class="fas fa-square text-success"></i> PRODUÇÃO: R$ <?= number_format($total_comissao, "2", ",", ".") ?>
                     </span>


                  </div>
               </div>
            </div>

         </div>
         <div class="col-lg-6">
            <div class="card">
               <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                     <h3 class="card-title">
                        <P>PRODUÇÃO DIÁRIA LIMPEZA DE MOTOR</P>
                     </h3>
                     <div class="card-tools">
                        <h2 style="color:#0587c5">R$ <?= number_format($total_servicos, "2", ",", ".") ?></h2>
                     </div>
                  </div>
               </div>
               <div class="card-body">

                  <!-- /.d-flex -->

                  <div class="card-body">

                     <canvas id="myChart2" width="400" height="130"></canvas>

                  </div>

                  <div class="d-flex flex-row justify-content-end">
                     <span class="mr-2">
                        <i class="fas fa-square text-success"></i> PRODUÇÃO: R$ <?= number_format($total_comissao, "2", ",", ".") ?>
                     </span>


                  </div>
               </div>
            </div>


         </div>

      </div>

      <div class="row">
         <div class="col-lg-6">
         <div class="card">
               <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                     <h3 class="card-title">COMISSÕES</h3>
                     <a href="gerar-pdf.php?id=" target="_blank"> IMPRIMIR RELATÓRIO</a>
                  </div>
               </div>
               <div class="card-body">

                  <table class="table table table-hover">
                     <thead>
                        <tr>

                           <th>Nº</th>
                           <th>DATA</th>
                           <th>MECÂNICO</th>
                           <th>VALOR</th>
                          
                         
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <?= $resultados ?>
                        </tr>
                       

                     </tbody>
                  </table>
               </div>



            </div>
         
         </div>

         <div class="col-lg-6">
         <div class="card">
               <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                     <h3 class="card-title">SERVIÇOS EXTRAS</h3>
                     <a href="gerar-pdf.php?id=" target="_blank"> IMPRIMIR RELATÓRIO</a>
                  </div>
               </div>
               <div class="card-body">

                  <table class="table table table-hover">
                     <thead>
                        <tr>

                           <th>Nº</th>
                           <th>DATA</th>
                           <th>MECÂNICO</th>
                           <th>VALOR</th>
                          
                         
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <?= $resultados1 ?>
                        </tr>
                       

                     </tbody>
                  </table>
               </div>



            </div>
         
         </div>

      </div>

</section>