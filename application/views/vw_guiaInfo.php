<?php
$form = array('id' => 'form-login', 'class' => 'form-horizontal', 'role' => 'form');
$usuario = array('name' => 'nome', 'id' => 'nome', 'class' => 'form-control');
$lusuario = array('class' => 'form-control');
$this->db->where('nome_user', $this->session->userdata('nome'));
$query = $this->db->get('tb_users');
$query = $query->result();
?>
<!DOCTYPE html>
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
                        <h1>Informações <small>passagem</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-ticket"></i><a href="<?php echo base_url() . "index.php/home/reserva" ?>"> Reserva</a> / Informações</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="row col-sm-4">
                    <h1>Informações passageiro</h1>
                    <?php
                    $this->db->select('tb_reservs.id_reservs , tb_reservs.nr_poltrona,tb_reservs.tipo,tb_reservs.id_tour,
                                        tb_reservs.id_client,tb_reservs.loc_embarque as embarquer,tb_reservs.desconto,
                                        tb_clients.nome,tb_clients.rg,tb_clients.cpf,tb_clients.telefone,tb_clients.celular, tb_clients.loc_embarque as embarquec');
                    $this->db->from('tb_reservs');
                    $this->db->join('tb_clients', 'tb_clients.id_clients=tb_reservs.id_client');
                    $this->db->where('tb_reservs.id_tour', $this->input->post('id_tour'));
                    $this->db->where('tb_reservs.nr_poltrona', $this->input->post('nr_poltrona'));
                    $this->db->where('tb_reservs.id_reservs', $this->input->post('id_reservs'));
                    $query = $this->db->get();

                    foreach ($query->result() as $row) {
                        $reservaDados = $row;
                    }
                    ?>
                    <table class="table table-striped">
                        <tr>
                            <th>Nº Poltrona: </th>
                            <td><?= $this->input->post('nr_poltrona') ?></td>
                        </tr>
                        <tr>
                            <th>Nome: </th>
                            <td><?= $reservaDados->nome ?></td>
                        </tr>
                        <tr>
                            <th>RG: </th>
                            <td><?= $reservaDados->rg ?></td>
                        </tr>
                        <tr>
                            <th>CPF: </th>
                            <td><?= $reservaDados->cpf ?></td>
                        </tr>
                        <tr>
                            <th>Telefone: </th>
                            <td><?= $reservaDados->telefone ?></td>
                        </tr>
                        <tr>
                            <th>Celular: </th>
                            <td><?= $reservaDados->celular ?></td>
                        </tr>
                        <tr>
                            <th>Local de Embarque: </th>
                            <td><?= $reservaDados->embarquer ?></td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-md-2">
                            <?php
                            echo form_open('home/guiaMapa');
                            echo form_hidden('id_tour', $this->input->post('id_tour'));
                            echo form_button(array(
                                'class' => 'btn btn-info',
                                'content' => 'Voltar',
                                'type' => 'submit'
                            ));
                            echo form_close();
                            ?>
                        </div>
                        <div class="col-md-3">
                            <?php
                            echo form_open('home/confirmaPresenca');
                            echo form_hidden('id_tour', $this->input->post('id_tour'));
                            echo form_hidden('nr_poltrona',$this->input->post('nr_poltrona'));
                            echo form_button(array(
                                'class'     =>'btn btn-success',
                                'content'   =>'<i class="fa fa-check"></i> Presente',
                                'type'      =>'submit'
                            ));
                            echo form_close();
                            ?>
                        </div>
                        
                        <div class="col-md-3">
                            <?php
                            echo form_open('home/confirmaAusencia');
                            echo form_hidden('id_tour',$this->input->post('id_tour'));
                            echo form_hidden('nr_poltrona',$this->input->post('nr_poltrona'));
                            echo form_button(array(
                                'class'     => 'btn btn-danger',
                                'content'   => '<i class="fa fa-bus"></i> Ausente',
                                'type'      => 'submit'
                            ));
                            echo form_close();
                            ?>  
                        </div>
                    </div>
                    
                    <!--Fim da Panel verde-->
                </div>
                <div id="relatorio" class=" row-fluid"><!--mater isso escondido aqui-->
                    <!--reserva vai ser colocada aqui-->
                </div>
            </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->
        <!-- JavaScript -->
<!--            <script src="<?= base_url() ?>js/jquery-1.10.2.js"></script>
        <script src="<?= base_url() ?>js/bootstrap.js"></script>-->
        <!-- Page Specific Plugins -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <script src="<?= base_url() ?>js/morris/chart-data-morris.js"></script>
        <script src="<?= base_url() ?>js/tablesorter/jquery.tablesorter.js"></script>
        <script src="<?= base_url() ?>js/tablesorter/tables.js"></script>
    </body>
</html>