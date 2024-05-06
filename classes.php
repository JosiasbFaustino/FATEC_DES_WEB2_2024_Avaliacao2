<?php

class Cadastro {
    private $conn;

    public function __construct($host, $dbname, $username, $password) {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // Set the PDO error mode to exception
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
            $stmt = $this->conn->prepare("SELECT * FROM candidatos");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}
?>
