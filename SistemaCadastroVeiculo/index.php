<?php
//header
include_once 'includes/cabecalho.php';
//conexão
include_once 'php_action/db_connection.php';
?>

    <h1>Sistema de cadastro de veículo</h1>
    <form action="php_action/create.php" method="POST">
        
        <h2>Cliente</h2>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationDefault01">Primeiro nome</label>
                <input type="text" class="form-control" id="validationDefault01" name="nome" placeholder="Nome" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault02">Sobrenome</label>
                <input type="text" class="form-control" id="validationDefault02" name="sobrenome" placeholder="Sobrenome" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefaultUsername">Usuário</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                    </div>
                    <input type="email" class="form-control" id="validationDefaultUsername" name="email" placeholder="email" aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationDefault03">Cidade</label>
                <input type="text" class="form-control" id="validationDefault03" name="cidade" placeholder="Cidade" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault04">UF</label><br>
                <!-- <input type="text" class="form-control" id="validationDefault04" name="uf" placeholder="Estado" required> -->
                <select name="uf" id="#" class="custom-select">
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
                <input type="number" class="form-control" id="validationDefault05" name="cep" placeholder="CEP" required>
            </div>
        </div>
        
        <!--Preenchimento de formulário do veículo-->
        <h2>Veículo</h2>

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationDefault01">Nome do carro</label>
                <input type="text" class="form-control" id="validationDefault01" name="nomeCarro" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault02">Placa</label>
                <input type="text" class="form-control" id="validationDefault02" name="placa" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault02">Cor</label>
                <input type="text" class="form-control" id="validationDefault02" name="cor" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationDefault03">RENAVAM</label>
                <input type="number" class="form-control" id="validationDefault03" placeholder="xxxxxxxxxxx" name="renavam" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault04">Tipo de carro</label>
                    <select name="tipoCarro" id="#" class="custom-select">
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
                <input type="date" class="form-control" name="anoFabricacao" id="validationDefault05" required>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2">
                    Concordo com os termos e condições
                </label>
            </div>
        </div>
        <button class="btn btn-success" type="submit" name="btn-cadastrarCliente">Cadastrar</button>
        <a href="listar.php" class="btn btn-info">Listar</a>

</form>

<?php
//footer
include_once 'includes/rodape.php';
?>


