<?php
//conexão
include_once '../php_action/db_connection.php';
//header
include_once '../includes/cabecalho.php';

//select, verifica se existe parametro id 
if(isset($_GET['id'])){
    $id2 = mysqli_escape_string($connect, $_GET['id']);
    //pegando dados da tabela veiculo
    $sql2 = "SELECT * FROM veiculo WHERE id = '$id2' ";

    //echo "$sql2";
    $result2 = mysqli_query($connect, $sql2);
    $dadosVeiculo = mysqli_fetch_array($result2);

}
?>
    <form action="../php_action/update2.php" method="POST">

        <input type="hidden" name="id" value="<?= $dadosVeiculo['id']; //pega o id do resgistro, através da url, mas neste caso estou utlizando o GET?>">
        
        <h2>Editar dados do veículo</h2>
        <!--Preenchimento de formulário do veículo-->

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationDefault01">Nome do carro</label>
                <input type="text" class="form-control" id="validationDefault01" name="nomeCarro" value="<?= $dadosVeiculo['nome_carro']; ?>" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault02">Placa</label>
                <input type="text" class="form-control" id="validationDefault02" name="placa" value="<?= $dadosVeiculo['placa']; ?>" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault02">Cor</label>
                <input type="text" class="form-control" id="validationDefault02" name="cor" value="<?= $dadosVeiculo['cor']; ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationDefault03">RENAVAM</label>
                <input type="number" class="form-control" id="validationDefault03" placeholder="xxxxxxxxxxx" name="renavam" value="<?= $dadosVeiculo['renavam']; ?>" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault04">Tipo de carro</label>
                    <select name="tipoCarro" id="#" class="custom-select" value="<?= $dadosVeiculo['tipo_carro']; ?>" >
                        <?php
                            //seleciona dados da tabela tipo de carro (onde estes estão cadastrados) do banco de dados
                            $sql = "SELECT * FROM tipocarro";
                            $result = mysqli_query($connect, $sql);

                            while($carro = mysqli_fetch_row($result)){
                                $sel = $carro[0]; //uf
                                $tipoCarro = $carro[1];//sigla
                                echo "<option value=$tipoCarro>$tipoCarro</option>";
                            }
                        ?>
                    </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault05">Ano de fabricação</label>
                <input type="date" class="form-control" name="anoFabricacao" id="validationDefault05" value="<?= $dadosVeiculo['ano_fabricacao']; ?>" required>
            </div>
        </div>

        <button class="btn btn-success" type="submit" name="btn-editar">Atualizar</button>

        <a href="../listar.php" class="btn btn-info" style="margin:5px">Listar</a>

    </form>


<?php
//footer
include_once '../includes/rodape.php';
?>