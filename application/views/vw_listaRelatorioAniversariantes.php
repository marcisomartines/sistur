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
                        <li><a href="<?php echo base_url() . "index.php/home/motorista" ?>"><i class="fa fa-car"></i> Motorista</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/usuario" ?>"><i class="fa fa-user"></i> Usuário</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown"><i class="fa fa-bar-chart-o"></i> Relatórios <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url() . "index.php/home/relatorioCliente" ?>"> Clientes</a></li>
                                <li><a href="<?php echo base_url() . "index.php/home/relatorioOnibus" ?>"> Ônibus</a></li>
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
                        <h1>Aniversariantes <small>Cliente</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-gift"></i> Aniversariantes</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="controls">
                    <?=form_open('home/listaAniversariantes')?>
                    <table>
                        <tr>
                            <td><?php
                                $query = $this->db->get('tb_clients');
                                $opcao[] = '';
                                $opcao[1] = 'Janeiro';
                                $opcao[2] = 'Fevereiro';
                                $opcao[3] = 'Março';
                                $opcao[4] = 'Abril';
                                $opcao[5] = 'Maio';
                                $opcao[6] = 'Junho';
                                $opcao[7] = 'Julho';
                                $opcao[8] = 'Agosto';
                                $opcao[9] = 'Setembro';
                                $opcao[10] = 'Outubro';
                                $opcao[11] = 'Novembro';
                                $opcao[12] = 'Dezembro';
                                echo form_label('Selecione o Mês: ');
                                ?>
                            </td>
                            <td>                    
                                <?= form_dropdown('mes', $opcao, $this->input->post('mes'), 'class=form-control') ?>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Listar">
                    <?=form_close()?>
                </div>
                <div id="relatorio" class=" row-fluid">
                    <?php
                        $query=$this->db->query("SELECT * FROM tb_clients WHERE Month(data_nascimento)=".$this->input->post('mes'));
                    ?>
                    <a class="btn btn-primary btn-xs pull-right" href="" onClick="window.open('<?php echo base_url() . "index.php/home/gerarRelatorioCliente?mes=" . $this->input->post('mes') ?>', 'Janela', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=800,left=0,top=0');
                                        return false;">Imprimir Relatório</a>
                    <table class="table table-striped">
                        <tr>
                            <th>Nome</th>
                            <th>Data</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                            <th>Tel.</th>
                            <th>Cel.</th>
                            <th>Endereço</th>
                        </tr>
                        <?php
                        foreach ($query->result() as $rel) {
                            $data_nascimento = implode("/", array_reverse(explode("-", $rel->data_nascimento)));
                            echo "<tr>";
                            echo "<td>".$rel->nome."</td>";
                            echo "<td>" . $data_nascimento . "</td>";
                            echo "<td>".$rel->rg."</td>";
                            echo "<td>".$rel->cpf."</td>";
                            echo "<td>".$rel->email."</td>";
                            echo "<td>".$rel->telefone."</td>";
                            echo "<td>".$rel->celular."</td>";
                            echo "<td>" . $rel->rua .", ".$rua->bairro." - ".$rel->cidade."</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
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
        <script src="<?= base_url() ?>js/jquery.mask.min.js"></script>
        <script src="<?= base_url() ?>js/jquery-ui.js"></script>
    </body>
</html>