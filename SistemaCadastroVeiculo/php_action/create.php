<?php
//sessão
session_start();
//conexão
require_once 'db_connection.php';
//verifica se o botão cadastrar cliente foi acionado e contém preenchimentos de dados
if(isset($_POST['btn-cadastrarCliente'])){
    //filtrando os dados, por questões de segurança

    //pegando dados do cliente
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $cidade = mysqli_escape_string($connect, $_POST['cidade']);
    $uf = mysqli_escape_string($connect, $_POST['uf']);
    $cep = mysqli_escape_string($connect, $_POST['cep']);
    //inserção na tabela cadastrar cliente
    $sqlCadastrarCliente = "INSERT INTO cadastrar_cliente(nome, sobrenome, email, cidade, uf, cep) VALUES('$nome', '$sobrenome', '$email', '$cidade', '$uf', '$cep')";

    //peganndo dados do veículo
    $nomeCarro = mysqli_escape_string($connect, $_POST['nomeCarro']);
    $placa = mysqli_escape_string($connect, $_POST['placa']);
    $corCarro = mysqli_escape_string($connect, $_POST['cor']);
    $renavam = mysqli_escape_string($connect, $_POST['renavam']);
    $tipoCarro = mysqli_escape_string($connect, $_POST['tipoCarro']);
    $anoFabricacao = mysqli_escape_string($connect, $_POST['anoFabricacao']);
    
    $sqlCadastrarVeiculo  = "INSERT INTO veiculo(nome_carro, placa, cor, renavam, tipo_carro, ano_fabricacao) VALUES ('$nomeCarro', '$placa','$corCarro', '$renavam', '$tipoCarro', '$anoFabricacao')";


    if(mysqli_query($connect, $sqlCadastrarCliente) and mysqli_query($connect, $sqlCadastrarVeiculo)){
        $_SESSION['mensagem'] = "cadastrado com sucesso";
        header('Location: ../listar.php');
    }
}
?>