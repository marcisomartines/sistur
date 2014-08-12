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
                        <li><a href="<?php echo base_url() . "index.php/home/agenda" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/onibus" ?>"><i class="fa fa-truck"></i> Ônibus</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/viagem" ?>"><i class="fa fa-tasks"></i> Destino</a></li>
                        <li class="active"><a href="<?php echo base_url() . "index.php/home/motorista" ?>"><i class="fa fa-car"></i> Motorista</a></li>
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
                        <h1>Motorista <small>Edição</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-car"></i><a href="<?php echo base_url() . "index.php/home/motorista" ?>"> Motorista</a> / Edição</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="row col-sm-4">
                    <h3>Editar Motorista</h3>
                    <?php
                    echo form_open('home/editarValidacaoMotorista');
                    $this->db->where('id_drivers', $this->input->post('id_drivers'));
                    $query = $this->db->get('tb_drivers');
                    foreach ($query->result_array() as $row) {
                        $motoristaDados = $row;
                    }
                    echo validation_errors();
                    $data_nascimento = implode("/", array_reverse(explode("-", $motoristaDados['data_nascimento'])));
                    $validade_cnh = implode("/", array_reverse(explode("-", $motoristaDados['validade_cnh'])));
                    echo form_label('Nome: ');
                    echo "<td><input type='text' name='nome' id='nome' class='form-control input-sm' value='".$motoristaDados['nome']."'></td>";
                    echo '<br>';
                    echo form_label('Data Nascimento: ');
                    echo "<td><input type='text' name='data_nascimento' id='data_nascimento' class='form-control input-sm' value='".$data_nascimento."'></td>";
                    echo '<br>';
                    echo form_label('RG: ');
                    echo "<td><input type='text' name='rg' id='rg' class='form-control input-sm' value='".$motoristaDados['rg']."'></td>";
                    echo '<br>';
                    echo form_label('CPF: ');
                    echo "<td><input type='text' name='cpf' id='cpf' class='form-control input-sm' value='".$motoristaDados['cpf']."'></td>";
                    echo '<br>';
                    echo form_label('CNH: ');
                    echo "<td><input type='text' name='cnh' id='cnh' class='form-control input-sm' value='".$motoristaDados['cnh']."'></td>";
                    echo '<br>';
                    echo form_label('Validade CNH: ');
                    echo "<td><input type='text' name='validade_cnh' id='validade_cnh' class='form-control input-sm' value='".$validade_cnh."'></td>";
                    echo '<br>';
                    echo form_label('E-mail: ');
                    echo "<td><input type='text' name='email' id='email' class='form-control input-sm' value='".$motoristaDados['email']."'></td>";
                    echo '<br>';
                    echo form_label('Telefone: ');
                    echo "<td><input type='text' name='telefone' id='telefone' class='form-control input-sm' value='".$motoristaDados['telefone']."'></td>";
                    echo '<br>';
                    echo form_label('Celular: ');
                    echo "<td><input type='text' name='celular' id='celular' class='form-control input-sm' value='".$motoristaDados['celular']."'></td>";
                    echo '<br>';
                    echo form_label('Rua: ');
                    echo "<td><input type='text' name='rua' id='rua' class='form-control input-sm' value='".$motoristaDados['rua']."'></td>";
                    echo '<br>';
                    echo form_label('Bairro: ');
                    echo "<td><input type='text' name='bairro' id='bairro' class='form-control input-sm' value='".$motoristaDados['bairro']."'></td>";
                    echo '<br>';
                    echo form_label('Cidade: ');
                    echo "<td><input type='text' name='cidade' id='cidade' class='form-control input-sm' value='".$motoristaDados['cidade']."'></td>";
                    echo '<br>';
                    echo form_label('Observação: ');
                    echo "<td><input type='text' name='observacao' id='observacao' class='form-control input-sm' value='".$motoristaDados['observacao']."'></td>";
                    echo '<br>';
                    $ativo = array(
                        'name' => 'status',
                        'id' => 'status',
                        'value' => 'A',
                        'checked' => ($motoristaDados['status'] == 'A' ? TRUE : FALSE),
                    );
                    $inativo = array(
                        'name' => 'status',
                        'id' => 'status',
                        'value' => 'I',
                        'checked' => ($motoristaDados['status'] == 'A' ? FALSE : TRUE),
                    );
                    echo form_label('Situação: ');
                    echo "Ativo " . form_radio($ativo);
                    echo " Inativo " . form_radio($inativo);

                    echo form_hidden('id_drivers', $this->input->post('id_drivers'));

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
        <script src="<?= base_url() ?>js/jquery-ui.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#cpf').mask('000.000.000-00', {placeholder: "___.___.___-__"});
                $('#telefone').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                $('#celular').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                $('#data_nascimento').mask('00/00/0000', {placeholder: "__/__/____"});
                $('#validade_cnh').mask('00/00/0000', {placeholder: "__/__/____"});
            });
        </script>
    </body>
</html>
