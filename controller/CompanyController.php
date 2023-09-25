<?php

class CompanyController 
{
    private $companyModel;

    public function __construct() {
        $this->companyModel = new CompanyModel();
    }

    public function getAllCompanies() {
        return $this->companyModel->getAllCompanies(); 
    }

    public function editCompany($id, $name, $city, $arrondissement, $sector) {
        return $this->companyModel->editCompany($id, $name, $city, $arrondissement, $sector);
    }

    public function deleteCompany($id) {
        return $this->companyModel->deleteCompany($id);
    }

    public function createNewCompany($name, $city, $arrondissement, $sector) {
        echo "dé";
        return $this->companyModel->createNewCompany($name, $city, $arrondissement, $sector); 
    }

}
?>
