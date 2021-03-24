<?php
session_start();
if ($_SESSION['LOGGED'] == true) {
    require_once __DIR__ . '/theme/header.php';
    require_once __DIR__ . '/theme/loggedUser.php';
    require_once __DIR__ . '/theme/nav.php';
    require_once __DIR__ . '/theme/page-content/viewTae.php';
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
            <link rel="stylesheet" type="text/css" href="theme/css/style-tae.css">
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
                        if ($_SESSION['TYPE_USER'] == "TAE") {
                            getPageNavegation();
                        } else if ($_SESSION['TYPE_USER'] == "COORDENADOR") {
                            getNavCoordenador();
                        }
                        ?>
                    </div>
                </div>
                <!-- Response da página -->
                <div class="div-content">
                    <div id="response">
                        <?php getCreateTae() ?>
                        <div class="containe-tae">
                            <?php getSearchTae()?>
                            <div id="tae-response"></div>
                        </div>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div id="msg-modal"></div>
                                    <div class="form-modal">
                                        <div class="input-model">
                                            <input type="hidden" name="idModal" id="idModal">
                                            <input type="text" name="nameModal" id="nameModal" class="form-control">
                                        </div>
                                        <div class="input-model">                                    
                                            <input type="email" name="emailModal" id="emailModal" class="form-control">
                                        </div>
                                        <div class="div-btn">
                                            <button class="btn btn-success" onclick="updateTae()"><i class="fas fa-save"></i></button>
                                        </div>
                                    </div>
                                    <div class="access-permission">
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Configurações de Acesso ao Sistema
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="AccessPermission">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="SIM">
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                    Acesso Permitido
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="NAO" checked>
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                    Acesso Negado
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="PasswordDefinition">
                                                            <label>Tipo de Acesso</label>
                                                            <select class="form-control" id="selectedModal">
                                                                <option selected="" value="COMUM">COMUM</option>
                                                                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php getFooter() ?>
                    <script src="js/md5.min.js" type="text/javascript"></script>
                    <script src="js/script-tae.js" type="text/javascript"></script>                    
                </div>                
            </div>
        </body>
    </html>
    <?php
} else {
    header("Location: index.php");
}