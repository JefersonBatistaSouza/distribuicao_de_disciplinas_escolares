<?php

function getCreateTae() {
    ?>
    <div class="containe-tae">
        <div class="title-tae">
            <h3>Cadastro de Técnico em Assuntos Educacionais</h3>
        </div>
        <div id="msg-insert-tae"></div>
        <div class="form-tae">
            <div class="div-input">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" required="true">
            </div>
            <div class="div-input">
                <label>E-mail</label>
                <input type="email" class="form-control" name="email" id="email" required="true">
            </div>
            <div class="div-input-btn">
                <input type="button" class="btn btn-info" value="Adicionar" id="btn-addTae" onclick="insertTae()">
            </div>
        </div>
    </div>
    <?php
}

function getSearchTae() {
    ?>
    <div class="searchTae">
        <div class="btn-search">
            <label>Acesso:</label>
            <div class="btn-allow">
                <input type="button" value="Bloqueado" class="btn btn-danger" onclick="selectTae('AccessDenied','')">
            </div>
            <div class="btn-allow">
                <input type="button" value="Permitido" class="btn btn-success" onclick="selectTae('AccessAllowed','')">
            </div>
            <div class="btn-allow">
                <input type="button" value="Todos" class="btn btn-info" onclick="selectTae('SelectedAll','')">
            </div>
        </div>
        <div class="div-input-search">
            <div class="label-search">
                Pesquisar:
            </div>
            <div class="input-search">
                <input type="search" class="form-control" name="pesquisa" id="pesquisa">
            </div>
        </div>
    </div>
    <div class="searchTae">
        <div>
            <label><strong>Nome</strong></label>
        </div>
        <div>
            <label><strong>E-Mail</strong></label>
        </div>
        <div>
            <label><strong>Ações</strong></label>
        </div>
    </div>
    <?php
}
