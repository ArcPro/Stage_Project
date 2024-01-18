<?php

class InternshipModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllInternships() {
        $query = "SELECT etudiant.Nom_Etudiant, entreprise.Nom_Entreprise, professeur.Nom_Professeur, Sujet_Stage, Outils, Type_Stage, Date_Debut, Date_Fin, Date_Attestation, Niveau_Etude, Distanciel FROM stage INNER JOIN etudiant on Etudiant_ID = ID_Etudiant INNER JOIN professeur on Professeur_ID = ID_Professeur INNER JOIN entreprise on Entreprise_ID = ID_Entreprise";

        return $this->db->executeQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllNameInformations() {
        $query = "SELECT 'Entreprise' AS Categorie, Nom_Entreprise AS Nom, Ville AS Prenom  FROM entreprise
            UNION
            SELECT 'Etudiant' AS Categorie, Nom_Etudiant AS Nom, Prenom_Etudiant AS Prenom FROM etudiant
            UNION
            SELECT 'Professeur' AS Categorie, Nom_Professeur AS Nom, Prenom_Professeur AS Prenom FROM professeur";
    
        return $this->db->executeQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    


    

    // public function editCompany($id, $name, $city, $arrondissement, $sector) {
    //     $query = "UPDATE entreprise SET Nom_Entreprise = :name, Ville = :city, Arrondissement = :arrondissement, Secteur_Activite = :sector WHERE ID_Entreprise = :id";
    //     $params = [':id' => $id,
    //     ':name' => $name, 
    //     ':city' => $city, 
    //     ':arrondissement' => $arrondissement, 
    //     ':sector' => $sector];
    //     print_r($query);
    //     print_r($params);
    //     return $this->db->executePreparedStatement($query, $params);
    // }

    // public function deleteCompany($id) {
    //     $query = "DELETE FROM entreprise WHERE ID_Entreprise = :id";
    //     $params = [':id' => $id];

    //     return $this->db->executePreparedStatement($query, $params);
    // }

    // public function createNewCompany($name, $city, $arrondissement, $sector) {
    //     $query = "INSERT INTO entreprise(Nom_Entreprise, Ville, Arrondissement, Secteur_Activite) VALUES(:name, :city, :arrondissement, :sector)";
    //     $params = [':name' => $name, 
    //     ':city' => $city, 
    //     ':arrondissement' => $arrondissement, 
    //     ':sector' => $sector];

    //     return $this->db->executePreparedStatement($query, $params);
    // }
}
?>
