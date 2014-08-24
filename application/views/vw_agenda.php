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
                        <li><a href="<?php echo base_url() . "index.php/home/viagem" ?>"><i class="fa fa-tasks"></i> Destino</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/motorista" ?>"><i class="fa fa-car"></i> Motorista</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/usuario" ?>"><i class="fa fa-user"></i> Usuário</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/relatorio" ?>"><i class="fa fa-bar-chart-o"></i> Relatórios</a></li>
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
                                <li><?= form_open('home/editarUsuario') ?>
                                <input type="hidden" name="id_users" value="<?= $query[0]->id_users ?>" />
                                <button type="submit" class="btn btn-link"><i class="fa fa-gear"></i> Configurações</button>
                                </form></li>
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
                            <table class="table tablesorter">
                                <thead>
                                    <tr>
                                        <th>Cod. <i class="fa fa-sort"></i></th>
                                        <th>Ônibus <i class="fa fa-sort"></i></th>
                                        <th>Destino <i class="fa fa-sort"></i></th>
                                        <th>Saída <i class="fa fa-sort"></i></th>
                                        <th>Retorno <i class="fa fa-sort"></i></th>
                                        <th>Tipo <i class="fa fa-sort"></i></th>
                                        <th>Situação <i class="fa fa-sort"></i></th>
                                        <th align="center">Ação</th>
                                    </tr>
                                </thead>
                                <?php
                                $query = $this->db->query("SELECT tb_tour.id_tour,tb_cars.codigo,tb_cars.modelo,tb_tour.data_saida,
                                                            tb_tour.data_retorno,tb_tour.id_viagem,tb_tour.tipo,tb_tour.status 
                                                            FROM tb_tour
                                                            JOIN tb_cars on tb_cars.id_cars=tb_tour.id_car
                                                            JOIN tb_drivers on tb_drivers.id_drivers=tb_tour.id_motorista");
                                foreach ($query->result() as $row) {
                                    $data_saida = implode("/", array_reverse(explode("-", $row->data_saida)));
                                    $data_retorno = implode("/", array_reverse(explode("-", $row->data_retorno)));
                                    $this->db->where('id_viagem', $row->id_viagem);
                                    $v = $this->db->get('tb_viagem');
                                    foreach ($v->result() as $vi) {
                                        $destino = $vi->destino;
                                    }
                                    ?>
                                    <tr>
                                        <td><?= $row->codigo ?></td>
                                        <td><?= $row->modelo ?></td>
                                        <td><?= $destino ?></td>
                                        <td><?= $data_saida ?></td>
                                        <td><?= $data_retorno ?></td>
                                        <td><?php
                                            if ($row->tipo == 'v')
                                                echo "Viagem";
                                            elseif ($row->tipo == 'f')
                                                echo "Fretado";
                                            elseif ($row->tipo == 't')
                                                echo "Turismo";
                                            elseif ($row->tipo == 'e')
                                                echo "Excursão";
                                            ?></td>
                                        <td><?= ($row->status == 'A' ? "Ativo" : "Finalizado") ?></td>
                                        <td width='180px'><?= form_open('home/excluirAgenda') ?>
                                            <input type="hidden" name="id_tour" value="<?= $row->id_tour ?>" />
                                            <input type="submit" class="btn btn-danger btn-xs pull-right" value="Excluir">
                                            </form><?= form_open('home/editarAgenda') ?>
                                            <input type="hidden" name="id_tour" value="<?= $row->id_tour ?>" />
                                            <input type="submit" class="btn btn-warning btn-xs pull-right" value="Editar">
                                            </form><?= form_open('home/detalharAgenda') ?>
                                            <input type="hidden" name="id_tour" value="<?= $row->id_tour ?>" />
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
