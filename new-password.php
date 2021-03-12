<?php
session_start();
require_once __DIR__ . '/connect/conexao.php';
require_once __DIR__ . '/controller/functions.php';
require_once __DIR__ . '/theme/header.php';
require_once __DIR__ . '/theme/nav.php';
require_once __DIR__ . '/theme/footer.php';
$token = filter_input(1, 'token', FILTER_DEFAULT);
$email = filter_input(1, 'email', FILTER_DEFAULT);
$typeAccess = filter_input(1, 'typeAccess', FILTER_DEFAULT);
$link = new Conexao();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nova Senha</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="theme/css/style-newpassword.css">
    </head>
    <body>
        <!-- conteudo da Página -->
        <div class="containe">
            <!-- Nevegação da Página -->
            <div class="nav">
                <?php getHeader() ?>
                <div class="menu">
                    <?php getNavLogin() ?>
                </div>
            </div>
            <!-- Response da página -->
            <div class="div-content">
                <div id="response">
                    <div class="new-password">
                        <?php if (checkToken($link, $token, $email, $typeAccess) == true) { ?>
                            <p>Redefina sua senha</p>
                            <div id="msg-newpassword"></div>
                            <label>Nova Senha</label>
                            <input type="hidden" name="email" id="email" value="<?php echo $email ?>">
                            <input type="hidden" name="typeAccess" id="typeAccess" value="<?php echo $typeAccess?>">
                            <input type="password" class="form-control" name="newPassword" id="newPassword">
                            <label>Confirmar Senha</label>
                            <input type="password" class="form-control" name="confPassword" id="confPassword">
                            <input type="button" onclick="updatePassword()" class="btn btn-info" name="btn-password" id="btn-password" value="Salvar">
                            <a href="index.php">Cancelar Redefinição</a>
                        <?php } else { ?>
                            <div class="alert alert-danger" role="alert">
                                <p>O link é inválido ou ja foi utilizado</p>
                            </div>
                            <a href="index.php">Fazer Login Novamente</a>
                        <?php } ?>
                            <script src="js/script-login.js" type="text/javascript"></script>
                            <script src="js/md5.min.js" type="text/javascript"></script>
                    </div>
                </div>
                <?php getFooter() ?>
            </div>
        </div>
    </body>
</html>