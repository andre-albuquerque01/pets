<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['id']) == null) {
    echo "<script>alert('Erro: Necessário realizar o login para acessar a página!');</script>";
    echo "<script>window.location.href ='../'</script>";
}
