<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro anuncio</title>
    <?php
    include_once "menu.php";
    ?>
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <form action="crud/ad.php" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="imagem">Imagem</label>
                    <input type="file" name="imagem" id="imagem" class="form-control">
                </div>
                <div>
                    <label for="titulo">Titulo do anúncio</label>
                    <input type="text" name="titulo" id="titulo" class="form-control">
                </div>
                <div>
                    <label for="desc">Descrição do anúncio</label>
                    <input type="text" name="desc" id="desc" class="form-control">
                </div>
                <div>
                    <label for="tel">Telefone para contato</label>
                    <input type="tel" name="tel" id="tel" class="form-control">
                </div>
                <div>
                    <label for="what">WhatsApp</label>
                    <input type="tel" name="what" id="what" class="form-control">
                </div>
                <div>
                    <label for="valor">Valor médio</label>
                    <input type="number" name="valor" step="0.01" id="valor" class="form-control">
                </div>
                <div>
                    <label for="cidade">Cidade em que deseja atuar</label>
                    <input type="text" name="cidade" id="cidade" class="form-control">
                </div>
                <div class=" mt-2">
                    <input type="submit" value="Enviar" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>
</body>

</html>