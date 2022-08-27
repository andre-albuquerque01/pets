<?php
include_once "conexao.php";

$select = $pdo->query("SELECT * from cadastro_cliente");
while($as = $select->fetchAll()){
}
echo $as['nome'];
echo $as['cep'];
echo $as['endereco'];
echo $as['cidade'];
echo $as['bairro'];
echo $as['complemento'];
echo $as['telefone'];
echo $as['email'];
echo $as['senha'];
echo $as['termo_concientizacao'];

