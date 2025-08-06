<?php
//sessão
session_start();
//conexão com bd
require_once 'db_connect.php';


if(isset($_POST['btn-excluir'])){
    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "DELETE FROM clientes WHERE id = '$id'";

    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = "Informações deletadas!";
        header('Location: ../index.php');
    }
    else{
        $_SESSION['mensagem'] = "Erro ao tentar excluir registro!";
        header('Location: ../index.php');
    }
}
else{
    echo "ERRO";
}