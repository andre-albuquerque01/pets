<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <form action="ad.php" method="POST">
        <label for="imagem">Imagem</label>
        <input type="file" name="imagem" id="imagem"><br>
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo"><br>
        <label for="desc">Descrição</label>
        <input type="text" name="desc" id="desc"><br>
        <label for="tel">Telefone</label>
        <input type="tel" name="tel" id="tel"><br>
        <label for="what">WhatsApp</label>
        <input type="tel" name="what" id="what"><br>
        <label for="valor">Valor médio</label>
        <input type="number" name="valor" step="0.01" id="valor"><br>
        <label for="cidade">Cidade</label>
        <input type="text" name="cidade" id="cidade"><br>
        <button>Enviar</button>
    </form>
</body>

</html>