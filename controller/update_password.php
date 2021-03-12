<?php

require_once '../connect/conexao.php';
require '';
//Recebendo dados via post do formulário
$email = filter_input(0, 'email', FILTER_VALIDATE_EMAIL);
$typeAccess = filter_input(0, 'typeAccess', FILTER_DEFAULT);
$newPassword = filter_input(0, 'password', FILTER_DEFAULT);
$confPassword = filter_input(0, 'confpassword', FILTER_DEFAULT);
//Verifica se as senhas sao iguais
if ($newPassword == $confPassword){
    //$password recebe a confirmação da senha correta
    $password = $confPassword;
    $link = new Conexao();
    //Instancia a classe login
    $login = new Login($email, $password, $typeAccess);
    $update = mysqli_query($link->getConnection(), $login->getQueryUpdatePassword());
    if (!$update) {
        die("Error:" . mysqli_error($link->getConnection()));
    } else {
        echo "<div class='col-12 alert alert-success'>Senha Atualizada com Sucesso<br/>"
        . "<strong>Redirecionando para o Login...</strong></div>";
        ?>
        <script>setTimeout(function () {
                window.location.href = 'index.php';
            }, 5000); // 5 seconds
        </script>
        <?php
    }
} else {
    echo "<div class='col-12 alert alert-danger'>Senhas não são iguais</div>";
}