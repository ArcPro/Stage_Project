<?php
class Database {
    private $host = "localhost";
    private $db_name = "stage_db";
    private $username = "root";
    private $password = "";
    private $conn;

    // Constructeur pour établir la connexion à la base de données
    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }

    // Méthode pour exécuter une requête SQL
    public function executeQuery($query) {
        return $this->conn->query($query);
    }

    // Méthode pour exécuter une requête SQL préparée avec des paramètres
    public function executePreparedStatement($query, $params) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        // print_r($query);
        // print_r($params);
        return $stmt;
    }

    // Méthode pour obtenir le dernier ID inséré
    public function getLastInsertId() {
        return $this->conn->lastInsertId();
    }
}
?>
