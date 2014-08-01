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
        <script type="text/javascript">
            $().ready(function() {
                $("#course").autocomplete("home/autoComplete", {
                    width: 260,
                    matchContains: true,
                    selectFirst: false
                });
            });</script>
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
                        <li class="active"><a href="<?php echo base_url() . "index.php/home/reserva" ?>"><i class="fa fa-ticket"></i> Reserva</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/cliente" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/agenda" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/onibus" ?>"><i class="fa fa-truck"></i> Ônibus</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/viagem" ?>"><i class="fa fa-tasks"></i> Viagem</a></li>
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
                        <h1>Reserva <small>passagem</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-ticket"></i><a href="<?php echo base_url() . "index.php/home/reserva" ?>"> Reserva</a> / Edição</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="row col-sm-4">
                    <h1>Editar Usuário</h1>
                    <?php
                    echo form_open('home/editarValidacaoReserva', $form);
                    //$this->db->where('id_reservs', $this->input->post('id_reservs'));
                    $this->db->select('*');
                    $this->db->from('tb_reservs');
                    $this->db->join('tb_clients', 'tb_clients.id_clients=tb_reservs.id_client');
                    $this->db->where('tb_reservs.id_tour', $this->input->post('id_tour'));
                    $this->db->where('tb_reservs.nr_poltrona', $this->input->post('nr_poltrona'));
                    $query = $this->db->get();
                    foreach ($query->result_array() as $row) {
                        $reservaDados = $row;
                    }
                    echo print_r($query->result());
                    echo validation_errors();

                    echo form_label('Cliente: ', 'cliente');
                    echo form_input(['name' => 'cliente', 'id' => 'cliente', 'class' => 'form-control input-sm', 'value' => $reservaDados['nome']]);
                    echo '<br>';
                    $opcao = array(
                        'i' => 'Somente Ida',
                        'v' => 'Somente Volta',
                        'd' => 'Ida/Volta'
                    );
                    echo form_label('Tipo: ');
                    echo form_dropdown('tipo', $opcao, $reservaDados['tipo'], 'class=form-control');
                    echo '<br>';
                    echo form_label('Desconto: ');
                    echo form_input(['name' => 'desconto', 'id' => 'desconto', 'class' => 'form-control input-sm', 'value' => $reservaDados['email']]);
                    echo '<br>';
                    echo form_label('Local de Embarque: ');
                    echo form_input(['name' => 'loc_embarque', 'id' => 'loc_embarque', 'class' => 'form-control input-sm', 'value' => $reservaDados['loc_embarque']]);
                    echo '<br>';
                    echo form_label('Nr. Poltrona: ');
                    echo form_input(['name' => 'nr_poltrona', 'id' => 'nr_poltrona', 'class' => 'form-control input-sm', 'value' => $reservaDados['nr_poltrona']]);

                    echo form_hidden('id_reservs', $this->input->post('id_reservs'));

                    echo "<br>";
                    echo '<input type="submit" class="btn btn-primary" value="Editar">';
                    echo form_close();
                    ?>
                    <?= form_open('home/excluirReserva') ?>
                    <input type="hidden" name="id_reservs" value="<?= $reservaDados['id_reservs'] ?>" />
                    <input type="submit" class="btn btn-danger" value="Excluir">
                    </form>
                    <!--Fim da Panel verde-->
                </div>
                <div id="relatorio" class=" row-fluid"><!--mater isso escondido aqui-->
                    <!--reserva vai ser colocada aqui-->
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
        <script src="<?= base_url() ?>js/funcao.js"></script>
        <script src="<?= base_url() ?>js/jquery-ui.js"></script>
        <script src="<?= base_url() ?>js/jquery.autocomplete.js"></script>
        <script src="<?= base_url() ?>js/jquery.mask.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#combustivel').mask('000000000000000.00', {reverse: true});
                $('#alimentacao').mask('000000000000000.00', {reverse: true});
                $('#outros').mask('000000000000000.00', {reverse: true});
                $('#total').mask('000000000000000.00', {reverse: true});
                $('#desconto').mask('000000000000000.00', {reverse: true});
            });
        </script>
    </body>
</html>