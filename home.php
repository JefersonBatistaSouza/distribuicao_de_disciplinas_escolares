<?php
session_start();
if ($_SESSION['LOGGED'] == true) {
    require_once __DIR__ . '/theme/header.php';
    require_once __DIR__ . '/theme/loggedUser.php';
    require_once __DIR__ . '/theme/nav.php';
    require_once __DIR__ . '/theme/page-content/notations.php';
    require_once __DIR__ . '/theme/footer.php';
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home</title>
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="css/style.css">
            <link rel="stylesheet" type="text/css" href="theme/css/style-home.css">
        </head>
        <body>
            <!-- conteudo da Página -->
            <div class="containe">
                <!-- Nevegação da Página -->
                <div class="nav">
                    <?php
                    getHeader();
                    getLoggedUser()
                    ?>
                    <div class="menu">
                        <?php 
                        if($_SESSION['TYPE_USER'] == "TAE"){
                           getPageNavegation(); 
                        }else if($_SESSION['TYPE_USER'] == "COORDENADOR"){
                            getNavCoordenador();
                        }
                        ?>
                    </div>
                </div>
                <!-- Response da página -->
                <div class="div-content">
                    <div id="response">
                        <?php getInformation() ?>
                    </div>
                    <?php getFooter() ?>
                </div>

            </div>
        </body>
    </html>
    <?php
} else {
    header("Location: index.php");
}

