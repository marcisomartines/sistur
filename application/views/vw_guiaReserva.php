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
        <script>
            function valorPago(){
                var valor_pago = document.getElementById("valor_pago");
                var valorpg = document.getElementById("valorpg");
                valorpg.value = valor_pago.value;
            }
        </script>
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
                            <li><a href="<?php echo base_url() . "index.php/home/cliente?pagina=0" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/agenda?pagina=0" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
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
                        <h1>Reserva <small>de passagem</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-ticket"></i><a href="<?php echo base_url() . "index.php/home/guiaLista" ?>"> Guia</a> / Passagem</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="row col-lg-6">
                    <h1>Reserva passageiro</h1>
                    <div class="row">
                            <div class="col-md-2">
                                <?php
                                echo form_open('home/cadastroValidacaoGuiaReserva');
                                echo validation_errors();
                                
                                echo form_label("Nr:");
                                echo form_input(array(
                                    'name'      => 'nr_poltrona',
                                    'id'        => 'nr_poltrona',
                                    'class'     => 'form-control',
                                    'value'     => $this->input->post('nr_poltrona'),
                                    'readonly'  => 'true'
                                ));
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                $query = $this->db->get('tb_clients');
                                            $cliente[] = '';
                                            foreach ($query->result() as $clt) {
                                                $cliente[$clt->id_clients] = $clt->nome;
                                            }
                                echo form_label("Cliente:");
                                include 'teste.php';
                                ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <?php
                                $opcao = array('i' => 'Somente Ida',
                                               'v' => 'Somente Volta',
                                               'd' => 'Ida/Volta'
                                            );
                                echo form_label("Tipo:");
                                echo form_dropdown('tipo', $opcao, 'd', 'class=form-control');
                                ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-8">
                                <?php
                                echo form_label("Local de embarque:");
                                echo form_input(array(
                                    'name'=>'loc_embarque',
                                    'id'=>'loc_embarque',
                                    'class'=>'form-control'
                                ));
                                ?>
                            </div>
                        </div>
                    <br />
                    <div class="col-md-2">
                        <?php
                        echo form_hidden('id_tour', $this->input->post('id_tour'));
                        echo form_button(array(
                            'class' => 'btn btn-primary',
                            'content' => '<i class="fa fa-floppy-o"></i> Salvar',
                            'type' => 'submit'
                        ));
                        echo form_close();
                        ?>  
                    </div>
                    <div class="col-md-2">
                        <?php
                        echo form_open('home/guiaMapa');
                        echo form_hidden('id_tour', $this->input->post('id_tour'));
                        echo form_button(array(
                            'class' => 'btn btn-info',
                            'content' => '<i class="fa fa-arrow-left"></i> Voltar',
                            'type' => 'submit'
                        ));
                        echo form_close();
                        ?>
                    </div>
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
    </body>
</html>