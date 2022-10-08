<!DOCTYPE html>
<?php
session_start();
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Pets</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
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
</body>

</html>