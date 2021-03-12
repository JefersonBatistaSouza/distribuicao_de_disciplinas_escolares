<?php

function getPageNavegation() {
    ?>
    <ul>
        <li><i class="fas fa-folder-plus"></i> Cadastros
            <ul class="menu-link">
                <li><a href="#"><span>TAE</span></a></li>
                <li><a href="#">Funções Administrativas</a></li>
                <li><a href="#">Professor</a></li>
                <li><a href="#">Curso</a></li>
                <li><a href="#">Disciplina</a></li>
                <li><a href="#">Turma</a></li>
            </ul>
        </li>
        <li><i class="fas fa-file-alt"></i> Processos
            <ul class="menu-link">
                <li><a href="#">Distribuição de Disciplinas</a></li>
                <li><a href="#">Definir horário</a></li>
                <li><a href="#">Documentos PDF</a></li>
            </ul>
        </li>
        <li><i class="fas fa-server"></i> Informações
            <ul class="menu-link">
                <li><a href="#">Professor</a></li>
                <li><a href="#">Turma</a></li>
                <li><a href="#">Curso</a></li>
                <li><a href="#">Disciplinas</a></li>
            </ul>
        </li>
    </ul>

    <?php
}

//Menu Nav Login
function getNavLogin() {
    ?>
    <style>
        .nav{
            display: block;
        }
    </style>
    <!-- Menu de navegação page login -->
    <ul class="menu-link">
        <li><a href="#">Documentos PDF</a></li>
    </ul>
    <?php
}

//Menu Nav Coordenador
function getNavCoordenador() {
    ?>
    <ul>
        <li><i class="fas fa-folder-plus"></i> Cadastros
            <ul class="menu-link">
                <li><a href="#">Professor</a></li>
                <li><a href="#">Disciplina</a></li>
            </ul>
        </li>
        <li><i class="fas fa-file-alt"></i> Processos
            <ul class="menu-link">
                <li><a href="#">Documentos PDF</a></li>
            </ul>
        </li>
        <li><i class="fas fa-server"></i> Informações
            <ul class="menu-link">
                <li><a href="#">Professor</a></li>
                <li><a href="#">Turma</a></li>
                <li><a href="#">Curso</a></li>
                <li><a href="#">Disciplinas</a></li>
            </ul>
        </li>
    </ul>
    <?php
}
