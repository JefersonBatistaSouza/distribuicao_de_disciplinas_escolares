<?php

class Tae
{
    private $nome = null;
    private $email = null;
    private $senha = null;
    private $acessopermitido = null;

    public function __construct($nome, $email, $senha, $acessopermitido = "NAO")
    {
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSenha($senha);
        $this->setAcessoPermitido($acessopermitido);
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function getAcessoPermitido(){
        return $this->acessopermitido;
    }
    private function setAcessoPermitido($acessopermitido){
        $this->acessopermitido = $acessopermitido; 
    }
}