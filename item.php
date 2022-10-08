<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Item</title>
    <?php
    include_once "menu.php";
    ?>
</head>

<body>
    <?php
    include_once "crud/conexao.php";
    $idGet = $_GET['id'];
    $select = $pdo->query("SELECT cadastro_ad.id, imagem, titulo, valor, localizacao, descricao, Date_Ad, cep cadastro_cliente.telefone FROM cadastro_ad INNER JOIN cadastro_cliente on cadastro_ad.cadastro_cliente = cadastro_cliente.id WHERE id = $id");
    while ($sel = $select->fetch()) {
        $id = $sel['id'];
        $image = $sel['imagem'];
        $i = $sel['id'];
        $title = $sel['titulo'];
        $descricao = $sel['descricao'];
        $cep = $sel['cep'];
        $value = $sel['valor'];
        $city = $sel['localizacao'];
        $date = $sel['Date_Ad'];
        $telefone = $sel['telefone'];
    }
    ?>
    <div class="container">
        <div class="card text-center" style="width: 18rem;">
            <img src="imagens/<?= $image ?>" class="card-img-top" alt="imagem do anuncio">
            <div class="card-body" style="color:#000;">
                <h5 class="card-title"><?= $title ?></h5>
                <p class="card-text">Descrição:</p>
                <p class="card-text"><?= $descricao ?></p>
                <p class="card-text">Valor da hora: <?= $value ?></p>
                <p class="card-text">Localização: <?= $city ?> - <?= $cep ?></p>
                <p class="card-text"><small class="text-muted">Data de publicação: <?= $date ?></small></p>
            </div>
        </div>
    </div>
</body>

</html>