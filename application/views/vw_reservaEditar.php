<?php
$form = array('id' => 'form-login', 'class' => 'form-horizontal', 'role' => 'form');
$usuario = array('name' => 'nome', 'id' => 'nome', 'class' => 'form-control');
$lusuario = array('class' => 'form-control');
$this->db->where('nome_user', $this->session->userdata('nome'));
$query = $this->db->get('tb_users');
$query = $query->result();
if ($query[0]->tipo > 0)
    redirect('/home/guiaLista');
else {
    ?>
    <!DOCTYPE html>
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
                    <?php
                    $teste = $this->input->post('id_reservs');
                    if (empty($teste)) {
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h1>Reserva <small>passagem</small></h1>
                                <ol class="breadcrumb">
                                    <li class="active"><i class="fa fa-ticket"></i><a href="<?php echo base_url() . "index.php/home/reserva" ?>"> Reserva</a> / Cadastro</li>
                                </ol>
                            </div>
                        </div><!-- /.row -->
                        <div class="row">
                            <h3>Cadastrar Reserva</h3>
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
//                            $data_saida = implode("/", array_reverse(explode("-", $dados['data_saida'])));
//                            $data_retorno = implode("/", array_reverse(explode("-", $dados['data_retorno'])));

                            echo form_open('home/cadastroValidacaoClienteReserva');
                            echo validation_errors();

                            echo "<div class='row'>";
                            echo "<div class='col-md-5'>";
                            echo form_label('Nome: ');
                            echo "<input type='text' name='nome' id='nome' class='form-control input-sm'>";
                            echo '</div>';
                            echo "<div class='col-md-2'>";
                            echo form_label('Data Nasc.: ');
                            echo "<input type='text' name='data_nascimento' id='data_nascimento' class='form-control input-sm'>";
                            echo '</div>';
                            echo "<div class='col-md-2'>";
                            echo form_label('RG: ');
                            echo "<input type='text' name='rg' id='rg' class='form-control input-sm'>";
                            echo '</div>';
                            echo "<div class='col-md-2'>";
                            echo form_label('CPF: ');
                            echo "<input type='text' name='cpf' id='cpf' class='form-control input-sm'>";
                            echo '</div>';
                            echo '</div>';
                            echo "<div class='row'>";
                            echo "<div class='col-md-3'>";
                            echo form_label('E-mail: ');
                            echo "<input type='text' name='email' id='email' class='form-control input-sm'>";
                            echo '</div>';
                            echo "<div class='col-md-2'>";
                            echo form_label('Telefone: ');
                            echo "<input type='text' name='telefone' id='telefone' class='form-control input-sm' value='67 '>";
                            echo '</div>';
                            echo "<div class='col-md-2'>";
                            echo form_label('Celular: ');
                            echo "<input type='text' name='celular' id='celular' class='form-control input-sm' value='67 '>";
                            echo '</div>';
                            echo "<div class='col-md-4'>";
                            echo form_label('Rua: ');
                            echo "<input type='text' name='rua' id='rua' class='form-control input-sm'>";
                            echo '</div>';
                            echo '</div>';
                            echo "<div class='row'>";
                            echo "<div class='col-md-3'>";
                            echo form_label('Bairro: ');
                            echo "<input type='text' name='bairro' id='bairro' class='form-control input-sm'>";
                            echo '</div>';
                            echo "<div class='col-md-2'>";
                            echo form_label('Cidade: ');
                            echo "<input type='text' name='cidade' id='cidade' class='form-control input-sm'>";
                            echo '</div>';
                            echo "<div class='col-md-3'>";
                            echo form_label('Local de Embarque: ');
                            echo "<input type='text' name='loc_embarque' id='loc_embarque' class='form-control input-sm'>";
                            echo '</div>';
                            echo "</div>";
                            echo "<div class='row'>";
                            echo "<div class='col-md-8'>";
                            echo form_label('Observação: ');
                            echo "<input type='text' name='observacao' id='observacao' class='form-control input-sm'>";
                            echo '</div>';
                            echo '</div>';
                            
                            $opcao = array(
                                'i' => 'Somente Ida',
                                'v' => 'Somente Volta',
                                'd' => 'Ida/Volta'
                            );
                            echo "<div class='row'>";
                            echo "<div class='col-md-2'>";
                            echo form_label('Tipo: ');
                            echo form_dropdown('tipo', $opcao, 'd', 'class=form-control');
                            echo "</div>";
                            echo "<div class='col-md-2'>";
                            echo form_label('Desconto: ');
                            echo "<input type='text' name='desconto' id='desconto' class='form-control input-sm'>";
                            echo "</div>";
                            echo "<div class='col-md-2'>";
                            echo form_label('Nr. Poltrona: ');
                            echo "<input type='text' name='nr_poltrona' id='nr_poltrono' class='form-control input-sm' value='" . $this->input->post('nr_poltrona') . "' readonly>";
                            echo "</div>";
                            echo "</div>";
                            echo form_hidden('id_tour', $this->input->post('id_tour'));
                            echo form_hidden('ultima_viagem', $dados['data_saida']);
                            echo form_hidden('destino_ultv', $dados['destino']);
                            echo '<br>';

                            echo '<input type="submit" class="btn btn-primary" value="Reservar">';
                           
                            echo form_close();
                            ?>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h1>Reserva <small>passagem</small></h1>
                                <ol class="breadcrumb">
                                    <li class="active"><i class="fa fa-ticket"></i><a href="<?php echo base_url() . "index.php/home/reserva" ?>"> Reserva</a> / Edição</li>
                                </ol>
                            </div>
                        </div><!-- /.row -->
                        <div class="row col-sm-4">
                            <h1>Editar Reserva</h1>
                            <?php
                            echo form_open('home/editarValidacaoReserva', $form);

                            $this->db->select('tb_reservs.id_reservs , tb_reservs.nr_poltrona,tb_reservs.tipo,tb_reservs.id_tour,
                                        tb_reservs.id_client,tb_reservs.loc_embarque as embarquer,tb_reservs.desconto,
                                        tb_clients.nome, tb_clients.loc_embarque as embarquec');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients', 'tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.id_tour', $this->input->post('id_tour'));
                            $this->db->where('tb_reservs.nr_poltrona', $this->input->post('nr_poltrona'));
                            $this->db->where('tb_reservs.id_reservs', $this->input->post('id_reservs'));
                            $query = $this->db->get();

                            foreach ($query->result() as $row) {
                                $reservaDados = $row;
                            }

                            echo validation_errors();

                            $this->db->order_by('nome');
                            $query = $this->db->get('tb_clients');
                            $cliente[] = '';
                            foreach ($query->result() as $clt) {
                                $cliente[$clt->id_clients] = $clt->nome;
                            }
                            echo form_label('Cliente: ');
                            echo form_dropdown('cliente', $cliente, $reservaDados->id_client, 'class=form-control');
                            echo '<br>';
                            $opcao = array(
                                'i' => 'Somente Ida',
                                'v' => 'Somente Volta',
                                'd' => 'Ida/Volta'
                            );
                            echo form_label('Tipo: ');
                            echo form_dropdown('tipo', $opcao, $reservaDados->tipo, 'class=form-control');
                            echo '<br>';
                            echo form_label('Desconto: ');
                            echo "<td><input type='text' name='desconto' id='desconto' class='form-control input-sm' value='" . $reservaDados->desconto . "'></td>";
                            echo '<br>';
                            echo form_label('Local de Embarque: ');
                            echo "<td><input type='text' name='loc_embarque' id='loc_embarque' class='form-control input-sm' value='" . $reservaDados->embarquer . "'></td>";
                            echo '<br>';
                            echo form_label('Nr. Poltrona: ');
                            echo "<td><input type='text' name='nr_poltrona' id='nr_poltrona' class='form-control input-sm' value='" . $reservaDados->nr_poltrona . "'></td>";

                            echo form_hidden('id_reservs', $reservaDados->id_reservs);
                            echo form_hidden('id_tour', $this->input->post('id_tour'));

                            echo "<br>";
                            echo "<table>";
                            echo "<tr>";
                            echo "<td>";
                            echo '<input type="submit" class="btn btn-primary" value="Editar">';
                            echo form_close();
                            echo "</td>";
                            echo "<td>";
                            echo form_open('home/excluirReserva');
                            ?>
                            <input type="hidden" name="id_reservs" value="<?= $reservaDados->id_reservs ?>" />
                            <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                            <input type="submit" class="btn btn-danger" value="Excluir">
                            </form>
                            </td>
                            </tr>
                            </table>
                            <!--Fim da Panel verde-->
                        </div>
                        <?php
                    }
                    ?>
                    <div id="relatorio" class=" row-fluid"><!--mater isso escondido aqui-->
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
        <script src="<?= base_url() ?>js/jquery.mask.min.js"></script>
        <script src="<?= base_url() ?>js/jquery-ui.js"></script>
            <script type="text/javascript">
                $(function () {
                    $('#cpf').mask('000.000.000-00', {placeholder: "___.___.___-__"});
                    $('#telefone').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                    $('#celular').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                    $('#data_nascimento').mask('00/00/0000', {placeholder: "__/__/____"})
                });
            </script>
        </body>
    </html>
    <?php
}
?>