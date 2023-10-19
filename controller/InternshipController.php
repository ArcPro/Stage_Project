<?php

class InternshipController 
{
    private $internshipModel;

    public function __construct() {
        $this->internshipModel = new InternshipModel();
    }

    public function getAllInternships() {
        return $this->internshipModel->getAllInternships(); 
    }
    public function getAllNameInformations() {
        return $this->internshipModel->getAllNameInformations(); 
    }


    // public function editCompany($id, $name, $city, $arrondissement, $sector) {
    //     return $this->companyModel->editCompany($id, $name, $city, $arrondissement, $sector);
    // }

    // public function deleteCompany($id) {
    //     return $this->companyModel->deleteCompany($id);
    // }

    // public function createNewCompany($name, $city, $arrondissement, $sector) {
    //     echo "dé";
    //     return $this->companyModel->createNewCompany($name, $city, $arrondissement, $sector); 
    // }

}
?>
