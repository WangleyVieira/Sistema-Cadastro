<?php
//conexão
include_once 'php_action/db_connection.php';
//header
include_once 'includes/cabecalho.php';

if(isset($_SESSION['mensagem'])){
    echo $_SESSION['mensagem'];
}

?>

<h1>Sistema de cadastro de Clientes</h1>
<h2 class="light">Dados dos clientes</h2>
<hr>
<div class="tabel-responsive-sm">
    <table class="table table-bordered table-borderless">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Sobrenome</th>
                <th scope="col">Email</th>
                <th scope="col">Cidade</th>
                <th scope="col">UF</th>
                <th scope="col">CEP</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM cadastrar_cliente";
                $result = mysqli_query($connect, $sql);
                
                if(mysqli_num_rows($result) > 0){ //verifica se a variavel resultado é maior que zero, consultando a tabela cadastrar cliente do BD

                    while($dadosCliente = mysqli_fetch_array($result)){
            ?>
                    <tr>
                        <td><?= $dadosCliente['nome']; ?></td>
                        <td><?= $dadosCliente['sobrenome']; ?></td>
                        <td><?= $dadosCliente['email']; ?></td>
                        <td><?= $dadosCliente['cidade']; ?></td>
                        <td><?= $dadosCliente['uf']; ?></td>
                        <td><?= $dadosCliente['cep']; ?></td>

                        <td><a href="editar_tabelas/editar.php?id=<?= $dadosCliente['id']; //cada id vai ter um registro diferente?>" class="btn btn-primary" type="submit">Editar</a></td>

                        <td><a href="#exampleModal1" class="btn btn-danger" type="submit" data-toggle="modal" data-target="#exampleModal1">Deletar</a></td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Deletar dados pessoais</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- <div class="modal-body">
                                        ...
                                    </div> -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                        <form action="php_action/delete.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $dadosCliente['id']; ?>">
                                            <button type="submit" name="btn-deletar" class="btn btn-danger">Sim</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
            <?php
                    };
                } 
                else{ ?>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                <?php //se o não houver dados na tabela exibe - vazio
                };
                ?>

        </tbody>
    </table>
    
    <h2 class="light">Dados do veículo</h2>
    <hr>
    <table class="table table-bordered table-borderless">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nome do carro</th>
                <th scope="col">Placa</th>
                <th scope="col">Cor</th>
                <th scope="col">RENAVAM</th>
                <th scope="col">Tipo de Carro</th>
                <th scope="col">Ano de fabricação</th>
            </tr>
        </thead>
        <tbody>
            <?php
                //selecionando dados da tabela veiculo
                $sql2 = "SELECT * FROM veiculo";
                $result2 = mysqli_query($connect, $sql2);

                if(mysqli_num_rows($result2)){
                    while($dadosVeiculo = mysqli_fetch_array($result2)){
            ?>
                    <tr>
                        <td><?= $dadosVeiculo['nome_carro']; ?></td>
                        <td><?= $dadosVeiculo['placa']; ?></td>
                        <td><?= $dadosVeiculo['cor']; ?></td>
                        <td><?= $dadosVeiculo['renavam']; ?></td>
                        <td><?= $dadosVeiculo['tipo_carro']; ?></td>
                        <td><?= $dadosVeiculo['ano_fabricacao']; ?></td>

                        <td><a href="editar_tabelas/editar2.php?id=<?= $dadosVeiculo['id']; ?> " class="btn btn-primary" type="submit">Editar</a></td>
                        <td><a href="#exampleModal2" class="btn btn-danger" type="submit" data-toggle="modal" data-target="#exampleModal2">Deletar</a></td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Deletar dados do veículo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- <div class="modal-body">
                                        ...
                                    </div> -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                        <form action="php_action/delete2.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $dadosVeiculo['id']; ?>">
                                            <button type="submit" name="btn-deletar2" class="btn btn-danger">Sim</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
            <?php
                    };
                } else{ ?>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                <?php
                    };
                ?>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-primary">Voltar</a>

</div>

<?php
//footer
include_once 'includes/rodape.php';
?>