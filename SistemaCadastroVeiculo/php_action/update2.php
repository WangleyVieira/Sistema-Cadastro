<?php
//sessão
session_start();
//conexão
require_once 'db_connection.php';

if(isset($_POST['btn-editar'])){
    //peganndo dados do veículo
    $nomeCarro = mysqli_escape_string($connect, $_POST['nomeCarro']);
    $placa = mysqli_escape_string($connect, $_POST['placa']);
    $corCarro = mysqli_escape_string($connect, $_POST['cor']);
    $renavam = mysqli_escape_string($connect, $_POST['renavam']);
    $tipoCarro = mysqli_escape_string($connect, $_POST['tipoCarro']);
    $anoFabricacao = mysqli_escape_string($connect, $_POST['anoFabricacao']);
    $id2 = mysqli_escape_string($connect, $_POST['id']);

    //atualizando dados da tabela veículos

    $sqlCadastrarVeiculo = "UPDATE veiculo SET nome_carro = '$nomeCarro',
                                               placa = '$placa',
                                               cor = '$corCarro',
                                               renavam = '$renavam',
                                               tipo_carro = '$tipoCarro',
                                               ano_fabricacao = '$anoFabricacao'
                             WHERE id = '$id2'";
    //verifica se os dados foram atualizados
    if(mysqli_query($connect, $sqlCadastrarVeiculo)){
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../listar.php');
    }
}