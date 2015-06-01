<!DOCTYPE html>
<?php
$this->db->where('nome_user', $this->session->userdata('nome'));
$query = $this->db->get('tb_users');
$query = $query->result();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Marciso Gonzalez Martines">

        <title><?= $query[0]->titulo ?></title>

        <link href="<?= base_url() ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?= base_url() ?>css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css>"
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
                    <a class="navbar-brand" href=""><?= $query[0]->empresa ?></a>
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <?php
                    if ($query[0]->tipo > 0) {
                        ?>
                        <ul class="nav navbar-nav side-nav">
                            <li><a href="<?php echo base_url() . "index.php/home/reserva" ?>"><i class="fa fa-ticket"></i> Reserva</a></li>
                        </ul>
                        <?php
                    } else {
                        ?>
                        <ul class="nav navbar-nav side-nav">
                            <li><a href="<?php echo base_url() . "index.php/home/" ?>"><i class="fa fa-dashboard"></i> Geral</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/reserva" ?>"><i class="fa fa-ticket"></i> Reserva</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/cliente" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/agenda" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/orcamento" ?>"><i class="fa fa-file-text-o"></i> Orçamento</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/onibus" ?>"><i class="fa fa-truck"></i> Ônibus</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/viagem" ?>"><i class="fa fa-tasks"></i> Destino</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/motorista" ?>"><i class="fa fa-car"></i> Motorista</a></li>
                            <li class="active"><a href="<?php echo base_url() . "index.php/home/guiaLista" ?>"><i class="fa fa-bus"></i> Guia</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/usuario" ?>"><i class="fa fa-user"></i> Usuário</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/relatorio" ?>"><i class="fa fa-bar-chart-o"></i> Relatórios</a></li>
                        </ul>
                        <?php
                    }
                    ?>
                    <!-- Menu superior alinhado a direita-->
                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <!--tava aqui-->
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
                        <h1>Viagens <small>Mapa de Passageiros</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-dashboard"></i> Informações gerais</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-map-marker"></i> Mapa Ônibus<span class="label label-success pull-right">LIVRE</span><span class="label label-warning pull-right">IDA</span><span class="label label-info pull-right">VOLTA</span><span class="label label-danger pull-right">IDA/VOLTA</span></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <?php
                                    $query = $this->db->query("SELECT * FROM tb_tour
                                                                JOIN tb_drivers ON tb_drivers.id_drivers=tb_tour.id_motorista
                                                                JOIN tb_viagem ON tb_tour.id_viagem=tb_viagem.id_viagem
                                                                JOIN tb_cars ON tb_cars.id_cars=tb_tour.id_car
                                                                WHERE tb_tour.id_tour=" . $this->input->post('id_tour'));
                                    //colocar todo as informações daqui pra baixo
                                    foreach ($query->result_array() as $row) {
                                        $dados = $row;
                                    }
                                    if ($dados['nr_poltrona'] == 40)
                                        include 'vw_guiaOnibus40.php';
                                    if ($dados['nr_poltrona'] == 42)
                                        include 'vw_guiaOnibus42.php';
                                    if ($dados['nr_poltrona'] == 44)
                                        include 'vw_guiaOnibus44.php';
                                    if ($dados['nr_poltrona'] == 52)
                                        include 'vw_guiaOnibus52.php';
                                    ?>
<!--                                        <table>
                                        <tr>
                                            <td><a class="btn btn-primary" href="" onClick="window.open('<?php echo base_url() . "index.php/home/listaPassageiros?id=" . $this->input->post('id_tour') ?>', 'Janela', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=800,left=0,top=0');
                                            return false;"><i class="fa fa-list"></i> Lista Passageiros</a></td>
                                            <td> <?= form_open('home/fechamentoReserva') ?>
                            <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Finalizar Viagem</button>
                            </form></td>
                                        </tr>
                                    </table>-->
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