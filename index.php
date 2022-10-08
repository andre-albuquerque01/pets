<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
    <?php
    include_once "menu.php";
    ?>
</head>

<body>
    <div class="container">
        <form action="pesquisa.php" method="post">
            <div class="row mt-2">
                <div class="col-md-3 pe-0">
                    <input class="form-control" type="search" name="search" id="search" placeholder="Pesquisa">
                </div>
                <div class="col-md-2 me-5" id="button">
                    <button class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></button>
                </div>
            </div>
        </form>
    </div>
    <hr style="width: 80%; text-align: center; margin-left: 10%;">
    <div class="container">
        <div class="row">
            <?php
            include_once "crud/conexao.php";
            $select = $pdo->query("SELECT id, imagem, titulo, valor, localizacao FROM cadastro_ad limit 25");
            while ($sel = $select->fetch()) {
                $id = $sel['id'];
                $image = $sel['imagem'];
                $i = $sel['id'];
                $title = $sel['titulo'];
                $value = $sel['valor'];
                $city = $sel['localizacao'];

            ?>
                <div class="col-md-4">
                    <a href="item.php?id=<?= $id ?>" style="text-decoration: none;">
                        <div class="card mb-3" style="width: 340px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="imagens/<?= $image ?>" class="img-fluid rounded-start" alt="imagem do anuncio" style="width: 150px; max-height: 150px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body" style="color:#000;">
                                        <h5 class="card-title"><?= $title ?></h5>
                                        <p class="card-text">Valor da hora: <?= $value ?></p>
                                        <p class="card-text">Localização: <?= $city ?></p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
</body>

</html>