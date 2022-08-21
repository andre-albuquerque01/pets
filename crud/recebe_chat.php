<?php
include_once "conexao.php";

$con = $pdo->query("SELECT * FROM `chat`");
foreach($con->fetchAll() as $key){
    // echo "<h3>".$key['cadastro_ad']."</h3>";
	echo "<h5>".$key['conversa']."</h5>";
	echo "<h5> Data ".$key['MessageDate']."</h5>";
};