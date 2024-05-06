<?php

class Cadastro {
    private $conn;
    private $host = "localhost";
    private $dbname = "vestibular";
    private $username = "root";
    private $password = "";

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
           
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function __destruct() {
        $this->conn = null;
    }

    public function cadastrarCandidato($nome, $curso) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO candidatos (nome, curso) VALUES (:nome, :curso)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':curso', $curso);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function lerTodosCandidatos() {
        try {
            $stmt = $this->conn->query("SELECT * FROM candidatos");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}
?>
