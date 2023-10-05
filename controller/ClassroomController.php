<?php

class ClassroomController 
{
    private $classroomModel;

    public function __construct() {
        $this->classroomModel = new ClassroomModel();
    }

    public function getAllStudents() {
        return $this->classroomModel->getAllStudents(); 
    }

    public function getAllClassrooms() {
        return $this->classroomModel->getAllClassrooms(); 
    }

    public function getAllTeachers() {
        return $this->classroomModel->getAllTeachers(); 
    }

    public function getClassNameByID($id) {
        return $this->classroomModel->getClassNameByID($id); 
    }

    public function createNewStudent($lastname, $firstname, $address, $phone, $email, $classe) {
        return $this->classroomModel->createNewStudent($lastname, $firstname, $address, $phone, $email, $classe); 
    }

    public function editStudent($id, $lastname, $firstname, $address, $phone, $email, $classe) {  
        return $this->classroomModel->editStudent($id, $lastname, $firstname, $address, $phone, $email, $classe);
    }

    public function deleteStudent($id) {
        return $this->classroomModel->deleteStudent($id);
    }

    public function getHomeStats() {
        return $this->classroomModel->getHomeStats(); 
    }

}
?>
