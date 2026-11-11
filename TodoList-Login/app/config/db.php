<?php
class db{
    private $local = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "todoLogin";
    public $conn;

    public function conectar(){
        $this->conn = new mysqli($this->local, $this->user, $this->pass, $this->database);
        if ($this->conn->connect_error) {
            die("Erro com a conexão: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}
