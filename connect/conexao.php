<?php

require_once __DIR__. '/config.php';

class Conexao {

    private $connection = null;

    public function __construct() {
        $this->openConnection();
    }

    public function __destruct() {
        $this->closeConnection($this->getConnection());
    }
    
    public function getConnection(){
        return $this->connection;
    }
    
    private function openConnection() {
        $this->connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die('Erro na Conexao ' . mysqli_error($this->connection));
        //echo 'conexao aberta';
        return $this->connection;
    }
    
    private function closeConnection($connection) {
        mysqli_close($connection);
       // echo 'conexao fechada';
    }
}
