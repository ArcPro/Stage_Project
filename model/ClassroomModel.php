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
    
    public function getIDByClassName($name) {
        $query = "SELECT ID_Classe FROM classe WHERE Nom_Classe = :name";
        $params = [':name' => $name];

        return $this->db->executePreparedStatement($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllStudents() {
        $query = "SELECT etudiant.*, classe.Nom_Classe
        FROM etudiant
        INNER JOIN classe ON etudiant.Classe_Etudiant = classe.ID_Classe;";

        return $this->db->executeQuery($query)->fetchAll(PDO::FETCH_ASSOC);;
    }

    public function createNewStudent($lastname, $firstname, $address, $phone, $email, $classe) {
        $finalClasse = $this->getIDByClassName($classe)["ID_Classe"];  
        $query = "INSERT INTO etudiant(Nom_Etudiant, Prenom_Etudiant, Adresse_Etudiant, Telephone_Etudiant, Email_Etudiant, Classe_Etudiant) VALUES(:lastname, :firstname, :address, :phone, :email, :classe)";
        $params = [':lastname' => $lastname, ':firstname' => $firstname, ':address' => $address, ':phone' => $phone, ':email' => $email, ':classe' => $finalClasse];

        return $this->db->executePreparedStatement($query, $params);
    }

    public function editStudent($id, $lastname, $firstname, $address, $phone, $email, $classe) {
        $finalClasse = $this->getIDByClassName($classe)["ID_Classe"];  
        $query = "UPDATE etudiant SET Nom_Etudiant = :lastname, Prenom_Etudiant = :firstname, Adresse_Etudiant = :address, Telephone_Etudiant = :phone, Email_Etudiant = :email, Classe_Etudiant = :classe WHERE ID_Etudiant = :id";
        $params = [':id' => $id, 
        ':lastname' => $lastname, 
        ':firstname' => $firstname, 
        ':address' => $address, 
        ':phone' => $phone, 
        ':email' => $email, 
        ':classe' => $finalClasse];
        return $this->db->executePreparedStatement($query, $params);
    }

    public function deleteStudent($id) {
        $query = "DELETE FROM etudiant WHERE ID_Etudiant = :id";
        $params = [':id' => $id];
        return $this->db->executePreparedStatement($query, $params);
    }

    // TEACHERS

    public function getAllTeachers() {
        $query = "SELECT * FROM professeur";

        return $this->db->executeQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Home page

    public function getHomeStats()
    {
        $query = "SELECT
        (SELECT COUNT(*) FROM professeur) AS nbr_prof,
        (SELECT COUNT(*) FROM etudiant) AS nbr_etudiant,
        (SELECT COUNT(*) FROM stage) AS nbr_stage;";
    

        return $this->db->executeQuery($query)->fetchAll(PDO::FETCH_ASSOC);

    }

   





}
?>
