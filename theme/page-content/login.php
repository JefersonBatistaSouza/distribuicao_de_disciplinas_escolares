<?php
function getLogin() {
    ?>
    <!-- login de Acesso -->
    <div class="login">
        <div class="form-login">
            <h3>Entrar</h3>
            <div id="msg-login"></div>
            <div class="grap">
                <label>Acesso:</label>
                <select name="tipo" class="form-control" id="tipo">
                    <option>TAE</option>
                    <option>COORDENADOR</option>
                </select>
            </div>
            <div class="grap">
                <label>E-Mail:</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="grap">
                <label>Senha:</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <input type="button" value="Acessar" class="btn btn-success" onclick="authenticate()" id="btn-acessar">
        </div>
        <div class="rec-password">
            <a href="?recovery=true">Esqueci minha Senha </a>
        </div>
    </div>
    <script src="js/md5.min.js" type="text/javascript"></script>
    <script src="js/script-login.js" type="text/javascript"></script>
    <?php
}
