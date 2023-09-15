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
}
?>
