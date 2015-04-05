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
    <?php
    $cliente=$_GET['cliente'];
    $destino = $_GET['destino'];
    $data_inicio2 = implode("/", array_reverse(explode("-", $_GET['data_inicio'])));
    $data_final2 = implode("/", array_reverse(explode("-", $_GET['data_final'])));
    if($destino>0){
        $this->db->where('id_viagem',$destino);
        $query=$this->db->get('tb_viagem');
        foreach($query->result() as $des){
            $cidade=$des;
        }
    } else{
        $cidade='Todos';
    }
    if($cliente>0){
        $this->db->where('id_clients',$cliente);
        $query=$this->db->get('tb_clients');
        foreach($query->result() as $cli){
            $nome=$cli;
        }
    }else {
        $nome='Todos';
    }
    ?>
    <body>
        <!--        <div id="wrapper">-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <table border='1' cellpadding='0' cellspacing='0' width='100%'>
                        <tr>
                            <td align='center'><strong>Demonstrativo de Cliente</strong></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td align='right'><strong>Cliente: </strong> <?php if(empty($nome->nome)) echo $nome; else echo $nome->nome; ?> <strong>Período: </strong><?= $data_inicio2 ?> à <?= $data_final2 ?> <strong>Destino: </strong>  <?php if(empty($cidade->destino)) echo $cidade; else echo $cidade->destino; ?></td>
                        </tr>
                    </table>
                </div>
            </div><!-- /.row -->
            <?php
                    $data_inicio = implode("-", array_reverse(explode("/", $_GET['data_inicio'])));
                    $data_final = implode("-", array_reverse(explode("/", $_GET['data_final'])));
                    if (empty($data_final) and empty($destino) and empty($cliente)) {//busca todo resultado
                        $this->db->select('*');
                        $this->db->from('tb_clients');
                        $this->db->join('tb_reservs', 'tb_reservs.id_client=tb_clients.id_clients');
                        $this->db->join('tb_tour', 'tb_tour.id_tour=tb_reservs.id_tour');
                        $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                        //$this->db->where('tb_clients.id_clients', $cliente);
                        $this->db->where('tb_tour.data_saida >', $data_inicio);
                        $query = $this->db->get();
                    }
                     if (empty($data_final) and !empty($destino) and !empty($cliente)) {//busca todo resultado
                        $this->db->select('*');
                        $this->db->from('tb_clients');
                        $this->db->join('tb_reservs', 'tb_reservs.id_client=tb_clients.id_clients');
                        $this->db->join('tb_tour', 'tb_tour.id_tour=tb_reservs.id_tour');
                        $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                        $this->db->where('tb_clients.id_clients', $cliente);
                        $this->db->where('tb_tour.data_saida >', $data_inicio);
                        $query = $this->db->get();
                    }
                    if (!empty($data_final) and empty($destino) and empty($cliente)) {//busca todos os destino e todos os clientes mas em um periodo
                        $query = $this->db->query("SELECT * FROM tb_clients
                                        JOIN tb_reservs on tb_reservs.id_client=tb_clients.id_clients
                                        JOIN tb_tour on tb_tour.id_tour=tb_reservs.id_tour
                                        JOIN tb_viagem on tb_viagem.id_viagem=tb_tour.id_viagem
                                        WHERE tb_tour.data_saida BETWEEN '" . $data_inicio . "' AND '" . $data_final . "'");
                    }
                    if (empty($data_final) and empty($destino) and !empty($cliente)) {//busca todos os destinos de um cliente
                        $this->db->select('*');
                        $this->db->from('tb_clients');
                        $this->db->join('tb_reservs', 'tb_reservs.id_client=tb_clients.id_clients');
                        $this->db->join('tb_tour', 'tb_tour.id_tour=tb_reservs.id_tour');
                        $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                        $this->db->where('tb_clients.id_clients', $cliente);
                        $this->db->where('tb_tour.data_saida >', $data_inicio);
                        $query = $this->db->get();
                    }
                    if (empty($data_final) and !empty($destino) and empty($cliente)) {//busca por apenas um destino
                        $this->db->select('*');
                        $this->db->from('tb_clients');
                        $this->db->join('tb_reservs', 'tb_reservs.id_client=tb_clients.id_clients');
                        $this->db->join('tb_tour', 'tb_tour.id_tour=tb_reservs.id_tour');
                        $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                        $this->db->where('tb_tour.data_saida >', $data_inicio);
                        $this->db->where('tb_tour.id_viagem', $destino);
                        $query = $this->db->get();
                    }
                    if (!empty($data_final) and ! empty($destino) and !empty($cliente)) {//busca um destino mas em um periodo
                        $query = $this->db->query("SELECT * FROM tb_clients
                                        JOIN tb_reservs on tb_reservs.id_client=tb_clients.id_clients
                                        JOIN tb_tour on tb_tour.id_tour=tb_reservs.id_tour
                                        JOIN tb_viagem on tb_viagem.id_viagem=tb_tour.id_viagem
                                        WHERE tb_clients.id_clients=" . $cliente . " AND tb_tour.id_viagem=" . $destino . " AND tb_tour.data_saida BETWEEN '" . $data_inicio . "' AND '" . $data_final . "'");
                        //$query = $this->db->get();
                    }
                    ?>
            <table border='1' cellpadding='0' cellspacing='0' width='100%'>
                <tr>
                            <th>Nome</th>
                            <th>Destino</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                            <th>Tel.</th>
                            <th>Cel.</th>
                            <th>Data</th>
                            <th>Valor</th>
                        </tr>
                        <?php
                        foreach ($query->result() as $rel) {
                            $data_saida = implode("/", array_reverse(explode("-", $rel->data_saida)));
                            echo "<tr>";
                            echo "<td>".$rel->nome."</td>";
                            echo "<td>" . $rel->destino . "</td>";
                            echo "<td>".$rel->rg."</td>";
                            echo "<td>".$rel->cpf."</td>";
                            echo "<td>".$rel->email."</td>";
                            echo "<td>".$rel->telefone."</td>";
                            echo "<td>".$rel->celular."</td>";
                            echo "<td>" . $data_saida . "</td>";
                            echo "<td>" . $rel->preco . "</td>";
                            echo "</tr>";
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
<?php
}
?>