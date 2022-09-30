<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro usuário</title>
    <?php
    include_once "menu.php";
    ?>
</head>

<body>
    <?php
    include_once "crud/conexao.php";
    $id = $_SESSION['id'];

    $select = $pdo->query("SELECT nome, cep, endereco, cidade, bairro, complemento, telefone, email, senha, termo_concientizacao from cadastro_cliente WHERE id = $id");
    while ($sel = $select->fetch()) {
        $nome = $sel['nome'];
        $cep = $sel['cep'];
        $end = $sel['endereco'];
        $city = $sel['cidade'];
        $bairro = $sel['bairro'];
        $com = $sel['complemento'];
        $tell = $sel['telefone'];
        $email = $sel['email'];
    }
    ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <form action="crud/Alteracliente.php" method="POST">
                <div>
                    <label for="name">Nome</label>
                    <input type="text" name="nome" id="name" class="form-control" value="<?= $nome ?>">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $cep ?>">
                </div>
                <div>
                    <label for="senha">Senha atual</label>
                    <input type="password" name="senha" id="senha" class="form-control">
                </div>
                <div>
                    <label for="senha">Nova senha</label>
                    <input type="password" name="Newsenha" id="senha" class="form-control">
                </div>
                <div>
                    <label for="tel">Telefone</label>
                    <input type="tel" name="tel" id="tel" class="form-control" value="<?= $tell ?>">
                </div>
                <div>
                    <label for="cep">Cep</label>
                    <input type="number" name="cep" id="cep" class="form-control" value="<?= $cep ?>">
                </div>
                <div>
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" class="form-control" value="<?= $end ?>">
                </div>
                <div>
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" class="form-control" value="<?= $city ?>">
                </div>
                <div>
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" class="form-control" value="<?= $bairro ?>">
                </div>
                <div>
                    <label for="comp">Complemento</label>
                    <input type="text" name="comp" id="comp" class="form-control" value="<?= $com ?>">
                </div>
                <div class="mt-2">
                    <input type="submit" value="Enviar" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>
</body>

</html>