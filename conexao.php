<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'lista_presenca';

// cria conexao com o banco de dado

$conexao = mysqli_connect($host, $username, $password, $database);

if (!$conexao) {

    die("conexão falhou: " . mysqli_connect_error());
}
?>