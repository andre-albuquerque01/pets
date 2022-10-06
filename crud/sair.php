<?php
// Inicia sessões, para assim poder destruí-las
session_start();
if (isset($_SESSION["id"])) {
    unset($_SESSION['id']);
    header("Location:../");
}else{
    echo "<script>alert('Erro: não foi possível sair!');</script>";
}
