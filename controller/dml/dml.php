<?php
class DML{
    private $link = null;
    
    public function __construct($link) {
        $this->setLink($link);
    }
    
    public function getLink(){
        return $this->link;
    }
    private function setLink($link){
        $this->link = $link;
    }
    
    public function insert($query){
        $exe = mysqli_query($this->getLink(), $query);
        if(!$exe){
            echo "<div class='alert alert-danger' role='alert'>Não foi possivel adicionar o Registro Error: Email já cadastrado ou dados inválidos Se o erro perssistir contate o Suporte<br/><strong>".mysqli_error($this->getLink())."</strong></div>";
        }else{
            echo "<div class='alert alert-success' role='alert'>Registro adicionado com Sucesso</div>";
        }
    }
    public function update($query){
        $exe = mysqli_query($this->getLink(), $query);
        if(!$exe){
            echo "<div class='alert alert-danger' role='alert'>Não foi possivel atualizar o registro</div>".die(mysqli_error($this->getLink()));
        }else{
            echo "<div class='alert alert-success' role='alert'>Registro atualizado com Sucesso</div>";
        }
    }
    public function delete($query){
        $exe = mysqli_query($this->getLink(), $query);
        if(!$exe){
            echo "<div class='alert alert-danger' role='alert'>Não foi possivel deletear o Registro</div>".die(mysqli_error($this->getLink()));
        }else{
            echo "<div class='alert alert-success' role='alert'>Registro deletado com Sucesso</div>";
        }
    }
}

