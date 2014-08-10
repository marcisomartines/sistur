<?php
$q = strtolower($_GET["q"]);
if (!$q)
    return;

$query = $this->db->query("select DISTINCT nome from tb_clients where nome LIKE '%" . $q . "%'");

foreach ($query->result_array() as $vi) {
    $cname = $vi['nome'];
    echo "$cname\n";
}
?>