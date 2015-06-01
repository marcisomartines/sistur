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
                        <li><a href="<?php echo base_url() . "index.php/home/reserva" ?>"><i class="fa fa-ticket"></i> Reserva</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/cliente" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/agenda" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/orcamento" ?>"><i class="fa fa-file-text-o"></i> Orçamento</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/onibus" ?>"><i class="fa fa-truck"></i> Ônibus</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/viagem" ?>"><i class="fa fa-tasks"></i> Destino</a></li>
                        <li class="active"><a href="<?php echo base_url() . "index.php/home/motorista" ?>"><i class="fa fa-car"></i> Motorista</a></li>
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
                        <h1>Motorista <small>Listagem</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-taxi"></i> Motorista</li>
                            <li class="pull-right"><a href="<?php echo base_url() . "index.php/home/motoristaCadastro" ?>" class="btn btn-primary btn-xs" role="button">Novo Motorista</a></li>
                        </ol>
                    </div>
                </div><!-- /.row -->

                <table class="table tablesorter">
                    <thead>
                        <tr>
                            <th>Nome <i class="fa fa-sort"></i></th>
                            <th>E-Mail <i class="fa fa-sort"></i></th>
                            <th>Telefone <i class="fa fa-sort"></i></th>
                            <th>Celular <i class="fa fa-sort"></i></th>
                            <th>Situação <i class="fa fa-sort"></i></th>
                            <th align="center">Ação</th>
                        </tr>
                    </thead>
                    <?php
                    $this->db->order_by("nome", "asc");
                    $query = $this->db->get('tb_drivers');
                    foreach ($query->result() as $row) {
                        ?>
                        <tr>
                            <td><?= $row->nome ?></td>
                            <td><?= $row->email ?></td>
                            <td><?= $row->telefone ?></td>
                            <td><?= $row->celular ?></td>
                            <td><?= ($row->status == 'A' ? "Ativo" : "Inativo") ?></td>
                            <td width='180px'><?= form_open('home/excluirMotorista') ?>
                                <input type="hidden" name="id_drivers" value="<?= $row->id_drivers ?>" />
                                <input type="submit" class="btn btn-danger btn-xs pull-right" value="Excluir">
                                </form><?= form_open('home/editarMotorista') ?>
                                <input type="hidden" name="id_drivers" value="<?= $row->id_drivers ?>" />
                                <input type="submit" class="btn btn-warning btn-xs pull-right" value="Editar">
                                </form><?= form_open('home/detalharMotorista') ?>
                                <input type="hidden" name="id_drivers" value="<?= $row->id_drivers ?>" />
                                <input type="submit" class="btn btn-success btn-xs pull-right" value="Detalhar">
                                </form></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
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
    </body>
</html>
<?php
}
?>