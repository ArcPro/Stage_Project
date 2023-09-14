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
}
?>
