<?php
$user = 'root';
$pass = '';

try{
$pdo = new PDO("mysql:host=localhost:3306;dbname=pet", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo "Conexão com sucesso!";
}catch(PDOException $i){
    echo "Erro: ".$i;
} 
