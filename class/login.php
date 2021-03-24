<?php
class Login {

    private $email;
    private $password;
    private $typeAccess;

    public function __construct($email, $password, $typeAccess) {
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setTypeAccess($typeAccess);
    }

    public function getEmail() {
        return $this->email;
    }

    private function setEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
            $this->email = $email;
        }
    }

    public function getPassword() {
        return $this->password;
    }

    private function setPassword($password) {
        $this->password = $password;
    }

    public function getTypeAccess() {
        return $this->typeAccess;
    }

    private function setTypeAccess($typeAccess) {
        $this->typeAccess = $typeAccess;
    }

    public function getQueryLogin() {
        if ($this->getTypeAccess() === "TAE") {
            $query = "SELECT NOME,ACESSOPERMITIDO FROM ACESSOTAE WHERE EMAIL = '{$this->getEmail()}' AND SENHA ='{$this->getPassword()}'";
        } else if ($this->getTypeAccess() == "COORDENADOR") {
            $query = "SELECT P.NOME,FP.ACESSOPERMITIDO FROM FUNCAOPROFESSOR AS FP
            INNER JOIN FUNCAO_ADM AS F ON F.IDFUNCAO = FP.FUNCAO_ADM_IDFUNCAO
            INNER JOIN PROFESSOR AS P ON P.IDPROFESSOR = FP.PROFESSOR_IDPROFESSOR
            WHERE P.EMAIL ='{$this->getEmail()}' AND FP.SENHA = '{$this->getPassword()}' AND 	
            F.FUNCAO = '{$this->getTypeAccess()}'";
        }
        return $query;
    }

    public function getQueryUpdatePassword() {
        if ($this->getTypeAccess() == "TAE") {
            $query = "UPDATE ACESSOTAE SET SENHA ='{$this->getPassword()}' WHERE EMAIL ='{$this->getEmail()}'"
            . " AND ACESSOPERMITIDO = 'SIM'";
        } else if ($this->getTypeAccess() == "COORDENADOR") {
            $query = "UPDATE FUNCAOPROFESSOR AS FP
                INNER JOIN FUNCAO_ADM AS F ON F.IDFUNCAO = FP.FUNCAO_ADM_IDFUNCAO
                INNER JOIN PROFESSOR AS P ON P.IDPROFESSOR = FP.PROFESSOR_IDPROFESSOR
                SET FP.SENHA ='{$this->getPassword()}' 
                WHERE P.EMAIL ='{$this->getEmail()}' AND F.FUNCAO = '{$this->getTypeAccess()}' AND FP.ACESSOPERMITIDO = 'SIM'";
        }
        return $query;
    }

    public function getDataToken() {
        if ($this->getTypeAccess() == "TAE") {
            $query = "SELECT IDTAE,NOME,SENHA,ACESSOPERMITIDO FROM ACESSOTAE WHERE EMAIL ='{$this->getEmail()}' ";
            $auxID = "IDTAE";
        } else if ($this->getTypeAccess() == "COORDENADOR") {
            $query = "SELECT P.IDPROFESSOR,P.NOME,FP.SENHA,FP.ACESSOPERMITIDO FROM FUNCAOPROFESSOR AS FP
                INNER JOIN FUNCAO_ADM AS F ON F.IDFUNCAO = FP.FUNCAO_ADM_IDFUNCAO
                INNER JOIN PROFESSOR AS P ON P.IDPROFESSOR = FP.PROFESSOR_IDPROFESSOR
                WHERE P.EMAIL ='{$this->getEmail()}'";
            $auxID = "IDPROFESSOR";
        }

        $array = array(
            "ID_TYPE_ACCESS" => $auxID,
            "QUERY" => $query
        );
        return $array;
    }

}
