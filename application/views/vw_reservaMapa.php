<?php
$onibus = $_GET['nome'];
$query = $this->db->query("SELECT * FROM tb_tour
                            JOIN tb_drivers ON tb_drivers.id_drivers=tb_tour.id_motorista
                            JOIN tb_viagem ON tb_tour.id_viagem=tb_viagem.id_viagem
                            JOIN tb_cars ON tb_cars.id_cars=tb_tour.id_car
                            WHERE tb_tour.id_tour=" . $onibus);
if (empty($onibus)) {
    echo "Nenhuma viagem selecionada";
} else {
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
                        <tr>
                            <th>Poltronas Disponíveis: </th>
                            <td><?= $dados['nr_poltrona'] ?></td>
                        </tr>
                    </table>
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
                            <tr>
                                <td class="success" data-toggle="modal" data-target="#myModal">1</td>
                                <td class="success">2</td>
                                <td rowspan="13">Corredor</td>
                                <td class="success">3</td>
                                <td class="success">4</td>
                            </tr>
                            <tr>
                                <td class="success">1</td>
                                <td class="success">2</td>
                                <td class="success">3</td>
                                <td class="success">4</td>
                            </tr>
                            <tr>
                                <td class="success">1</td>
                                <td class="success">2</td>
                                <td class="success">3</td>
                                <td class="success">4</td>
                            </tr>
                            <tr>
                                <td class="success">1</td>
                                <td class="success">2</td>
                                <td class="success">3</td>
                                <td class="success">4</td>
                            </tr>
                            <tr>
                                <td class="success">1</td>
                                <td class="success">2</td>
                                <td class="success">3</td>
                                <td class="success">4</td>
                            </tr>
                            <tr>
                                <td class="success" data-toggle="modal" data-target="#myModal">1</td>
                                <td class="success">2</td>
                                <td class="success">3</td>
                                <td class="success">4</td>
                            </tr>
                            <tr>
                                <td class="success">1</td>
                                <td class="success">2</td>
                                <td class="success">3</td>
                                <td class="success">4</td>
                            </tr>
                            <tr>
                                <td class="success">1</td>
                                <td class="success">2</td>
                                <td class="success">3</td>
                                <td class="success">4</td>
                            </tr>
                            <tr>
                                <td class="success">1</td>
                                <td class="success">2</td>
                                <td class="success">3</td>
                                <td class="success">4</td>
                            </tr>
                            <tr>
                                <td class="success">1</td>
                                <td class="danger">2</td>
                                <td class="success">3</td>
                                <td class="success">4</td>
                            </tr>
                            <tr>
                                <td class="success">1</td>
                                <td class="success">2</td>
                                <td class="success">3</td>
                                <td class="success">4</td>
                            </tr>
                            <tr>
                                <td class="success">1</td>
                                <td class="success">2</td>
                                <td class="success">3</td>
                                <td class="success">4</td>
                            </tr>
                            <tr>
                                <td class="success">1</td>
                                <td class="success">2</td>
                                <td class="success">3</td>
                                <td class="success">4</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--aqui termina as tabelas-->
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Reservar Poltrona</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('home/cadastroValidacaoReserva');

                    echo validation_errors();

                    echo form_label('Cliente: ');
                    echo form_input(['name' => 'cliente', 'id' => 'cliente', 'class' => 'form-control input-sm']);
                    echo '<br>';
                    $opcao = array(
                        'i' => 'Somente Ida',
                        'v' => 'Somente Volta',
                        'd' => 'Ida/Volta'
                    );
                    echo form_label('Tipo: ');
                    echo form_dropdown('tipo', $opcao, 'd', 'class=form-control');
                    echo '<br>';
                    echo form_label('Desconto: ');
                    echo form_input(['name' => 'desconto', 'id' => 'desconto', 'class' => 'form-control input-sm datepicker']);
                    echo '<br>';
                    echo form_label('Local de Embarque: ');
                    echo form_input(['name' => 'loc_embarque', 'id' => 'loc_embarque', 'class' => 'form-control input-sm']);
                    echo '<br>';
                    echo form_hidden('id_tour', $onibus);
                    echo form_hidden('ultima_viagem', $dados['data_saida']);
                    echo form_hidden('destino_ultv', $dados['destino']);
                    echo form_hidden('nr_poltrona', $poltrona);

                    echo "<br />";
                    echo '<div class="modal-footer">';
                    echo '<input type="submit" class="btn btn-primary" value="Salvar">';
                    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>';
                    echo '</div';
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="http://localhost/sistur/js/jquery-ui.js"></script>
    <script src="<?= base_url() ?>js/jquery.autocomplete.js"></script>
    <script type="text/javascript">
            $().ready(function() {
                $("#cliente").autocomplete("autoComplete.php", {
                    width: 260,
                    matchContains: true,
                    selectFirst: false
                });
            });
        </script>

    <?php
}
?>
