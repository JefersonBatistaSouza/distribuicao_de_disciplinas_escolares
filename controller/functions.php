<?php

require_once '../class/login.php';

//Gerar token para redefinição de senha do TAE
function getToken($link, $typeAccess, $email) {
    $login = new Login($email, null, $typeAccess);

    $token = $login->getDataToken();

    $result = mysqli_query($link->getConnection(), $token['QUERY']);
    if (!$result) {
        echo "<div class='alert alert-danger' role='alert'>Error" . mysqli_error($link->getConnection()) . "</div>";
        exit;
    } else {
        $data = mysqli_fetch_assoc($result);
        if ($data == NULL) {
            echo "<div class='alert alert-danger' role='alert'>E-mail invalido ou não Cadastrado</div>";
            exit;
        } else if ($data['ACESSOPERMITIDO'] == "NAO") {
            echo "<div class='alert alert-danger' role='alert'>Você não tem permissão para acessar o sistema</div>";
            exit;
        } else {
            $token = md5($data[$token['ID_TYPE_ACCESS']] . $data['NOME'] . $data['SENHA']);
            return $token;
        }
    }
}

function checkToken($link, $token, $email, $typeAccess) {
    if ($token == getToken($link, $typeAccess, $email)) {
        return true;
    } else {
        return false;
    }
}

function sendEmail($mail, $email, $link) {
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "comandaariquemes@gmail.com";
    $mail->Password = "yhsxqbixfnraooov";
    $mail->Port = 587;
    $mail->setFrom("comandaariquemes@gmail.com", "IFRO TAE ACCESS");
    $mail->addAddress($email, "IFRO TEST RECOVERY PASSWORD");
    $mail->isHTML(true);
    $mail->Subject = "Redefinicao de Senha -  IFRO TAE";
    $mail->Body = "Voce soliciotu a redefinição de Senha no SISTAE<br/>"
            . "<strong>Caso não tenha sido você que solicitou essa ação por favor ignorar o E-mail</strong><br/>"
            . "Clique no Link abaixo ou cole na barra de endereço do seu navegador para Redefinir sua Senha<br/>"
            . "$link";
    if ($mail->send()) {
        echo "<div class='col-12 alert alert-success'>E-mail Enviado com Sucesso <br/> Para continuarmos Verifique sua caixa"
        . " de email</div>";
    } else {
        echo "<div class='col-12 alert alert-danger'> Falha ao Enviar Chave por Email</div>";
    }
}