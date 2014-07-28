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
                        <li><a href="<?php echo base_url() . "index.php/home/viagem" ?>"><i class="fa fa-tasks"></i> Viagem</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/motorista" ?>"><i class="fa fa-car"></i> Motorista</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/usuario" ?>"><i class="fa fa-user"></i> Usuário</a></li>
                        <li><a href="bootstrap-grid.html"><i class="fa fa-wrench"></i> Configurações</a></li>
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
                        <h1>Agendamento <small>Edição</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-calendar"></i><a href="<?php echo base_url() . "index.php/home/agenda" ?>"> Agendamento</a> /Edição</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="row col-sm-4">
                    <h3>Editar Agendamento</h3>
                    <?php
                    echo form_open('home/editarValidacaoAgenda');
                    $this->db->where('id_tour', $this->input->post('id_tour'));
                    $query = $this->db->get('tb_tour');
                    foreach ($query->result_array() as $row) {
                        $agendaDados = $row;
                    }
                    $data_saida = implode("/", array_reverse(explode("-", $agendaDados['data_saida'])));
                    $data_retorno = implode("/", array_reverse(explode("-", $agendaDados['data_retorno'])));
                    echo validation_errors();

                    $query = $this->db->get('tb_clients');
                    $cliente[] = '';
                    foreach ($query->result() as $clt) {
                        $cliente[$clt->id_clients] = $clt->nome;
                    }
                    echo form_label('Cliente: ');
                    echo form_dropdown('id_client', $cliente, $agendaDados['id_client'], 'class=form-control');
                    echo '<br>';
                    $this->db->where('status', 'A');
                    $query = $this->db->get('tb_cars');
                    $opcao[] = '';
                    foreach ($query->result() as $bus) {
                        $opcao[$bus->id_cars] = $bus->codigo . ' - ' . $bus->modelo;
                    }
                    echo form_label('Ônibus: ');
                    echo form_dropdown('id_car', $opcao, $agendaDados['id_car'], 'class=form-control');
                    echo '<br>';
                    $opcao = array(
                        'v' => 'Viagem',
                        'f' => 'Fretamento',
                        't' => 'Tourismo',
                        'e' => 'Escursão',
                    );
                    echo form_label('Tipo: ');
                    echo form_dropdown('tipo', $opcao, $agendaDados['tipo'], 'class=form-control');
                    echo '<br>';
                    echo form_label('Destino: ');
                    echo form_input(['name' => 'destino', 'id' => 'destino', 'class' => 'form-control input-sm', 'value' => $agendaDados['destino']]);
                    echo '<br>';
                    echo form_label('Data Saida: ');
                    echo form_input(['name' => 'data_saida', 'id' => 'data_saida', 'class' => 'form-control input-sm', 'value' => $data_saida]);
                    echo '<br>';
                    echo form_label('Data Retorno: ');
                    echo form_input(['name' => 'data_retorno', 'id' => 'data_retorno', 'class' => 'form-control input-sm', 'value' => $data_retorno]);
                    echo '<br>';
                    $this->db->where('status', 'A');
                    $query = $this->db->get('tb_drivers');
                    $opcao2[] = '';
                    foreach ($query->result() as $driver) {
                        $opcao2[$driver->id_drivers] = $driver->nome;
                    }
                    echo form_label('Motorista: ');
                    echo form_dropdown('id_motorista', $opcao2, $agendaDados['id_motorista'], 'class=form-control');
                    echo '<br>';
                    echo form_label('Preço: ');
                    echo form_input(['name' => 'preco', 'id' => 'preco', 'class' => 'form-control input-sm', 'value' => $agendaDados['preco']]);
                    echo '<br>';
                    echo form_label('Observação: ');
                    echo form_input(['name' => 'observacao', 'id' => 'observacao', 'class' => 'form-control input-sm', 'value' => $agendaDados['observacao']]);
                    echo '<br>';
                    $ativo = array(
                        'name' => 'status',
                        'id' => 'status',
                        'value' => 'A',
                        'checked' => ($agendaDados['status'] != 'I' ? TRUE : FALSE),
                    );
                    $inativo = array(
                        'name' => 'status',
                        'id' => 'status',
                        'value' => 'I',
                        'checked' => ($agendaDados['status'] == 'I' ? TRUE : FALSE),
                    );
                    echo form_label('Situação: ');
                    echo "Ativo " . form_radio($ativo);
                    echo " Inativo " . form_radio($inativo);

                    echo form_hidden('id_tour', $this->input->post('id_tour'));

                    echo "<br />";
                    echo '<input type="submit" class="btn btn-primary" value="Editar">';

                    echo form_close();
                    ?>
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
        <script type="text/javascript">
            $(function() {
                $('#preco').mask('000.000.000.000.000,00', {reverse: true});
            });
        </script>
    </body>
</html>
