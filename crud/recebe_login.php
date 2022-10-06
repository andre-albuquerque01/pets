<?php
session_start();
include_once "conexao.php";
$email = $_POST['email'];
$pass = base64_encode($_POST['senha']);

if ($email == null || $pass == null) {
    echo "<script>alert('Email ou senhas invalidas')</script>";
    echo "<script>location.href='../login.php'</script>";
}

$ver = $pdo->query("SELECT id,nome,email,senha FROM cadastro_cliente WHERE email = '$email' and senha = '$pass'");
$into = $ver->fetch();

if($into != null){
    $_SESSION['id'] = $into['id'];
    $_SESSION['nome'] = $into['nome'];
    
    echo "<script>window.location.href='../dashboard/'</script>";
}else{
    echo "<script>alert('Informações invalidas!')</script>";
    echo "<script>window.location.href='../login.php'</script>";
}