<?php


define('servidor', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('BANCO', 'projetoweb');

class Conexao{

    protected $mysqli;

    public function __construct(){
        try{
            $this->conexaoMysql();
        }catch(Exception e){
            echo "Banco não esta conectado!"
        }

        }
    
    public function conexaoMysql(){
        $this->mysqli = new mysqli(SERVIDOR, USUARIO, SENHA, BANCO)
    } 

    public function setAgendamentos($nome, $telefone, $origem, $data_contato, $observacao){
        $stmt = $this->mysqli->prepare("INSERT INTO agendamentos('nome', 'telefone','origem','data_contato','observacao') VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",$nome, $telefone, $origem, $data_contato, $observacao)
        $stmt->execute();
   
    }
}

?>