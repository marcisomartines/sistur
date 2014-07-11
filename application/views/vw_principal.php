
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Marciso Gonzalez Martines">

    <title>Pantanal Sul - Turismo</title>

    <link href="<?=base_url()?>css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- barra lateral -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Pantanal Sul Turismo</a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="<?php echo base_url()."index.php/home/"?>"><i class="fa fa-dashboard"></i> Geral</a></li>
            <li><a href="<?php echo base_url()."index.php/home/reserva"?>"><i class="fa fa-ticket"></i> Reserva</a></li>
            <li><a href="<?php echo base_url()."index.php/home/cliente"?>"><i class="fa fa-users "></i> Cliente</a></li>
            <li><a href="<?php echo base_url()."index.php/home/mesas"?>"><i class="fa fa-calendar"></i> Agenda</a></li>
            <li><a href="<?php echo base_url() . "index.php/home/produto" ?>"><i class="fa fa-truck"></i> Ônibus</a></li>
            <li><a href="<?php echo base_url() . "index.php/home/produto" ?>"><i class="fa fa-money"></i> Financeiro</a></li>
            <li><a href="<?php echo base_url()."index.php/home/usuario"?>"><i class="fa fa-user"></i> Usuário</a></li>
            <li><a href="bootstrap-grid.html"><i class="fa fa-wrench"></i> Configurações</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bar-chart-o"></i> Relatórios <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() . "index.php/home/cadastroCategoria" ?>"><i class="fa fa-money"></i> Vendas</a></li>
                <li><a href="<?php echo base_url() . "index.php/home/cadastroPessoa" ?>"><i class="fa fa-shopping-cart"></i> Estoque</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> Cadastros <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()."index.php/home/cadastroCategoria"?>">Categoria</a></li>
                <li><a href="<?php echo base_url()."index.php/home/cadastroPessoa"?>">Funcionário</a></li>
                <li><a href="<?php echo base_url()."index.php/home/cadastroMesa"?>">Mesa</a></li>
                <li><a href="<?php echo base_url()."index.php/home/cadastroProduto"?>">Produtos</a></li>
              </ul>
            </li>
          </ul>
          <!-- Menu superior alinhado a direita-->
          <ul class="nav navbar-nav navbar-right navbar-user">
            <?php
              $this->db->where('nome_user',$this->session->userdata('nome'));
              $query=$this->db->get('tb_users');
              $query=$query->result();
            ?>
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=$query[0]->nome_user?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Configurações</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url()."index.php/home/logout"?>"><i class="fa fa-power-off"></i> Sair</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
<!--fim do menu superior alinhado a direita-->
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Principal <small>Visão geral</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Informações gerais</li>
            </ol>
            <div class="alert alert-success alert-dismissable"><!--Usar essa div para mostra alarmes, pedidos e chamados de garçom-->
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Welcome to SB Admin by <a class="alert-link" href="http://startbootstrap.com">Start Bootstrap</a>! Feel free to use this template for your admin needs! We are using a few different plugins to handle the dynamic tables and charts, so make sure you check out the necessary documentation links provided.
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o"></i> Viagens</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <a href="#" class="list-group-item">
                    <i class="fa fa-calendar"></i> Viagem 1 Saida - 21/06/2014
                    <span class="label label-success"> Disponivel</span>
                  </a>
                  <a href="#" class="list-group-item">
                    <i class="fa fa-calendar"></i> Viagem 2 Saida - 22/06/2014
                    <span class="label label-danger"> Esgotado</span>
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">23 minutes ago</span>
                    <i class="fa fa-truck"></i> Order 392 shipped
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">46 minutes ago</span>
                    <i class="fa fa-money"></i> Invoice 653 has been paid
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">1 hour ago</span>
                    <i class="fa fa-user"></i> A new user has been added
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">2 hours ago</span>
                    <i class="fa fa-check"></i> Completed task: "pick up dry cleaning"
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">yesterday</span>
                    <i class="fa fa-globe"></i> Saved the world
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">two days ago</span>
                    <i class="fa fa-check"></i> Completed task: "fix error on sales page"
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Visão Geral das Mesas</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>Mesa # <i class="fa fa-sort"></i></th>
                        <th>Ultimo Pedido <i class="fa fa-sort"></i></th>
                        <th>Hora Ult. Pedido <i class="fa fa-sort"></i></th>
                        <th>Valor Total <i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>3326</td>
                        <td>10/21/2013</td>
                        <td>3:29 PM</td>
                        <td>$321.33</td>
                      </tr>
                      <tr>
                        <td>3325</td>
                        <td>10/21/2013</td>
                        <td>3:20 PM</td>
                        <td>$234.34</td>
                      </tr>
                      <tr>
                        <td>3324</td>
                        <td>10/21/2013</td>
                        <td>3:03 PM</td>
                        <td>$724.17</td>
                      </tr>
                      <tr>
                        <td>3323</td>
                        <td>10/21/2013</td>
                        <td>3:00 PM</td>
                        <td>$23.71</td>
                      </tr>
                      <tr>
                        <td>3322</td>
                        <td>10/21/2013</td>
                        <td>2:49 PM</td>
                        <td>$8345.23</td>
                      </tr>
                      <tr>
                        <td>3321</td>
                        <td>10/21/2013</td>
                        <td>2:23 PM</td>
                        <td>$245.12</td>
                      </tr>
                      <tr>
                        <td>3320</td>
                        <td>10/21/2013</td>
                        <td>2:15 PM</td>
                        <td>$5663.54</td>
                      </tr>
                      <tr>
                        <td>3319</td>
                        <td>10/21/2013</td>
                        <td>2:13 PM</td>
                        <td>$943.45</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- JavaScript -->
    <script src="<?=base_url()?>js/jquery-1.10.2.js"></script>
    <script src="<?=base_url()?>js/bootstrap.js"></script>
    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="<?=base_url()?>js/morris/chart-data-morris.js"></script>
    <script src="<?=base_url()?>js/tablesorter/jquery.tablesorter.js"></script>
    <script src="<?=base_url()?>js/tablesorter/tables.js"></script>
  </body>
</html>
