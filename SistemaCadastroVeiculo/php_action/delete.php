<?php
//sessão
session_start();
//conexão
require_once 'db_connection.php';

if(isset($_POST['btn-deletar'])){
    //id da tabela cadastrar_cliente
    $id = mysqli_escape_string($connect, $_POST['id']);

    //id da tabela veículos cadastrados
    $id2 = mysqli_escape_string($connect, $_POST['id']);
    //atualizando dados da tabela cadastrar cliente
    $sqlDeletarCliente = "DELETE FROM cadastrar_cliente WHERE id = '$id' ";

    $sqlDeletarVeiculo = "DELETE FROM veiculo WHERE id = '$id2' ";
                             
    //verifica se os dados foram atualizados
    if(mysqli_query($connect, $sqlDeletarCliente)){
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../listar.php');
    }



}
?>