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
            <li><a href="<?php echo base_url()."index.php/home/"?>"><i class="fa fa-dashboard"></i> Geral</a></li>
            <li><a href="<?php echo base_url()."index.php/home/reserva"?>"><i class="fa fa-ticket"></i> Reserva</a></li>
            <li class="active"><a href="<?php echo base_url()."index.php/home/cliente"?>"><i class="fa fa-users "></i> Cliente</a></li>
            <li><a href="<?php echo base_url()."index.php/home/mesas"?>"><i class="fa fa-calendar"></i> Agenda</a></li>
            <li><a href="<?php echo base_url() . "index.php/home/onibus" ?>"><i class="fa fa-truck"></i> Ônibus</a></li>
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
            <h1>Cliente <small>Listagem</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-users"></i> Cliente</li>
              <li class="pull-right"><a href="<?php echo base_url()."index.php/home/clienteCadastro"?>" class="btn btn-primary btn-xs" role="button">Novo Cliente</a></li>
            </ol>
          </div>
        </div><!-- /.row -->

       <table class="table">
        <tr>
          <th>Nome</th>
          <th>E-Mail</th>
          <th>Telefone</th>
          <th>Celular</th>
          <th>Data Nascimento</th>
          <th>Loc. Embarque</th>
          <th align="center">Ação</th>
        </tr>
      <?php
        $query=$this->db->get('tb_clients');
        foreach ($query->result() as $row){
      ?>
              <tr>
                <td><?=$row->nome?></td>
                <td><?=$row->email?></td>
                <td><?=$row->telefone?></td>
                <td><?=$row->celular?></td>
                <td><?=$row->data_nascimento?></td>
                <td><?=$row->loc_embarque?></td>
                <td width='180px'><?=form_open('home/excluirCliente')?>
                <input type="hidden" name="id_clients" value="<?=$row->id_clients?>" />
                <input type="submit" class="btn btn-danger btn-xs pull-right" value="Exclui">
              </form><?=form_open('home/editarCliente')?>
                <input type="hidden" name="id_clients" value="<?=$row->id_clients?>" />
                <input type="submit" class="btn btn-warning btn-xs pull-right" value="Editar">
              </form><?=form_open('home/detalharCliente')?>
                <input type="hidden" name="id_clients" value="<?=$row->id_clients?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="Detalhar">
              </form></td>
              </tr>
      <?php
        }
      ?>
      </table>
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
