<?php 
$banco = 'nextinvest';
$login = '';
$usuario = 'root';
$senha = '';
$host = 'localhost';

$con = mysqli_connect($host,$usuario,$senha, $banco) or die (mysqli_error($mysql)) or die (mysqli_free_result($result));
?>