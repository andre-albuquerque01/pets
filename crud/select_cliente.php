<?php
include_once "conexao.php";

$select = $pdo->query("SELECT nome, cep, endereco, cidade, bairro, complemento, telefone, email, senha, termo_concientizacao from cadastro_cliente");
while ($sel = $select->fetch()) {
    echo $sel['nome'];
    echo $sel['cep'];
    echo $sel['endereco'];
    echo $sel['cidade'];
    echo $sel['bairro'];
    echo $sel['complemento'];
    echo $sel['telefone'];
    echo $sel['email'];
    echo $sel['senha'];
    echo $sel['termo_concientizacao'] . "<br>";
}
