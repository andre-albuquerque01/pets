<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro anuncio</title>
    <?php
    include_once "menu.php";
    ?>
</head>

<body>
    <?php
    include_once "crud/conexao.php";
    include_once "crud/verifca_login.php";
    $id = $_GET['id'];
    $select = $pdo->query("SELECT imagem, titulo, descricao, telefone, whatsapp, valor, localizacao, cadastro_cliente FROM cadastro_ad WHERE id = $id;");
    // $select = $pdo->query("SELECT imagem, titulo, descricao, telefone, whatsapp, valor, localizacao, cadastro_cliente FROM cadastro_ad INNER JOIN cadastro_cliente ON cadastro_ad.cadastro_cliente = cadastro_cliente.id; ");
    while ($sel = $select->fetch()) {
        $image = $sel['imagem'];
        $title = $sel['titulo'];
        $desc = $sel['descricao'];
        $tell = $sel['telefone'];
        $whats = $sel['whatsapp'];
        $value = $sel['valor'];
        $city = $sel['localizacao'];
    }
    ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <form action="crud/AlteraAd.php" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="imagem">Imagem</label>
                    <input type="file" name="imagem" id="imagem" class="form-control" value="<?= $image ?>" required>
                    <label style="font-size: 13px;">Por favor, inserir a imagem novamente.</label>
                </div>
                <div class="mt-1">
                    <label for="titulo">Titulo do anúncio</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="<?= $title ?>" required>
                </div>
                <div>
                    <label for="desc">Descrição do anúncio</label>
                    <input type="text" name="desc" id="desc" class="form-control" value="<?= $desc ?>" required>
                </div>
                <div>
                    <label for="tel">Telefone para contato</label>
                    <input type="tel" name="tel" id="tel" class="form-control" value="<?= $tell ?>" required>
                </div>
                <div>
                    <label for="what">WhatsApp</label>
                    <input type="tel" name="what" id="what" class="form-control" value="<?= $whats ?>" required>
                </div>
                <div>
                    <label for="valor">Valor médio</label>
                    <input type="number" name="valor" step="0.01" id="valor" class="form-control" step="0.01" value="<?= $value ?>" required>
                </div>
                <div>
                    <label for="cidade">Cidade em que deseja atuar</label>
                    <input type="text" name="cidade" id="cidade" class="form-control" value="<?= $city ?>" required>
                </div>
                <div class="mt-2">
                    <input type="submit" value="Enviar" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>
</body>

</html>