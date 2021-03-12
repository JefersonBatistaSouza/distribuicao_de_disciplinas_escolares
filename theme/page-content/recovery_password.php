<?php

function getRecoveryPassword() {
    ?>
    <div class="recovery-password">
        <div id="msg-recovery"></div>
        <div class="email-recovery">
            <label>Acesso:</label>
            <select name="tipo" class="form-control" id="tipo">
                <option>TAE</option>
                <option>COORDENADOR</option>
            </select>
            <p> Digite o email cadastrado no Sistema</p>
            <input type="email"  class="form-control" name="email" id="email"/>
        </div>
        <div class="btn-recovery">
            <input type="button" onclick="sendEmail()" class="btn btn-info" value="Recuperar" id="btn-sendEmail">
        </div>
        <a href="index.php">Voltar para o Inicio</a>
    </div>
    <script src="js/script-login.js" type="text/javascript"></script>
    <?php
}
