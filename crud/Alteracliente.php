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
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['uf'];
$bairro = $_POST['bairro'];
$comp = $_POST['comp'];

if ($senha === $Newsenha) {
    $term = "s";
    $cadastrar = $pdo->prepare("UPDATE `cadastro_cliente` SET `nome`=:nome, `cep`=:cep, `endereco`=:endereco, `cidade`=:cidade,`estado`=:estado, `bairro`=:bairro, `complemento`=:complemento, `telefone`=:telefone, `email`=:email, `senha`=:senha WHERE id = $id");
    $cadastrar->execute(array(
        ':nome' => $nome,
        ':cep' => $cep,
        ':endereco' => $endereco,
        ':cidade' => $cidade,
        ':estado' => $estado,
        ':bairro' => $bairro,
        ':complemento' => $comp,
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
