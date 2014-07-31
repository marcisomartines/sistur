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
                                <td><img src="<?=base_url()?>img/logo_relatorio.png"></td>
                                <td>Pantanal Sul Turismo (67) 3351-2520 - Campo Grande, MS <br>
                                    Destino: <small>Nome do onibus</small> - Data de Saída:<small>27/01/1987</small><br>
                                    Onibus: <small>Scania</small><br>
                                    Assitanura Responsavel:________________________
                                </td>
                            </tr>
                        </table>
                    </div>
                </div><!-- /.row -->

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nr.</th>
                            <th>Informaçoes</th>                          
                        </tr>
                    </thead>
                    <?php
                    $query = $this->db->query("SELECT * FROM tb_reservs
                                                JOIN tb_tour on tb_tour.id_tour=tb_reservs.id_tour
                                                JOIN tb_clients on tb_clients.id_clients=tb_reservs.id_client
                                                WHERE tb_reservs.id_tour=".$_GET['id']." ORDER BY tb_reservs.nr_poltrona");
                    foreach ($query->result() as $row) {
                        $data_nascimento = implode("/", array_reverse(explode("-", $row->data_nascimento)));
                        ?>
                        <tr>
                            <td><?= $row->nr_poltrona ?></td>
                            <td><?= $row->nome ?> / <?= $row->celular ?> / <?= $row->loc_embarque ?></td>
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
