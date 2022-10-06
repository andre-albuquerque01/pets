<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro anuncio</title>
    <link rel="stylesheet" href="css/style.css">
    <?php
    include_once "menu.php";
    include_once "crud/verifca_login.php";
    ?>
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <form action="crud/ad.php" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="imagem">Imagem</label>
                    <input type="file" name="imagem" id="imagem" class="form-control" required>
                </div>
                <div>
                    <label for="titulo">Título do anúncio</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título do anúncio" required>
                </div>
                <div>
                    <label for="desc">Descrição do anúncio</label>
                    <input type="text" name="desc" id="desc" class="form-control" placeholder="Sobre o anúncio" required>
                </div>
                <div>
                    <label for="what">WhatsApp</label>
                    <input type="number" name="what" id="what" class="form-control" placeholder="00 0000 0000" required>
                </div>
                <div>
                    <label for="valor">Valor médio</label>
                    <input type="number" name="valor" step="0.01" id="valor" class="form-control" placeholder="00,00" required>
                </div>
                <div>
                    <label for="cidade">Cidade em que deseja atuar</label>
                    <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" required>
                </div>
                <div class=" mt-2">
                    <input type="submit" value="Enviar" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>
</body>

</html>