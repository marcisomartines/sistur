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
                        <h1>Relatório <small>Cliente</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-ticket"></i> Reserva</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="controls">
                    <?=form_open('home/relatorioListaCliente')?>
                    <table>
                        <tr>
                            <td><?php
                                $query = $this->db->get('tb_clients');
                                $opcao[] = '';
                                echo form_label('Cliente: ');
                                ?>
                            </td>
                            <td>                    
                                <select name="id_client" id="id_client" class="form-control input-sm">
                                    <?php
                                    foreach ($query->result() as $bus) {
                                        echo "<option value=" . $bus->id_clients . ">" . $bus->nome . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td> <label>Periodo Inicial: </label></td><td><input type="text" id="data_inicio" name="data_inicio" class="form-control input-sm" value="<?=$this->input->post('data_inicio')?>"></td><td><label for="data_final"> Periodo Final: </label></td><td><input type="text" id="data_final" name="data_final" class="form-control input-sm" value="<?=$this->input->post('data_final')?>"></td>
                            <td><?php
                                $query = $this->db->get('tb_viagem');
                                $opcao[] = '';
                                echo form_label('Destino: ');
                                ?></td>
                            <td>                    
                                <select name="id_viagem" id="id_viagem" name="id_viagem" class="form-control input-sm">
                                    <?php
                                    foreach ($query->result() as $bus) {
                                        echo "<option value=" . $bus->id_viagem . ">" . $bus->destino . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Gerar Relatório">
                    <?= form_close() ?>
                </div>
                <br>
                <div id="relatorio" class=" row-fluid">
                    <?php
                    $cliente = $this->input->post('id_client');
                    $data_inicio = implode("-", array_reverse(explode("/", $this->input->post('data_saida'))));
                    $data_final = implode("-", array_reverse(explode("/", $this->input->post('data_final'))));
                    $destino = $this->input->post('id_viagem');
                    if (empty($data_final) and empty($destino)) {//busca todo resultado
                        $this->db->select('*');
                        $this->db->from('tb_clients');
                        $this->db->join('tb_reservs', 'tb_reservs.id_client=tb_clients.id_clients');
                        $this->db->join('tb_tour', 'tb_tour.id_tour=tb_reservs.id_tour');
                        $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                        $this->db->where('tb_clients.id_clients', $cliente);
                        $this->db->where('tb_tour.data_saida >', $data_inicio);
                        $query = $this->db->get();
                    }
                    if (!empty($data_final) and empty($destino)) {//busca todos os destino mas em um periodo
                        $query=$this->db->query("SELECT * FROM tb_clients
                                        JOIN tb_reservs on tb_reservs.id_client=tb_clients.id_clients
                                        JOIN tb_tour on tb_tour.id_tour=tb_reservs.id_tour
                                        JOIN tb_viagem on tb_viagem.id_viagem=tb_tour.id_viagem
                                        WHERE tb_clients.id_clients=".$cliente." AND tb_tour.data_saida BETWEEN '" . $data_inicio . "' AND '" . $data_final . "'");
                        //$query = $this->db->get();
                    }
                    if (empty($data_final) and ! empty($destino)) {//busca um destino mas em um periodo
                        $this->db->select('*');
                        $this->db->from('tb_clients');
                        $this->db->join('tb_reservs', 'tb_reservs.id_client=tb_clients.id_clients');
                        $this->db->join('tb_tour', 'tb_tour.id_tour=tb_reservs.id_tour');
                        $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                        $this->db->where('tb_clients.id_clients', $cliente);
                        $this->db->where('tb_tour.data_saida >', $data_inicio);
                        $this->db->where('tb_tour.id_viagem', $destino);
                        $query = $this->db->get();
                    }
                    if (!empty($data_final) and ! empty($destino)) {//busca um destino mas em um periodo
                        $query=$this->db->query("SELECT * FROM tb_clients
                                        JOIN tb_reservs on tb_reservs.id_client=tb_clients.id_clients
                                        JOIN tb_tour on tb_tour.id_tour=tb_reservs.id_tour
                                        JOIN tb_viagem on tb_viagem.id_viagem=tb_tour.id_viagem
                                        WHERE tb_clients.id_clients=".$cliente." AND tb_tour.id_viagem=".$destino." AND tb_tour.data_saida BETWEEN '" . $data_inicio . "' AND '" . $data_final . "'");
                        //$query = $this->db->get();
                    }
                    ?>

                    <table class="table table-striped">
                        <tr>
                            <th>Destino</th>
                            <th>Data</th>
                            <th>Valor</th>
                        </tr>
                        <?php
                        foreach ($query->result() as $rel) {
                            $data_saida = implode("/", array_reverse(explode("-", $rel->data_saida)));
                            echo "<tr>";
                            echo "<td>" . $rel->destino . "</td>";
                            echo "<td>" . $data_saida . "</td>";
                            echo "<td>" . $rel->preco . "</td>";
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
        <script>
            $(function() {
                $("#data_inicio").datepicker({
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
                $("#data_final").datepicker({
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
