<?php function getLogin()
{ ?>
    <!-- login da Página -->
    <div class="login">
        <div class="form-login">
            <h3>Entrar</h3>
            <div class="grap">
                <label>Acesso:</label>
                <select name="type-access" class="form-control">
                    <option>TAE</option>
                    <option>COORDENADOR</option>
                </select>
            </div>
            <div class="grap">
                <label>E-Mail:</label>
                <input type="em" class="form-control">
            </div>
            <div class="grap">
                <label>Senha:</label>
                <input type="password" class="form-control">
            </div>
            <input type="button" value="Acessar" class="btn btn-success">
        </div>
        <div class="rec-password">
            <a href="#">Esqueci minha Senha </a>
        </div>
    </div>
<?php } ?>