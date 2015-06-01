<?php
$form = array('id' => 'form-login', 'class' => 'form-horizontal', 'role' => 'form');
$usuario = array('name' => 'nome', 'id' => 'nome', 'class' => 'form-control');
$lusuario = array('class' => 'form-control');
$this->db->where('nome_user', $this->session->userdata('nome'));
$query = $this->db->get('tb_users');
$query = $query->result();
if($query[0]->tipo > 0)
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

        <title><?=$query[0]->titulo?></title>

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
                    <a class="navbar-brand" href=""><?=$query[0]->empresa?></a>
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li><a href="<?php echo base_url() . "index.php/home/" ?>"><i class="fa fa-dashboard"></i> Geral</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/reserva" ?>"><i class="fa fa-ticket"></i> Reserva</a></li>
                        <li class="active"><a href="<?php echo base_url() . "index.php/home/cliente" ?>"><i class="fa fa-users "></i> Cliente</a></li>
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
                                <li><<?= form_open('home/editarUsuario') ?>
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
                        <h1>Cliente <small>Editar</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-users"></i><a href="<?php echo base_url() . "index.php/home/cliente" ?>"> Cliente</a> / Editar</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="row">
                    <h3>Editar Cliente</h3>
                    <?php
                    $this->db->where('id_clients', $this->input->post('id_clients'));
                    $query = $this->db->get('tb_clients');
                    foreach ($query->result_array() as $row) {
                        $clienteDados = $row;
                    }
                    if ($clienteDados['tipo_cliente'] == 0) {
                            echo form_open('home/editarValidacaoCliente');

                            echo validation_errors();
                            $data_nascimento = implode("/", array_reverse(explode("-", $clienteDados['data_nascimento'])));
                            $ult_viagem = implode("/", array_reverse(explode("-", $clienteDados['ult_viagem'])));
                            echo "<div class='row'>";
                            echo "<div class='col-md-5'>";
                            echo form_label('Nome: ');
                            echo "<input type='text' name='nome' id='nome' class='form-control input-sm' value='" . $clienteDados['nome'] . "'>";
                            echo '</div>';
                            echo "<div class='col-md-2'>";
                            echo form_label('Data Nasc.: ');
                            echo "<input type='text' name='data_nascimento' id='data_nascimento' class='form-control input-sm' value='" . $data_nascimento . "'>";
                            echo "</div>";
                            echo "<div class='col-md-2'>";
                            echo form_label('RG: ');
                            echo "<input type='text' name='rg' id='rg' class='form-control input-sm' value='" . $clienteDados['rg'] . "'>";
                            echo "</div>";
                            echo "<div class='col-md-2'>";
                            echo form_label('CPF: ');
                            echo "<input type='text' name='cpf' id='cpf' class='form-control input-sm' value='" . $clienteDados['cpf'] . "'>";
                            echo "</div>";
                            echo '</div>';
                            echo "<div class='row'>";
                            echo "<div class='col-md-3'>";
                            echo form_label('E-mail: ');
                            echo "<input type='text' name='email' id='email' class='form-control input-sm' value='" . $clienteDados['email'] . "'>";
                            echo "</div>";
                            echo "<div class='col-md-2'>";
                            echo form_label('Telefone: ');
                            echo "<input type='text' name='telefone' id='telefone' class='form-control input-sm' value='" . $clienteDados['telefone'] . "'>";
                            echo "</div>";
                            echo "<div class='col-md-2'>";
                            echo form_label('Celular: ');
                            echo "<input type='text' name='celular' id='celular' class='form-control input-sm' value='" . $clienteDados['celular'] . "'>";
                            echo "</div>";
                            echo "<div class='col-md-4'>";
                            echo form_label('Rua: ');
                            echo "<input type='text' name='rua' id='rua' class='form-control input-sm' value='" . $clienteDados['rua'] . "'>";
                            echo "</div>";
                            echo '</div>';
                            echo "<div class='row'>";
                            echo "<div class='col-md-3'>";
                            echo form_label('Bairro: ');
                            echo "<input type='text' name='bairro' id='bairro' class='form-control input-sm' value='" . $clienteDados['bairro'] . "'>";
                            echo "</div>";
                            echo "<div class='col-md-2'>";
                            echo form_label('Cidade: ');
                            echo "<input type='text' name='cidade' id='cidade' class='form-control input-sm' value='" . $clienteDados['cidade'] . "'>";
                            echo "</div>";
                            echo "<div class='col-md-3'>";
                            echo form_label('Local de Embarque: ');
                            echo "<input type='text' name='loc_embarque' id='loc_embarque' class='form-control input-sm' value='" . $clienteDados['loc_embarque'] . "'>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='row'>";
                            echo "<div class='col-md-4'>";
                            echo form_label('Última Viagem: ');
                            echo "<input type='text' name='ult_viagem' id='ult_viagem' class='form-control input-sm' value='" . $ult_viagem . "'>";
                            echo "</div>";
                            echo "<div class='col-md-4'>";
                            echo form_label('Observação: ');
                            echo "<input type='text' name='observacao' id='observacao' class='form-control input-sm' value='" . $clienteDados['observacao'] . "'>";
                            echo form_hidden('id_clients', $this->input->post('id_clients'));
                            echo "</div>";
                            echo '</div>';
                            echo '<br>';
                            echo '<input type="submit" class="btn btn-primary" value="Editar">';

                            echo form_close();
                        } else {
                            echo form_open('home/editarValidacaoClienteJuridico');

                            echo validation_errors();
                            echo "<div class='row'>";
                            echo "<div class='col-md-5'>";
                            echo form_label('Razão Social: ');
                            echo "<input type='text' name='nome' id='nome' class='form-control input-sm' value='" . $clienteDados['nome'] . "'>";
                            echo '</div>';
                            echo "<div class='col-md-5'>";
                            echo form_label('Responsável: ');
                            echo "<input type='text' name='responsavel' id='responsavel' class='form-control input-sm' value='" . $clienteDados['responsavel'] . "'>";
                            echo '</div>';
                            echo '</div>';
                            echo "<div class='row'>";
                            echo "<div class='col-md-2'>";
                            echo form_label('CNPJ: ');
                            echo "<input type='text' name='cnpj' id='cnpj' class='form-control input-sm' value='" . $clienteDados['cnpj'] . "'>";
                            echo '</div>';
                            echo "<div class='col-md-3'>";
                            echo form_label('E-mail: ');
                            echo "<input type='text' name='email' id='email' class='form-control input-sm' value='" . $clienteDados['email'] . "'>";
                            echo '</div>';
                            echo "<div class='col-md-2'>";
                            echo form_label('Telefone: ');
                            echo "<input type='text' name='telefonej' id='telefonej' class='form-control input-sm' value='" . $clienteDados['telefone'] . "'>";
                            echo '</div>';
                            echo "<div class='col-md-2'>";
                            echo form_label('Celular: ');
                            echo "<input type='text' name='celularj' id='celularj' class='form-control input-sm' value='" . $clienteDados['celular'] . "'>";
                            echo '</div>';
                            echo '</div>';
                            echo "<div class='row'>";
                            echo "<div class='col-md-4'>";
                            echo form_label('Rua: ');
                            echo "<input type='text' name='rua' id='rua' class='form-control input-sm' value='" . $clienteDados['rua'] . "'>";
                            echo '</div>';
                            echo "<div class='col-md-3'>";
                            echo form_label('Bairro: ');
                            echo "<input type='text' name='bairro' id='bairro' class='form-control input-sm' value='" . $clienteDados['bairro'] . "'>";
                            echo '</div>';
                            echo "<div class='col-md-2'>";
                            echo form_label('Cidade: ');
                            echo "<input type='text' name='cidade' id='cidade' class='form-control input-sm' value='" . $clienteDados['cidade'] . "'>";
                            echo '</div>';
                            echo "</div>";
                            echo "<div class='row'>";
                            echo "<div class='col-md-8'>";
                            echo '<br>';
                            echo form_label('Contatos: ');
                            echo '<br>';
                            echo '</div>';
                            echo "</div>";
                            echo "<div class='row'>";
                            echo "<div class='col-md-4'>";
                            echo form_label('Nome: ');
                            echo "<input type='text' name='contato1' id='contato1' class='form-control input-sm' value='" . $clienteDados['contato1'] . "'>";
                            echo '</div>';
                            echo "<div class='col-md-2'>";
                            echo form_label('Telefone: ');
                            echo "<input type='text' name='cont_tel1' id='cont_tel1' class='form-control input-sm' value='" . $clienteDados['cont_tel1'] . "'>";
                            echo '</div>';
                            echo "<div class='col-md-3'>";
                            echo form_label('E-mail: ');
                            echo "<input type='text' name='cont_email1' id='cont_email1' class='form-control input-sm' value='" . $clienteDados['cont_email1'] . "'>";
                            echo '</div>';
                            echo "</div>";
                            echo "<div class='row'>";
                            echo "<div class='col-md-4'>";
                            echo form_label('Nome: ');
                            echo "<input type='text' name='contato2' id='contato2' class='form-control input-sm' value='" . $clienteDados['contato2'] . "'>";
                            echo '</div>';
                            echo "<div class='col-md-2'>";
                            echo form_label('Telefone: ');
                            echo "<input type='text' name='cont_tel2' id='cont_tel2' class='form-control input-sm' value='" . $clienteDados['cont_tel2'] . "'>";
                            echo '</div>';
                            echo "<div class='col-md-3'>";
                            echo form_label('E-mail: ');
                            echo "<input type='text' name='cont_email2' id='cont_email2' class='form-control input-sm' value='" . $clienteDados['cont_email2'] . "'>";
                            echo '</div>';
                            echo "</div>";
                            echo "<div class='row'>";
                            echo "<div class='col-md-4'>";
                            echo form_label('Nome: ');
                            echo "<input type='text' name='contato3' id='contato3' class='form-control input-sm' value='" . $clienteDados['contato3'] . "'>";
                            echo '</div>';
                            echo "<div class='col-md-2'>";
                            echo form_label('Telefone: ');
                            echo "<input type='text' name='cont_tel3' id='cont_tel3' class='form-control input-sm' value='" . $clienteDados['cont_tel3'] . "'>";
                            echo '</div>';
                            echo "<div class='col-md-3'>";
                            echo form_label('E-mail: ');
                            echo "<input type='text' name='cont_email3' id='cont_email3' class='form-control input-sm' value='" . $clienteDados['cont_email3'] . "'>";
                            echo '</div>';
                            echo "</div>";
                            echo form_hidden('id_clients', $this->input->post('id_clients'));
                            echo "<br>";
                            echo '<input type="submit" class="btn btn-primary" value="Editar">';

                            echo form_close();
                        }
                        ?>
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
        <script src="<?= base_url() ?>js/jquery.mask.min.js"></script>
        <script src="<?= base_url() ?>js/jquery-ui.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#cpf').mask('000.000.000-00', {placeholder: "___.___.___-__"});
                $('#telefone').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                $('#celular').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                $('#data_nascimento').mask('00/00/0000', {placeholder: "__/__/____"});
                $('#cnpj').mask('00.000.000/0000-00', {placeholder: "__.___.___/____-__"});
                $('#telefonej').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                $('#celularj').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                $('#cont_tel1').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                $('#cont_tel2').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                $('#cont_tel3').mask('(00)0000-0000', {placeholder: "(__)____-____"});
            });
        </script>
    </body>
</html>
<?php
}
?>