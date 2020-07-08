<?php
//conexão
include_once '../php_action/db_connection.php';
//header
include_once '../includes/cabecalho.php';

//select, verifica se existe parametro id 
if(isset($_GET['id'])){
    $id = mysqli_escape_string($connect, $_GET['id']);//id da tabela cadastrar cliente
    //pegado dados da tabela cadastrar cliente
    $sql = "SELECT * FROM cadastrar_cliente WHERE id = '$id' ";
    $result = mysqli_query($connect, $sql);
    $dadosCliente = mysqli_fetch_array($result);

}
?>

    <form action="../php_action/update.php" method="POST">
    
        <input type="hidden" name="id" value="<?= $dadosCliente['id']; //pega o id do resgistro, através da url, mas neste caso estou utlizando o GET?>">

        <h2>Editar dados do cliente</h2>

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationDefault01">Primeiro nome</label>
                <input type="text" class="form-control" id="validationDefault01" name="nome" placeholder="Nome" value="<?= $dadosCliente['nome']; ?>" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault02">Sobrenome</label>
                <input type="text" class="form-control" id="validationDefault02" name="sobrenome" placeholder="Sobrenome" value="<?= $dadosCliente['sobrenome']; ?>" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefaultUsername">Usuário</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                    </div>
                    <input type="email" class="form-control" id="validationDefaultUsername" name="email" value="<?= $dadosCliente['email']; ?>" placeholder="email" aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationDefault03">Cidade</label>
                <input type="text" class="form-control" id="validationDefault03" name="cidade" placeholder="Cidade" value="<?= $dadosCliente['cidade']; ?>" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault04">UF</label><br>
                <!-- <input type="text" class="form-control" id="validationDefault04" name="uf" placeholder="Estado" required> -->
                <select name="uf" id="#" class="custom-select" value="<?= $dadosCliente['uf']; ?>">
                    <?php
                        //seleciona dados da tabela estado (onde estes estão cadastrados) do banco de dados
                        $sql = "SELECT * FROM estado";
                        $result = mysqli_query($connect, $sql);

                        while($registro = mysqli_fetch_row($result)){
                            $uf = $registro[0]; //uf
                            $sigla = $registro[1];//sigla
                            echo "<option value=$sigla>$uf</option>"; //quando selecionar o option, o BD irá exibir a sigla do estado
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault05">CEP</label>
                <input type="number" class="form-control" id="validationDefault05" name="cep" placeholder="CEP" value="<?= $dadosCliente['cep']; ?>" required>
            </div>
        </div>

        <button class="btn btn-success" type="submit" name="btn-editar">Atualizar</button>

        <a href="../listar.php" class="btn btn-info">Listar</a>

    </form>


<?php
//footer
include_once '../includes/rodape.php';
?>