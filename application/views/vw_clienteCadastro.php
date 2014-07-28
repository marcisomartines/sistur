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
                        <li class="active"><a href="<?php echo base_url() . "index.php/home/cliente" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/agenda" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
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
                        <h1>Cliente <small>Cadastro</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-users"></i><a href="<?php echo base_url() . "index.php/home/cliente" ?>"> Cliente</a>/Cadastro</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="row col-sm-4">
                    <h3>Cadastrar Cliente</h3>
                    <?php
                    echo form_open('home/cadastroValidacaoCliente');

                    echo validation_errors();

                    echo form_label('Nome: ');
                    echo form_input(['name' => 'nome', 'id' => 'nome', 'class' => 'form-control input-sm']);
                    echo '<br>';
                    echo form_label('Data Nascimento: ');
                    echo form_input(['name' => 'data_nascimento', 'id' => 'data_nascimento', 'class' => 'form-control input-sm datepicker']);
                    echo '<br>';
                    echo form_label('RG: ');
                    echo form_input(['name' => 'rg', 'id' => 'rg', 'class' => 'form-control input-sm']);
                    echo '<br>';
                    echo form_label('CPF: ');
                    echo form_input(['name' => 'cpf', 'id' => 'cpf', 'class' => 'form-control input-sm']);
                    echo '<br>';
                    echo form_label('E-mail: ');
                    echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control input-sm']);
                    echo '<br>';
                    echo form_label('Telefone: ');
                    echo form_input(['name' => 'telefone', 'id' => 'telefone', 'class' => 'form-control input-sm']);
                    echo '<br>';
                    echo form_label('Celular: ');
                    echo form_input(['name' => 'celular', 'id' => 'celular', 'class' => 'form-control input-sm']);
                    echo '<br>';
                    echo form_label('Rua: ');
                    echo form_input(['name' => 'rua', 'id' => 'rua', 'class' => 'form-control input-sm']);
                    echo '<br>';
                    echo form_label('Bairro: ');
                    echo form_input(['name' => 'bairro', 'id' => 'bairro', 'class' => 'form-control input-sm']);
                    echo '<br>';
                    echo form_label('Cidade: ');
                    echo form_input(['name' => 'cidade', 'id' => 'cidade', 'class' => 'form-control input-sm']);
                    echo '<br>';
                    echo form_label('Local de Embarque: ');
                    echo form_input(['name' => 'loc_embarque', 'id' => 'loc_embarque', 'class' => 'form-control input-sm']);
                    echo '<br>';
                    echo form_label('Observação: ');
                    echo form_input(['name' => 'observacao', 'id' => 'observacao', 'class' => 'form-control input-sm']);

                    echo "<br />";
                    echo '<input type="submit" class="btn btn-primary" value="Cadastrar">';
                    //echo '<p>';
                    //echo form_submit('signup_submit','Cadastrar');
                    //echo '</p>';

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
        <script type="text/javascript">
            $(function() {
                $('#cpf').mask('000.000.000-00', {placeholder: "___.___.___-__"});
                $('#telefone').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                $('#celular').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                $('#data_nascimento').mask('00/00/0000', {placeholder: "__/__/____"});
            });
        </script>
    </body>
</html>
