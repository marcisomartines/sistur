<?php
$form = array('id' => 'form-login', 'class' => 'form-horizontal', 'role' => 'form');
$usuario = array('name' => 'nome', 'id' => 'nome', 'class' => 'form-control');
$lusuario = array('class' => 'form-control');
$this->db->where('nome_user', $this->session->userdata('nome'));
$query = $this->db->get('tb_users');
$us = $query->result();
if($us[0]->tipo > 0)
    redirect('/home/guiaLista');
else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Marciso Gonzalez Martines">
        <title><?=$us[0]->titulo?></title>
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
                    <a class="navbar-brand" href=""><?=$us[0]->empresa?></a>
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li><a href="<?php echo base_url() . "index.php/home/" ?>"><i class="fa fa-dashboard"></i> Geral</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/reserva" ?>"><i class="fa fa-ticket"></i> Reserva</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/cliente?pagina=0" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                        <li class="active"><a href="<?php echo base_url() . "index.php/home/agenda?pagina=0" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
<!--                        <li><a href="<?php echo base_url() . "index.php/home/orcamento" ?>"><i class="fa fa-file-text-o"></i> Orçamento</a></li>-->
                        <li><a href="<?php echo base_url() . "index.php/home/onibus" ?>"><i class="fa fa-truck"></i> Ônibus</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/viagem" ?>"><i class="fa fa-tasks"></i> Destino</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/motorista" ?>"><i class="fa fa-car"></i> Motorista</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/guiaLista" ?>"><i class="fa fa-bus"></i> Guia</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/usuario" ?>"><i class="fa fa-user"></i> Usuário</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/relatorio" ?>"><i class="fa fa-bar-chart-o"></i> Relatórios</a></li>
                    </ul>
                    <!-- Menu superior alinhado a direita-->
                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $us[0]->nome_user ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                                <li><?= form_open('home/editarUsuario') ?>
                                <input type="hidden" name="id_users" value="<?=$us[0]->id_users?>" />
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
                        <h1>Agendamento <small>Cadastro</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-calendar"></i><a href="<?php echo base_url() . "index.php/home/agenda" ?>"> Agendamento</a> / Agendamento</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="row">
                    <h3>Agendamento</h3>

                    <?php
                    echo form_open('home/cadastroValidacaoAgenda');
                    echo "<div class='row'>";
                    echo "<div class='col-md-4'>";
                    echo validation_errors();
                    $this->db->where('tipo_cliente',1);
                    $query = $this->db->get('tb_clients');
                    $cliente[] = '';
                    foreach ($query->result() as $clt) {
                        $cliente[$clt->id_clients] = $clt->nome;
                    }
                    echo form_label('Cliente: ');
                    echo form_dropdown('id_client', $cliente, 'v', 'class=form-control');
                    echo '</div>';
                    echo "<div class='col-md-2'>";
                    $this->db->where('status', 'A');
                    $query = $this->db->get('tb_cars');
                    $opcao[] = '';
                    foreach ($query->result() as $bus) {
                        $opcao[$bus->id_cars] = $bus->codigo . ' - ' . $bus->modelo;
                    }
                    echo form_label('Ônibus: ');
                    echo form_dropdown('id_car', $opcao, 'v', 'class=form-control');
                    echo '</div>';
                    $opcao = array(
                        'v' => 'Viagem',
                        'f' => 'Fretamento',
                        't' => 'Turismo',
                        'e' => 'Escursão'
                    );
                    echo "<div class='col-md-2'>";
                    echo form_label('Tipo: ');
                    echo form_dropdown('tipo', $opcao, 'v', 'class=form-control');
                    echo '</div>';
                    $query = $this->db->get('tb_viagem');
                    $viagem[] = '';
                    foreach ($query->result() as $vig) {
                        $viagem[$vig->id_viagem] = $vig->destino;
                    }
                    echo "<div class='col-md-3'>";
                    echo form_label('Destino: ');
                    echo form_dropdown('id_viagem', $viagem, 'v', 'class=form-control');
                    echo '</div>';
                    echo '</div>';//inicio de uma nova linha
                    echo "<div class='row'>";
                    echo "<div class='col-md-2'>";
                    echo form_label('Data Saida: ');
                    echo "<input type='text' name='data_saida' id='data_saida' class='form-control input-sm'>";
                    echo '</div>';
                    echo "<div class='col-md-2'>";
                    echo form_label('Data Retorno: ');
                    echo "<input type='text' name='data_retorno' id='data_retorno' class='form-control input-sm'>";
                    echo '</div>';
                    $this->db->where('status', 'A');
                    $query = $this->db->get('tb_drivers');
                    $opcao2[] = '';
                    foreach ($query->result() as $driver) {
                        $opcao2[$driver->id_drivers] = $driver->nome;
                    }
                    echo "<div class='col-md-3'>";
                    echo form_label('Motorista: ');
                    echo form_dropdown('id_motorista', $opcao2, 'v', 'class=form-control');
                    echo '</div>';
                    echo "<div class='col-md-1'>";
                    echo form_label('Preço: ');
                    echo "<input type='text' name='preco' id='preco' class='form-control input-sm'>";
                    echo '</div>';
                    echo "<div class='col-md-1'>";
                    echo form_label('Preço Un.: ');
                    echo "<input type='text' name='preco_un' id='preco_un' class='form-control input-sm'>";
                    echo '</div>';
                    echo '</div>';
                    echo "<div class='row'>";
                    echo "<div class='col-md-8'>";
                    echo form_label('Observação: ');
                    echo "<input type='text' name='observacao' id='observacao' class='form-control input-sm'>";
                    echo form_hidden('id_user', $us[0]->id_users);
                    echo "</div>";
                    echo '</div>';
                    echo '<br>';
                    echo '<input type="submit" class="btn btn-primary" value="Cadastrar">';

                    echo form_close();
                    ?>
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
<?php
}
?>
