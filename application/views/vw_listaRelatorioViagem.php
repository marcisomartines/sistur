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
                        <li><a href="<?php echo base_url() . "index.php/home/relatorio" ?>"><i class="fa fa-bar-chart-o"></i> Relatórios</a></li>
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
                        <h1>Relatório <small>Viagem</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-calendar"></i> Viagem</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="controls">
                    <?= form_open('home/relatorioListaViagem') ?>
                    <table>
                        <tr>
                            <td><?php
                                $query = $this->db->get('tb_viagem');
                                $opcao[] = '';
                                echo form_label('Destino: ');
                                foreach ($query->result() as $bus) {
                                    $opcao[$bus->id_viagem] = $bus->destino;
                                }
                                ?>
                            </td>
                            <td>                    
                                <?= form_dropdown('id_viagem', $opcao, $this->input->post('id_viagem'), 'class=form-control') ?>
                            </td>
                            <td> <label>Periodo Inicial: </label></td><td><input type="text" id="data_inicio" name="data_inicio" class="form-control input-sm" value="<?= $this->input->post('data_inicio') ?>"></td><td><label for="data_final"> Periodo Final: </label></td><td><input type="text" id="data_final" name="data_final" class="form-control input-sm" value="<?= $this->input->post('data_final') ?>"></td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Gerar Relatório">
                    <?= form_close() ?>
                </div>
                <br>
                <div id="relatorio" class=" row-fluid">
                    <?php
                    $destino = $this->input->post('id_viagem');
                    $data_inicio = implode("-", array_reverse(explode("/", $this->input->post('data_inicio'))));
                    $data_final = implode("-", array_reverse(explode("/", $this->input->post('data_final'))));
                    if (empty($data_final) and empty($destino)) {//busca todo resultado
                        $this->db->select('*');
                        $this->db->from('tb_tour');
                        $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                        $this->db->join('tb_cars', 'tb_cars.id_cars=tb_tour.id_car');
                        $this->db->where('tb_tour.data_saida >=', $data_inicio);
                        $query = $this->db->get();
                    }
                    if (!empty($data_final) and empty($destino)) {//busca todos os destino mas em um periodo
                        $query = $this->db->query("SELECT * FROM tb_tour
                                                JOIN tb_viagem on tb_viagem.id_viagem=tb_tour.id_viagem
                                                JOIN tb_cars on tb_cars.id_cars=tb_tour.id_car
                                                where data_saida BETWEEN '" . $data_inicio . "' AND '" . $data_final . "'");
                        //$query = $this->db->get();
                    }
                    if (empty($data_final) and ! empty($destino)) {//busca um destino mas em um periodo
                        $this->db->select('*');
                        $this->db->from('tb_tour');
                        $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                        $this->db->join('tb_cars', 'tb_cars.id_cars=tb_tour.id_car');
                        $this->db->where('tb_tour.data_saida >=', $data_inicio);
                        $this->db->where('tb_tour.id_viagem', $destino);
                        $query = $this->db->get();
                    }
                    if (!empty($data_final) and ! empty($destino)) {//busca um destino mas em um periodo
                        $query = $this->db->query("SELECT * FROM tb_tour
                                                JOIN tb_viagem on tb_viagem.id_viagem=tb_tour.id_viagem
                                                JOIN tb_cars on tb_cars.id_cars=tb_tour.id_car
                                                where tb_tour.id_viagem=" . $destino . " AND tb_tour.data_saida BETWEEN '" . $data_inicio . "' AND '" . $data_final . "'");
                        //$query = $this->db->get();
                    }
                    ?>
                    <a class="btn btn-primary btn-xs pull-right" href="" onClick="window.open('<?php echo base_url() . "index.php/home/gerarRelatorioViagem?destino=" . $destino ?>&data_inicio=<?= $data_inicio ?>&data_final=<?= $data_final ?>', 'Janela', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=800,left=0,top=0');
                            return false;">Imprimir Relatório</a>
                    <table class="table table-striped">
                        <tr>
                            <th>Cód.</th>
                            <th>Ônibus</th>
                            <th>Data Saída</th>
                            <th>Data Retorno</th>
                            <th>Poltr.</th>
                            <th>Preço</th>
                            <th>Poltronas</th>
                            <th>Alimentação</th>
                            <th>Combustível</th>
                            <th>Outros</th>
                            <th>Frete</th>
                            <th>Total</th>
                            <th>Lista</th>
                        </tr>
                        <?php
                        foreach ($query->result() as $rel) {
                            $data_saida = implode("/", array_reverse(explode("-", $rel->data_saida)));
                            $data_retorno = implode("/", array_reverse(explode("-", $rel->data_retorno)));
                            $this->db->where('id_tour', $rel->id_tour);
                            $p = $this->db->get('tb_reservs');
//                            $poltronas = $p->num_rows();
                            //conta a quantidade de poltronas cheias e somente ida ou volta
                            $poltronas = 0;
                            $polUnica = 0;
                            foreach ($p->result() as $pol) {
                                if ($pol->tipo == 'i' || $pol->tipo == 'v') {
                                    $polUnica++;
                                }
                                if ($pol->tipo == 'd') {
                                    $poltronas++;
                                }
                            }
                            //$rel->total é o frete ganho com a viagem
                            $totalPoltrona=($poltronas * $rel->preco) + ($polUnica * $rel->preco_un);
                            $total = (($poltronas * $rel->preco) + ($polUnica * $rel->preco_un) + $rel->total) - ($rel->alimentacao + $rel->combustivel + $rel->outros);
                            if ($total < 0) {
                                echo '<tr class="danger">';
                            } else {
                                echo "<tr>";
                            }
                            echo "<td>" . $rel->codigo . "</td>";
                            echo "<td>" . $rel->modelo . "</td>";
                            echo "<td>" . $data_saida . "</td>";
                            echo "<td>" . $data_retorno . "</td>";
                            echo "<td>" . $rel->nr_poltrona . "</td>";
                            echo "<td>R$" . $rel->preco . "</td>";
                            echo "<td>R$" . $totalPoltrona . "</td>";
                            echo "<td>R$" . $rel->alimentacao . "</td>";
                            echo "<td>R$" . $rel->combustivel . "</td>";
                            echo "<td>R$" . $rel->outros . "</td>"; //valor do frete
                            echo "<td>R$" . $rel->total . "</td>";
                            echo "<td>R$" . $total . "</td>";
                            echo '<td>';
                            ?><a class="btn btn-primary btn-xs" href="" onClick="window.open('<?php echo base_url() . "index.php/home/listaPassageiros?id=" . $rel->id_tour ?>', 'Janela', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=800,left=0,top=0');
                                        return false;">Lista</a>
                               <?php
                               echo '</td>';
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
