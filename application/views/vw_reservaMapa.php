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
                                            <td><?= $dados['modelo'] ?></td>
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
                                            echo "<td width='180px'>" . form_label('Cliente: ') . "</td>";
                                            echo "<td>" . form_input(['name' => 'cliente', 'id' => 'cliente', 'class' => 'form-control input-sm']) . "</td>";
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
                                            echo "<td>" . form_input(['name' => 'desconto', 'id' => 'desconto', 'class' => 'form-control input-sm datepicker']) . "</td>";
                                            echo "<tr>";
                                            echo "<td>" . form_label('Local de Embarque: ') . "</td>";
                                            echo "<td>" . form_input(['name' => 'loc_embarque', 'id' => 'loc_embarque', 'class' => 'form-control input-sm']) . "</td>";
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo "<td>" . form_label('Nr. Poltrona: ') . "</td>";
                                            echo "<td>" . form_input(['name' => 'nr_poltrona', 'id' => 'nr_poltrona', 'class' => 'form-control input-sm']) . "</td>";
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
                                    <h3 class="panel-title"><i class="fa fa-map-marker"></i> Mapa Ônibus</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped tablesorter">
                                            <tr>
                                                <td class="success">01</td>
                                                <td class="success">02</td>
                                                <td rowspan="13" align="center">CORREDOR</td>
                                                <td class="success">04</td>
                                                <td class="success">03</td>
                                            </tr>
                                            <tr>
                                                <td class="success">05</td>
                                                <td class="success">06</td>
                                                <td colspan="2" align="center">ESCADA</td>
                                            </tr>
                                            <tr>
                                                <td class="success">09</td>
                                                <td class="success">10</td>
                                                <td class="success">08</td>
                                                <td class="success">07</td>
                                            </tr>
                                            <tr>
                                                <td class="success">13</td>
                                                <td class="success">14</td>
                                                <td class="success">12</td>
                                                <td class="success">11</td>
                                            </tr>
                                            <tr>
                                                <td class="success">17</td>
                                                <td class="success">18</td>
                                                <td class="success">16</td>
                                                <td class="success">15</td>
                                            </tr>
                                            <tr>
                                                <td class="success">21</td>
                                                <td class="success">22</td>
                                                <td class="success">20</td>
                                                <td class="success">19</td>
                                            </tr>
                                            <tr>
                                                <td class="success">25</td>
                                                <td class="success">26</td>
                                                <td class="success">24</td>
                                                <td class="success">23</td>
                                            </tr>
                                            <tr>
                                                <td class="success">29</td>
                                                <td class="success">30</td>
                                                <td class="success">28</td>
                                                <td class="success">27</td>
                                            </tr>
                                            <tr>
                                                <td class="success">33</td>
                                                <td class="success">34</td>
                                                <td class="success">32</td>
                                                <td class="success">31</td>
                                            </tr>
                                            <tr>
                                                <td class="success">37</td>
                                                <td class="success">38</td>
                                                <td class="success">36</td>
                                                <td class="success">35</td>
                                            </tr>
                                            <tr>
                                                <td class="success">41</td>
                                                <td class="success">42</td>
                                                <td class="success">40</td>
                                                <td class="success">39</td>
                                            </tr>
                                            <tr>
                                                <td class="success">43</td>
                                                <td class="success">44</td>
                                                <td colspan="2" align="center">BANHEIRO</td>
                                            </tr>
                                        </table>
                                        <button type="button" class="btn btn-primary"><i class="fa fa-list"></i> Lista Passageiros</button> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-check"></i> Finalizar Viagem</button><!--Modal para fechar a viagem-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Gastos com a Viagem</h4>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    echo form_open('home/cadastroValidacaoGastosViagem');

                                    echo validation_errors();

                                    echo form_label('Combustivel: ');
                                    echo form_input(['name' => 'combustivel', 'id' => 'combustivel', 'class' => 'form-control input-sm calc']);
                                    echo '<br>';

                                    echo form_label('Alimentação: ');
                                    echo form_input(['name' => 'alimentacao', 'id' => 'alimentacao', 'class' => 'form-control input-sm calc']);
                                    echo '<br>';
                                    echo form_label('Outros: ');
                                    echo form_input(['name' => 'outros', 'id' => 'outros', 'class' => 'form-control input-sm calc']);
                                    echo '<br>';
                                    echo form_label('Total: ');
                                    echo form_input(['name' => 'total', 'id' => 'total', 'class' => 'form-control input-sm result']);
                                    echo '<br>';
                                    echo form_hidden('id_tour', $this->input->post('id_tour'));
                                    echo "<br />";
                                    echo '<input type="submit" class="btn btn-primary" value="Salvar">';
                                    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>';
                                    echo form_close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--aqui termina as tabelas-->
                    <!-- Modal -->
                    <script src="http://localhost/sistur/js/jquery-ui.js"></script>
                    <script src="<?= base_url() ?>js/jquery.autocomplete.js"></script>
                    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
                    <script type="text/javascript">
                    $(document).ready(function() {
                        //Quando o valor do campo mudar...
                        $('.calc').change(function() {
                            var combustivel = parseFloat($('#combustivel').val()) || 0.0;
                            var alimentacao = parseFloat($('#alimentacao').val()) || 0.0;
                            var outros = parseFloat($('#outros').val()) || 0.0;

                            var total = alimentacao + combustivel + outros;

                            $('#total').val(total);
                        });
                    });
                    </script>
                </div>
                <div id="relatorio" class=" row-fluid">
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
            });
        </script>
    </body>
</html>