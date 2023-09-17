<?php

class ClassroomModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllClassrooms() {
        $query = "SELECT Nom_Classe FROM classe";

        return $this->db->executeQuery($query)->fetchAll(PDO::FETCH_ASSOC);;
    }

    public function getClassNameByID($id) {
        $query = "SELECT Nom_Classe FROM classe WHERE ID_Classe = :id";
        $params = [':id' => $id];

        return $this->db->executePreparedStatement($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllStudents() {
        $query = "SELECT etudiant.*, classe.Nom_Classe
        FROM etudiant
        INNER JOIN classe ON etudiant.Classe_Etudiant = classe.ID_Classe;";

        return $this->db->executeQuery($query)->fetchAll(PDO::FETCH_ASSOC);;
    }

    public function createNewStudent($lastname, $firstname, $address, $phone, $email, $classe) {
        $query = "INSERT INTO etudiant(Nom_Etudiant, Prenom_Etudiant, Adresse_Etudiant, Telephone_Etudiant, Email_Etudiant, Classe_Etudiant) VALUES(:lastname, :firstname, :address, :phone, :email, :classe)";
        $params = [':lastname' => $lastname, ':firstname' => $firstname, ':address' => $address, 'phone' => $phone, ':email' => $email, ':classe' => $classe];

        return $this->db->executePreparedStatement($query, $params);
    }
}
?>
