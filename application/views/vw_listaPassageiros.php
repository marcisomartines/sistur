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
    </head>
    <body>

        <!--        <div id="wrapper">-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <table>
                        <tr>
                            <?php
                            $query = $this->db->query("SELECT * FROM tb_reservs
                                                JOIN tb_tour on tb_tour.id_tour=tb_reservs.id_tour
                                                JOIN tb_clients on tb_clients.id_clients=tb_reservs.id_client
                                                JOIN tb_cars on tb_tour.id_car=tb_cars.id_cars
                                                WHERE tb_reservs.id_tour=" . $_GET['id'] . " ORDER BY tb_reservs.nr_poltrona");
                            if ($query->num_rows() > 0) {
                                foreach ($query->result() as $row) {
                                    $result = $row;
                                }
                                $data_saida = implode("/", array_reverse(explode("-", $result->data_saida)));
                            }
                            ?>
                            <td><img src="<?= base_url() ?>img/logo_relatorio.png"></td>
                            <td>Pantanal Sul Turismo (67) 3351-2520 - Campo Grande, MS <br>
                                Destino: <small><?php if (!empty($result->destino_ultv)) echo $result->destino_ultv; ?></small> - Data de Saída: <small><?php if (!empty($data_saida)) echo $data_saida; ?></small><br>
                                Onibus: <small><?php if (!empty($result->codigo)) echo $result->codigo; ?></small><br>
                                Assitanura Responsavel:________________________
                            </td>
                        </tr>
                    </table>
                </div>
            </div><!-- /.row -->

            <table border='1' cellpadding='0' cellspacing='0' width='100%'>
                <thead>
                    <tr>
                        <th width="75px">Nr.</th>
                        <th>Informaçoes</th>                          
                    </tr>
                </thead>
                <?php
                $query = $this->db->query("SELECT tb_reservs.nr_poltrona,tb_clients.nome,tb_clients.celular,tb_clients.loc_embarque as embarquec, tb_reservs.loc_embarque as embarquer,tb_reservs.tipo,tb_clients.rg
                                                FROM tb_reservs
                                                JOIN tb_tour on tb_tour.id_tour=tb_reservs.id_tour
                                                JOIN tb_clients on tb_clients.id_clients=tb_reservs.id_client
                                                JOIN tb_cars on tb_tour.id_car=tb_cars.id_cars
                                                WHERE tb_reservs.id_tour=" . $_GET['id'] . " ORDER BY tb_reservs.nr_poltrona");
                foreach ($query->result() as $row) {
                    ?>
                    <tr>
                        <td><?php if (!empty($row->nr_poltrona)) echo $row->nr_poltrona; ?></td>
                        <td><?php if (!empty($row->nome)) echo $row->nome; ?> / RG:<?php if (!empty($row->rg)) echo $row->rg; ?> / Cel.:<?php if (!empty($row->celular)) echo $row->celular; ?> / Loc. Embarque:<?php if (!empty($row->embarquer)) echo $row->embarquer;
                else if (!empty($row->embarquec)) echo $row->embarquec; ?> <?php if($row->tipo=='i') echo '<span class="badge">IDA</span>'; if($row->tipo=='v') echo '<span class="badge">VOLTA</span>'; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div><!-- /#page-wrapper -->
        <!--        </div> /#wrapper -->
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
