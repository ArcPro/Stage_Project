<?php

class ClassroomModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllStudents() {
        $query = "SELECT * FROM etudiant";

        return $this->db->executeQuery($query)->fetch(PDO::FETCH_ASSOC);;
    }
}
?>
