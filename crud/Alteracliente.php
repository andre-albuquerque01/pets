<?php
include_once "conexao.php";
session_start();
$id = $_SESSION['id'];

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = base64_encode($_POST['senha']);
$Newsenha = base64_encode($_POST['Newsenha']);
$tel = $_POST['tel'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['uf'];

if ($senha === $Newsenha) {
    $term = "s";
    $cadastrar = $pdo->prepare("UPDATE `cadastro_cliente` SET `nome`=:nome, `cep`=:cep, `cidade`=:cidade,`estado`=:estado, `telefone`=:telefone, `email`=:email, `senha`=:senha WHERE id = $id");
    $cadastrar->execute(array(
        ':nome' => $nome,
        ':cep' => $cep,
        ':cidade' => $cidade,
        ':estado' => $estado,
        ':telefone' => $tel,
        ':email' => $email,
        ':senha' => $Newsenha
    ));
    if ($cadastrar == true) {
        echo "<script>alert('Alteração feita com sucesso')</script>";
        echo "<script>location.href='../dashboard/'</script>";
    }
} else {
    echo "<script>alert('Senhas diferentes')</script>";
    echo "<script>location.href='../altera_cliente.php'</script>";
}
