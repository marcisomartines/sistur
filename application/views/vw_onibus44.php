<table class="table table-bordered table-hover table-striped tablesorter">
    <tr><!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 1);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="1" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" title="Marciso" value="01">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="1" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="01">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="1" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="01">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="1" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="01">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 2);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="2" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="02">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="2" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="02">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="2" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="02">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="2" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="02">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <td rowspan="13" align="center">CORREDOR</td>
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 4);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="4" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="04">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="4" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="04">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="4" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="04">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="4" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="04">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 3);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="3" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="03">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="3" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="03">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="3" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="03">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="3" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="03">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
    </tr>
    <tr>
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 5);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="5" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="05">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="5" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="05">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="5" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="05">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="5" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="05">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 6);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="6" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="06">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="6" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="06">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="6" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="06">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="6" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="06">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <td colspan="2" align="center">ESCADA</td>
    </tr>
    <tr>
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 9);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="9" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="09">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="9" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="09">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="9" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="09">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="9" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="09">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 10);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="10" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="10">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="10" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="10">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="10" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="10">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="10" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="10">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 8);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="8" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="08">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="8" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="08">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="8" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="08">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="8" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="08">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 7);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="7" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="07">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="7" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="07">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="7" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="07">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="7" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="07">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
    </tr>
    <tr>
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 13);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="13" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="13">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="13" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="13">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="13" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="13">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="13" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="13">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 14);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="14" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="14">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="14" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="14">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="14" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="14">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="14" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="14">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 12);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="12" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="12">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="12" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="12">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="12" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="12">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="12" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="12">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 11);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="11" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="11">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="11" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="11">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="11" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="11">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="11" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="11">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
    </tr>
    <tr>
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 17);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="17" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="17">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="17" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="17">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="17" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="17">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="17" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="17">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 18);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="18" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="18">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="18" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="18">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="18" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="18">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="18" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="18">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 16);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="16" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="16">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="16" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="16">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="16" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="16">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="16" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="16">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 15);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="15" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="15">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="15" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="15">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="15" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="15">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="15" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="15">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
    </tr>
    <tr>
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 21);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="21" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="21">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="21" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="21">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="21" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="21">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="21" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="21">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 22);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="22" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="22">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="22" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="22">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="22" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="22">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="22" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="22">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 20);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="20" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="20">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="20" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="20">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="20" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="20">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="20" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="20">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 19);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="19" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="19">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="19" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="19">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="19" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="19">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="19" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="19">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
    </tr>
    <tr>
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 25);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="25" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="25">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="25" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="25">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="25" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="25">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="25" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="25">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 26);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="26" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="26">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="26" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="26">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="26" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="26">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="26" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="26">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 24);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="24" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="24">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="24" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="24">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="24" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="24">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="24" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="24">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 23);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="23" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="23">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="23" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="23">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="23" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="23">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="23" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="23">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
    </tr>
    <tr>
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 29);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="29" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="29">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="29" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="29">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="29" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="29">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="29" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="29">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 30);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="30" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="30">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="30" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="30">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="30" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="30">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="30" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="30">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 28);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="28" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="28">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="28" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="28">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="28" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="28">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="28" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="28">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 27);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="27" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="27">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="27" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="27">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="27" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="27">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="27" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="27">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
    </tr>
    <tr>
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 33);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="33" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="33">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="33" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="33">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="33" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="33">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="33" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="33">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 34);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="34" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="34">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="34" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="34">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="34" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="34">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="34" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="34">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 32);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="32" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="32">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="32" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="32">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="32" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="32">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="32" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="32">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 31);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="31" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="31">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="31" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="31">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="31" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="31">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="31" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="31">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
    </tr>
    <tr>
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 37);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="37" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="37">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="37" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="37">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="37" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="37">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="37" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="37">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 38);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="38" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="38">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="38" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="38">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="38" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="38">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="38" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="38">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 36);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="36" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="36">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="36" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="36">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="36" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="36">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="36" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="36">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 35);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="35" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="35">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="35" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="35">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="35" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="35">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="35" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="35">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
    </tr>
    <tr>
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 41);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="41" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="41">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="41" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="41">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="41" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="41">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="41" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="41">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 42);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="42" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="42">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="42" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="42">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="42" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="42">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="42" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="42">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 40);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="40" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="40">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="40" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="40">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="40" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="40">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="40" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="40">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 39);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="39" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="39">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="39" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="39">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="39" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="39">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="39" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="39">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
    </tr>
    <tr>
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 43);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="43" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="43">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="43" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="43">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="43" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="43">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="43" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="43">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <!--COMECO DA VERIFICACAO--><?php
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('nr_poltrona', 44);
        $query = $this->db->get('tb_reservs');
        if ($query->num_rows() > 0) {
            ?>
            <td class="danger"><?= form_open('home/editarReserva') ?>
                <?php
                foreach ($query->result() as $rel) {
                    if ($rel->tipo == 'v') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="44" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-info btn-xs pull-right" value="44">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'i') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="44" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-warning btn-xs pull-right" value="44">
                        </form>
                        <?php
                    }
                    if ($rel->tipo == 'd') {
                        ?>
                        <input type="hidden" name="nr_poltrona" value="44" />
                        <input type="hidden" name="id_reservs" value="<?= $rel->id_reservs ?>" />
                        <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                        <input type="submit" class="btn btn-danger btn-xs pull-right" value="44">
                        </form>
                        <?php
                    }
                }
                ?>
            </td>
            <?php
        } else {
            ?>
            <td class="success"><?= form_open('home/editarReserva') ?>
                <input type="hidden" name="nr_poltrona" value="44" />
                <input type="hidden" name="id_tour" value="<?= $this->input->post('id_tour') ?>" />
                <input type="submit" class="btn btn-success btn-xs pull-right" value="44">
                </form>
            </td>
        <?php } ?>
        <!--FIM DA VERIFICACAO-->
        <td colspan="2" align="center">BANHEIRO</td>
    </tr>
</table>