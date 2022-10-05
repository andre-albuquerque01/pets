<?php
include_once "conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = base64_encode($_POST['senha']);
$Newsenha = base64_encode($_POST['Newsenha']);
$tel = $_POST['tel'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$comp = $_POST['comp'];

if ($senha === $Newsenha) {
    $term = "s";
    $cadastrar = $pdo->prepare("UPDATE `cadastro_cliente` SET `nome`=:nome, `cep`=:cep, `endereco`=:endereco, `cidade`=:cidade, `bairro`=:bairro, `complemento`=:complemento, `telefone`=:telefone, `email`=:email, `senha`=:senha");
    $cadastrar->execute(array(
        ':nome' => $nome,
        ':cep' => $cep,
        ':endereco' => $endereco,
        ':cidade' => $cidade,
        ':bairro' => $bairro,
        ':complemento' => $comp,
        ':telefone' => $tel,
        ':email' => $email,
        ':senha' => $Newsenha
    ));
    if ($cadastrar == true) {
        echo "<script>alert('Alteração feita com sucesso')</script>";
        echo "<script>location.href='../perfil.php'</script>";
    }
} else {
    echo "<script>alert('Senhas diferentes')</script>";
    echo "<script>location.href='../altera_cliente.php'</script>";
}
