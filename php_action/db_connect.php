<?php
//conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "crudphp";

$connect = mysqli_connect($servername, $username, $password, $db_name);
//setando a codificação de caracteres para o bando de dados
mysqli_set_charset($connect, "utf8");

//testando conexão com banco de dados
if(mysqli_connect_error()){
    echo "Falha na conexão: " . mysqli_connect_error();
}