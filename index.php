<?php
session_start();
$_SESSION['LOGGED'] = false;
require_once __DIR__ . '/theme/header.php';
require_once __DIR__ . '/theme/nav.php';
require_once __DIR__ . '/theme/page-content/login.php';
require_once __DIR__ . '/theme/page-content/recovery_password.php';
require_once __DIR__ . '/theme/footer.php';
$recovery = filter_input(1,'recovery',FILTER_DEFAULT);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
                    <?php
                    if($recovery == false){
                        getLogin(); 
                    }else if($recovery == true){
                        getRecoveryPassword();
                    }
                    ?>
                </div>
                <?php getFooter() ?>
            </div>
        </div>
    </body>
</html>