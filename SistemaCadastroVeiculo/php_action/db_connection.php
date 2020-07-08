<?php
//conexão com Banco de Dados

$serverName = "localhost:3308";
$userName = "root";
$password = "";
$db_name = "cadastronacionalveiculos";

$connect = mysqli_connect($serverName, $userName, $password, $db_name);

if(mysqli_connect_error()){
    echo "Erro na conexão ".mysqli_connect_error();
}

?>