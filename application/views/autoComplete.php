<?php
$q = strtolower($_GET["term"]);
$limit=10;
if (!$q)
    return;

$query = $this->db->query("select DISTINCT nome from tb_clients where nome LIKE '%" . $q . "%' ORDER BY nome");

foreach ($query->result_array() as $vi) {
    //$cname = $vi['nome'];
    //echo "$cname\n";
    $cname[] = $vi['nome'];
}
echo json_encode($cname);
?>