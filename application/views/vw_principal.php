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
        <link rel="stylesheet" href="<?= base_url() ?>font-awesome/css/font-awesome.css">
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
                        <li class="active"><a href="<?php echo base_url() . "index.php/home/" ?>"><i class="fa fa-dashboard"></i> Geral</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/reserva" ?>"><i class="fa fa-ticket"></i> Reserva</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/cliente" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/agenda" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/onibus" ?>"><i class="fa fa-truck"></i> Ônibus</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/viagem" ?>"><i class="fa fa-tasks"></i> Destino</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/motorista" ?>"><i class="fa fa-car"></i> Motorista</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/usuario" ?>"><i class="fa fa-user"></i> Usuário</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bar-chart-o"></i> Relatórios <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url() . "index.php/home/relatorioCliente" ?>"> Clientes</a></li>
                                <li><a href="<?php echo base_url() . "index.php/home/relatorioOnibus" ?>"> Ônibus</a></li>
                                <li><a href="<?php echo base_url() . "index.php/home/relatorioViagem" ?>"> Viagem</a></li>
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
                        <h1>Principal <small>Visão geral</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-dashboard"></i> Informações gerais</li>
                        </ol>
                        <!--                        <div class="alert alert-success alert-dismissable">Usar essa div para mostra alarmes, pedidos e chamados de garçom
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    Welcome to SB Admin by <a class="alert-link" href="http://startbootstrap.com">Start Bootstrap</a>! Feel free to use this template for your admin needs! We are using a few different plugins to handle the dynamic tables and charts, so make sure you check out the necessary documentation links provided.
                                                </div>-->
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
                                    <table class="table table-bordered table-hover table-striped">
                                    <?php
                                    $this->db->select('*');
                                    $this->db->from('tb_tour');
                                    $this->db->join('tb_cars', 'tb_cars.id_cars=tb_tour.id_car');
                                    $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                                    $this->db->where('tipo', 'v'); //viagem
                                    $this->db->or_where('tipo', 't'); //turismo
                                    $this->db->or_where('tipo', 'e'); //excursão
                                    $this->db->or_where('tipo', 'f'); //fretado
                                    $this->db->where('tb_tour.status', 'A');
                                    $query = $this->db->get();
                                    foreach ($query->result() as $row) {
                                        $this->db->where('id_tour', $row->id_tour);
                                        $this->db->from('tb_reservs');
                                        $reserva = $this->db->count_all_results();
                                        $data_saida = implode("/", array_reverse(explode("-", $row->data_saida)));
                                        ?>
                                        <tr>
                                            <td>
<!--                                        <a href="#" class="list-group-item">-->
                                            <i class="fa fa-calendar"></i> <?= $row->destino ?> - <?php
                                            if ($row->tipo == 'v')
                                                echo "Viagem";
                                            elseif ($row->tipo == 'f')
                                                echo "Fretado";
                                            elseif ($row->tipo == 't')
                                                echo "Turismo";
                                            elseif ($row->tipo == 'e')
                                                echo "Excursão";
                                            ?> - <?= $data_saida ?>
                                            </td>
                                            <td>
                                            <?php
                                            if ($row->nr_poltrona - $reserva > 0) {
                                                echo form_open('home/reservaMapa').'<input type="hidden" name="id_tour" value="'.$row->id_tour.'"><input type="submit" class="btn btn-success btn-xs" value="Disponivel"></form>';
                                            } else {
                                                echo '<span class="label label-danger"> Esgotado</span>';
                                            }
                                            ?>
                                            </td>
                                             </tr>
<!--                                        </a>-->
                                        <?php
                                    }
                                    ?>
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money"></i> Visão Geral</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped tablesorter">
                                        <thead>
                                            <tr>
                                                <th>Ônibus<i class="fa fa-sort"></i></th>
                                                <th>Destino<i class="fa fa-sort"></i></th>
                                                <th>Data Saída<i class="fa fa-sort"></i></th>
                                                <th>Data Retorno<i class="fa fa-sort"></i></th>
                                                <th>Tipo<i class="fa fa-sort"></i></th>
                                                <th>Valor<i class="fa fa-sort"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = $this->db->query("SELECT * FROM tb_tour
                                            JOIN tb_viagem ON tb_tour.id_viagem=tb_viagem.id_viagem
                                            JOIN tb_cars ON tb_tour.id_car=tb_cars.id_cars
                                            WHERE tb_tour.status = 'A' AND tb_tour.tipo='v' OR tb_tour.tipo='t' OR tb_tour.tipo='e'");
                                            foreach ($query->result() as $linha) {
                                                $data_saida = implode("/", array_reverse(explode("-", $linha->data_saida)));
                                                $data_retorno = implode("/", array_reverse(explode("-", $linha->data_retorno)));
                                                echo "<tr>";
                                                echo "<td>" . $linha->modelo . "</td>";
                                                echo "<td>" . $linha->destino . "</td>";
                                                echo "<td>" . $data_saida . "</td>";
                                                echo "<td>" . $data_retorno ."</td>";
                                                echo "<td>";
                                                if ($linha->tipo == 'v')
                                                    echo "Viagem";
                                                elseif ($linha->tipo == 'f')
                                                    echo "Fretado";
                                                elseif ($linha->tipo == 't')
                                                    echo "Turismo";
                                                elseif ($linha->tipo == 'e')
                                                    echo "Excursão";
                                                echo "</td>";
                                                echo "<td>R$" . $linha->preco . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
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