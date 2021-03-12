<?php

session_start();
include_once '../connect/conexao.php';
require_once '../class/login.php';
//Autenticar usuário
$email = filter_input(0, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(0, 'password', FILTER_DEFAULT);
$typeAccess = filter_input(0, 'typeAccess', FILTER_DEFAULT);

$link = new Conexao();
//Realiazando o Login
$login = new Login($email, $password, $typeAccess);
//Login
$result = mysqli_query($link->getConnection(), $login->getQueryLogin());
if (!$result) {
    echo "<div class='alert alert-danger' role='alert'>Error" . mysqli_error($link->getConnection()) . "</div>";
} else {
    $data = mysqli_fetch_assoc($result);
    if ($data == NULL) {
        echo "<div class='alert alert-danger' role='alert'>Error: Usuario ou senha inválida</div>";
    } else if($data['ACESSOPERMITIDO'] == "NAO"){
        echo "<div class='alert alert-danger' role='alert'>Você não tem permissão para acessar o sistema</div>";
        exit;
    }else {
        $_SESSION['TYPE_USER'] = $typeAccess;
        $_SESSION['LOGGED'] = true;
        $_SESSION['NOME'] = $data["NOME"];
        echo "logged";
    }
}




