<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <?php
    session_start();
    ?>
</head>

<body>

    <body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">Pets</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../cadastro_ad.php">Anunciar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../altera_cliente.php">Alterar perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../crud/sair.php">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
    </body>
    <?php
    include_once "../crud/conexao.php";
    include_once "../crud/verifca_login.php";
    $id = $_SESSION['id'];
    $sql = $pdo->query("SELECT `id`, `imagem`, `titulo`,`valor`,`localizacao` from cadastro_ad WHERE cadastro_cliente = $id and AD_ativo_desativo = 'a'");

    ?>
    <div class="container-fluid" style="margin-top: 30px; width: 80%;">
        <table id="tblUser">
            <thead>
                <th>Imagem</th>
                <th>Titulo</th>
                <th>Valor</th>
                <th>Localização</th>
                <th>#</th>
            </thead>
            <tbody>
                <?php
                while ($query = $sql->fetch()) {
                ?>
                    <tr>
                        <td><img src="../imagens/<?= $query['imagem'] ?>" alt="imagem do anuncio" width="155px"></td>
                        <td> <?= $query['titulo'] ?></td>
                        <td> <?= $query['valor'] ?></td>
                        <td> <?= $query['localizacao'] ?></td>
                        <td> <a href="../altera_ad.php?id=<?= $query['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                            <a href="../crud/excluir.php?id=<?= $query['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.11.1/i18n/pt-BR.json"></script>
    <script>
        jQuery(document).ready(function() {
            $("#tblUser").DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json'
                }
            });
        })
    </script>
</body>

</html>