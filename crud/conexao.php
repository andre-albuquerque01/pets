<?php
$user = 'root';
$pass = '';

try{
$pdo = new PDO("mysql:host=localhost;dbname=pets", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $i){
    echo "Erro: ".$i;
} 