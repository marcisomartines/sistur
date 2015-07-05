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
                        <li><a href="<?php echo base_url() . "index.php/home/cliente?pagina=0" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/agenda?pagina=0" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
<!--                        <li><a href="<?php echo base_url() . "index.php/home/orcamento" ?>"><i class="fa fa-file-text-o"></i> Orçamento</a></li>-->
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
                        <h1>Relatório <small>Passagem</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-ticket"></i> Reserva</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="controls">
                    <?= form_open('home/relatorioListaPassagem') ?>
                    <table>
                        <tr>
                            <td><?php
                                $query = $this->db->get('tb_viagem');
                                $opcao2[] = '';
                                echo form_label('Destino: ');
                                foreach ($query->result() as $bus) {
                                    $opcao2[$bus->id_viagem] = $bus->destino;
                                }
                                ?></td>
                            <td>                    
                                <?= form_dropdown('id_viagem', $opcao2, $this->input->post('id_viagem'), 'class=form-control') ?>
                            </td>
                            <td>&nbsp;<?=form_label('Ano:')?></td>
                            <td>
                                <?php
                                //seleciona os anos que possuem lancamentos de reservas
                                    $this->db->select('YEAR(tb_tour.data_saida) as ano');
                                    $this->db->from('tb_tour');
                                    $this->db->group_by('YEAR(tb_tour.data_saida)');
                                    $this->db->order_by('YEAR(tb_tour.data_saida)');
                                    $query=$this->db->get();
                                    $opcao3[]='';
                                    foreach($query->result_array() as $op){
                                        $opcao3[$op['ano']] = $op['ano'];
                                    }
                                    echo form_dropdown('ano',$opcao3,$this->input->post('ano'),'class=form-control id="ano"');
                                ?>
                            </td>
                            <td>
                                <?php
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
                                echo form_label('Mês: ');
                                ?>
                            </td>
                            <td>                    
                                <?= form_dropdown('mes', $opcao, $this->input->post('mes'), 'class=form-control id="mes"') ?>
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
                    $mes = $this->input->post('mes');
                    $ano = $this->input->post('ano');
                    $destino = $this->input->post('id_viagem');
                    if (empty($destino) and empty($ano) and empty($mes)) {//busca todo resultado
                        $this->db->select('*');
                        $this->db->from('tb_tour');
                        $this->db->join('tb_viagem','tb_viagem.id_viagem=tb_tour.id_viagem');
                        $this->db->order_by('tb_tour.data_saida');
                        $query = $this->db->get();
                    }
                    if (!empty($destino) and empty($ano) and empty($mes)) {//busca por destino
                        $this->db->select('*');
                        $this->db->from('tb_tour');
                        $this->db->join('tb_viagem','tb_viagem.id_viagem=tb_tour.id_viagem');
                        $this->db->where('tb_viagem.id_viagem',$destino);
                        $this->db->order_by('tb_tour.data_saida');
                        $query = $this->db->get();
                    }
                    
                    if (empty($destino) and !empty($ano) and empty($mes)) {//busca por ano
                        $this->db->select('*');
                        $this->db->from('tb_tour');
                        $this->db->join('tb_viagem','tb_viagem.id_viagem=tb_tour.id_viagem');
                        $this->db->where('YEAR(tb_tour.data_saida)',$ano);
                        $this->db->order_by('tb_tour.data_saida');
                        $query = $this->db->get();
                    }
                    if (!empty($destino) and !empty($ano) and empty($mes)) {//busca por destino em um ano
                        $this->db->select('*');
                        $this->db->from('tb_tour');
                        $this->db->join('tb_viagem','tb_viagem.id_viagem=tb_tour.id_viagem');
                        $this->db->where('tb_viagem.id_viagem',$destino);
                        $this->db->where('YEAR(tb_tour.data_saida)',$ano);
                        $this->db->order_by('tb_tour.data_saida');
                        $query = $this->db->get();
                    }
                    if (!empty($destino) and !empty($ano) and !empty($mes)) {//busca por um destino em um ano e mes
                        $this->db->select('*');
                        $this->db->from('tb_tour');
                        $this->db->join('tb_viagem','tb_viagem.id_viagem=tb_tour.id_viagem');
                        $this->db->where('tb_viagem.id_viagem',$destino);
                        $this->db->where('MONTH(tb_tour.data_saida)',$mes);
                        $this->db->where('YEAR(tb_tour.data_saida)',$ano);
                        $this->db->order_by('tb_tour.data_saida');
                        $query = $this->db->get();
                    }
                    ?>
                    <a class="btn btn-primary btn-xs pull-right" href="" onClick="window.open('<?php echo base_url() . "index.php/home/gerarRelatorioPassagem?destino=" . $destino ?>&ano=<?=$ano?>&mes=<?=$mes?>', 'Janela', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=800,left=0,top=0');
                                        return false;">Imprimir Relatório</a>
                    <table class="table table-striped">
                        <tr>
                            <th>Data</th>
                            <th>Destino</th>
                            <th>Ida</th>
                            <th>Volta</th>
                            <th>Ida/Volta</th>
                            <th>Total</th>
                            <th>Financeiro</th>
                        </tr>
                        <?php
                        foreach ($query->result() as $rel) {
                            $poltrona=0;
                            $polIda=0;
                            $polVolta=0;
                            $total=0;
                            $this->db->where('id_tour',$rel->id_tour);
                            $res=$this->db->get('tb_reservs');
                            foreach($res->result() as $reserva){
                                if($reserva->tipo == 'd'){//verifica se é ida/volta
                                    $poltrona++;
                                }
                                if($reserva->tipo == 'i'){//verifica se é ida
                                    $polIda++;
                                }
                                if($reserva->tipo == 'v'){//verifica se é volta
                                    $polVolta++;
                                }
                                $total=$poltrona+$polIda+$polVolta;
                            }
                            $data_saida = implode("/", array_reverse(explode("-", $rel->data_saida)));
                            echo "<tr>";
                            echo "<td>" . $data_saida . "</td>";
                            echo "<td>" . $rel->destino . "</td>";
                            echo "<td>" . $polIda . "</td>";
                            echo "<td>" . $polVolta . "</td>";
                            echo "<td>" . $poltrona . "</td>";
                            echo "<td>" . $total . "</td>";
                            ?>
                            <td><a class="btn btn-success" href="" onClick="window.open('<?php echo base_url()."index.php/home/gerarRelatorioPassagemFinanceiro?destino=".$rel->id_tour?>', 'Janela', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=800,left=0,top=0'); return false;">Imprimir Relatório</a></td>
                            <?php
                            echo '</tr>';
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
<?php
}
?>