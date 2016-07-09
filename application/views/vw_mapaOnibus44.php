<?php 
$this->db->where('nome_user', $this->session->userdata('nome'));
$query = $this->db->get('tb_users');
$query = $query->result();
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
    <style>
    @page {
        body {
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
    }
    </style>
    <body>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <table>
                        <tr>
                            <?php
                            $this->db->select('tb_reservs.destino_ultv,tb_cars.codigo, tb_tour.data_saida,tb_cars.nr_poltrona ');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_tour','tb_tour.id_tour=tb_reservs.id_tour');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->join('tb_cars','tb_tour.id_car=tb_cars.id_cars');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $query=$this->db->get();
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
                <div>
            <table border='1' cellpadding='0' cellspacing='0' style="height: 790px;width: 595px;">
                <tbody>
                    <tr>
                        <td style="width: 10px;">01</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','1');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">02</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','2');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td rowspan="12" style="width: 40px;">Corredor</td>
                        <td style="width: 10px;">04</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','4');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">03</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','3');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                    </tr>
                    <tr>
                        <td style="width: 10px;">05</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','5');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">06</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','6');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td colspan="4">ESCADA</td>
                    </tr>
                    <tr>
                        <td style="width: 10px;">09</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','9');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">10</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','10');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">08</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','8');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">07 </td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','7');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                    </tr>
                    <tr>
                        <td style="width: 10px;">13</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','13');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">14</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','14');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">12</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','12');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">11</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','11');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                    </tr>
                    <tr>
                        <td style="width: 10px;">17</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','17');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">18</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','18');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">16</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','16');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">15</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','15');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                    </tr>
                    <tr>
                        <td style="width: 10px;">21</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','21');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">22</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','22');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">20</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','20');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">19</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','19');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                    </tr>
                    <tr>
                        <td style="width: 10px;">25</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','25');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">26</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','26');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">24</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','24');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">23</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','23');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                    </tr>
                    <tr>
                        <td style="width: 10px;">29</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','29');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">30</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','30');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">28</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','28');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">27</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','27');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;">
                        <?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?>
                        
                        </spam></td>
                    </tr>
                    <tr>
                        <td style="width: 10px;">33</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','33');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">34</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','34');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">32</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','32');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">31</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','31');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                    </tr>
                    <tr>
                        <td style="width: 10px;">37</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','37');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">38</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','38');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">36</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','36');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">35</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','35');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                    </tr>
                    <tr>
                        <td style="width: 10px;">41</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','41');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">42</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','42');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">40</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','40');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">39</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','39');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                    </tr>
                    <tr>
                        <td style="width: 10px;">43</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','43');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td style="width: 10px;">44</td>
                        <?php
                            $this->db->select('tb_clients.nome');
                            $this->db->from('tb_reservs');
                            $this->db->join('tb_clients','tb_clients.id_clients=tb_reservs.id_client');
                            $this->db->where('tb_reservs.nr_poltrona','44');
                            $this->db->where('tb_reservs.id_tour',$_GET['id']);
                            $nome = $this->db->get()->result_array();
                        ?>
                        <td style="width:133.75px;"><spam style="font-size: 9px;"><?php
                        if(!empty($nome[0]['nome'])){
                            $i=0;
                            foreach($nome as $val){
                                if($i){
                                    echo " / ";
                                }
                                echo $val['nome'];
                                $i++;
                            }
                        }
                        ?></spam></td>
                        <td colspan="4">BANHEIRO</td>
                    </tr>
                </tbody>
            </table>
                </div>
        </div><!-- /#page-wrapper -->
        <script src="<?= base_url() ?>js/jquery-1.10.2.js"></script>
        <script src="<?= base_url() ?>js/bootstrap.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <script src="<?= base_url() ?>js/morris/chart-data-morris.js"></script>
        <script src="<?= base_url() ?>js/tablesorter/jquery.tablesorter.js"></script>
        <script src="<?= base_url() ?>js/tablesorter/tables.js"></script>
    </body>
</html>


