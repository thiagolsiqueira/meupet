<?php 


//$con =mysql_connect ("mysql10.000webhost.com","a4638461_root","th14g0l1m4");
//mysql_select_db("a4638461_meupet",$con);

include("conexao.php");
$date = date("Y-m-d");
list($anoatual, $mesatual, $diaatual) = explode("-", $date);

$consulta = mysql_query("SELECT * FROM usuario u inner join consulta c on c.idAnimal=u.id WHERE c.dataConsulta = $date") 
or die("Não conectou: " . mysql_error());


while ($row = mysql_fetch_array($consulta)) {
list($ano, $mes, $dia) = explode("-", $row[3]);

if ($mesatual == $mes) {
if ($diaatual == $dia) {
mail ($row['email'],"Hoje você tem consulta!");

}
}
}

?>