<?php
$form = array('id' => 'form-login', 'class' => 'form-horizontal', 'role' => 'form');
$usuario = array('name' => 'nome', 'id' => 'nome', 'class' => 'form-control');
$lusuario = array('class' => 'form-control');
?>
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
        <link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui.css">
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
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bar-chart-o"></i> Relatórios <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url() . "index.php/home/relatorioCliente" ?>"> Clientes</a></li>
<!--                                <li><a href="<?php echo base_url() . "index.php/home/relatorioOnibus" ?>"> Ônibus</a></li>-->
                                <li><a href="<?php echo base_url() . "index.php/home/relatorioViagem" ?>"> Viagem</a></li>
                                <li><a href="<?php echo base_url() . "index.php/home/aniversariantes" ?>"> Aniversariantes</a></li>
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
                        <h1>Agendamento <small>Detalhar</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-calendar"></i><a href="<?php echo base_url() . "index.php/home/agenda" ?>"> Agendamento</a> / Detalhar</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="row col-sm-4">
                    <h3>Detalhar Agendamento</h3>
                    <?php
                    $this->db->select('tb_tour.id_client,tb_tour.data_saida,tb_tour.data_retorno,tb_tour.tipo,tb_tour.preco,tb_tour.observacao,'
                            . 'tb_tour.status,tb_tour.tipo,tb_cars.codigo,tb_cars.modelo,tb_drivers.nome as motorista, tb_viagem.destino');
                    $this->db->from('tb_tour');
                    $this->db->join('tb_cars', 'tb_cars.id_cars=tb_tour.id_car');
                    $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                    $this->db->join('tb_drivers', 'tb_drivers.id_drivers=tb_tour.id_motorista');
                    $this->db->where('id_tour', $this->input->post('id_tour'));
                    $query = $this->db->get();
                    foreach ($query->result_array() as $row) {
                        $agendaDados = $row;
                    }
                    $data_saida = implode("/", array_reverse(explode("-", $agendaDados['data_saida'])));
                    $data_retorno = implode("/", array_reverse(explode("-", $agendaDados['data_retorno'])));
                    ?>
                    <table class="table table-striped">
                        <tr>
                            <th>Cliente: </th>
                            <td> <?php
                                if ($agendaDados['id_client'] > 0) {
                                    $this->db->where('id_clients', $agendaDados['id_client']);
                                    $query = $this->db->get('tb_clients');
                                    foreach ($query->result() as $row) {
                                        $cliente = $row;
                                    }
                                    echo $cliente->nome;
                                }
                                else
                                    echo "";
                                ?></td>
                        </tr>
                        <tr>
                            <th>Onibus: </th>
                            <td><?= $agendaDados['codigo'] ?> - <?= $agendaDados['modelo'] ?></td>
                        </tr>
                        <tr>
                            <th>Tipo: </th>
                            <td><?php
                                if ($agendaDados['tipo'] == 'v')
                                    echo "Viagem";
                                elseif ($agendaDados['tipo'] == 'f')
                                    echo "Fretado";
                                elseif ($agendaDados['tipo'] == 't')
                                    echo "Turismo";
                                elseif ($agendaDados['tipo'] == 'e')
                                    echo "Excursão";
                                ?></td>
                        </tr>
                        <tr>
                            <th>Destino: </th>
                            <td><?= $agendaDados['destino'] ?></td>
                        </tr>
                        <tr>
                            <th>Data Saída: </th>
                            <td><?= $data_saida ?></td>
                        </tr>
                        <tr>
                            <th>Data Retorno: </th>
                            <td><?= $data_retorno ?></td>
                        </tr>
                        <tr>
                            <th>Motorista: </th>
                            <td><?= $agendaDados['motorista'] ?></td>
                        </tr>
                        <tr>
                            <th>Preço: </th>
                            <td>R$<?= $agendaDados['preco'] ?></td>
                        </tr>
                        <tr>
                            <th>Situação: </th>
                            <td><?= ($agendaDados['status'] == 'A' ? "Ativo" : "Finalizado") ?></td>
                        </tr>
                        <tr>
                            <th>Observação: </th>
                            <td><?= $agendaDados['observacao'] ?></td>
                        </tr>
                    </table>
                    <a href="<?php echo base_url() . "index.php/home/agenda" ?>" class="btn btn-primary" role="button">Voltar</a>
                    <!--Fim da Panel verde-->
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
        <script src="<?= base_url() ?>js/jquery.mask.min.js"></script>
        <script src="<?= base_url() ?>js/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#data_saida").datepicker({
                    dateFormat: 'dd/mm/yy',
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    changeMonth: true,
                    changeYear: true
                });
            });
        </script>
        <script>
            $(function() {
                $("#data_retorno").datepicker({
                    dateFormat: 'dd/mm/yy',
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    changeMonth: true,
                    changeYear: true
                });
            });
        </script>
    </body>
</html>
