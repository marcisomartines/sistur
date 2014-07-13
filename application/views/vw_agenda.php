<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Marciso Gonzalez Martines">

        <title>Pantanal Sul - Turismo</title>

        <link href="<?= base_url() ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?= base_url() ?>css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>font-awesome/css/font-awesome.min.css">
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
                    <a class="navbar-brand" href="">Pantanal Sul Turismo</a>
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li><a href="<?php echo base_url() . "index.php/home/" ?>"><i class="fa fa-dashboard"></i> Geral</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/reserva" ?>"><i class="fa fa-ticket"></i> Reserva</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/cliente" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                        <li class="active"><a href="<?php echo base_url() . "index.php/home/agenda" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/onibus" ?>"><i class="fa fa-truck"></i> Ônibus</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/produto" ?>"><i class="fa fa-money"></i> Financeiro</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/motorista" ?>"><i class="fa fa-car"></i> Motorista</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/usuario" ?>"><i class="fa fa-user"></i> Usuário</a></li>
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
                                <li><a href="<?php echo base_url() . "index.php/home/cadastroCategoria" ?>">Categoria</a></li>
                                <li><a href="<?php echo base_url() . "index.php/home/cadastroPessoa" ?>">Funcionário</a></li>
                                <li><a href="<?php echo base_url() . "index.php/home/cadastroMesa" ?>">Mesa</a></li>
                                <li><a href="<?php echo base_url() . "index.php/home/cadastroProduto" ?>">Produtos</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Menu superior alinhado a direita-->
                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <?php
                        $this->db->where('nome_user', $this->session->userdata('nome'));
                        $query = $this->db->get('tb_users');
                        $query = $query->result();
                        ?>
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $query[0]->nome_user ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                                <li><a href="#"><i class="fa fa-gear"></i> Configurações</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url() . "index.php/home/logout" ?>"><i class="fa fa-power-off"></i> Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
            <!--fim do menu superior alinhado a direita-->
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Agendamento <small>Listagem</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-calendar"></i> Agendamento</li>
                            <li class="pull-right"><a href="<?php echo base_url() . "index.php/home/agendaCadastro" ?>" class="btn btn-primary btn-xs" role="button">Novo Agendamento</a></li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#listagem" role="tab" data-toggle="tab">Listagem</a></li>
                        <li><a href="#agenda" role="tab" data-toggle="tab">Agenda</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="listagem"><!--Listagem de agendamentos-->
                            <table class="table">
                                <tr>
                                    <th>Cod.</th>
                                    <th>Ônibus</th>
                                    <th>Destino</th>
                                    <th>Saída</th>
                                    <th>Retorno</th>
                                    <th>Tipo</th>
                                    <th align="center">Ação</th>
                                </tr>
                                <?php
                                $query = $this->db->get('tb_cars');
                                foreach ($query->result() as $row) {
                                    ?>
                                    <tr>
                                        <td><?=$row->codigo?></td>
                                        <td><?=$row->modelo?></td>
                                        <td><?=$row->destino?></td>
                                        <td><?=$row->data_saida?></td>
                                        <td><?=$row->data_retorno?></td>
                                        <td><?= ($row->status == 'A' ? "Ativo" : "Inativo") ?></td>
                                        <td width='180px'><?= form_open('home/excluirOnibus') ?>
                                            <input type="hidden" name="id_cars" value="<?= $row->id_cars ?>" />
                                            <input type="submit" class="btn btn-danger btn-xs pull-right" value="Excluir">
                                            </form><?= form_open('home/editarOnibus') ?>
                                            <input type="hidden" name="id_cars" value="<?= $row->id_cars ?>" />
                                            <input type="submit" class="btn btn-warning btn-xs pull-right" value="Editar">
                                            </form><?= form_open('home/detalharOnibus') ?>
                                            <input type="hidden" name="id_cars" value="<?= $row->id_cars ?>" />
                                            <input type="submit" class="btn btn-success btn-xs pull-right" value="Detalhar">
                                            </form></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div><!--fim da Listagem de agendamentos-->
                        <div class="tab-pane fade" id="agenda">
                            <p>Agenda de exemplo.</p>
                        </div>
                    </div>
                </div>
            </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->
        <!-- JavaScript -->
        <script src="<?= base_url() ?>js/jquery-1.10.2.js"></script>
        <script src="<?= base_url() ?>js/bootstrap.js"></script>
        <!-- Page Specific Plugins -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <script src="<?= base_url() ?>js/morris/chart-data-morris.js"></script>
        <script src="<?= base_url() ?>js/tablesorter/jquery.tablesorter.js"></script>
        <script src="<?= base_url() ?>js/tablesorter/tables.js"></script>
    </body>
</html>