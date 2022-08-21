<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery-3.6.0.js" type="text/javascript"></script>
    <title>Chat</title>
</head>
<script type="text/javascript">
    function ajax() {
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status == 200) {
                document.getElementById('resposta').innerHTML = req.responseText;
            }
        }
        req.open('POST', 'recebe_chat.php', true);
        req.send();
    }

    setInterval(function() {
        ajax();
    }, 1000);
</script>

<body onload="ajax();">
    <div id="resposta"></div>
    <form id="form" method="POST" action="chat.php">
        <input type="text" name="conversa" placeholder="Digite sua mensagem">
        <input type="submit" value="Enviar" id="enviar" name="enviar">
    </form>

    <?php
    include_once "conexao.php";
    $conversa = $_POST['conversa'];
    $cadastro_ad = 2;
    $con = $pdo->prepare("INSERT INTO `chat`(`conversa`, `cadastro_ad`) VALUES (:conversa, :cadastro_ad)");
    $con->execute(array(
        ':conversa' => $conversa,
        ':cadastro_ad' => $cadastro_ad
    ));
    ?>
</body>

</html>