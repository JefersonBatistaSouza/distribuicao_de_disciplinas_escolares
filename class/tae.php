<?php

class Tae {

    private $name = null;
    private $email = null;
    private $password = null;
    private $accessallow = null;
    private $typeAccess = null;

    public function __construct($name, $email, $password, $accessallow = "NAO", $typeAccess = "COMUM") {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setAccessAllow($accessallow);
        $this->setTypeAccess($typeAccess);
    }
    public function Tae() {
        
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        if (is_string($name) && strlen($name) > 0) {
            $this->name = strtoupper($name);
        } else {
             echo "<div class='alert alert-danger' role='alert'>Nome inválido: Por favor preencha os dados corretamente</div>"; 
             exit;
        }
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = strtoupper(filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getTypeAccess(){
        return $this->typeAccess;
    }
    
    public function setTypeAccess($typeAccess){
        $this->typeAccess = $typeAccess;    
    }
    
    public function getAccessAllow() {
        return $this->accessallow;
    }

    private function setAccessAllow($accessallow) {
        $this->accessallow = $accessallow;
    }

    public function getQueryInsertTae() {
        $query = "INSERT INTO ACESSOTAE(NOME,EMAIL,SENHA,ACESSOPERMITIDO,TIPOACESSO) VALUES('{$this->getName()}','{$this->getEmail()}','{$this->getPassword()}','{$this->getAccessAllow()}','{$this->getTypeAccess()}')";
        return $query;
    }

    public function getQueryUpdateTae($idTae) {
        $query = "UPDATE ACESSOTAE SET NOME='{$this->getName()}', EMAIL='{$this->getEmail()}', ACESSOPERMITIDO = '{$this->getAccessAllow()}', TIPOACESSO = '{$this->getTypeAccess()}' WHERE IDTAE ={$idTae}";
        return $query;
    }

    public function getDeleteTae($idTae) {
        $query = "DELETE FROM ACESSOTAE WHERE IDTAE ={$idTae}";
        return $query;
    }
}
