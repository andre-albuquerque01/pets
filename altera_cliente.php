<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro usuário</title>
    <script src="js/cep.js"></script>
    <?php
    include_once "menu.php";
    ?>
</head>

<body>
    <?php
    include_once "crud/conexao.php";
    include_once "crud/verifca_login.php";
    $id = $_SESSION['id'];

    $select = $pdo->query("SELECT nome, cep, endereco, estado, cidade, bairro, complemento, telefone, email, senha from cadastro_cliente WHERE id = $id");
    while ($sel = $select->fetch()) {
        $nome = $sel['nome'];
        $cep = $sel['cep'];
        $end = $sel['endereco'];
        $city = $sel['cidade'];
        $bairro = $sel['bairro'];
        $com = $sel['complemento'];
        $estado = $sel['estado'];
        $tell = $sel['telefone'];
        $email = $sel['email'];
    }
    ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <form action="crud/Alteracliente.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Nome</label>
                        <input type="text" name="nome" id="name" class="form-control" value="<?= $nome ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $email ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="senha">Senha atual</label>
                        <input type="password" name="senha" id="senha" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="senha">Nova senha</label>
                        <input type="password" name="Newsenha" id="senha" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="tel">Telefone</label>
                        <input type="tel" name="tel" id="tel" class="form-control" value="<?= $tell ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cep">Cep</label>
                        <input type="number" name="cep" id="cep" class="form-control" size="10" maxlength="9" onblur="pesquisacep(this.value);" placeholder="CEP" value="<?= $cep ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="rua">Endereço</label>
                        <input type="text" name="endereco" id="rua" class="form-control" value="<?= $end ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="form-control" value="<?= $city ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="form-control" value="<?= $bairro ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="uf">UF</label>
                        <select class="form-select" id="uf" name="uf" value="<?= $estado ?>" required>
                            <option value="">Selecione</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espirito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="comp">Complemento</label>
                        <input type="text" name="comp" id="comp" class="form-control" value="<?= $com ?>" required>
                    </div>
                </div>
                <div class="mt-2">
                    <input type="submit" value="Enviar" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>
</body>

</html>