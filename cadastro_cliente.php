<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro usuário</title>
    <?php
    include_once "menu.php";
    ?>
</head>

<body>
    <div class="container-fluid">
        <form action="crud/cliente.php" method="POST">
            <div class="col-md-5">
                <label for="name">Nome</label>
                <input type="text" name="nome" id="name" class="form-control">
            </div>
            <div class="col-md-5">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="col-md-5">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control">
            </div>
            <div class="col-md-5">
                <label for="tel">Telefone</label>
                <input type="tel" name="tel" id="tel" class="form-control">
            </div>
            <div class="col-md-5">
                <label for="cep">Cep</label>
                <input type="number" name="cep" id="cep" class="form-control">
            </div>
            <div class="col-md-5">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" class="form-control">
            </div>
            <div class="col-md-5">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" class="form-control">
            </div>
            <div class="col-md-5">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" class="form-control">
            </div>
            <div class="col-md-5">
                <label for="comp">Complemento</label>
                <input type="text" name="comp" id="comp" class="form-control">
            </div>
            <div class="col-md-5">
                <input type="checkbox" name="term" id="term"> <a href="">Termo de autorização</a>
            </div>
            <div class="col-md-3 mt-2">
                <input type="submit" value="Enviar" class="btn btn-outline-primary">
            </div>
        </form>
    </div>
</body>

</html>