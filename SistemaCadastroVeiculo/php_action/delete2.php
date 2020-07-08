<?php
//sessão
session_start();
//conexão
require_once 'db_connection.php';

if(isset($_POST['btn-deletar2'])){

    //id da tabela veículos cadastrados
    $id2 = mysqli_escape_string($connect, $_POST['id']);

    $sqlDeletarVeiculo = "DELETE FROM veiculo WHERE id = '$id2' ";
                             
    //verifica se os dados foram atualizados
    if(mysqli_query($connect, $sqlDeletarVeiculo)){
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../listar.php');
    }



}
?>