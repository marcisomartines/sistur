<?php
//busca valor digitado no campo autocomplete "$_GET['term']
$text = mysql_real_escape_string($_GET['term']);
$this->db->where('nome',$text);
$query=$this->db->get('tb_clients');
//formata o resultado para JSON
$json = '[';
$first = true;
while($row = mysql_fetch_array($query->result()))
{
  if (!$first) { $json .=  ','; } else { $first = false; }
  $json .= '{"value":"'.utf8_encode($row['campoTexto']).'"}';
}
$json .= ']';
 
echo $json;