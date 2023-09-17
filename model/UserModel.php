<?php

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function checkAccount($email, $password) {
        $query = "SELECT * FROM professeur WHERE Adresse_Email = :email";
        $params = [':email' => $email];

        $user = $this->db->executePreparedStatement($query, $params)->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['Mot_De_Passe'])) {
            return $user; 
        }
        return null; 
    }

    public function verifyAccount($email) {
        $query = "SELECT * FROM professeur WHERE Adresse_Email = :email";
        $params = [':email' => $email];

        return $this->db->executePreparedStatement($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public function createAccount($lastname, $firstname, $email, $password) {
        $query = "INSERT INTO professeur(Nom_Professeur, Prenom_Professeur, Adresse_Email, Mot_De_Passe) VALUES(:lastname, :firstname, :email, :password)";
        $params = [':lastname' => $lastname, ':firstname' => $firstname, ':email' => $email, ':password' => $password];

        return $this->db->executePreparedStatement($query, $params);
    }

    public function editPassword($email, $password) {
        $query = "UPDATE professeur SET Mot_De_Passe = :password, Permission = :permission WHERE Adresse_Email = :email";
        $params = [':email' => $email, ':password' => $password, 'permission' => 1];

        return $this->db->executePreparedStatement($query, $params);
    }
}
?>
