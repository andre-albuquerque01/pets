<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Item</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Pets</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Voltar</a>
                </li>
                <?php
                if (isset($_SESSION['id']) != null) {
                    echo "<a class='nav-link active' href='dashboard/'>Perfil</a>";
                } else {
                    echo "<li class='nav-item'><a class='nav-link active' href='cadastro_cliente.php'>Cadastrar</a></li>";
                    echo "<li class='nav-item'><a class='nav-link active' href='login.php'>Entrar</a></li>";
                }
                ?>
            </ul>
        </div>
    </nav>
    <?php
    include_once "crud/conexao.php";
    $idGet = $_GET['id'];
    $select = $pdo->query("SELECT cadastro_ad.id, imagem, titulo, valor, localizacao, descricao, Date_Ad, cep, cadastro_cliente.telefone FROM cadastro_ad INNER JOIN cadastro_cliente on cadastro_ad.cadastro_cliente = cadastro_cliente.id WHERE cadastro_ad.id =  $idGet");
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
    <div class="container-fluid">
        <div class="card mx-auto mt-2" style="width: 18rem;">
            <img src="imagens/<?= $image ?>" class="card-img-top" alt="imagem do anuncio">
            <div class="card-body" style="color:#000;">
                <h5 class="card-title"><?= $title ?></h5>
                <p class="card-text">Descrição: <?= $descricao ?></p>
                <p class="card-text">Valor da hora: R$ <?= $value ?></p>
                <p class="card-text">Localização: <?= $city ?> - <?= $cep ?></p>
                <p class="card-text"><small class="text-muted">Data de publicação: <?= $date ?></small></p>
            </div>
        </div>
    </div>
</body>

</html>