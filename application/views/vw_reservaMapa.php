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
                                            <tr><!--COMECO DA VERIFICACAO--><?php
                                            $this->db->where('id_tour',$this->input->post('id_tour'));
                                            $this->db->where('nr_poltrona',1);
                                            $query=$this->db->get('tb_reservs');
                                            if($query->num_rows()>0){
                                            ?>
                                                <td class="danger"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="nr_poltrona" value="1" />
                                                    <input type="hidden" name="id_tour" value="<?=$this->input->post('id_tour')?>" />
                                                    <input type="submit" class="btn btn-danger btn-xs pull-right" value="01">
                                                    </form>
                                                </td>
                                                <?php
                                            } else {
                                                ?>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="nr_poltrona" value="1" />
                                                    <input type="hidden" name="id_tour" value="<?=$this->input->post('id_tour')?>" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="01">
                                                    </form>
                                                </td>
                                            <?php  }?>
                                                <!--FIM DA VERIFICACAO-->
                                                <!--COMECO DA VERIFICACAO--><?php
                                            $this->db->where('id_tour',$this->input->post('id_tour'));
                                            $this->db->where('nr_poltrona',2);
                                            $query=$this->db->get('tb_reservs');
                                            if($query->num_rows()>0){
                                            ?>
                                                <td class="danger"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="nr_poltrona" value="2" />
                                                    <input type="hidden" name="id_tour" value="<?=$this->input->post('id_tour')?>" />
                                                    <input type="submit" class="btn btn-danger btn-xs pull-right" value="02">
                                                    </form>
                                                </td>
                                                <?php
                                            } else {
                                                ?>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="nr_poltrona" value="2" />
                                                    <input type="hidden" name="id_tour" value="<?=$this->input->post('id_tour')?>" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="02">
                                                    </form>
                                                </td>
                                            <?php  }?>
                                                <!--FIM DA VERIFICACAO-->
                                                <td rowspan="13" align="center">CORREDOR</td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="4" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="04">
                                                    </form>
                                                </td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="3" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="03">
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="5" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="05">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="6" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="06">
                                                    </form></td>
                                                <td colspan="2" align="center">ESCADA</td>
                                            </tr>
                                            <tr>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="9" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="09">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="10" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="10">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="8" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="08">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="7" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="07">
                                                    </form></td>
                                            </tr>
                                            <tr>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="13" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="13">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="14" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="14">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="12" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="12">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="11" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="11">
                                                    </form></td>
                                            </tr>
                                            <tr>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="17" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="17">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="18" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="18">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="16" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="16">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="15" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="15">
                                                    </form></td>
                                            </tr>
                                            <tr>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="21" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="21">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="22" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="22">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="20" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="20">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="19" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="19">
                                                    </form></td>
                                            </tr>
                                            <tr>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="25" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="25">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="26" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="26">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="24" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="24">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="23" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="23">
                                                    </form></td>
                                            </tr>
                                            <tr>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="29" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="29">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="30" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="30">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="01" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="28">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="01" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="27">
                                                    </form></td>
                                            </tr>
                                            <tr>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="33" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="33">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="34" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="34">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="32" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="32">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="31" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="31">
                                                    </form></td>
                                            </tr>
                                            <tr>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="37" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="37">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="38" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="38">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="36" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="36">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="35" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="35">
                                                    </form></td>
                                            </tr>
                                            <tr>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="41" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="41">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="42" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="42">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="40" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="40">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="39" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="39">
                                                    </form></td>
                                            </tr>
                                            <tr>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="43" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="43">
                                                    </form></td>
                                                <td class="success"><?= form_open('home/editarReserva') ?>
                                                    <input type="hidden" name="id_reservs" value="44" />
                                                    <input type="submit" class="btn btn-success btn-xs pull-right" value="44">
                                                    </form></td>
                                                <td colspan="2" align="center">BANHEIRO</td>
                                            </tr>
                                        </table>
                                        <a class="btn btn-primary" href="" onClick="window.open('<?php echo base_url() . "index.php/home/listaPassageiros?id=".$this->input->post('id_tour') ?>','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=800,left=0,top=0'); return false;"><i class="fa fa-list"></i> Lista Passageiros</a>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-check"></i> Finalizar Viagem</button><!--Modal para fechar a viagem-->
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
                $('#desconto').mask('000000000000000.00', {reverse: true});
            });
        </script>
    </body>
</html>