<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <form action="cliente.php" method="POST">
        <label for="name">Nome</label>
        <input type="text" name="nome" id="name"><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha"><br>
        <label for="tel">Telefone</label>
        <input type="tel" name="tel" id="tel"><br>
        <label for="cep">Cep</label>
        <input type="number" name="cep" id="cep"><br>
        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" id="endereco"><br>
        <label for="cidade">Cidade</label>
        <input type="text" name="cidade" id="cidade"><br>
        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro"><br>
        <label for="comp">Complemento</label>
        <input type="text" name="comp" id="comp"><br>
        <input type="checkbox" name="term" id="term"><label for="term">Termo de autorização</label> <br>
        <button>Enviar</button>
    </form>
</body>

</html>