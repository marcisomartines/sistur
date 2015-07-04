<!DOCTYPE html>
<?php
$this->db->where('nome_user', $this->session->userdata('nome'));
$query = $this->db->get('tb_users');
$query = $query->result();
if ($query[0]->tipo > 0)
    redirect('/home/guiaLista');
else {
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
            <link rel="stylesheet" href="<?= base_url() ?>font-awesome/css/font-awesome.css">
<!--            <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">-->
<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.5.1.css">
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
                            <li class="active"><a href="<?php echo base_url() . "index.php/home/" ?>"><i class="fa fa-dashboard"></i> Geral</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/reserva" ?>"><i class="fa fa-ticket"></i> Reserva</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/cliente?pagina=0" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/agenda?pagina=0" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
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
                            <!--tava aqui-->
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
                            <h1>Principal <small>Visão geral</small></h1>
                            <ol class="breadcrumb">
                                <li class="active"><i class="fa fa-dashboard"></i> Informações gerais</li>
                            </ol>
                            <?php include 'vw_avisoDocumentoOnibus.php'; ?>
                            <?php include 'vw_avisoDocumentoMotorista.php'; ?>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-clock-o"></i> Viagens</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="list-group">
                                        <table class="table table-bordered table-hover table-striped">
                                            <?php
                                            $this->db->select('*');
                                            $this->db->from('tb_tour');
                                            $this->db->join('tb_viagem','tb_tour.id_viagem=tb_viagem.id_viagem');
                                            $this->db->join('tb_cars','tb_cars.id_cars=tb_tour.id_car');
                                            $this->db->where('tb_tour.status','A');
                                            $this->db->where("(tb_tour.tipo='v' OR tb_tour.tipo='t' OR tb_tour.tipo='e' OR tb_tour.tipo='f')");
                                            $this->db->order_by('tb_tour.id_viagem,tb_tour.data_saida','ASC');
                                            $query=$this->db->get();

                                            foreach ($query->result() as $row) {
                                                if(!strpos($row->destino,'PAULO')){
                                                $reserva = 0;
                                                $un_res = 0;
                                                for ($i = 1; $i <= $row->nr_poltrona; $i++) {
                                                    $this->db->where('id_tour', $row->id_tour);
                                                    $this->db->where('nr_poltrona', $i);
                                                    $livre = $this->db->get('tb_reservs');
                                                    if ($livre->num_rows() > 0) {
                                                        foreach ($livre->result() as $livre)
                                                            if ($livre->tipo == 'i' || $livre->tipo == 'v') {
                                                                $un_res++;
                                                                if ($un_res == 2) {
                                                                    $reserva++;
                                                                    $un_res = 0;
                                                                }
                                                            }
                                                        if ($livre->tipo == 'd') {
                                                            $reserva++;
                                                        }
                                                    }
                                                }
                                                $data_saida = implode("/", array_reverse(explode("-", $row->data_saida)));
                                                ?>
                                                <tr>
                                                    <td>
                                                        <!--                                        <a href="#" class="list-group-item">-->
                                                        <i class="fa fa-calendar"></i> <?= $row->destino ?> - <?php
                                                        if ($row->tipo == 'v')
                                                            echo "Viagem";
                                                        elseif ($row->tipo == 'f')
                                                            echo "Fretado";
                                                        elseif ($row->tipo == 't')
                                                            echo "Turismo";
                                                        elseif ($row->tipo == 'e')
                                                            echo "Excursão";
                                                        ?> - <?= $data_saida ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row->nr_poltrona - $reserva > 0) {
                                                            echo form_open('home/reservaMapa') . '<input type="hidden" name="id_tour" value="' . $row->id_tour . '"><input type="submit" class="btn btn-success btn-xs" value="Disponivel"></form>';
                                                        } else {
                                                            echo form_open('home/reservaMapa') . '<input type="hidden" name="id_tour" value="' . $row->id_tour . '"><input type="submit" class="btn btn-danger btn-xs" value="Esgotado"></form>';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <!--                                        </a>-->
                                                <?php
                                                }
                                            }
                                            ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-clock-o"></i> Viagens</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="list-group">
                                        <table class="table table-bordered table-hover table-striped">
                                            <?php
                                            $this->db->select('*');
                                            $this->db->from('tb_tour');
                                            $this->db->join('tb_viagem','tb_tour.id_viagem=tb_viagem.id_viagem');
                                            $this->db->join('tb_cars','tb_cars.id_cars=tb_tour.id_car');
                                            $this->db->where('tb_tour.status','A');
                                            $this->db->where("(tb_tour.tipo='v' OR tb_tour.tipo='t' OR tb_tour.tipo='e' OR tb_tour.tipo='f')");
                                            $this->db->order_by('tb_tour.id_viagem,tb_tour.data_saida','ASC');
                                            $query=$this->db->get();

                                            foreach ($query->result() as $row) {
                                                if(strpos($row->destino,'PAULO')){
                                                $reserva = 0;
                                                $un_res = 0;
                                                for ($i = 1; $i <= $row->nr_poltrona; $i++) {
                                                    $this->db->where('id_tour', $row->id_tour);
                                                    $this->db->where('nr_poltrona', $i);
                                                    $livre = $this->db->get('tb_reservs');
                                                    if ($livre->num_rows() > 0) {
                                                        foreach ($livre->result() as $livre)
                                                            if ($livre->tipo == 'i' || $livre->tipo == 'v') {
                                                                $un_res++;
                                                                if ($un_res == 2) {
                                                                    $reserva++;
                                                                    $un_res = 0;
                                                                }
                                                            }
                                                        if ($livre->tipo == 'd') {
                                                            $reserva++;
                                                        }
                                                    }
                                                }
                                                $data_saida = implode("/", array_reverse(explode("-", $row->data_saida)));
                                                ?>
                                                <tr>
                                                    <td>
                                                        <!--                                        <a href="#" class="list-group-item">-->
                                                        <i class="fa fa-calendar"></i> <?= $row->destino ?> - <?php
                                                        if ($row->tipo == 'v')
                                                            echo "Viagem";
                                                        elseif ($row->tipo == 'f')
                                                            echo "Fretado";
                                                        elseif ($row->tipo == 't')
                                                            echo "Turismo";
                                                        elseif ($row->tipo == 'e')
                                                            echo "Excursão";
                                                        ?> - <?= $data_saida ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row->nr_poltrona - $reserva > 0) {
                                                            echo form_open('home/reservaMapa') . '<input type="hidden" name="id_tour" value="' . $row->id_tour . '"><input type="submit" class="btn btn-success btn-xs" value="Disponivel"></form>';
                                                        } else {
                                                            echo form_open('home/reservaMapa') . '<input type="hidden" name="id_tour" value="' . $row->id_tour . '"><input type="submit" class="btn btn-danger btn-xs" value="Esgotado"></form>';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <!--                                        </a>-->
                                                <?php
                                                }
                                            }
                                            ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Demonstrativo de vendas</h3>
                                </div>
                                <div class="panel-body">
                                    <div id="myfirstchart" style="height: 250px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /#page-wrapper -->
            </div><!-- /#wrapper -->
            <!-- JavaScript -->
            <script src="<?= base_url() ?>js/jquery-1.10.2.js"></script>
            <script src="<?= base_url() ?>js/bootstrap.js"></script>
            <!-- Page Specific Plugins -->
            <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <!--        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>-->
            <script src="http://cdn.oesmith.co.uk/morris-0.5.1.min.js"></script>
            <script src="<?= base_url() ?>js/morris/chart-data-morris.js"></script>
            <script src="<?= base_url() ?>js/tablesorter/jquery.tablesorter.js"></script>
            <script src="<?= base_url() ?>js/tablesorter/tables.js"></script>
            <script type="text/javascript">
            new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'myfirstchart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [<?php
                      $this->db->select('MONTH(tb_tour.data_saida) as mes,COUNT(*) as vendas');
                      $this->db->from('tb_reservs');
                      $this->db->join('tb_tour','tb_tour.id_tour=tb_reservs.id_tour');
                      $this->db->where('YEAR(tb_tour.data_saida)=YEAR(CURDATE())');
                      $this->db->group_by('MONTH(tb_tour.data_saida)');
                      $query=$this->db->get();
                    foreach($query->result() as $graf){
                        echo "{month: '$graf->mes',value: $graf->vendas},";
                    }
                ?>
                    
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'month',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Passagens']
            });
        </script>
        </body>
    </html>
    <?php
}
?>