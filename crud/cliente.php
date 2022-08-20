<?php
include_once "conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$tel = $_POST['tel'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$comp = $_POST['comp'];
$term = $_POST['term'];

if (isset($term)) { 
    $cadastrar = $pdo->prepare("INSERT INTO `cadastro_cliente`(`nome`, `cep`, `endereco`, `cidade`, `bairro`, `complemento`, `telefone`, `email`, `senha`, `termo_concientizacao`) VALUES ('a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 's')");
    $cadastrar->execute(array(
        ':nome' => $nome,
        ':cep' => $cep,
        ':endereco' => $endereco,
        ':cidade' => $cidade,
        ':bairro' => $bairro,
        ':complemento' => $comp,
        ':telefone' => $tel,
        ':email' => $email,
        ':senha' => $senha,
        ':termo_concientizacao' => $term
    ));
} else {
    echo "Aceita os termos";
}
if ($cadastrar == true) {
    echo "<script>alert('Cadastrado com sucesso')</script>";
    echo "<script>location.href='cadastro_cliente.php'</script>";
}