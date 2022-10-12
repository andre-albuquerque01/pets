<?php
include_once "conexao.php";
$select = $pdo->query("SELECT email from cadastro_cliente");
$sel = $select->fetch();
$email = $sel['email'];

$nome = $_POST['nome'];
$email1 = strtolower($_POST['email']);
$senha = base64_encode($_POST['senha']);
$tel = $_POST['tel'];
$cep = $_POST['cep'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$term = $_POST['term'];
if (filter_var($email1, FILTER_SANITIZE_EMAIL)) {
    if ($email != $email1) {
        if (isset($term)) {
            $term = "s";
            $cadastrar = $pdo->prepare("INSERT INTO `cadastro_cliente`(`nome`, `cep`, `estado`, `cidade`, `telefone`, `email`, `senha`, `termo_concientizacao`, `desc_perf`) 
        VALUES (:nome, :cep, :estado, :cidade, :telefone, :email, :senha, :termo_concientizacao, :desc_perf)");
            $cadastrar->execute(array(
                ':nome' => $nome,
                ':cep' => $cep,
                ':estado' => $uf,
                ':cidade' => $cidade,
                ':telefone' => $tel,
                ':email' => $email1,
                ':senha' => $senha,
                ':termo_concientizacao' => $term,
                ':desc_perf' => "user"
            ));
        } else {
            echo "<script>alert('Aceita os termos')</script>";
            echo "<script>location.href='../cadastro_cliente.php'</script>";
        }
        if ($cadastrar == true) {
            echo "<script>alert('Cadastrado com sucesso')</script>";
            echo "<script>location.href='../login.php'</script>";
        }else{
            echo "<script>alert('Não foi possível cadastrar')</script>";
            echo "<script>location.href='../login.php'</script>";
        }
    } else {
        echo "<script>alert('Email já cadastrado')</script>";
        echo "<script>location.href='../login.php'</script>";
    }
} else {
    echo "<script>alert('Email inválido')</script>";
    echo "<script>location.href='../login.php'</script>";
}
