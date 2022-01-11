<?php

use App\Session\Login;

$usuariologado = Login::getUsuarioLogado();

$acesso = $usuariologado['acessos_id'];

?>

<div class="container-fluid">
  <!-- Small boxes (Stat box) -->



  <div class="row">
    <div class="col-lg-3 col-6" style="display:<?php

                                                switch ($acesso) {
                                                  case '2':
                                                    echo "nav-item d-none d-sm-inline-block";
                                                    break;
                                                  case '3':
                                                    echo "";
                                                    break;
                                                  case '4':
                                                    echo "";
                                                    break;
                                                  case '5':
                                                    echo "";
                                                    break;
                                                  case '6':
                                                    echo "none";
                                                    break;

                                                  default:
                                                    echo "nav-item d-none d-sm-inline-block";
                                                    break;
                                                }

                                                ?>">
      <!-- small box -->
      <div class="small-box bg-teal">
        <div class="inner">
          <p>Faturamento do dia - <?php echo date('d/m/Y'); ?></p>
          <h3>R$ <?= number_format($dia, "2", ",", ".") ?></h3>
        </div>
        <div class="icon">
          <i class="ion ion-cash"></i>
        </div>
        <a href="#" class="small-box-footer">Relatório <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6" style="display:<?php

                                                switch ($acesso) {
                                                  case '2':
                                                    echo "none";
                                                    break;
                                                  case '3':
                                                    echo "";
                                                    break;
                                                  case '4':
                                                    echo "none";
                                                    break;

                                                  case '6':
                                                    echo "none";
                                                    break;

                                                  default:
                                                    echo "";
                                                    break;
                                                }

                                                ?>">
      <!-- small box -->
      <div class="small-box bg-lime">
        <div class="inner">
          <p>Faturamento Mensal - <?php echo date('d/m/Y'); ?></p>
          <h3>R$</h3>
        </div>
        <div class="icon">
          <i class="ion ion-cash"></i>
        </div>
        <a href="#" class="small-box-footer">Relatórios <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6" style="display:<?php

                                                switch ($acesso) {
                                                  case '2':
                                                    echo "none";
                                                    break;
                                                  case '3':
                                                    echo "none";
                                                    break;
                                                  case '4':
                                                    echo "none";
                                                    break;

                                                  case '6':
                                                    echo "none";
                                                    break;

                                                  default:
                                                    echo "";
                                                    break;
                                                }

                                                ?>">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <p>Despesas Diárias - <?php echo date('d/m/Y'); ?></p>
          <h3>R$ </h3>
        </div>
        <div class="icon">
          <i class="fa fa-minus-circle" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer">Relatórios <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6" style="display:<?php

                                                switch ($acesso) {
                                                  case '2':
                                                    echo "";
                                                    break;
                                                  case '3':
                                                    echo "";
                                                    break;
                                                  case '4':
                                                    echo "";
                                                    break;
                                                  case '6':
                                                    echo "none";
                                                    break;

                                                  default:
                                                    echo "";
                                                    break;
                                                }

                                                ?>">
      <!-- small box -->
      <div class="small-box bg-orange">
        <div class="inner">
          <p>Despesas Mensal - <?php echo date('d/m/Y'); ?></p>
          <h3>R$ </h3>
        </div>
        <div class="icon">
          <i class="fa fa-minus-circle" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer">Relatórios <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-primary" style="display:<?php

                                                      switch ($acesso) {
                                                        case '2':
                                                          echo "";
                                                          break;
                                                        case '3':
                                                          echo "";
                                                          break;
                                                        case '4':
                                                          echo "";
                                                          break;

                                                        default:
                                                          echo "";
                                                          break;
                                                      }

                                                      ?>">
        <div class="inner">
          <p>Contas a pagar - <?php echo date('d/m/Y'); ?></p>
          <h3>R$ </h3>
        </div>
        <div class="icon">
          <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer">Relatórios <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning" style="display:<?php

                                                        switch ($acesso) {
                                                          case '2':
                                                            echo "";
                                                            break;
                                                          case '3':
                                                            echo "";
                                                            break;
                                                          case '4':
                                                            echo "";
                                                            break;

                                                          default:
                                                            echo "";
                                                            break;
                                                        }

                                                        ?>">
        <div class="inner">
          <p>Contas a receber - <?php echo date('d/m/Y'); ?></p>
          <h3>R$ </h3>
        </div>
        <div class="icon">
          <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer">Relatórios <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6" style="display:<?php

                                                switch ($acesso) {
                                                  case '2':
                                                    echo "";
                                                    break;
                                                  case '3':
                                                    echo "";
                                                    break;
                                                  case '4':
                                                    echo "";
                                                    break;

                                                    case '6':
                                                      echo "none";
                                                      break;

                                                  default:
                                                    echo "";
                                                    break;
                                                }

                                                ?>">
      <!-- small box -->
      <div class="small-box bg-navy">
        <div class="inner">
          <p>Inventário - <?php echo date('d/m/Y'); ?></p>
          <h3>R$ </h3>
        </div>
        <div class="icon">
          <i class="fa fa-indent" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer">Relatórios <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6" style="display:<?php

                                                switch ($acesso) {
                                                  case '2':
                                                    echo "";
                                                    break;
                                                  case '3':
                                                    echo "";
                                                    break;
                                                  case '6':
                                                    echo "none";
                                                    break;

                                                  default:
                                                    echo "";
                                                    break;
                                                }

                                                ?>">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <p>Lucro do dia - <?php echo date('d/m/Y'); ?></p>
          <h3>R$ </h3>
        </div>
        <div class="icon">
          <i class="fa fa-credit-card" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer">Relatórios <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
</div>
   <div class="row">
   
   <div class="col-lg-6 col-6">
      <div class="card-body" style="background:#eeeeee">
        <div class="d-flex">
          <p class="d-flex flex-column">
            <span class="text-bold text-lg">R$ &nbsp; </span>
            <span>Acumulado no mês</span>
          </p>
          <p class="ml-auto d-flex flex-column text-right">
            <span class="text-info">
              <i class="fas fa-arrow-up"></i> &nbsp;
            </span>
            <span class="text-muted">Acumulado do dia </span>
          </p>
        </div>
        <!-- /.d-flex -->

        <div class="card-body">

          <canvas id="myChart" width="400" height="100"></canvas>

        </div>
      </div>
    </div>

    <div class="col-lg-6 col-6">

      <div class="card-body" style="background:#eeeeee">
        <div class="d-flex">
          <p class="d-flex flex-column">
            <span class="text-bold text-lg">R$ &nbsp; </span>
            <span>Acumulado no mês</span>
          </p>
          <p class="ml-auto d-flex flex-column text-right">
            <span class="text-info">
              <i class="fas fa-arrow-up"></i> &nbsp;
            </span>
            <span class="text-muted">Acumulado do dia </span>
          </p>
        </div>
        <!-- /.d-flex -->

        <div class="card-body">

          <canvas id="myChart2" width="400" height="100"></canvas>

        </div>
      </div>
    </div>
   
   </div>

  </div>
</div>