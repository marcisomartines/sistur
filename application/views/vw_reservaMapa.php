<!DOCTYPE html>
<?php
$this->db->where('nome_user', $this->session->userdata('nome'));
$query = $this->db->get('tb_users');
$query = $query->result();
if($query[0]->tipo > 0)
    redirect('/home/guiaLista');
else{
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Marciso Gonzalez Martines">

        <title><?=$query[0]->titulo?></title>
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
                    <a class="navbar-brand" href=""><?=$query[0]->empresa?></a>
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li><a href="<?php echo base_url() . "index.php/home/" ?>"><i class="fa fa-dashboard"></i> Geral</a></li>
                        <li class="active"><a href="<?php echo base_url() . "index.php/home/reserva" ?>"><i class="fa fa-ticket"></i> Reserva</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/cliente" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/agenda" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/orcamento" ?>"><i class="fa fa-file-text-o"></i> Orçamento</a></li>
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
                        <h1>Reserva <small>passagem</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-ticket"></i><a href="<?php echo base_url() . "index.php/home/reserva" ?>"> Reserva</a> / Cadastrar</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="controls">
                    <?php
                    $query = $this->db->query("SELECT * FROM tb_tour
                            JOIN tb_drivers ON tb_drivers.id_drivers=tb_tour.id_motorista
                            JOIN tb_viagem ON tb_tour.id_viagem=tb_viagem.id_viagem
                            JOIN tb_cars ON tb_cars.id_cars=tb_tour.id_car
                            WHERE tb_tour.id_tour=" . $this->input->post('id_tour'));
                    //colocar todo as informações daqui pra baixo
                    foreach ($query->result_array() as $row) {
                        $dados = $row;
                    }
                    $data_saida = implode("/", array_reverse(explode("-", $dados['data_saida'])));
                    $data_retorno = implode("/", array_reverse(explode("-", $dados['data_retorno'])));
                    ?>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-clock-o"></i> Informações</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover table-striped tablesorter">
                                        <tr>
                                            <th width='180px'>Ônibus: </th>
                                            <td><?= $dados['codigo'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Destino: </th>
                                            <td><?= $dados['destino'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Data Saída: </th>
                                            <td align='left'><?= $data_saida ?></td>
                                        </tr>
                                        <tr>
                                            <th>Data Retorno: </th>
                                            <td align='left'><?= $data_retorno ?></td>
                                        </tr>
                                        <tr>
                                            <th>Motorista: </th>
                                            <td><?= $dados['nome'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Preço: </th>
                                            <td>R$<?= $dados['preco'] ?></td>
                                        </tr>
<!--                                        <tr>
                                            <th>Poltronas Disponíveis: </th>
                                            <td><?= $dados['nr_poltrona'] ?></td>
                                        </tr>-->
                                    </table>
                                    <div>
                                        <table class="table table-bordered table-hover table-striped">
                                            <?php
                                            echo form_open('home/cadastroValidacaoReserva');
                                            echo validation_errors();

                                            echo "<tr>";
                                            $query = $this->db->get('tb_clients');
                                            $cliente[] = '';
                                            foreach ($query->result() as $clt) {
                                                $cliente[$clt->id_clients] = $clt->nome;
                                            }
                                            echo "<td width='180px'>" . form_label('Cliente: ') . "</td>";

                                            echo '<td>';
                                            include 'teste.php';
                                            "</td>";
                                            echo '</tr>';
                                            $opcao = array(
                                                'i' => 'Somente Ida',
                                                'v' => 'Somente Volta',
                                                'd' => 'Ida/Volta'
                                            );
                                            echo "<tr>";
                                            echo "<td>" . form_label('Tipo: ') . "</td>";
                                            echo "<td>" . form_dropdown('tipo', $opcao, 'd', 'class=form-control') . "</td>";
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo "<td>" . form_label('Desconto: ') . "</td>";
                                            echo "<td><input type='text' name='desconto' id='desconto' class='form-control input-sm'></td>";
                                            echo "<tr>";
                                            echo "<td>" . form_label('Local de Embarque: ') . "</td>";
                                            echo "<td><input type='text' name='loc_embarque' id='loc_embarque' class='form-control input-sm'></td>";
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo "<td>" . form_label('Nr. Poltrona: ') . "</td>";
                                            echo "<td><input type='text' name='nr_poltrona' id='nr_poltrono' class='form-control input-sm'></td>";
                                            echo "</tr>";
                                            echo form_hidden('id_tour', $this->input->post('id_tour'));
                                            echo form_hidden('ultima_viagem', $dados['data_saida']);
                                            echo form_hidden('destino_ultv', $dados['destino']);

                                            echo "<tr>";
                                            echo "<td colspan='2'>";
                                            echo '<input type="submit" class="btn btn-primary" value="Salvar">';
                                            echo "</td>";
                                            echo '</tr>';
                                            echo form_close();
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-map-marker"></i> Mapa Ônibus<span class="label label-success pull-right">LIVRE</span><span class="label label-warning pull-right">IDA</span><span class="label label-info pull-right">VOLTA</span><span class="label label-danger pull-right">IDA/VOLTA</span></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <?php
                                        if ($dados['nr_poltrona'] == 40)
                                            include 'vw_onibus40.php';
                                        if ($dados['nr_poltrona'] == 42)
                                            include 'vw_onibus42.php';
                                        if ($dados['nr_poltrona'] == 44)
                                            include 'vw_onibus44.php';
                                        if ($dados['nr_poltrona'] == 52)
                                            include 'vw_onibus52.php';
                                        ?>
                                        <table>
                                            <tr>
                                                <td><a class="btn btn-primary" href="" onClick="window.open('<?php echo base_url() . "index.php/home/listaPassageiros?id=" . $this->input->post('id_tour') ?>', 'Janela', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=800,left=0,top=0');
                                                return false;"><i class="fa fa-list"></i> Lista Passageiros</a></td>
                                                <td> <?= form_open('home/fechamentoReserva') ?>
                                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Finalizar Viagem</button>
                                </form></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->
        <!-- JavaScript -->
<!--<script src="<?= base_url() ?>js/jquery-1.10.2.js"></script>-->
        <script type='text/javascript' src="<?= base_url() ?>js/jquery-1.11.1.js"></script>
        <script type='text/javascript' src="<?= base_url() ?>js/bootstrap.js"></script>
        <!-- Page Specific Plugins -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <script src="<?= base_url() ?>js/morris/chart-data-morris.js"></script>
        <script src="<?= base_url() ?>js/tablesorter/jquery.tablesorter.js"></script>
        <script src="<?= base_url() ?>js/tablesorter/tables.js"></script>
        <script type='text/javascript' src="<?= base_url() ?>js/jquery-ui.js"></script>
<!--        <script src="<?= base_url() ?>js/funcao.js"></script>
        
        <script src="<?= base_url() ?>js/jquery.autocomplete.js"></script>
        <script src="<?= base_url() ?>js/jquery.mask.min.js"></script>-->
    </body>
</html>
<?php 
}
?>