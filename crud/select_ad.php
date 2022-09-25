<?php
include_once "conexao.php";

$select = $pdo->query("SELECT imagem, titulo, descricao, telefone, whatsapp, valor, localizacao, cadastro_cliente from cadastro_ad");
while ($sel = $select->fetch()) {
    echo $sel['image'];
    echo $sel['titulo'];
    echo $sel['descricao'];
    echo $sel['telefone'];
    echo $sel['whatsapp'];
    echo $sel['valor'];
    echo $sel['localizacao'];
    echo $sel['cadastro_cliente'];
    echo $sel['senha'];
    echo $sel['termo_concientizacao']."<br>";
}
