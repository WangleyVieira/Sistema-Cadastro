<?php
//sessão
session_start();
//conexão
require_once 'db_connection.php';

if(isset($_POST['btn-editar'])){
    
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $cidade = mysqli_escape_string($connect, $_POST['cidade']);
    $uf = mysqli_escape_string($connect, $_POST['uf']);
    $cep = mysqli_escape_string($connect, $_POST['cep']);
    $id = mysqli_escape_string($connect, $_POST['id']);

    //atualizando dados da tabela cadastrar cliente
    $sqlCadastrarCliente = "UPDATE cadastrar_cliente SET nome = '$nome',
                                                         sobrenome ='$sobrenome',
                                                         email = '$email',
                                                         cidade = '$cidade',
                                                         uf = '$uf',
                                                         cep = '$cep' 
                             WHERE id = '$id' ";
                             
    //verifica se os dados foram atualizados
    if(mysqli_query($connect, $sqlCadastrarCliente)){
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../listar.php');
    }



}
?>