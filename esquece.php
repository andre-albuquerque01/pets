<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Log in</title>
    <?php
    include_once "menu.php";
    ?>
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-center mt-5">
            <form action="crud/recebe_email.php" method="POST">
                <div class="">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email cadastrado">
                </div>
                <div class=" mt-2">
                    <input type="submit" value="Enviar" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>
</body>

</html>