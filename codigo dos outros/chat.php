<?php
include("bd_conect.php");
$sql = $pdo->query("SELECT * FROM chat1");
foreach ($sql->fetchAll() as $key) {
	echo "<h3>".$key['cadastro_ad']."</h3>";
	echo "<h5>".$key['conversa']."</h5>";
	echo "<h5>".$key['MessageDate']."</h5>";
}



?>