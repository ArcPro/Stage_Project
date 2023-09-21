<?php

class CompanyModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllCompanies() {
        $query = "SELECT * FROM entreprise";

        return $this->db->executeQuery($query)->fetchAll(PDO::FETCH_ASSOC);;
    }

    public function editCompany($id, $name, $city, $arrondissement, $sector) {
        $query = "UPDATE entreprise SET Nom_Entreprise = :name, Ville = :city, Arrondissement = :arrondissement, Secteur_Activite = :sector WHERE ID_Entreprise = :id";
        $params = [':id' => $id,
        ':name' => $name, 
        ':city' => $city, 
        ':arrondissement' => $arrondissement, 
        ':sector' => $sector];
        print_r($this->db->executePreparedStatement($query, $params));
        return $this->db->executePreparedStatement($query, $params);
    }
}
?>
