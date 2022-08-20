<?php
include_once "conexao.php";
// session_start();
// $id = $_SESSION['id_login'];
$imagem = $_POST['imagem'];
$titulo = $_POST['titulo'];
$desc = $_POST['desc'];
$tel = $_POST['tel'];
$what = $_POST['what'];
$valor = $_POST['valor'];
$cidade = $_POST['cidade'];
$id = 1;

$cad = $pdo->prepare("INSERT INTO `cadastro_ad`(`imagem`, `titulo`, `descricao`, `telefone`, `whatsapp`, `valor`, `localizacao`, `cadastro_cliente`) VALUE (:imagem, :titulo, :descricao, :telefone, :whatsapp, :valor, :localizacao, :cadastro_cliente)");
$cad->execute(array(
    ':imagem' => $imagem,
    ':titulo' => $titulo,
    ':descricao' => $desc,
    ':telefone' => $tel,
    ':whatsapp' => $what,
    ':valor' => $valor,
    ':localizacao' => $cidade,
    ':cadastro_cliente' => $id
));
if ($cad == true) {
    echo "<script>alert('Cadastrado com sucesso')</script>";
    echo "<script>location.href='cadastro_ad.php'</script>";
}
