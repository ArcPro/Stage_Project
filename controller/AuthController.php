<?php

class AuthController 
{
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    // Méthode pour gérer la connexion de l'utilisateur
    public function login($email, $password) {
        $user = $this->userModel->checkAccount($email, $password);

        if ($user) {
            // session_start();
            $_SESSION['user_id'] = $user['ID_Professeur'];
            $_SESSION['user_name'] = $user['Nom_Professeur'];
            $_SESSION['user_firstname'] = $user['Prenom_Professeur'];
            $_SESSION['user_hours'] = $user['Heures_Enseignant'];
            $_SESSION['user_email'] = $user['Adresse_Email'];
            $_SESSION['user_permission'] = $user['Permission'];
            return true;
        }
        return false; 
    }

    public function register($lastname, $firstname, $email, $password) {
        $user = $this->userModel->verifyAccount($email, $password);
        if (!$user) {
            
            return $this->userModel->createAccount($lastname, $firstname, $email, $password);;
        }
        return false; 
    }

    public function editPassword($email, $password) {
        $hashPassword = password_hash(htmlspecialchars($password), PASSWORD_DEFAULT);
        $user = $this->userModel->editPassword($email, $hashPassword);

        if ($user) {
            return true;
        }
        return false; 
    }

    public function logout() {
        session_unset();
        session_destroy();
    }
}
?>
