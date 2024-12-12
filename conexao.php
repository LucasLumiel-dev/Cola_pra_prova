<?php
$pdo = new PDO("mysql:dbname=colegio_positivo;host=localhost;port=3306", "root", "cimatec");
if (!$pdo) {
    echo "Acesso negado!";
}