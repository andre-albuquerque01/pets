<?php
include_once "conexao.php";
$id = $_GET['id'];
$cad = $pdo->prepare("UPDATE `cadastro_ad` SET AD_ativo_desativo=:AD_ativo_desativo WHERE id = $id");
$cad->execute(array(
    ':AD_ativo_desativo' => 'd'
));
if ($cad == true) {
    echo "<script>alert('Excluído')</script>";
    echo "<script>location.href='../dashboard/'</script>";
} else {
    echo "<script>alert('Não foi possível excluir')</script>";
    echo "<script>location.href='../dashboard/'</script>";
}
